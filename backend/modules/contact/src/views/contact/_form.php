<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use milkyway\contact\ContactModule;

/* @var $this yii\web\View */
/* @var $model milkyway\contact\models\Contact */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="contact-form">
    <?php $form = ActiveForm::begin(); ?>
		<?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

		<?= $form->field($model, 'created_at')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton(ContactModule::t('contact', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>
