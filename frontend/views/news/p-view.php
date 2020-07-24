<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/24/2020
 * Time: 10:08
 */

$default_language = $this->params['default_language'];
$this->title = Yii::t('frontend', $news->newsLanguage[$default_language]->name);
\Yii::$app->view->params['breadcrumbs'][] = $this->title;
?>
<section class="page-project-detail">
    <div class="container">
        <div class="image-full mb-4">
            <img src="./images/7.jpg" alt="image" class="img-fluid">
        </div>
        <div class="gallery">
            <div class="row row-cols-lg-4 row-cols-md-3 row-cols-2" style="margin:0 -.5rem!important;">
                <div class="col px-2 mb-3">
                    <a href="./images/fp1.jpg" title="image" class="msr-item" data-fancybox="gallery">
                        <img src="./images/fp1.jpg" alt="image">
                    </a>
                </div>
                <div class="col px-2 mb-3">
                    <a href="./images/fp2.jpg" title="image" class="msr-item" data-fancybox="gallery">
                        <img src="./images/fp2.jpg" alt="image">
                    </a>
                </div>
                <div class="col px-2 mb-3">
                    <a href="./images/fp3.jpg" title="image" class="msr-item" data-fancybox="gallery">
                        <img src="./images/fp3.jpg" alt="image">
                    </a>
                </div>
                <div class="col px-2 mb-3">
                    <a href="./images/fp7.jpg" title="image" class="msr-item" data-fancybox="gallery">
                        <img src="./images/fp7.jpg" alt="image">
                    </a>
                </div>
                <div class="col px-2 mb-3">
                    <a href="./images/fp8.jpg" title="image" class="msr-item" data-fancybox="gallery">
                        <img src="./images/fp8.jpg" alt="image">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
$script = <<< JS
// $('.masonry').masonry({
//     itemSelector: '.msr-item',
// });
JS;
//$this->registerJs($script, \yii\web\View::POS_END);
$this->registerJsFile('/js/masonry.pkgd.min.js', ['depends' => 'yii\web\JqueryAsset']);
?>
