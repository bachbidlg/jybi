<?php

use common\widgets\Select2;
use yii\helpers\ArrayHelper;
use modava\tiny\TinyMce;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use milkyway\news\NewsModule;
use milkyway\news\models\table\NewsTable;
use milkyway\news\models\table\NewsCategoryTable;
use milkyway\language\models\table\LanguageTable;

/* @var $this yii\web\View */
/* @var $model milkyway\news\models\News */
/* @var $form yii\widgets\ActiveForm */

$list_language = LanguageTable::getAll();
$default_language = $this->params['default_language'];
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
    <div class="news-form">
        <?php $form = ActiveForm::begin([
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
            'validationUrl' => Url::toRoute(['validate', 'id' => $model->primaryKey]),
            'options' => [
                'class' => 'form-language'
            ]
        ]); ?>
        <div class="row">
            <div class="col-md-6 col-12">
                <?= Select2::widget([
                    'model' => $model,
                    'attribute' => 'category',
                    'data' => ArrayHelper::map(NewsCategoryTable::getMenu(NewsCategoryTable::TYPE_PROJECT, null, null), 'id', 'name'),
                    'options' => [
                        'prompt' => $model->getAttributeLabel('category')
                    ]
                ]) ?>
            </div>
            <div class="col-md-6 col-12">
                <?= $form->field($model, 'sort')->textInput() ?>
            </div>
            <div class="col-md-6 col-12">
                <?= $form->field($model, 'slug')->hiddenInput([
                    'id' => 'slug'
                ])->label(false) ?>
            </div>
        </div>
        <?php if (count($list_language) > 1) { ?>
        <ul class="nav nav-tabs" id="tab-language" role="tablist">
            <?php foreach ($list_language as $i => $language) { ?>
                <li class="nav-item" role="presentation">
                    <a class="nav-link<?= ($default_language !== null && $language->primaryKey === $default_language) || ($default_language === null && $i == 0) ? ' active' : '' ?>"
                       id="language-<?= $language->primaryKey ?>-tab" data-toggle="tab"
                       href="#language-<?= $language->primaryKey ?>"
                       role="tab"
                       aria-controls="language-<?= $language->primaryKey ?>"
                       aria-selected="true"><?= $language->name ?></a>
                </li>
            <?php } ?>
        </ul>
        <div class="tab-content" id="tab-language-content">
            <?php } ?>
            <?php
            foreach ($list_language as $i => $language) {
                if ($model->primaryKey === null) $model->news_language[$language->primaryKey]['language_id'] = $language->primaryKey;
                ?>
                <div class="tab-pane fade<?= ($default_language !== null && $language->primaryKey === $default_language) || ($default_language === null && $i == 0) ? ' default show active' : '' ?>"
                     id="language-<?= $language->primaryKey ?>" role="tabpanel"
                     aria-labelledby="language-<?= $language->primaryKey ?>-tab">
                    <?= $form->field($model, 'news_language[' . $language->primaryKey . '][news_id]')->hiddenInput()->label(false) ?>
                    <?= $form->field($model, 'news_language[' . $language->primaryKey . '][language_id]')->hiddenInput()->label(false) ?>
                    <?= $form->field($model, 'news_language[' . $language->primaryKey . '][slug]')->hiddenInput([
                        'class' => 'ipt-slug'
                    ])->label(false) ?>
                    <?= $form->field($model, 'news_language[' . $language->primaryKey . '][name]')->textInput([
                        'maxlength' => true,
                        'class' => 'form-control ipt-name'
                    ])->label(NewsModule::t('news', 'Name')) ?>
                    <?= $form->field($model, 'news_language[' . $language->primaryKey . '][description]')->textarea(['maxlength' => true])->label(NewsModule::t('news', 'Description')) ?>
                    <?= TinyMce::widget([
                        'model' => $model,
                        'attribute' => 'news_language[' . $language->primaryKey . '][content]',
                        'options' => []
                    ]) ?>
                </div>
            <?php } ?>
            <?php if (count($list_language) > 1){ ?>
        </div>
    <?php } ?>

        <div class="preview">
            <?php
            $image = null;
            if ($model->image != null && file_exists($model->pathImage . '/' . $model->image)) $image = $model->getImage();
            if ($image != null) echo Html::img($image, [
                'style' => 'max-width: 120px'
            ]) ?>
        </div>
        <div class="text-danger font-italic"><?= $model->getAttributeLabel('iptImage') ?> (770x450)</div>
        <?= $form->field($model, 'iptImage')->fileInput([
            'onchange' => 'readImage(this, $(".preview"), 120)',
            'data-default' => $image
        ]) ?>

        <?php $default_image = Yii::$app->assetManager->publish('@backend/web/dist/img/img-thumb.jpg')[1]; ?>
        <div class="row images-content">
            <div class="image-content col-sm-6 col-md-3 col-lg-2 mt-15" data-image="1">
                <label class="label-preview" for="ipt-image-1">
                    <span class="btn btn-xs btn-danger btn-delete"><i class="fa fa-trash"></i></span>
                    <img src="<?= $default_image ?>" class="img-fluid img-thumbnail" alt="img">
                </label>
                <?= $form->field($model, 'news_images[1][news_id]')->hiddenInput()->label(false) ?>
                <?= $form->field($model, 'news_images[1][iptImage]')->fileInput([
                    'id' => 'ipt-image-1',
                    'class' => 'd-none ipt-image',
                    'onchange' => 'readImage(this, $(this).closest(".image-content").children(".label-preview"), null)',
                    'data-default' => $default_image
                ])->label(false) ?>
            </div>
        </div>
        <div class="d-none">
            <div class="image-content-temp">
                <div class="image-content col-sm-6 col-md-3 col-lg-2 mt-15" data-image="0">
                    <label class="label-preview" for="ipt-image-0">
                        <span class="btn btn-xs btn-danger btn-delete"><i class="fa fa-trash"></i></span>
                        <img src="<?= $default_image ?>" class="img-fluid img-thumbnail" alt="img">
                    </label>
                    <?= $form->field($model, 'news_images[0][news_id]')->hiddenInput()->label(false) ?>
                    <?= $form->field($model, 'news_images[0][iptImage]')->fileInput([
                        'id' => 'ipt-image-0',
                        'class' => 'd-none ipt-image',
                        'onchange' => 'readImage(this, $(this).closest(".image-content").children(".label-preview"), null)',
                        'data-default' => $default_image
                    ])->label(false) ?>
                </div>
            </div>
        </div>

        <?php if (Yii::$app->controller->action->id == 'create') $model->status = 1; ?>
        <?= $form->field($model, 'status')->checkbox() ?>
        <div class="form-group">
            <?= Html::submitButton(NewsModule::t('news', 'Save'), [
                'class' => 'btn btn-success',
                'id' => 'btn-submit-form'
            ]) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
