<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\widgets\ToastrWidget;
use milkyway\socials\widgets\NavbarWidgets;
use milkyway\socials\SocialsModule;
use milkyway\socials\models\Socials;

/* @var $this yii\web\View */
/* @var $model milkyway\socials\models\Socials */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => SocialsModule::t('socials', 'Socials'), 'url' => ['index']];
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
               title="<?= SocialsModule::t('socials', 'Create'); ?>">
                <i class="fa fa-plus"></i> <?= SocialsModule::t('socials', 'Create'); ?></a>
            <?= Html::a(SocialsModule::t('socials', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(SocialsModule::t('socials', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => SocialsModule::t('socials', 'Are you sure you want to delete this item?'),
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
                        'name',
                        [
                            'attribute' => 'type',
                            'value' => function ($model) {
                                if (array_key_exists($model->type, Socials::TYPE)) return Socials::TYPE[$model->type];
                                return null;
                            }
                        ],
                        [
                            'attribute' => 'image',
                            'format' => 'raw',
                            'value' => function ($model) {
                                if ($model->image == null) return null;
                                if ($model->type == Socials::TYPE_ICON) return Html::tag('i', '', [
                                    'class' => $model->image
                                ]);
                                else if ($model->type == Socials::TYPE_IMAGE) {
                                    $image = $model->getImage();
                                    if ($image != null) return Html::img($image, [
                                        'style' => 'max-width: 70px'
                                    ]);
                                    return null;
                                }
                            }
                        ],
                        'url:url',
                        'sort',
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                return Yii::$app->getModule('socials')->params['status'][$model->status];
                            }
                        ],
                        'created_at:datetime',
                        'updated_at:datetime',
                        [
                            'attribute' => 'userCreated.userProfile.fullname',
                            'label' => SocialsModule::t('socials', 'Created By')
                        ],
                        [
                            'attribute' => 'userUpdated.userProfile.fullname',
                            'label' => SocialsModule::t('socials', 'Updated By')
                        ],
                    ],
                ]) ?>
            </section>
        </div>
    </div>
</div>
