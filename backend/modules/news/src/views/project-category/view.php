<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\widgets\ToastrWidget;
use milkyway\news\widgets\NavbarWidgets;
use milkyway\news\NewsModule;
use milkyway\language\models\table\LanguageTable;

/* @var $this yii\web\View */
/* @var $model milkyway\news\models\NewsCategory */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => NewsModule::t('news', 'Projects Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$params = $this->params;
$default_language = $params['default_language'];
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
               title="<?= NewsModule::t('news', 'Create'); ?>">
                <i class="fa fa-plus"></i> <?= NewsModule::t('news', 'Create'); ?></a>
            <?= Html::a(NewsModule::t('news', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(NewsModule::t('news', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => NewsModule::t('news', 'Are you sure you want to delete this item?'),
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
                            'attribute' => 'id',
                            'label' => NewsModule::t('news', 'Name'),
                            'value' => function ($model) use ($default_language) {
                                $language = $default_language->id;
                                if (count($model->newsCategoryLanguage) <= 0) return null;
                                if (!array_key_exists($language, $model->newsCategoryLanguage)) $language = array_keys($model->newsCategoryLanguage)[0];
                                return $model->newsCategoryLanguage[$language]->name;
                            }
                        ],
                        'slug',
                        [
                            'attribute' => 'category',
                            'format' => 'raw',
                            'value' => function ($model) use ($params, $default_language) {
                                if ($model->categoryHasOne == null) return null;
                                $language = $default_language ?: array_keys($model->categoryHasOne->newsCategoryLanguage)[0];
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
                            'value' => function ($model) {
                                return Yii::$app->getModule('news')->params['status'][$model->status];
                            }
                        ],
                        'sort',
                        'created_at:datetime',
                        'updated_at:datetime',
                        'alias',
                        [
                            'attribute' => 'userCreated.userProfile.fullname',
                            'label' => NewsModule::t('news', 'Created By')
                        ],
                        [
                            'attribute' => 'userUpdated.userProfile.fullname',
                            'label' => NewsModule::t('news', 'Updated By')
                        ],
                    ],
                ]) ?>
            </section>
        </div>
    </div>
</div>
