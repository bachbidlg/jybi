<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\widgets\ToastrWidget;
use milkyway\shop\widgets\NavbarWidgets;
use milkyway\shop\ShopModule;

/* @var $this yii\web\View */
/* @var $model milkyway\shop\models\Shop */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => ShopModule::t('shop', 'Shops'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$default_language = $this->params['default_language'];
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
            <a class="btn btn-outline-light" href="<?= Url::to(['create']); ?>"
               title="<?= ShopModule::t('shop', 'Create'); ?>">
                <i class="fa fa-plus"></i> <?= ShopModule::t('shop', 'Create'); ?></a>
            <?= Html::a(ShopModule::t('shop', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(ShopModule::t('shop', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => ShopModule::t('shop', 'Are you sure you want to delete this item?'),
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
                        [
                            'attribute' => 'metadata',
                            'format' => 'raw',
                            'value' => function ($model) use ($default_language) {
                                return Html::a($model->shopLanguage[$default_language]->getMetadata('name'), ['view', 'id' => $model->id], [
                                    'target' => '_blank',
                                    'data-pjax' => 0
                                ]);
                            },
                            'label' => ShopModule::t('shop', 'Name')
                        ],
                        [
                            'attribute' => 'iptLogo',
                            'format' => 'raw',
                            'value' => function ($model) {
                                if ($model->imageExist('logo', 'logo')) return Html::img($model->getImage('logo', 'logo'), [
                                    'style' => 'max-width: 170px'
                                ]);
                            }
                        ],
                        'email:email',
                        'phone',
                        'hotline',
                        'mst',
                        'created:datetime',
                        'started:datetime',
                        [
                            'attribute' => 'userCreated.userProfile.fullname',
                            'label' => ShopModule::t('shop', 'Created By')
                        ],
                        [
                            'attribute' => 'userUpdated.userProfile.fullname',
                            'label' => ShopModule::t('shop', 'Updated By')
                        ],
                    ],
                ]) ?>
            </section>
        </div>
    </div>
</div>
