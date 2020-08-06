<?php

use yii\helpers\Url;

/* @var $sliders array */
/* @var $partners array */
/* @var $projectCat array */
/* @var $projectHot array */
/* @var $newsHot array */
/* @var $freeTypes array */
/* @var $freeType frontend\models\Freetype */

$this->title = WEB_NAME;
$default_language = $this->params['default_language'];
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
                            <div class="col">
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
    <!--Start #testimonial-->
    <section id="testimonial">
        <div class="container">
            <div class="section-title center">
                Nhận xét của khách hàng
            </div>
            <div class="section-content">
                <div class="row m-lg-0">
                    <div class="col-lg-5 p-lg-0">
                        <div class="video-area">
                            <img class="img-fluid w-100" src="https://i3.ytimg.com/vi/8t5Z-pVjYAE/maxresdefault.jpg">
                            <span class="icon-play" data-fancybox="" href="https://www.youtube.com/watch?v=8t5Z-pVjYAE">
                                    <i class="fa fa-play"></i>
                                </span>
                        </div>
                    </div>
                    <div class="col-lg-7 p-lg-0">
                        <div class="testimonial-area owl-carousel owl-theme">
                            <div class="testimonial-item">
                                <div class="reviews">
                                    <i class="fa fa-quote-left"></i>
                                    <p>Sau khi nhận nhà dự án căn hộ Ehome S Quận 9 - TPHCM tôi đã tiến hành tìm kiếm 1
                                        đơn
                                        vị thi công nội thất và biết đến <strong>ACI Design</strong>. Liên
                                        hệ KTS tôi nhận được sự tư vấn rất nhiệt tình, tôi đã quyết định chọn ngay
                                        <strong>ACI
                                            Design</strong>, kết quả là tôi đã có được 1 căn hộ vô cùng ưng
                                        ý và đẹp mắt.</p>
                                </div>
                                <div class="users">
                                    <div class="user-img">
                                        <img src="<?= Yii::$app->assetManager->publish('@frontendWeb/images/client.png')[1] ?>"
                                             alt=""
                                             class="img-fluid">
                                    </div>
                                    <div class="user-name">
                                        Chị Hường<br><span>Quận 9</span>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-item">
                                <div class="reviews">
                                    <i class="fa fa-quote-left"></i>
                                    <p>Khi thấy một số mẫu thiết kế căn hộ trên website công ty mình gọi điện thì được
                                        tư vấn rất nhiệt tình, cuối cùng mình đã quyết định chọn An Phú Decor. Công ty
                                        làm việc trách nhiệm, bảo hành bảo trì sau thi công cũng rất tốt. Cám ơn An Phú
                                        Decor đã thiết kế cho mình 1 căn hộ đẹp mắt.</p>
                                </div>
                                <div class="users">
                                    <div class="user-img">
                                        <img src="<?= Yii::$app->assetManager->publish('@frontendWeb/images/client.png')[1] ?>"
                                             alt=""
                                             class="img-fluid">
                                    </div>
                                    <div class="user-name">
                                        Chị Lanh<br><span>Quận 3</span>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-item">
                                <div class="reviews">
                                    <i class="fa fa-quote-left"></i>
                                    <p>Văn phòng của tôi được <strong>thiết kế rất hiện đại và đẹp mắt</strong>, tất cả
                                        yêu cầu của tôi đều được giải quyết một cách xuất sắc, đội ngũ kiến trúc
                                        sư và thợ thi công làm việc nhiệt tình và trách nhiệm. Cám ơn công ty rất
                                        nhiều.</p>
                                </div>
                                <div class="users">
                                    <div class="user-img">
                                        <img src="<?= Yii::$app->assetManager->publish('@frontendWeb/images/client.png')[1] ?>"
                                             alt=""
                                             class="img-fluid">
                                    </div>
                                    <div class="user-name">
                                        Anh Cương<br><span>Quận Tân Phú</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Start #testimonial-->

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
