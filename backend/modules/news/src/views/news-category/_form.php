<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use milkyway\news\NewsModule;
use milkyway\language\models\table\LanguageTable;

/* @var $this yii\web\View */
/* @var $model milkyway\news\models\NewsCategory */
/* @var $form yii\widgets\ActiveForm */

$list_language = LanguageTable::getAll();
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
    <ul class="nav nav-tabs" id="tab-language" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="language-1-tab" data-toggle="tab" href="#language-1" role="tab"
               aria-controls="language-1"
               aria-selected="true">Tiếng Việt</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="language-2-tab" data-toggle="tab" href="#language-2" role="tab"
               aria-controls="language-2"
               aria-selected="false">English</a>
        </li>
    </ul>
    <div class="tab-content" id="tab-language-content">
        <div class="tab-pane fade show active" id="language-1" role="tabpanel" aria-labelledby="language-1-tab">...
        </div>
        <div class="tab-pane fade" id="language-2" role="tabpanel" aria-labelledby="language-2-tab">...</div>
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
