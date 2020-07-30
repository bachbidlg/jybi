<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\widgets\ToastrWidget;
use milkyway\freetype\widgets\NavbarWidgets;
use milkyway\freetype\FreetypeModule;
use milkyway\freetype\models\table\FreetypeTable;

/* @var $this yii\web\View */
/* @var $model milkyway\freetype\models\Freetype */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => FreetypeModule::t('freetype', 'Freetype'), 'url' => ['index']];
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
               title="<?= FreetypeModule::t('freetype', 'Create'); ?>">
                <i class="fa fa-plus"></i> <?= FreetypeModule::t('freetype', 'Create'); ?></a>
            <?= Html::a(FreetypeModule::t('freetype', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(FreetypeModule::t('freetype', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => FreetypeModule::t('freetype', 'Are you sure you want to delete this item?'),
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
                        'image',
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                return Yii::$app->getModule('freetype')->params['status'][$model->status];
                            }
                        ],
                        'sort',
                        [
                            'attribute' => 'type',
                            'value' => function ($model) {
                                if (!array_key_exists($model->type, FreetypeTable::TYPE)) return null;
                                return FreetypeTable::TYPE[$model->type];
                            }
                        ],
                        'created_at:datetime',
                        'updated_at:datetime',
                        [
                            'attribute' => 'userCreated.userProfile.fullname',
                            'label' => FreetypeModule::t('freetype', 'Created By')
                        ],
                        [
                            'attribute' => 'userUpdated.userProfile.fullname',
                            'label' => FreetypeModule::t('freetype', 'Updated By')
                        ],
                    ],
                ]) ?>
            </section>
        </div>
    </div>
</div>
