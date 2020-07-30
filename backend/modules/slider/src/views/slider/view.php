<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\widgets\ToastrWidget;
use milkyway\slider\widgets\NavbarWidgets;
use milkyway\slider\SliderModule;
use milkyway\slider\models\table\SliderTable;

/* @var $this yii\web\View */
/* @var $model milkyway\slider\models\Slider */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => SliderModule::t('slider', 'Slider'), 'url' => ['index']];
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
               title="<?= SliderModule::t('slider', 'Create'); ?>">
                <i class="fa fa-plus"></i> <?= SliderModule::t('slider', 'Create'); ?></a>
            <?= Html::a(SliderModule::t('slider', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(SliderModule::t('slider', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => SliderModule::t('slider', 'Are you sure you want to delete this item?'),
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
                            'attribute' => 'image',
                            'format' => 'raw',
                            'value' => function ($model) {
                                if ($model->image == null || !file_exists($model->pathImage . '/' . $model->image)) return null;
                                return Html::img($model->urlImage . '/' . $model->image, [
                                    'style' => 'max-width: 150px'
                                ]);
                            }
                        ],
                        'url',
                        [
                            'attribute' => 'type',
                            'value' => function ($model) {
                                if (!array_key_exists($model->type, SliderTable::TYPE)) return null;
                                return SliderTable::TYPE[$model->type];
                            }
                        ],
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                return Yii::$app->getModule('slider')->params['status'][$model->status];
                            }
                        ],
                        'sort',
                        'created_at:datetime',
                        'updated_at:datetime',
                        [
                            'attribute' => 'userCreated.userProfile.fullname',
                            'label' => SliderModule::t('slider', 'Created By')
                        ],
                        [
                            'attribute' => 'userUpdated.userProfile.fullname',
                            'label' => SliderModule::t('slider', 'Updated By')
                        ],
                    ],
                ]) ?>
            </section>
        </div>
    </div>
</div>
