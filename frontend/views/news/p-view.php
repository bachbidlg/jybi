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
            <a href="./images/7.jpg" data-fancybox="gallery">
                <img src="./images/7.jpg" alt="image" class="img-fluid">
            </a>
        </div>
        <div class="gallery">
            <div class="row row-cols-lg-4 row-cols-md-3 row-cols-2" style="margin:0 -.5rem!important;">
                <div class="col px-2 mb-3">
                    <a href="./images/fp1.jpg" title="image" class="glr-item" data-fancybox="gallery">
                        <img src="./images/fp1.jpg" alt="image">
                    </a>
                </div>
                <div class="col px-2 mb-3">
                    <a href="./images/fp2.jpg" title="image" class="glr-item" data-fancybox="gallery">
                        <img src="./images/fp2.jpg" alt="image">
                    </a>
                </div>
                <div class="col px-2 mb-3">
                    <a href="./images/fp3.jpg" title="image" class="glr-item" daota-fancybox="gallery">
                        <img src="./images/fp3.jpg" alt="image">
                    </a>
                </div>
                <div class="col px-2 mb-3">
                    <a href="./images/fp7.jpg" title="image" class="glr-item" data-fancybox="gallery">
                        <img src="./images/fp7.jpg" alt="image">
                    </a>
                </div>
                <div class="col px-2 mb-3">
                    <a href="./images/fp8.jpg" title="image" class="glr-item" data-fancybox="gallery">
                        <img src="./images/fp8.jpg" alt="image">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>