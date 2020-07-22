<?php

use milkyway\shop\widgets\NavbarWidgets;
use yii\helpers\Html;
use milkyway\shop\ShopModule;


/* @var $this yii\web\View */
/* @var $model milkyway\shop\models\Shop */

$this->title = ShopModule::t('shop', 'Create');
$this->params['breadcrumbs'][] = ['label' => ShopModule::t('shop', 'Shops'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid px-xxl-25 px-xl-10">
    <?= NavbarWidgets::widget(); ?>

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span
                        class="ion ion-md-apps"></span></span><?= Html::encode($this->title) ?>
        </h4>
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
