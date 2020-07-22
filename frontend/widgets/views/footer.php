<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/2/2020
 * Time: 19:33
 */

/* @var $footerInfo frontend\models\Freetype */

/* @var $menu_footer array */

/* @var $menu frontend\models\NewsCategory */

/* @var $sub_menu frontend\models\NewsCategory */

/* @var $shop frontend\models\Shop */

use yii\helpers\Url;

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
                                <?php if ($shop->getMetadata('hotline') != null) { ?>
                                    <p>
                                        <strong>Hotline:</strong> <?= $shop->getMetadata('hotline') ?>
                                    </p>
                                <?php } ?>
                                <?php if ($shop->getMetadata('mst') != null) { ?>
                                    <p>
                                        <strong>MST:</strong> <?= $shop->getMetadata('mst') ?>
                                    </p>
                                <?php } ?>
                                <?php if ($shop->getMetadata('created') != null) { ?>
                                    <p>
                                        <strong>Ngày cấp giấy phép:</strong> <?= $shop->getMetadata('created') ?>
                                    </p>
                                <?php } ?>
                                <?php if ($shop->getMetadata('started') != null) { ?>
                                    <p>
                                        <strong>Ngày hoạt động:</strong> <?= $shop->getMetadata('started') ?>
                                    </p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php
                if (count($menu_footer) > 0) {
                    foreach ($menu_footer as $menu) {
                        ?>
                        <div class="col-lg-3">
                            <div class="ft-column ft-nav">
                                <div class="ft-col-title"><?= $menu->newsCategoryLanguage[$default_language]->name ?></div>
                                <?php if (count($menu->categoryHasMany) > 0) { ?>
                                    <div class="ft-col-content">
                                        <ul>
                                            <?php foreach ($menu->categoryHasMany as $sub_menu) { ?>
                                                <li>
                                                    <a href="<?= Url::toRoute(['/news/index', 'slug' => $sub_menu->slug]) ?>"
                                                       title="<?= $sub_menu->newsCategoryLanguage[$default_language]->name ?>"><?= $sub_menu->newsCategoryLanguage[$default_language]->name ?></a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="copyright">
                    &copy; 2020 <?= $shop != null ? $shop->shopLanguage[$default_language]->getMetadata('slogan') : '' ?>
                </div>
                <div class="social">
                    <a href="#" title="" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" title="" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="#" title="" target="_blank"><i class="fab fa-youtube"></i></a>
                    <a href="#" title="" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>
