<?php

use frontend\widgets\FooterWidget;
use frontend\widgets\HeaderWidget;
use yii\helpers\Url;

$this->beginContent('@frontend/views/layouts/common.php');
?>
    <div id="page">
        <?= HeaderWidget::widget() ?>
        <main id="main">
            <?php if (Yii::$app->controller->id == 'site') { ?>
                <!--Start #banner-->
                <section id="banner-full">
                    <div class="banner-slider owl-carousel owl-theme">
                        <div class="item">
                            <img class="img-fluid"
                                 src="<?= Yii::$app->assetManager->publish('@frontendWeb/images/slider-2.jpg')[1] ?>"
                                 alt="img">
                        </div>
                        <div class="item">
                            <img class="img-fluid"
                                 src="<?= Yii::$app->assetManager->publish('@frontendWeb/images/slider-3.jpg')[1] ?>"
                                 alt="img">
                        </div>
                        <div class="item">
                            <img class="img-fluid"
                                 src="<?= Yii::$app->assetManager->publish('@frontendWeb/images/slider-4.jpg')[1] ?>"
                                 alt="img">
                        </div>
                    </div>
                </section>
                <!--End #banner-->
            <?php } else { ?>
                <section class="site-heading">
                    <!--<img src="https://demo2wpopal.b-cdn.net/rehomes/wp-content/uploads/2019/11/background-about_awards.jpg"
                         alt="">-->
                    <div class="heading-wrap">
                        <div class="container">
                            <h1>
                                <?php
                                if (Yii::$app->controller->id == 'intro') :
                                    echo Yii::t('frontend', 'Giới thiệu');
                                elseif (Yii::$app->controller->id == 'contact') :
                                    echo Yii::t('frontend', 'Liên hệ');
                                endif;
                                ?>
                            </h1>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="<?= Url::home(); ?>"><?= Yii::t('frontend', 'Trang chủ'); ?></a>
                                </li>
                                <?php if (Yii::$app->controller->id == 'intro') { ?>
                                    <li class="current">
                                        <?= Yii::t('frontend', 'Giới thiệu'); ?>
                                    </li>
                                <?php } ?>
                                <?php if (Yii::$app->controller->id == 'news') { ?>
                                    <li class="current">
                                        <?= Yii::t('frontend', 'Dự án'); ?>
                                    </li>
                                <?php } ?>
                                <?php if (Yii::$app->controller->id == 'contact') { ?>
                                    <li class="current">
                                        <?= Yii::t('frontend', 'Liên hệ'); ?>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>

                </section>
            <?php } ?>

            <?= $content; ?>
        </main>
        <?= FooterWidget::widget() ?>
    </div>
<?php
$this->endContent();
?>