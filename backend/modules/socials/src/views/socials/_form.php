<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use milkyway\socials\SocialsModule;
use milkyway\socials\models\Socials;

/* @var $this yii\web\View */
/* @var $model milkyway\socials\models\Socials */
/* @var $form yii\widgets\ActiveForm */
if ($model->type == Socials::TYPE_ICON) $model->iptIcon = $model->image;
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
    <div class="socials-form">
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-6 col-12">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6 col-12">
                <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6 col-12">
                <?= $form->field($model, 'sort')->input('number', []) ?>
            </div>
            <div class="col-md-6 col-12">
                <?= $form->field($model, 'type')->dropDownList(Socials::TYPE, [
                    'id' => 'selectType'
                ]) ?>
            </div>
            <div class="col-md-6 col-12 type-icon"
                 style="display: <?= $model->type == Socials::TYPE_ICON ? 'block' : 'none' ?>">
                <?= $form->field($model, 'iptIcon', [
                    'template' => '{label}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text load-modal" data-url="' . Url::toRoute(['/icons/load-icon']) . '">@</span>
                                            </div>
                                            {input}
                                        </div>
                                        {error}'
                ])->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-12"></div>
            <div class="col-md-6 col-12 type-image"
                 style="display: <?= $model->type == Socials::TYPE_ICON ? 'none' : 'block' ?>">
                <div class="preview">
                <?php
                $image = $model->getImage();
                if ($model->type == Socials::TYPE_IMAGE && $image != null) echo Html::img($image, [
                    'style' => 'max-width: 120px'
                ])
                ?>
                </div>
                <?= $form->field($model, 'iptImage')->fileInput([
                    'onchange' => 'readImage(this, $(".preview"), 120)',
                    'data-default' => $image
                ]) ?>
            </div>
        </div>
        <?php if (Yii::$app->controller->action->id == 'create') $model->status = 1; ?>
        <?= $form->field($model, 'status')->checkbox() ?>
        <div class="form-group">
            <?= Html::submitButton(SocialsModule::t('socials', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
<?php
$type_image = Socials::TYPE_IMAGE;
$script = <<< JS
$('#selectType').change(function(){
    var type = parseInt($(this).val() || $type_image);
    if(type == $type_image){
        $('.type-image').show();
        $('.type-icon').hide();
    } else {
        $('.type-icon').show();
        $('.type-image').hide();
    }
});
JS;
$this->registerJs($script, \yii\web\View::POS_END);