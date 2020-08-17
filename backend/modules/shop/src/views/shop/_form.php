<?php

use modava\tiny\TinyMce;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use milkyway\shop\ShopModule;
use milkyway\language\models\table\LanguageTable;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model milkyway\shop\models\Shop */
/* @var $form yii\widgets\ActiveForm */

$list_language = LanguageTable::getAll();
$default_language = $this->params['default_language'];

if ($model->created != null && is_numeric($model->created)) $model->created = date('d-m-Y', $model->created);
if ($model->started != null && is_numeric($model->started)) $model->started = date('d-m-Y', $model->started);
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
    <div class="shop-form">
        <?php $form = ActiveForm::begin([
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
            'validationUrl' => Url::toRoute(['validate', 'id' => $model->primaryKey]),
            'options' => [
                'class' => 'form-language'
            ]
        ]); ?>
        <?php if (count($list_language) > 1) { ?>
        <ul class="nav nav-tabs" id="tab-language" role="tablist">
            <?php foreach ($list_language as $i => $language) { ?>
                <li class="nav-item" role="presentation">
                    <a class="nav-link<?= ($default_language !== null && $language->primaryKey === $default_language) || ($default_language === null && $i == 0) ? ' active' : '' ?>"
                       id="language-<?= $language->primaryKey ?>-tab" data-toggle="tab"
                       href="#language-<?= $language->primaryKey ?>"
                       role="tab"
                       aria-controls="language-<?= $language->primaryKey ?>"
                       aria-selected="true"><?= $language->name ?></a>
                </li>
            <?php } ?>
        </ul>
        <div class="tab-content" id="tab-language-content">
            <?php } ?>
            <?php
            foreach ($list_language as $i => $language) {
                if ($model->primaryKey === null) $model->shop_language[$language->primaryKey]['language_id'] = $language->primaryKey;
                ?>
                <div class="tab-pane fade<?= ($language->primaryKey === $default_language) || ($i == 0) ? ' default show active' : '' ?>"
                     id="language-<?= $language->primaryKey ?>" role="tabpanel"
                     aria-labelledby="language-<?= $language->primaryKey ?>-tab">
                    <?= $form->field($model, 'shop_language[' . $language->primaryKey . '][shop_id]')->hiddenInput()->label(false) ?>
                    <?= $form->field($model, 'shop_language[' . $language->primaryKey . '][language_id]')->hiddenInput()->label(false) ?>
                    <?= $form->field($model, 'shop_language[' . $language->primaryKey . '][slug]')->hiddenInput([
                        'class' => 'ipt-slug'
                    ])->label(false) ?>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <?= $form->field($model, 'shop_language[' . $language->primaryKey . '][name]')->textInput([
                                'maxlength' => true,
                                'class' => 'form-control ipt-name'
                            ])->label(ShopModule::t('shop', 'Name')) ?>
                        </div>
                        <div class="col-md-6 col-12">
                            <?= $form->field($model, 'shop_language[' . $language->primaryKey . '][slogan]')->textInput([
                                'maxlength' => true,
                                'class' => 'form-control'
                            ])->label(ShopModule::t('shop', 'Slogan')) ?>
                        </div>
                    </div>
                    <?= $form->field($model, 'shop_language[' . $language->primaryKey . '][description]')->textarea([
                        'maxlength' => true
                    ])->label(ShopModule::t('shop', 'Description')) ?>
                    <?= $form->field($model, 'shop_language[' . $language->primaryKey . '][address]')->textInput([
                        'maxlength' => true
                    ])->label(ShopModule::t('shop', 'Address')) ?>
                </div>
            <?php } ?>
            <?php if (count($list_language) > 1){ ?>
        </div>
    <?php } ?>
        <div class="row">
            <div class="col-md-6 col-12">
                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6 col-12">
                <?= $form->field($model, 'mst')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6 col-12">
                <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6 col-12">
                <?= $form->field($model, 'hotline')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6 col-12">
                <?= $form->field($model, 'created')->widget(DatePicker::class, [
                    'addon' => '<button type="button" class="btn btn-increment btn-light"><i class="ion ion-md-calendar"></i></button>',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'dd-mm-yyyy',
                        'todayHighlight' => true,
                        'endDate' => '+0d'
                    ]
                ]) ?>
            </div>
            <div class="col-md-6 col-12">
                <?= $form->field($model, 'started')->widget(DatePicker::class, [
                    'addon' => '<button type="button" class="btn btn-increment btn-light"><i class="ion ion-md-calendar"></i></button>',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'dd-mm-yyyy',
                        'todayHighlight' => true,
                        'endDate' => '+0d'
                    ]
                ]) ?>
            </div>
            <div class="col-12">
                <?= $form->field($model, 'video')->textInput() ?>
            </div>
            <div class="col-12">
                <?= TinyMce::widget([
                    'model' => $model,
                    'attribute' => 'map',
                    'type' => 'content',
                    'options' => [
                    ]
                ]) ?>
            </div>
        </div>

        <div class="preview">
            <?php
            $logo = null;
            if ($model->imageExist('logo', 'logo')) $logo = $model->getImage('logo', 'logo');
            if ($logo != null) echo Html::img($logo, [
                'style' => 'max-width: 120px'
            ]) ?>
        </div>
        <div class="text-danger font-italic"><?= $model->getAttributeLabel('iptLogo') ?> (1024x1024)</div>
        <?= $form->field($model, 'iptLogo')->fileInput([
            'onchange' => 'readImage(this, $(".preview"), 120)',
            'data-default' => $logo
        ]) ?>

        <div class="form-group">
            <?= Html::submitButton(ShopModule::t('shop', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
<?php
$script = <<< JS
var submit_form = false;
$('body').on('click', '#btn-submit-form', function(){
    submit_form = true;
});
JS;
$this->registerJs($script, \yii\web\View::POS_END);