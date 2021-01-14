<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\widgets\ToastrWidget;
use milkyway\manual\widgets\NavbarWidgets;
use milkyway\manual\ManualModule;

/* @var $this yii\web\View */
/* @var $model milkyway\manual\models\UserManual */

$this->title = $model->title;
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
        <p>
            <a class="btn btn-outline-light" href="<?= Url::to(['create']); ?>"
                title="<?= ManualModule::t('manual', 'Create'); ?>">
                <i class="fa fa-plus"></i> <?= ManualModule::t('manual', 'Create'); ?></a>
            <?= Html::a(ManualModule::t('manual', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(ManualModule::t('manual', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => ManualModule::t('manual', 'Are you sure you want to delete this item?'),
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
						'title',
                        [
                            'attribute' => 'for_permission',
                            'value' => function ($model) {
                                return $model->forPermission->title;
                            }
                        ],
						'description',
						'content:ntext',
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                return Yii::$app->getModule('manual')->params['status'][$model->status];
                            }
                        ],
						'sort',
						'created_at:datetime',
						'updated_at:datetime',
                        [
                            'attribute' => 'userCreated.userProfile.fullname',
                            'label' => ManualModule::t('manual', 'Created By')
                        ],
                        [
                            'attribute' => 'userUpdated.userProfile.fullname',
                            'label' => ManualModule::t('manual', 'Updated By')
                        ],
                    ],
                ]) ?>
            </section>
        </div>
    </div>
</div>
