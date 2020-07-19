<?php

use milkyway\freetype\widgets\NavbarWidgets;
use yii\helpers\Html;
use yii\helpers\Url;
use milkyway\freetype\FreetypeModule;

/* @var $this yii\web\View */
/* @var $model milkyway\freetype\models\Freetype */

$this->title = FreetypeModule::t('freetype', 'Update : {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => FreetypeModule::t('freetype', 'Freetypes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = FreetypeModule::t('freetype', 'Update');
?>
<div class="container-fluid px-xxl-25 px-xl-10">
    <?= NavbarWidgets::widget(); ?>

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span
                        class="ion ion-md-apps"></span></span><?= Html::encode($this->title) ?>
        </h4>
        <a class="btn btn-outline-light" href="<?= Url::to(['create']); ?>"
           title="<?= FreetypeModule::t('freetype', 'Create'); ?>">
            <i class="fa fa-plus"></i> <?= FreetypeModule::t('freetype', 'Create'); ?></a>
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
