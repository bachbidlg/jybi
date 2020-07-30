<?php

use milkyway\news\NewsModule;
use milkyway\news\widgets\NavbarWidgets;
use yii\helpers\Html;
use yii\grid\GridView;
use backend\widgets\ToastrWidget;
use yii\widgets\Pjax;
use milkyway\language\models\table\LanguageTable;
use yii\helpers\Url;
use milkyway\news\models\table\NewsTable;
/* @var $this yii\web\View */
/* @var $searchModel milkyway\news\models\search\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = NewsModule::t('news', 'News');
$this->params['breadcrumbs'][] = $this->title;
$params = $this->params;
$list_language = LanguageTable::getAll();
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
           title="<?= NewsModule::t('news', 'Create'); ?>">
            <i class="fa fa-plus"></i> <?= NewsModule::t('news', 'Create'); ?></a>
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
                                        'firstPageLabel' => NewsModule::t('news', 'First'),
                                        'lastPageLabel' => NewsModule::t('news', 'Last'),
                                        'prevPageLabel' => NewsModule::t('news', 'Previous'),
                                        'nextPageLabel' => NewsModule::t('news', 'Next'),
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
                                        [
                                            'attribute' => 'name',
                                            'format' => 'raw',
                                            'value' => function ($model) use ($params, $list_language) {
                                                $language = $params['default_language'] ?: $list_language[array_keys($list_language)[0]]->id;
                                                return Html::a($model->newsLanguage[$language]->name, ['view', 'id' => $model->id], [
//                                                    'target' => '_blank',
                                                    'data-pjax' => 0
                                                ]);
                                            }
                                        ],
                                        [
                                            'attribute' => 'category',
                                            'format' => 'raw',
                                            'value' => function ($model) use ($params) {
                                                if ($model->categoryHasOne == null) return null;
                                                $language = $params['default_language'] ?: array_keys($model->categoryHasOne->newsCategoryLanguage)[0];
                                                return Html::a($model->categoryHasOne->newsCategoryLanguage[$language]->name, ['view', 'id' => $model->category], [
                                                    'target' => '_blank',
                                                    'data-pjax' => 0
                                                ]);
                                            }
                                        ],
                                        [
                                            'attribute' => 'image',
                                            'format' => 'raw',
                                            'value' => function ($model) {
                                                if ($model->image == null || !file_exists($model->pathImage . '/' . $model->image)) return null;
                                                return Html::img($model->urlImage . '/' . $model->image, [
                                                    'style' => 'max-width: 70px'
                                                ]);
                                            }
                                        ],
                                        [
                                            'attribute' => 'status',
                                            'format' => 'raw',
                                            'value' => function ($model) {
                                                return '<input type="checkbox" class="ipt-checkbox" ' . ($model->status ? 'checked' : '') . ' data-field="status" data-id="' . $model->id . '" data-url="' . Url::toRoute(['change-value']) . '" data-checked="' . NewsTable::STATUS_PUBLISHED . '" data-unchecked="' . NewsTable::STATUS_DISABLED . '">';
                                            }
                                        ],
                                        [
                                            'attribute' => 'hot',
                                            'format' => 'raw',
                                            'value' => function ($model) {
                                                return '<input type="checkbox" class="ipt-checkbox" ' . ($model->hot ? 'checked' : '') . ' data-field="hot" data-id="' . $model->id . '" data-url="' . Url::toRoute(['change-value']) . '" data-checked="' . NewsTable::STATUS_PUBLISHED . '" data-unchecked="' . NewsTable::STATUS_DISABLED . '">';
                                            }
                                        ],
                                        [
                                            'attribute' => 'created_by',
                                            'value' => 'userCreated.userProfile.fullname',
                                            'headerOptions' => [
                                                'width' => 150,
                                            ],
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
                                            'header' => NewsModule::t('news', 'Actions'),
                                            'template' => '{update} {delete}',
                                            'buttons' => [
                                                'update' => function ($url, $model) {
                                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                                        'title' => NewsModule::t('news', 'Update'),
                                                        'alia-label' => NewsModule::t('news', 'Update'),
                                                        'data-pjax' => 0,
                                                        'class' => 'btn btn-info btn-xs'
                                                    ]);
                                                },
                                                'delete' => function ($url, $model) {
                                                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', 'javascript:;', [
                                                        'title' => NewsModule::t('news', 'Delete'),
                                                        'class' => 'btn btn-danger btn-xs btn-del',
                                                        'data-title' => NewsModule::t('news', 'Delete?'),
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