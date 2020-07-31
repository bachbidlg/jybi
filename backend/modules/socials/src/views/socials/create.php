<?php

use milkyway\socials\widgets\NavbarWidgets;
use yii\helpers\Html;
use milkyway\socials\SocialsModule;


/* @var $this yii\web\View */
/* @var $model milkyway\socials\models\Socials */

$this->title = SocialsModule::t('socials', 'Create');
$this->params['breadcrumbs'][] = ['label' => SocialsModule::t('socials', 'Socials'), 'url' => ['index']];
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
