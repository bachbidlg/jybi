<?php

use milkyway\news\widgets\NavbarWidgets;
use yii\helpers\Html;
use yii\helpers\Url;
use milkyway\news\NewsModule;

/* @var $this yii\web\View */
/* @var $model milkyway\news\models\News */

$this->title = NewsModule::t('news', 'Update : {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => NewsModule::t('news', 'News'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = NewsModule::t('news', 'Update');
?>
<div class="container-fluid px-xxl-25 px-xl-10">
    <?= NavbarWidgets::widget(); ?>

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span
                        class="ion ion-md-apps"></span></span><?= Html::encode($this->title) ?>
        </h4>
        <a class="btn btn-sm btn-primary" href="<?= Url::to(['create']); ?>"
           title="<?= NewsModule::t('news', 'Create'); ?>">
            <i class="fa fa-plus"></i> <?= NewsModule::t('news', 'Create'); ?></a>
    </div>
    <!-- /Title -->

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>

            </section>
        </div>
    </div>
</div>
