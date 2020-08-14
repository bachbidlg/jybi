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
    <?php $form = ActiveForm::begin([
        'id' => 'form-comment-all',
        'enableAjaxValidation' => true,
        'validationUrl' => Url::toRoute(['validate-comment', 'id' => $model->primaryKey])
    ]); ?>
    <?= $form->field($model, 'metadata[name]')->textInput()->label(CommentsModule::t('comments', 'Name')) ?>

    <?= $form->field($model, 'metadata[address]')->textInput()->label(CommentsModule::t('comments', 'Address')) ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <?php if (Yii::$app->controller->action->id == 'create') $model->status = 1; ?>
    <?= $form->field($model, 'status')->checkbox() ?>
    <div class="form-group">
        <?= Html::submitButton(CommentsModule::t('comments', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
