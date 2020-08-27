<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\widgets\ToastrWidget;
use milkyway\comments\widgets\NavbarWidgets;
use milkyway\comments\CommentsModule;

/* @var $this yii\web\View */
/* @var $model milkyway\comments\models\Comments */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => CommentsModule::t('comments', 'Comments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-view']) ?>
<div class="container-fluid px-xxl-25 px-xl-10">
    <?= NavbarWidgets::widget(); ?>

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span
                        class="ion ion-md-apps"></span></span><?= Html::encode($this->title) ?>
        </h4>
        <p>
            <a class="btn btn-outline-light" href="<?= Url::to(['create']); ?>"
                title="<?= CommentsModule::t('comments', 'Create'); ?>">
                <i class="fa fa-plus"></i> <?= CommentsModule::t('comments', 'Create'); ?></a>
            <?= Html::a(CommentsModule::t('comments', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(CommentsModule::t('comments', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => CommentsModule::t('comments', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </div>
    <!-- /Title -->

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
						'id',
                        [
                            'attribute' => 'metadata',
                            'enableSorting' => false,
                            'format' => 'raw',
                            'value' => function ($model) {
                                /* @var $model milkyway\comments\models\Comments */
                                $image = $model->dataMetadataByKey('image');
                                $path = Yii::$app->params['module-comments']['metadataMappingImage']['image']['path'];
                                if (is_dir($path . '/' . $image) || !file_exists($path . '/' . $image)) return null;
                                return Html::img(Yii::$app->assetManager->publish($path . '/' . $image)[1], [
                                    'style' => 'max-width: 120px'
                                ]);
                            },
                            'label' => CommentsModule::t('comments', 'Avatar')
                        ],
                        [
                            'attribute' => 'metadata',
                            'enableSorting' => false,
                            'value' => function ($model) {
                                /* @var $model milkyway\comments\models\Comments */
                                return $model->dataMetadataByKey('name');
                            },
                            'label' => CommentsModule::t('comments', 'Name')
                        ],
                        [
                            'attribute' => 'metadata',
                            'enableSorting' => false,
                            'value' => function ($model) {
                                /* @var $model milkyway\comments\models\Comments */
                                return $model->dataMetadataByKey('address');
                            },
                            'label' => CommentsModule::t('comments', 'Address')
                        ],
                        [
                            'attribute' => 'comment',
                            'format' => 'raw',
                        ],
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                return Yii::$app->getModule('comments')->params['status'][$model->status];
                            }
                        ],
						'created_at:datetime',
						'updated_at:datetime',
                        [
                            'attribute' => 'userCreated.userProfile.fullname',
                            'label' => CommentsModule::t('comments', 'Created By')
                        ],
                        [
                            'attribute' => 'userUpdated.userProfile.fullname',
                            'label' => CommentsModule::t('comments', 'Updated By')
                        ],
                    ],
                ]) ?>
            </section>
        </div>
    </div>
</div>
