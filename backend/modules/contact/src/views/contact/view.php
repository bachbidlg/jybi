<?php

use backend\widgets\ToastrWidget;
use milkyway\contact\ContactModule;
use milkyway\contact\widgets\NavbarWidgets;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model milkyway\contact\models\Contact */

$this->title = $model->full_name;
$this->params['breadcrumbs'][] = ['label' => ContactModule::t('contact', 'Contacts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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

            <?= Html::a(ContactModule::t('contact', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-sm btn-danger',
                'data' => [
                    'confirm' => ContactModule::t('contact', 'Are you sure you want to delete this item?'),
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
                        'full_name',
                        'phone',
                        'email:email',
                        'subject',
                        'message:ntext',
                        'created_at',
                    ],
                ]) ?>
            </section>
        </div>
    </div>
</div>
