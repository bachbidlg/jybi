<?php

use yii\helpers\Url;
use milkyway\slider\SliderModule;
use milkyway\slider\widgets\NavbarWidgets;
use yii\helpers\Html;
use yii\grid\GridView;
use backend\widgets\ToastrWidget;
use yii\widgets\Pjax;
use milkyway\slider\models\table\SliderTable;
/* @var $this yii\web\View */
/* @var $searchModel milkyway\slider\models\search\SliderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = SliderModule::t('slider', 'Slider');
$this->params['breadcrumbs'][] = $this->title;
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $searchModel->toastr_key . '-index']) ?>
<div class="container-fluid px-xxl-25 px-xl-10">
    <?= NavbarWidgets::widget(); ?>

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span
                        class="ion ion-md-apps"></span></span><?= Html::encode($this->title) ?>
        </h4>
        <a class="btn btn-sm btn-primary" href="<?= \yii\helpers\Url::to(['create']); ?>"
           title="<?= SliderModule::t('slider', 'Create'); ?>">
            <i class="fa fa-plus"></i> <?= SliderModule::t('slider', 'Create'); ?></a>
    </div>

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">

                <?php Pjax::begin(); ?>
                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap">
                            <div class="dataTables_wrapper dt-bootstrap4">
                                <?= GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'layout' => '
                                        {errors}
                                        <div class="row">
                                            <div class="col-sm-12">
                                                {items}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-5">
                                                <div class="dataTables_info" role="status" aria-live="polite">
                                                    {pager}
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-7">
                                                <div class="dataTables_paginate paging_simple_numbers">
                                                    {summary}
                                                </div>
                                            </div>
                                        </div>
                                    ',
                                    'pager' => [
                                        'firstPageLabel' => SliderModule::t('slider', 'First'),
                                        'lastPageLabel' => SliderModule::t('slider', 'Last'),
                                        'prevPageLabel' => SliderModule::t('slider', 'Previous'),
                                        'nextPageLabel' => SliderModule::t('slider', 'Next'),
                                        'maxButtonCount' => 5,

                                        'options' => [
                                            'tag' => 'ul',
                                            'class' => 'pagination',
                                        ],

                                        // Customzing CSS class for pager link
                                        'linkOptions' => ['class' => 'page-link'],
                                        'activePageCssClass' => 'active',
                                        'disabledPageCssClass' => 'disabled page-disabled',
                                        'pageCssClass' => 'page-item',

                                        // Customzing CSS class for navigating link
                                        'prevPageCssClass' => 'paginate_button page-item',
                                        'nextPageCssClass' => 'paginate_button page-item',
                                        'firstPageCssClass' => 'paginate_button page-item',
                                        'lastPageCssClass' => 'paginate_button page-item',
                                    ],
                                    'columns' => [
                                        [
                                            'class' => 'yii\grid\SerialColumn',
                                            'header' => 'STT',
                                            'headerOptions' => [
                                                'width' => 60,
                                                'rowspan' => 2
                                            ],
                                            'filterOptions' => [
                                                'class' => 'd-none',
                                            ],
                                        ],
                                    
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
										'sort',
                                        [
                                            'attribute' => 'created_by',
                                            'value' => 'userCreated.userProfile.fullname',
                                            'headerOptions' => [
                                                'width' => 150,
                                            ],
                                        ],
                                        [
                                            'attribute' => 'status',
                                            'format' => 'raw',
                                            'value' => function ($model) {
                                                return '<input type="checkbox" class="ipt-checkbox" ' . ($model->status ? 'checked' : '') . ' data-field="status" data-id="' . $model->id . '" data-url="' . Url::toRoute(['change-value']) . '" data-checked="' . SliderTable::STATUS_PUBLISHED . '" data-unchecked="' . SliderTable::STATUS_DISABLED . '">';
                                            }
                                        ],
                                        [
                                            'attribute' => 'created_at',
                                            'format' => 'date',
                                            'headerOptions' => [
                                                'width' => 150,
                                            ],
                                        ],
                                        [
                                            'class' => 'yii\grid\ActionColumn',
                                            'header' => SliderModule::t('slider', 'Actions'),
                                            'template' => '{update} {delete}',
                                            'buttons' => [
                                                'update' => function ($url, $model) {
                                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                                        'title' => SliderModule::t('slider', 'Update'),
                                                        'alia-label' => SliderModule::t('slider', 'Update'),
                                                        'data-pjax' => 0,
                                                        'class' => 'btn btn-info btn-xs'
                                                    ]);
                                                },
                                                'delete' => function ($url, $model) {
                                                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', 'javascript:;', [
                                                        'title' => SliderModule::t('slider', 'Delete'),
                                                        'class' => 'btn btn-danger btn-xs btn-del',
                                                        'data-title' => SliderModule::t('slider', 'Delete?'),
                                                        'data-pjax' => 0,
                                                        'data-url' => $url,
                                                        'btn-success-class' => 'success-delete',
                                                        'btn-cancel-class' => 'cancel-delete',
                                                        'data-placement' => 'top'
                                                    ]);
                                                }
                                            ],
                                            'headerOptions' => [
                                                'width' => 150,
                                            ],
                                        ],
                                    ],
                                ]); ?>
                                                            </div>
                        </div>
                    </div>
                </div>
                <?php Pjax::end(); ?>
            </section>
        </div>
    </div>
</div>
<?php
$script = <<< JS
$('body').on('click', '.success-delete', function(e){
    e.preventDefault();
    var url = $(this).attr('href') || null;
    if(url !== null){
        $.post(url);
    }
    return false;
});
JS;
$this->registerJs($script, \yii\web\View::POS_END);