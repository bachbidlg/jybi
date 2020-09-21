<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use milkyway\team\TeamModule;
use milkyway\team\models\table\TeamCategoryTable;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model milkyway\team\models\Team */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="team-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category')->dropDownList(ArrayHelper::map(TeamCategoryTable::getAll(true, false), 'id', 'name'), []) ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <div class="preview mt-3">
        <?php
        $image = $model->getImage();
        if ($image != null) echo Html::img($image, [
            'style' => 'max-width: 120px'
        ]) ?>
    </div>
    <div class="text-danger font-italic"><?= $model->getAttributeLabel('iptImage') ?> (420x420px)</div>
    <?= $form->field($model, 'iptImage')->fileInput([
        'onchange' => 'readImage(this, $(".preview"), 120)',
        'data-default' => $image
    ]) ?>

    <?php if (Yii::$app->controller->action->id == 'create') $model->status = 1; ?>
    <?= $form->field($model, 'status')->checkbox() ?>
    <div class="form-group">
        <?= Html::submitButton(TeamModule::t('team', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
