<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use milkyway\language\LanguageModule;
use milkyway\language\models\table\LanguageTable;

/* @var $this yii\web\View */
/* @var $model milkyway\language\models\Language */
/* @var $form yii\widgets\ActiveForm */
$default_language = LanguageTable::getDefaultLanguage();
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="language-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6 col-12">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6 col-12">
            <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6 col-12">
            <?= $form->field($model, 'sort')->input('number', [
                'step' => 1,
                'min' => 0
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="preview">
                <?php
                if ($model->image !== null && file_exists($model->pathImage . '/' . $model->image)) {
                    echo Html::img($model->urlImage . '/' . $model->image, [
                        'style' => 'max-width: 50px'
                    ]);
                }
                ?>
            </div>
            <?= $form->field($model, 'iptImage')->fileInput([
                'class' => 'ipt-upload',
                'onchange' => 'readImage(this, $(".preview"))'
            ]) ?>
        </div>
        <div class="col-md-6 col-12">
            <?php if (Yii::$app->controller->action->id == 'create') $model->status = 1; ?>
            <?= $form->field($model, 'status')->checkbox() ?>
            <?php if ($default_language == null || $default_language->primaryKey === $model->primaryKey) { ?>
                <?= $form->field($model, 'is_default')->checkbox() ?>
            <?php } ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton(LanguageModule::t('language', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
