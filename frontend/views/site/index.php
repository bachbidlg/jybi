<?php

$this->title = WEB_NAME;
$default_language = $this->params['default_language'];
?>

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
        <div class="section-content">
            <div class="row row-cols-1 row-cols-md-3">
                <div class="col">
                    <div class="box-about">
                        <div class="box-icon">
                            <img class="img-fluid"
                                 src="<?= Yii::$app->assetManager->publish('@frontendWeb/images/icon-1.png')[1] ?>"
                                 alt="img">
                        </div>
                        <div class="box-title">
                            Tư Vấn - Thiết Kế
                        </div>
                        <div class="box-desc">
                            Tư vấn và thiết kế chuyên nghiệp về kiến trúc - xây dựng - nội thất - cảnh quan thuộc
                            các
                            thể loại Nhà phố, Biệt thự, căn hộ, văn phòng, coffe - shop, nhà hàng - khách sạn,...
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="box-about">
                        <div class="box-icon">
                            <img class="img-fluid"
                                 src="<?= Yii::$app->assetManager->publish('@frontendWeb/images/icon-2.png')[1] ?>"
                                 alt="img">
                        </div>
                        <div class="box-title">
                            Thiết Kế Thi Công Trọn Gói
                        </div>
                        <div class="box-desc">
                            Design & Build chuyên nghiệp - chìa khóa trao tay nhà phố, biệt thự, căn hộ, văn phòng,
                            coffe - shop, nhà hàng - khách sạn,...
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="box-about">
                        <div class="box-icon">
                            <img class="img-fluid"
                                 src="<?= Yii::$app->assetManager->publish('@frontendWeb/images/icon-3.png')[1] ?>"
                                 alt="img">
                        </div>
                        <div class="box-title">
                            Thi Công Hoàn Thiện
                        </div>
                        <div class="box-desc">
                            Thi công hoàn thiện chuẩn mực - sắc nét những dự án căn hộ, nhà phố, biệt thự, văn
                            phòng,
                            coffe - shop, nhà hàng - khách sạn,...
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End #about-us-->

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
                foreach($projectCat as $project){
                    foreach($project->categoryHasMany as $category_has_many){
                        ?>
                        <div class="col">
                            <div class="box-project">
                                <a class="d-block" href="#" title="<?= $category_has_many->newsCategoryLanguage[$default_language]->name?>">
                                    <div class="box-image">
                                        <div class="overlay"></div>
                                        <img class="img-fluid"
                                             src="<?= $category_has_many->getImage() ?>"
                                             alt="img">
                                    </div>
                                </a>
                                <div class="box-content">
                                    <div class="title"><a href="#" title="<?= $category_has_many->newsCategoryLanguage[$default_language]->name?>">
                                            <?= $category_has_many->newsCategoryLanguage[$default_language]->name?>
                                        </a></div>
                                    <div class="desc">
                                        <?= $category_has_many->newsCategoryLanguage[$default_language]->description?>
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

<!--Start #projects-done-->
<section id="projects-done">
    <div class="container-fluid">
        <div class="section-title center">
            <span>Khách hàng</span>
            <div class="h3">Dự án thực hiện</div>
        </div>
        <div class="section-content">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4">
                <?php for ($i = 1; $i <= 8; $i++) { ?>
                    <div class="col">
                        <a class="d-block" href="#" title="">
                            <div class="project-item">
                                <div class="project-image">
                                    <img class="img-fluid"
                                         src="<?= Yii::$app->assetManager->publish('@frontendWeb/images/img-pj-done-' . $i . '.jpg')[1] ?>"
                                         alt="img">
                                </div>
                                <div class="overlay">
                                    <div class="desc">
                                        <div class="h4">Tiêu đề <?= $i ?></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<!--Start #projects-done-->

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
                                    <i class="fas fa-play"></i>
                                </span>
                    </div>
                </div>
                <div class="col-lg-7 p-lg-0">
                    <div class="testimonial-area owl-carousel owl-theme">
                        <div class="testimonial-item">
                            <div class="reviews">
                                <i class="fas fa-quote-left"></i>
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
                                <i class="fas fa-quote-left"></i>
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
                                <i class="fas fa-quote-left"></i>
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

<!--Start #news-->
<section id="news">
    <div class="container">
        <div class="section-title center">
            <span>Tin tức</span>
            <div class="h3">ACI tư vấn</div>
        </div>
        <div class="section-content">
            <div class="news-slider owl-carousel owl-theme">
                <?php for ($i = 1; $i <= 6; $i++) { ?>
                    <div class="news-item">
                        <div class="image">
                            <a href="#" title="">
                                <img class="img-fluid"
                                     src="<?= Yii::$app->assetManager->publish('@frontendWeb/images/img-news-' . $i . '.jpg')[1] ?>"
                                     alt="img">
                            </a>
                        </div>
                        <div class="title">Tin tức <?= $i ?></div>
                        <div class="desc">Sự phát triển của đô thị khiến cho quỹ đất tại thành phố Hồ Chí Minh ngày
                            càng
                            bị thu hẹp. Chính vì vậy mẫu thiết kế nhà ống 4x15m trở nên phổ biến. Làm sao để thiết
                            kế
                            nhà ống 3 tầng 4×15 cho hiện đại, trẻ trung, đảm bảo phong thủy là yêu...
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<!--End #news-->

<!--Start #partners-->
<section id="partners">
    <div class="container">
        <div class="section-title center">
            Đối tác An Phú
        </div>
        <div class="section-content">
            <div class="partner-slider owl-carousel owl-theme">
                <?php echo \frontend\widgets\SliderWidget::widget(['type' => \frontend\models\Slider::TYPE_PARTNER])?>
            </div>
        </div>
    </div>
</section>
<!--End #partners-->
