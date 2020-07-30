<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/7/2020
 * Time: 02:42
 */
/* @var $shop frontend\models\Shop */

$this->title = Yii::t('frontend', 'Liên hệ');

if (Yii::$app->session->hasFlash('alert')) {
    $alert = Yii::$app->session->getFlash('alert');
    echo '<script>alert("' . $alert['msg'] . '");</script>';
}
$default_language = $this->params['default_language'];
$shop = $this->params['shop'];
?>

<section class="page-contact">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2">
            <?php if ($shop != null) { ?>
                <div class="col">
                    <div class="contact-info">
                        <div class="h4 info-title">Thông tin công ty</div>
                        <ul>
                            <?php if ($shop->shopLanguage[$default_language]->getMetadata('address') != null) { ?>
                                <li>
                                    <i class="fas fa-map-signs"></i> <?= $shop->shopLanguage[$default_language]->getMetadata('address') ?>
                                </li>
                            <?php } ?>
                            <?php if ($shop->dataMetadata('phone') != null) { ?>
                                <li>
                                    <i class="fas fa-phone-volume"></i> <?= $shop->dataMetadata('phone') ?>
                                </li>
                            <?php } ?>
                            <?php if ($shop->dataMetadata('email') != null) { ?>
                                <li>
                                    <i class="fas fa-envelope-open"></i> <?= $shop->dataMetadata('email') ?>
                                </li>
                            <?php } ?>
                            <li>
                                <i class="fas fa-globe"></i> <?= str_replace(['http://', 'https://'], '', Yii::getAlias('@frontendUrl')) ?>
                            </li>
                        </ul>
                    </div>
                </div>
            <?php } ?>
            <div class="col">
                <?= \frontend\widgets\ContactWidget::widget() ?>
            </div>
        </div>
    </div>
</section>
<?php if($shop != null && $shop->dataMetadata('map') != null){ ?>
<section class="maps pt-0">
    <div class="container">
        <div class="maps-container">
            <?= $shop->dataMetadata('map') ?>
        </div>
    </div>
</section>
<?php } ?>