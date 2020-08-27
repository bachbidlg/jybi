<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/2/2020
 * Time: 19:33
 */

/* @var $footerInfo frontend\models\Freetype */
/* @var $menu_footer array */
/* @var $socials array */
/* @var $social frontend\models\Socials */
/* @var $menu frontend\models\NewsCategory */
/* @var $sub_menu frontend\models\NewsCategory */

/* @var $shop frontend\models\Shop */

use yii\helpers\Url;
use frontend\models\Socials;

$default_language = $this->params['default_language'];
$shop = $this->params['shop'];
?>
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <?php if (!empty($footer_info)) { ?>
                    <div class="col-lg-4">
                        <div class="ft-column about">
                            <div class="ft-col-title"><?= $footer_info->freetypeLanguage[$default_language]->name ?></div>
                            <div class="ft-col-content">
                                <?= $footer_info->freetypeLanguage[$default_language]->content ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($shop != null) { ?>
                    <div class="col-lg-5">
                        <div class="ft-column info">
                            <div class="ft-col-title">Thông tin</div>
                            <div class="ft-col-content">
                                <?php if ($shop->shopLanguage[$default_language]->getMetadata('name') != null) { ?>
                                    <p>
                                        <strong><?= $shop->shopLanguage[$default_language]->getMetadata('name') ?></strong>
                                    </p>
                                <?php } ?>
                                <?php if ($shop->shopLanguage[$default_language]->getMetadata('address') != null) { ?>
                                    <p>
                                        <strong>Đ/c:</strong> <?= $shop->shopLanguage[$default_language]->getMetadata('address') ?>
                                    </p>
                                <?php } ?>
                                <?php if ($shop->dataMetadata('hotline') != null) { ?>
                                    <p>
                                        <strong>Hotline:</strong> <a href="tel: <?= $shop->dataMetadata('hotline') ?>"><?= $shop->dataMetadata('hotline') ?></a>
                                    </p>
                                <?php } ?>
                                <?php if ($shop->dataMetadata('mst') != null) { ?>
                                    <p>
                                        <strong>MST:</strong> <?= $shop->dataMetadata('mst') ?>
                                    </p>
                                <?php } ?>
                                <?php
                                $created = $shop->dataMetadata('created');
                                if ($created != null) {
                                    ?>
                                    <p>
                                        <strong>Ngày cấp giấy phép:</strong> <?= is_numeric($created) ? date('d-m-Y', $created) : $created ?>
                                    </p>
                                <?php } ?>
                                <?php
                                $started = $shop->dataMetadata('started');
                                if ($started != null) {
                                    ?>
                                    <p>
                                        <strong>Ngày hoạt động:</strong> <?= is_numeric($started) ? date('d-m-Y', $started) : $started ?>
                                    </p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php
                if (count($menu_footer) > 0) {
                    ?>
                    <div class="col-lg-3">
                        <div class="ft-column ft-nav">
                            <div class="ft-col-title"><?= Yii::t('frontend', 'Hỗ trợ khách hàng') ?></div>
                            <div class="ft-col-content">
                                <ul>
                                    <?php foreach ($menu_footer as $menu) { ?>
                                        <li>
                                            <a href="<?= Url::toRoute(['/news/index', 'slug' => $menu->slug]) ?>"
                                               title="<?= $menu->newsCategoryLanguage[$default_language]->name ?>"><?= $menu->newsCategoryLanguage[$default_language]->name ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="copyright">
                    &copy;
                    2020 <?= $shop != null ? $shop->shopLanguage[$default_language]->getMetadata('slogan') : '' ?>
                </div>
                <?php if (count($socials) > 0) { ?>
                    <div class="social">
                        <?php foreach ($socials as $social) { ?>
                            <a href="<?= $social->url != null ? $social->url : '#' ?>" title="<?= $social->name ?>"
                               target="_blank">
                                <?php if ($social->type == Socials::TYPE_ICON) { ?>
                                    <i class="<?= $social->image ?>"></i>
                                    <?php
                                } else {
                                    $image = $social->getImage();
                                    if ($image != null) {
                                        ?>
                                        <img src="<?= $image ?>" alt="<?= $social->name ?>">
                                    <?php }
                                } ?>
                            </a>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</footer>