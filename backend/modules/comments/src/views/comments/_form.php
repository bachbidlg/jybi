<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use milkyway\comments\CommentsModule;

/* @var $this yii\web\View */
/* @var $model milkyway\comments\models\Comments */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="comments-form">
    <?php $form = ActiveForm::begin(); ?>
		<?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

		<?= $form->field($model, 'comment_table')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'comment_id')->textInput() ?>

		<?= $form->field($model, 'status')->textInput() ?>

		<?= $form->field($model, 'created_at')->textInput() ?>

		<?= $form->field($model, 'created_by')->textInput() ?>

		<?= $form->field($model, 'updated_at')->textInput() ?>

		<?= $form->field($model, 'updated_by')->textInput() ?>

		<?= $form->field($model, 'metadata')->textInput() ?>

		<?php if (Yii::$app->controller->action->id == 'create') $model->status = 1; ?>
		<?= $form->field($model, 'status')->checkbox() ?>
        <div class="form-group">
            <?= Html::submitButton(CommentsModule::t('comments', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>
