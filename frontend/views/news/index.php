<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/7/2020
 * Time: 10:56
 */

use frontend\widgets\SidebarWidget;
use yii\helpers\Url;

$this->title = Yii::t('frontend', 'Dự án');
?>
<section class="page-news">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-post">
                    <a href="<?= Url::toRoute(['/du-an/chi-tiet']) ?>" class="blog-post-img">
                        <span class="img-fade"></span>
                        <img src="<?= Yii::$app->assetManager->publish('@frontendWeb/images/blog-img2.jpg')[1] ?>"
                             alt="img">
                    </a>
                    <div class="blog-post-content">
                        <h3><a href="<?= Url::toRoute(['/du-an/chi-tiet']) ?>">Thi công villa phố Củ Chi</a></h3>
                        <ul class="blog-post-meta">
                            <li><i class="fas fa-user-alt"></i> Admin</li>
                            <li><i class="fas fa-calendar-alt"></i> 08/07/2020</li>
                            <li>
                                <i class="fas fa-folder-open"></i>
                                <a href="<?= Url::toRoute(['/du-an']) ?>">Dự án</a>
                            </li>
                        </ul>
                        <div class="blog-post-desc">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vehicula gravida hendrerit.
                            Pellentesque at odio augue. Class aptent taciti sociosqu ad litora torquent per conubia
                            nostra, per inceptos himenaeos.
                        </div>
                        <a href="<?= Url::toRoute(['/du-an/chi-tiet']) ?>" class="button button-icon small alt"><i
                                    class="fas fa-angle-right"></i> Xem thêm</a>
                    </div>
                </div>
                <div class="blog-post">
                    <div class="blog-post-slide owl-carousel owl-theme">
                        <div class="item">
                            <a href="<?= Url::toRoute(['/du-an/chi-tiet']) ?>" class="blog-post-img">
                                <span class="img-fade"></span>
                                <img src="<?= Yii::$app->assetManager->publish('@frontendWeb/images/blog-img1.jpg')[1] ?>"
                                     alt="img">
                            </a>
                        </div>
                        <div class="item">
                            <a href="<?= Url::toRoute(['/du-an/chi-tiet']) ?>" class="blog-post-img">
                                <span class="img-fade"></span>
                                <img src="<?= Yii::$app->assetManager->publish('@frontendWeb/images/blog-img2.jpg')[1] ?>"
                                     alt="img">
                            </a>
                        </div>
                        <div class="item">
                            <a href="<?= Url::toRoute(['/du-an/chi-tiet']) ?>" class="blog-post-img">
                                <span class="img-fade"></span>
                                <img src="<?= Yii::$app->assetManager->publish('@frontendWeb/images/blog-img3.jpg')[1] ?>"
                                     alt="img">
                            </a>
                        </div>
                    </div>
                    <div class="blog-post-content">
                        <h3><a href="<?= Url::toRoute(['/du-an/chi-tiet']) ?>">Hoàn thiện biệt thư dự án Thăng Long Home
                                Hưng Phú</a></h3>
                        <ul class="blog-post-meta">
                            <li><i class="fas fa-user-alt"></i> Admin</li>
                            <li><i class="fas fa-calendar-alt"></i> 08/07/2020</li>
                            <li>
                                <i class="fas fa-folder-open"></i>
                                <a href="<?= Url::toRoute(['/du-an']) ?>">Dự án</a>
                            </li>
                        </ul>
                        <div class="blog-post-desc">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vehicula gravida hendrerit.
                            Pellentesque at odio augue. Class aptent taciti sociosqu ad litora torquent per conubia
                            nostra, per inceptos himenaeos.
                        </div>
                        <a href="<?= Url::toRoute(['/du-an/chi-tiet']) ?>" class="button button-icon small alt"><i
                                    class="fas fa-angle-right"></i> Xem thêm</a>
                    </div>
                </div>
                <div class="blog-post">
                    <a href="<?= Url::toRoute(['/du-an/chi-tiet']) ?>" class="blog-post-img">
                        <span class="img-fade"></span>
                        <img src="<?= Yii::$app->assetManager->publish('@frontendWeb/images/blog-img3.jpg')[1] ?>"
                             alt="img">
                    </a>
                    <div class="blog-post-content">
                        <h3><a href="<?= Url::toRoute(['/du-an/chi-tiet']) ?>">Thiết kế nội thất biệt thự Thủ Đức</a>
                        </h3>
                        <ul class="blog-post-meta">
                            <li><i class="fas fa-user-alt"></i> Admin</li>
                            <li><i class="fas fa-calendar-alt"></i> 08/07/2020</li>
                            <li>
                                <i class="fas fa-folder-open"></i>
                                <a href="<?= Url::toRoute(['/du-an']) ?>">Dự án</a>
                            </li>
                        </ul>
                        <div class="blog-post-desc">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vehicula gravida hendrerit.
                            Pellentesque at odio augue. Class aptent taciti sociosqu ad litora torquent per conubia
                            nostra, per inceptos himenaeos.
                        </div>
                        <a href="<?= Url::toRoute(['/du-an/chi-tiet']) ?>" class="button button-icon small alt"><i
                                    class="fas fa-angle-right"></i> Xem thêm</a>
                    </div>
                </div>

                <div class="pagination">
                    <div class="text-center">
                        <ul>
                            <li>
                                <a href="#" class="button small grey">
                                    <i class="fas fa-angle-left"></i>
                                </a>
                            </li>
                            <li class="current">
                                <a href="#" class="button small grey">1</a>
                            </li>
                            <li>
                                <a href="#" class="button small grey">2</a>
                            </li>
                            <li>
                                <a href="#" class="button small grey">3</a>
                            </li>
                            <li>
                                <a href="#" class="button small grey">
                                    <i class="fas fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <?php echo SidebarWidget::widget() ?>
            </div>
        </div>
    </div>
</section>

<?php
$script = <<< JS
$('.blog-post-slide').owlCarousel({
    items: 1,
    loop: true,
    autoplay: true,
    autoplaySpeed: 3000,
    nav: false,
    dots: true,
});
JS;
$this->registerJs($script, \yii\web\View::POS_END);
?>
