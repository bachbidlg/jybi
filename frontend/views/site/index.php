<?php

use yii\helpers\Url;

/* @var $sliders array */
/* @var $partners array */
/* @var $projectCat array */
/* @var $projectHot array */
/* @var $newsHot array */
/* @var $freeTypes array */
/* @var $freeType frontend\models\Freetype */
/* @var $comments array */
/* @var $comment frontend\models\Comments */

$this->title = WEB_NAME;
$default_language = $this->params['default_language'];
$shop = $this->params['shop'];
?>
<?php if (count($sliders) > 0) { ?>
    <!--Start #banner-->
    <section id="banner-full">
        <div class="banner-slider owl-carousel owl-theme">
            <?php foreach ($sliders as $item): ?>
                <div class="item">
                    <a href="<?= $item->url ?: 'javascript:;' ?>"<?= $item->url != null ? ' target="_blank"' : '' ?>>
                        <img class="img-fluid" src="<?= $item->getImage() ?>" alt="<?= $item->name ?>">
                    </a>
                </div>
            <?php endforeach ?>
        </div>
    </section>
    <!--End #banner-->
<?php } ?>
    <!--Start #about-us-->
    <section id="about-us">
        <div class="container">
            <div class="section-title center">
                <span>Về chúng tôi</span>
                <div class="h3">Thiết kế &amp; xây dựng ACI</div>
                <p class="text-secondary">Chúng tôi – tập hợp đội ngũ kiến trúc sư, kĩ sư trẻ được đào tạo bài bản, kinh
                    nghiệm
                    nhiều năm trong nghề, có nhiệt huyết, tuổi trẻ, sáng tạo kết hợp với đội thợ lành nghề đã, đang và
                    sẽ
                    tiếp tục đi xây dựng ước mơ – nhiều ngôi nhà đẹp, công trình tâm huyết cho quý khách hàng trên khắp
                    Việt
                    Nam.</p>
            </div>
            <?php
            if (count($freeTypes) > 0) {
                ?>
                <div class="section-content">
                    <div class="row row-cols-1 row-cols-md-3">
                        <?php foreach ($freeTypes as $freeType) { ?>
                            <div class="col mb-1 mb-md-0">
                                <div class="box-about">
                                    <div class="box-icon">
                                        <img class="img-fluid"
                                             src="<?= $freeType->getImage() ?>"
                                             alt="<?= $freeType->freetypeLanguage[$default_language]->name ?>">
                                    </div>
                                    <div class="box-title">
                                        <?= $freeType->freetypeLanguage[$default_language]->name ?>
                                    </div>
                                    <div class="box-desc">
                                        <?= $freeType->freetypeLanguage[$default_language]->content ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
    <!--End #about-us-->
<?php if (count($projectCat) > 0) { ?>
    <!--Start #projects-->
    <section id="projects">
        <div class="container">
            <div class="section-title center">
                <span>Dự án</span>
                <div class="h3">Dự án của chúng tôi</div>
            </div>
            <div class="section-content">
                <div class="row row-cols-1 row-cols-md-2">
                    <?php
                    foreach ($projectCat as $project) {
                        foreach ($project->categoryHasMany as $category_has_many) {
                            ?>
                            <div class="col">
                                <div class="box-project">
                                    <a class="d-block"
                                       href="<?= Url::toRoute(['/news/index', 'slug' => $category_has_many->slug]) ?>"
                                       title="<?= $category_has_many->newsCategoryLanguage[$default_language]->name ?>">
                                        <div class="box-image">
                                            <div class="overlay"></div>
                                            <img class="img-fluid"
                                                 src="<?= $category_has_many->getImage() ?>"
                                                 alt="img">
                                        </div>
                                    </a>
                                    <div class="box-content">
                                        <div class="title">
                                            <a href="<?= Url::toRoute(['/news/index', 'slug' => $category_has_many->slug]) ?>"
                                               title="<?= $category_has_many->newsCategoryLanguage[$default_language]->name ?>">
                                                <?= $category_has_many->newsCategoryLanguage[$default_language]->name ?>
                                            </a>
                                        </div>
                                        <div class="desc">
                                            <?= $category_has_many->newsCategoryLanguage[$default_language]->description ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!--End #projects-->
<?php } ?>
<?php if (count($projectHot) > 0) { ?>
    <!--Start #projects-done-->
    <section id="projects-done">
        <div class="container-fluid">
            <div class="section-title center">
                <span>Khách hàng</span>
                <div class="h3">Dự án thực hiện</div>
            </div>
            <div class="section-content">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4">
                    <?php
                    foreach ($projectHot as $project) {
                        ?>
                        <div class="col">
                            <a class="d-block" href="<?= Url::toRoute(['/news/view', 'slug' => $project->slug]) ?>"
                               title="<?= $project->newsLanguage[$default_language]->name ?>">
                                <div class="project-item">
                                    <div class="project-image">
                                        <img class="img-fluid"
                                             src="<?= $project->getImage() ?>"
                                             alt="img">
                                    </div>
                                    <div class="overlay">
                                        <div class="desc">
                                            <div class="h4"><?= $project->newsLanguage[$default_language]->name ?></div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!--Start #projects-done-->
<?php } ?>
<?php if (count($comments) > 0) { ?>
    <!--Start #testimonial-->
    <section id="testimonial">
        <div class="container">
            <div class="section-title center">
                Nhận xét của khách hàng
            </div>
            <div class="section-content">
                <div class="row m-lg-0">
                    <?php
                    if ($shop->dataMetadata('video') != null && strpos($shop->dataMetadata('video'), '?v=') !== false) {
                        $video = $shop->dataMetadata('video');
                        $arr = explode('?v=', $video);
                        $arr = explode('&', $arr[1]);
                        $videoCode = $arr[0];
                        ?>
                        <div class="col-lg-5 p-lg-0">
                            <div class="video-area">
                                <img class="img-fluid w-100"
                                     src="https://i3.ytimg.com/vi/<?= $videoCode ?>/maxresdefault.jpg">
                                <span class="icon-play" data-fancybox=""
                                      href="https://www.youtube.com/watch?v=<?= $videoCode ?>">
                                    <i class="fa fa-play"></i>
                                </span>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="col-lg-7 p-lg-0">
                        <div class="testimonial-area owl-carousel owl-theme">
                            <?php
                            foreach ($comments as $comment) {
                                $image = $comment->dataMetadataByKey('image');
                                if ($image != null && !is_dir(Yii::getAlias('@frontend/web/uploads/comments/') . $image && file_exists(Yii::getAlias('@frontend/web/uploads/comments/') . $image))) {
                                    try {
                                        $image = Yii::$app->assetManager->publish(Yii::getAlias('@frontend/web/uploads/comments/') . $image)[1];
                                    } catch (Exception $ex) {
                                        $image = null;
                                    }
                                }
                                ?>
                                <div class="testimonial-item">
                                    <div class="reviews">
                                        <i class="fa fa-quote-left"></i>
                                        <?= $comment->comment ?>
                                    </div>
                                    <div class="users">
                                        <?php if ($image != null) { ?>
                                            <div class="user-img">
                                                <img src="<?= $image ?>"
                                                     alt="<?= $comment->dataMetadataByKey('name') ?>"
                                                     class="img-fluid">
                                            </div>
                                        <?php } ?>
                                        <div class="user-name">
                                            <?= $comment->dataMetadataByKey('name') ?>
                                            <br><span><?= $comment->dataMetadataByKey('address') ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Start #testimonial-->
<?php } ?>

<?php if (count($newsHot) > 0) { ?>
    <!--Start #news-->
    <section id="news">
        <div class="container">
            <div class="section-title center">
                <span>Tin tức</span>
                <div class="h3">ACI tư vấn</div>
            </div>
            <div class="section-content">
                <div class="news-slider owl-carousel owl-theme">
                    <?php foreach ($newsHot as $news_hot) { ?>
                        <div class="news-item">
                            <div class="image">
                                <a href="<?= Url::toRoute(['/news/view', 'slug' => $news_hot->slug]) ?>"
                                   title="<?= $news_hot->newsLanguage[$default_language]->name ?>">
                                    <img class="img-fluid" src="<?= $news_hot->getImage() ?>"
                                         alt="<?= $news_hot->newsLanguage[$default_language]->name ?>">
                                </a>
                            </div>
                            <div class="title"><?= $news_hot->newsLanguage[$default_language]->name ?></div>
                            <div class="desc"><?= $news_hot->newsLanguage[$default_language]->description ?></div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!--End #news-->
<?php } ?>
<?php if (count($partners) > 0) { ?>
    <!--Start #partners-->
    <section id="partners">
        <div class="container">
            <div class="section-title center">
                Đối tác ACI
            </div>
            <div class="section-content">
                <div class="partner-slider owl-carousel owl-theme">
                    <?php foreach ($partners as $item) { ?>
                        <div class="item">
                            <a href="<?= $item->url ?: 'javscript:;' ?>"<?= $item->url != null ? ' target="_blank"' : '' ?>>
                                <img class="img-fluid" src="<?= $item->getImage() ?>" alt="<?= $item->name ?>">
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!--End #partners-->
<?php } ?>
<?php
$css = <<< CSS
.owl-item .item a {
    display: block;
}
CSS;
$this->registerCss($css);
