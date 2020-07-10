<?php

use milkyway\partner\widgets\NavbarWidgets;
use yii\helpers\Html;
use yii\helpers\Url;
use milkyway\partner\PartnerModule;

/* @var $this yii\web\View */
/* @var $model milkyway\partner\models\Partner */

$this->title = PartnerModule::t('partner', 'Update : {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => PartnerModule::t('partner', 'Partners'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = PartnerModule::t('partner', 'Update');
?>
<div class="container-fluid px-xxl-25 px-xl-10">
    <?= NavbarWidgets::widget(); ?>

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span
                        class="ion ion-md-apps"></span></span><?= Html::encode($this->title) ?>
        </h4>
        <a class="btn btn-outline-light" href="<?= Url::to(['create']); ?>"
           title="<?= PartnerModule::t('partner', 'Create'); ?>">
            <i class="fa fa-plus"></i> <?= PartnerModule::t('partner', 'Create'); ?></a>
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
