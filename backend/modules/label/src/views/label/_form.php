<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use milkyway\label\LabelModule;

/* @var $this yii\web\View */
/* @var $model milkyway\label\models\Label */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="label-form">
    <?php $form = ActiveForm::begin(); ?>
		<?= $form->field($model, 'label')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'language_id')->textInput() ?>

		<?= $form->field($model, 'text')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton(LabelModule::t('label', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>
