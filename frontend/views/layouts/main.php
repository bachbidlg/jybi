<?php

use frontend\widgets\FooterWidget;
use frontend\widgets\HeaderWidget;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->beginContent('@frontend/views/layouts/common.php');
?>
    <div id="page">
        <?= HeaderWidget::widget() ?>
        <main id="main">
            <?php if (Yii::$app->controller->id != 'site') { ?>
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
                            <?= Breadcrumbs::widget([
                                'homeLink' => [
                                    'label' => Yii::t('frontend', 'Home'),
                                    'url' => Url::home()
                                ],
                                'activeItemTemplate' => '<li class="current">{link}</li>',
                                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []
                            ]) ?>
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