<?php

use milkyway\language\widgets\NavbarWidgets;
use yii\helpers\Html;
use yii\helpers\Url;
use milkyway\language\LanguageModule;

/* @var $this yii\web\View */
/* @var $model milkyway\language\models\Language */

$this->title = LanguageModule::t('language', 'Update : {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => LanguageModule::t('language', 'Languages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = LanguageModule::t('language', 'Update');
?>
<div class="container-fluid px-xxl-25 px-xl-10">
    <?= NavbarWidgets::widget(); ?>

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span
                        class="ion ion-md-apps"></span></span><?= Html::encode($this->title) ?>
        </h4>
        <a class="btn btn-outline-light" href="<?= Url::to(['create']); ?>"
           title="<?= LanguageModule::t('language', 'Create'); ?>">
            <i class="fa fa-plus"></i> <?= LanguageModule::t('language', 'Create'); ?></a>
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
