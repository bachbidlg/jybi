<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/10/2020
 * Time: 14:28
 */
?>
<?php
$form = \yii\bootstrap\ActiveForm::begin([
    'id' => 'form-contact',
    'enableAjaxValidation' => true,
    'validationUrl' => \yii\helpers\Url::toRoute(['validation-form']),
    'action' => \yii\helpers\Url::toRoute(['/contact/index']),
    'options' => [
        'class' => 'contact-form',
    ],
])
?>
<?= $form->field($model, 'full_name', [
    'template' => '
                        <div class="row">
                            <div class="col-lg-3">{label}</div>
                            <div class="col-lg-9">
                                {input}{error}
                            </div>
                        </div>'
])->textInput([])->label($model->getAttributeLabel('full_name') . '<span> (*): </span>') ?>

<?= $form->field($model, 'email', [
    'template' => '
                        <div class="row">
                            <div class="col-lg-3">{label}</div>
                            <div class="col-lg-9">
                                {input}{error}
                            </div>
                        </div>'
])->textInput([])->label($model->getAttributeLabel('email') . '<span> : </span>') ?>

<?= $form->field($model, 'phone', [
    'template' => '
                        <div class="row">
                            <div class="col-lg-3">{label}</div>
                            <div class="col-lg-9">
                                {input}{error}
                            </div>
                        </div>'
])->textInput([])->label($model->getAttributeLabel('phone') . '<span> (*): </span>') ?>

<?= $form->field($model, 'subject', [
    'template' => '
                        <div class="row">
                            <div class="col-lg-3">{label}</div>
                            <div class="col-lg-9">
                                {input}{error}
                            </div>
                        </div>'
])->textInput([])->label($model->getAttributeLabel('subject') . '<span> : </span>') ?>

<?= $form->field($model, 'message', [
    'template' => '
                        <div class="row">
                            <div class="col-lg-3">{label}</div>
                            <div class="col-lg-9">
                                {input}{error}
                            </div>
                        </div>'
])->textarea(['rows' => 5])->label($model->getAttributeLabel('message') . '<span> : </span>') ?>

<?= \yii\helpers\Html::submitButton(
    '<i class="fa fa-paper-plane"></i> Gửi',
    ['class' => 'btn btn-secondary float-right']
) ?>
<?php \yii\bootstrap\ActiveForm::end() ?>

<?php
\frontend\assets\ContactAssets::register($this);
?>
