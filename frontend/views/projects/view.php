<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/24/2020
 * Time: 10:08
 */

/* @var $project frontend\models\News */

$default_language = $this->params['default_language'];
$this->title = Yii::t('frontend', $project->newsLanguage[$default_language]->name);
\Yii::$app->view->params['breadcrumbs'][] = $this->title;
$image = $project->getImage();
$list_images = [];
if ($image == null && count($list_images) > 0) $image = $list_images[0]['image'];
?>
<section class="page-project-detail">
    <div class="container">
        <?php if ($image != null) { ?>
            <div class="image-full mb-4">
                <a href="<?= $image ?>" data-fancybox="gallery">
                    <img src="<?= $image ?>" alt="image" class="img-fluid">
                </a>
            </div>
        <?php } ?>
        <?php
        $list_images = array_merge([$image], $list_images);
        if (count($list_images) > 0) {
            ?>
            <div class="gallery">
                <div class="row row-cols-lg-4 row-cols-md-3 row-cols-2" style="margin:0 -.5rem!important;">
                    <?php foreach ($list_images as $_image) { ?>
                        <div class="col px-2 mb-3">
                            <a href="<?= $image ?>" title="image" class="glr-item" data-fancybox="gallery">
                                <img src="<?= $image ?>" alt="image">
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</section>