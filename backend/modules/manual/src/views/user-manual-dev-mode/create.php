<?php

use milkyway\manual\widgets\NavbarWidgets;
use yii\helpers\Html;
use milkyway\manual\ManualModule;


/* @var $this yii\web\View */
/* @var $model milkyway\manual\models\UserManual */

$this->title = ManualModule::t('manual', 'Create');
$this->params['breadcrumbs'][] = ['label' => ManualModule::t('manual', 'User Manuals'), 'url' => ['index']];
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
