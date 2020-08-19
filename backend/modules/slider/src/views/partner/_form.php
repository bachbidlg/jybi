<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use milkyway\slider\SliderModule;
use milkyway\slider\models\table\SliderTable;

/* @var $this yii\web\View */
/* @var $model milkyway\slider\models\Slider */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="slider-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6 col-12">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6 col-12">
            <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6 col-12">
            <?= $form->field($model, 'sort')->textInput() ?>
        </div>
    </div>

    <div class="preview">
        <?php if ($model->image != null && file_exists($model->pathImage . '/' . $model->image)) echo Html::img($model->urlImage . '/' . $model->image, [
            'style' => 'max-width: 120px'
        ]) ?>
    </div>
    <div class="text-danger font-italic"><?= $model->getAttributeLabel('iptImage') ?> (170x100px)</div>
    <?= $form->field($model, 'iptImage')->fileInput([
        'onchange' => "readImage(this, $('.preview'), 120)"
    ]) ?>

    <?php if (Yii::$app->controller->action->id == 'create') $model->status = 1; ?>
    <?= $form->field($model, 'status')->checkbox() ?>
    <div class="form-group">
        <?= Html::submitButton(SliderModule::t('slider', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
