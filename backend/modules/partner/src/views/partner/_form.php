<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use milkyway\partner\PartnerModule;

/* @var $this yii\web\View */
/* @var $model milkyway\partner\models\Partner */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="partner-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <div class="preview">
        <?php if ($model->image != null && file_exists($model->urlImage . '/' . $model->image)) echo Html::img($model->urlImage . '/' . $model->image, [
            'style' => 'max-width="150px"'
        ]) ?>
    </div>
    <?= $form->field($model, 'iptImage')->fileInput([
        'maxlength' => true,
        'onchange' => 'readImage(this, $(".preview"), 150)'
    ]) ?>

    <?php if (Yii::$app->controller->action->id == 'create') $model->status = 1; ?>
    <?= $form->field($model, 'status')->checkbox() ?>
    <div class="form-group">
        <?= Html::submitButton(PartnerModule::t('partner', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
