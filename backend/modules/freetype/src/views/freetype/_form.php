<?php

use modava\tiny\TinyMce;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use milkyway\freetype\FreetypeModule;
use milkyway\language\models\table\LanguageTable;
use milkyway\freetype\models\table\FreetypeTable;

/* @var $this yii\web\View */
/* @var $model milkyway\freetype\models\Freetype */
/* @var $form yii\widgets\ActiveForm */

$list_language = LanguageTable::getAll();
$default_language = LanguageTable::getDefaultLanguage();
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="freetype-form">
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
                <a class="nav-link<?= ($default_language !== null && $language->primaryKey === $default_language->primaryKey) || ($default_language === null && $i == 0) ? ' active' : '' ?>"
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
            if ($model->primaryKey === null) $model->freetype_language[$language->primaryKey]['language_id'] = $language->primaryKey;
            ?>
            <div class="tab-pane fade<?= ($default_language !== null && $language->primaryKey === $default_language->primaryKey) || ($default_language === null && $i == 0) ? ' default show active' : '' ?>"
                 id="language-<?= $language->primaryKey ?>" role="tabpanel"
                 aria-labelledby="language-<?= $language->primaryKey ?>-tab">
                <?= $form->field($model, 'freetype_language[' . $language->primaryKey . '][freetype_id]')->hiddenInput()->label(false) ?>
                <?= $form->field($model, 'freetype_language[' . $language->primaryKey . '][language_id]')->hiddenInput()->label(false) ?>
                <?= $form->field($model, 'freetype_language[' . $language->primaryKey . '][name]')->textInput([
                    'maxlength' => true,
                    'class' => 'form-control ipt-name'
                ])->label(FreetypeModule::t('freetype', 'Name')) ?>
                <?= TinyMce::widget([
                    'model' => $model,
                    'attribute' => 'freetype_language[' . $language->primaryKey . '][content]',
                    'type' => 'content',
                    'options' => []
                ]) ?>
            </div>
        <?php } ?>
        <?php if (count($list_language) > 1){ ?>
    </div>
<?php } ?>

    <div class="row">
        <div class="col-md-6 col-12">
            <?= $form->field($model, 'type')->dropDownList(FreetypeTable::TYPE, []) ?>
        </div>
        <div class="col-md-6 col-12">
            <?= $form->field($model, 'sort')->textInput() ?>
        </div>
    </div>

    <div class="preview">
        <?php
        $image = null;
        if ($model->image != null && file_exists($model->pathImage . '/' . $model->image)) $image = $model->urlImage . '/' . $model->image;
        if ($image != null) echo Html::img($image, [
            'style' => 'max-width: 120px'
        ]) ?>
    </div>
    <?= $form->field($model, 'iptImage')->fileInput([
        'onchange' => 'readImage(this, $(".preview"), 120)',
        'data-default' => $image
    ]) ?>

    <?php if (Yii::$app->controller->action->id == 'create') $model->status = 1; ?>
    <?= $form->field($model, 'status')->checkbox() ?>
    <div class="form-group">
        <?= Html::submitButton(FreetypeModule::t('freetype', 'Save'), [
            'class' => 'btn btn-success',
            'id' => 'btn-submit-form'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>