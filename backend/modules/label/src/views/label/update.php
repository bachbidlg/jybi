<?php

use milkyway\label\widgets\NavbarWidgets;
use yii\helpers\Html;
use yii\helpers\Url;
use milkyway\label\LabelModule;

/* @var $this yii\web\View */
/* @var $model milkyway\label\models\Label */

$this->title = LabelModule::t('label', 'Update : {name}', [
    'name' => $model->label,
]);
$this->params['breadcrumbs'][] = ['label' => LabelModule::t('label', 'Labels'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->label, 'url' => ['view', 'label' => $model->label, 'language_id' => $model->language_id]];
$this->params['breadcrumbs'][] = LabelModule::t('label', 'Update');
?>
<div class="container-fluid px-xxl-25 px-xl-10">
    <?= NavbarWidgets::widget(); ?>

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span
                        class="ion ion-md-apps"></span></span><?= Html::encode($this->title) ?>
        </h4>
        <a class="btn btn-outline-light" href="<?= Url::to(['create']); ?>"
           title="<?= LabelModule::t('label', 'Create'); ?>">
            <i class="fa fa-plus"></i> <?= LabelModule::t('label', 'Create'); ?></a>
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
