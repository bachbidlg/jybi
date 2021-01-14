<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use milkyway\manual\ManualModule;
use milkyway\manual\models\PermissionManual;

/* @var $this yii\web\View */
/* @var $model milkyway\manual\models\UserManual */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="user-manual-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'for_permission')->dropDownList(PermissionManual::getMenuDropdown(), [
                'prompt' => $model->getAttributeLabel('for_permission')
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'sort')->textInput() ?>
        </div>
        <div class="col-md-6"></div>
    </div>
    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea([
        'rows' => 6,
        'class' => $model->formName() . '-content content form-control'
    ]) ?>

    <?php if (Yii::$app->controller->action->id == 'create') $model->status = 1; ?>
    <?= $form->field($model, 'status')->checkbox() ?>
    <div class="form-group">
        <?= Html::submitButton(ManualModule::t('manual', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
