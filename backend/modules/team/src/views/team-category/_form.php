<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use milkyway\team\TeamModule;

/* @var $this yii\web\View */
/* @var $model milkyway\team\models\TeamCategory */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="team-category-form">
    <?php $form = ActiveForm::begin(); ?>
		<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'sort')->textInput() ?>

		<?php if (Yii::$app->controller->action->id == 'create') $model->status = 1; ?>
		<?= $form->field($model, 'status')->checkbox() ?>
        <div class="form-group">
            <?= Html::submitButton(TeamModule::t('team', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>
