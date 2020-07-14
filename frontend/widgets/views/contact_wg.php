<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/8/2020
 * Time: 13:58
 */
?>
<div class="widget form-contact">
    <div class="sidebar-title">
        <h4><?= Yii::t('frontend', 'Yêu cầu gọi lại') ?></h4>
        <div class="separator"></div>
    </div>
    <div class="sidebar-content">
        <?php
        $form = \yii\bootstrap\ActiveForm::begin([
            'id' => 'form-contact',
            'enableAjaxValidation' => true,
            'validationUrl' => \yii\helpers\Url::toRoute(['/contact/validation-form']),
            'action' => \yii\helpers\Url::toRoute(['/contact/index']),
            'options' => [
                'class' => 'contact-form',
            ],
        ]);
        ?>
        <form action="#">
            <div class="form-title">Báo giá sau 10 phút</div>
            <?= $form->field($model, 'full_name', [
                'template' => '{input}{error}'
            ])->textInput([
                'class' => 'form-control',
                'placeholder' => 'Họ và tên'
            ])->label(false) ?>

            <?= $form->field($model, 'phone', [
                'template' => '{input}{error}'
            ])->textInput([
                'class' => 'form-control',
                'placeholder' => 'Số điện thoại'
            ])->label(false) ?>

            <?= $form->field($model, 'message', [
                'template' => '{input}{error}'
            ])->textarea([
                'rows' => 5,
                'placeholder' => 'Yêu cầu nhận tư vấn'
            ])->label(false) ?>

            <div class="form-group text-center">
                <?= \yii\helpers\Html::submitButton(
                    'Gửi yêu cầu',
                    ['class' => 'btn btn-contact-wg']
                ) ?>
            </div>
        </form>
        <?php \yii\bootstrap\ActiveForm::end() ?>
    </div>
</div>

<?php
\frontend\assets\ContactAssets::register($this);
?>
