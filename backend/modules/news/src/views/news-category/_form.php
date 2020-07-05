<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use milkyway\news\NewsModule;

/* @var $this yii\web\View */
/* @var $model milkyway\news\models\NewsCategory */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="news-category-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6 col-12">
            <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6 col-12">
            <?= $form->field($model, 'category')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-12">
            <?= $form->field($model, 'sort')->textInput() ?>
        </div>
    </div>

    <div class="preview"></div>
    <?= $form->field($model, 'image')->fileInput([
        'onchange' => 'readImage(this, $(".preview"))'
    ]) ?>

    <?php if (Yii::$app->controller->action->id == 'create') $model->status = 1; ?>
    <?= $form->field($model, 'status')->checkbox() ?>
    <div class="form-group">
        <?= Html::submitButton(NewsModule::t('news', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
