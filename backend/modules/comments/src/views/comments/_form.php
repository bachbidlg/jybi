<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use milkyway\comments\CommentsModule;

/* @var $this yii\web\View */
/* @var $model milkyway\comments\models\Comments */
/* @var $form yii\widgets\ActiveForm */
$metadataPath = null;
if ($model->commentsMetadata != null) $metadataPath = $model->commentsMetadata->getPath();
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="comments-form">
    <?php $form = ActiveForm::begin([
        'id' => 'form-comment-all',
        'enableAjaxValidation' => true,
        'validationUrl' => Url::toRoute(['validate-comment', 'id' => $model->primaryKey])
    ]); ?>
    <pre>
    <?php
    /*if ($model->commentsMetadata != null) {
        $attributes = $model->commentsMetadata->getAttributes();
        var_dump($attributes);
        foreach ($attributes as $key => $attribute) {
            if (array_key_exists($key, $metadataPath) || array_filter($metadataPath, function () {
                })) {
            }
        }
    }*/ ?>
    </pre>
    <?= $form->field($model, 'metadata[name]')->textInput()->label(CommentsModule::t('comments', 'Name')) ?>

    <?= $form->field($model, 'metadata[address]')->textInput()->label(CommentsModule::t('comments', 'Address')) ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <div class="row">
        <?php
        if (is_array($metadataPath)) {
            foreach ($metadataPath as $key => $path) {
                $ipt = Yii::$app->params['module-comments']['metadataMappingImage'][$key]['ipt'];
                ?>
                <div class="col-md-6 col-12">
                    <div class="preview-<?= $key ?> mt-3">
                        <?php
                        $image = null;
                        if ($model->dataMetadataByKey($key) != null &&
                            !is_dir($model->commentsMetadata->getPath($key) . '/' . $model->dataMetadataByKey($key)) &&
                            file_exists($model->commentsMetadata->getPath($key) . '/' . $model->dataMetadataByKey($key))) {
                            $image = $model->commentsMetadata->getImage($key);
                        }
                        if ($image != null) echo Html::img($image, [
                            'style' => 'max-width: 120px'
                        ]) ?>
                    </div>
                    <div class="text-danger font-italic"><?= $model->getAttributeLabel($ipt) ?>
                        (<?= Yii::$app->params['module-comments']['metadataMappingImage'][$key]['size'] ?>)
                    </div>
                    <?= $form->field($model, 'metadata[' . $ipt . ']')->fileInput([
                        'onchange' => 'readImage(this, $(".preview-' . $key . '"), 120)',
                        'data-default' => $image
                    ])->label($model->commentsMetadata->getAttributeLabel($ipt)) ?>
                </div>
            <?php }
        } ?>
    </div>

    <?php if (Yii::$app->controller->action->id == 'create') $model->status = 1; ?>
    <?= $form->field($model, 'status')->checkbox() ?>
    <div class="form-group">
        <?= Html::submitButton(CommentsModule::t('comments', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