<?php
$url_get_slug = Url::toRoute(['get-slug', 'id' => $model->primaryKey]);
$script = <<< JS
var submit_form = false;
function getNewSlug(name, language = true){
    return new Promise((resolve) => {
        $.post('$url_get_slug', {
            name: name,
            language: language
        }, res => {
            if(res.code === 200){
                resolve(res.data);
            }
            resolve(null);
        }, 'json');
    });
}
$('body').on('change', '#tab-language-content .tab-pane .ipt-name', function(){
    var el = $(this).closest('.tab-pane'),
        ipt_slug = el.find('.ipt-slug'),
        slug = ipt_slug.val() || null;
    if(slug !== null) return false;
    var name = $(this).val();
    getNewSlug(name).then(slug => {
        ipt_slug.val(slug);
    });
})
.on('change', '#tab-language-content .tab-pane.default .ipt-name', function(){
    var ipt_slug = $('#slug'),
        slug = ipt_slug.val() || null;
    if(slug !== null) return false;
    var name = $(this).val();
    getNewSlug(name, false).then(slug => {
        ipt_slug.val(slug);
    });
}).on('click', '#btn-submit-form', function(){
    submit_form = true;
}).on('change', '.images-content .image-content:last-child .ipt-image', function(){
    var input = $(this)[0];
    if (input.files && input.files[0]) {
        var data_image = (parseInt($(this).closest('.image-content').attr('data-image')) || 0) + 1,
            content_text = $('.image-content-temp').clone().html();
        content_text = content_text.replace(/ipt-image-0/g, 'ipt-image-' + data_image);
        content_text = content_text.replace(/News\[news_images\]\[0\]/g, 'News[news_images][' + data_image + ']');
        content_text = content_text.replace(/news_images\-0/g, 'news_images-' + data_image);
        var content = $(content_text).attr('data-image', data_image);
        $('.images-content').append(content);
    }
});
JS;
$this->registerJs($script, \yii\web\View::POS_END);