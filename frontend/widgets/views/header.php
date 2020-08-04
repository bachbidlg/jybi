<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/2/2020
 * Time: 19:33
 */

/* @var $menu array */
/* @var $socials array */
/* @var $social frontend\models\Socials */
/* @var $data_menu frontend\models\NewsCategory */
/* @var $sub_menu frontend\models\NewsCategory */

/* @var $shop frontend\models\Shop */

use yii\helpers\Url;
use frontend\models\NewsCategory;
use frontend\models\Socials;

$default_language = $this->params['default_language'];
$shop = $this->params['shop'];
?>
<header id="header">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div id="logo">
                <?php if ($shop != null && $shop->imageExist('logo', 'logo')) { ?>
                    <a href="<?= Url::home() ?>" title="<?= $shop->dataMetadata('name') ?>">
                        <img src="<?= $shop->getImage('logo', 'logo') ?>" alt="<?= $shop->dataMetadata('name') ?>">
                    </a>
                <?php } ?>
            </div>
            <nav id="menu" class="main-menu">
                <ul class="nav">
                    <li<?php if (Yii::$app->controller->id == 'site') echo ' class="active"'; ?>>
                        <a href="<?= Url::home(); ?>"
                           title="<?= Yii::t('frontend', 'Trang chủ'); ?>"><?= Yii::t('frontend', 'Trang chủ'); ?></a>
                    </li>
                    <li<?php if (Yii::$app->controller->id == 'intro') echo ' class="active"'; ?>>
                        <a href="<?= Url::toRoute(['/gioi-thieu']); ?>"
                           title="<?= Yii::t('frontend', 'Giới thiệu'); ?>"><?= Yii::t('frontend', 'Giới thiệu'); ?></a>
                    </li>
                    <?php
                    if (count($menu) > 0) {
                        foreach ($menu as $data_menu) {
                            $has_children = $data_menu->type != NewsCategory::TYPE_PROJECT && count($data_menu->categoryHasMany) > 0;
                            if ($data_menu->type == NewsCategory::TYPE_PROJECT) $url = Url::toRoute(['/projects/index', 'slug' => $data_menu->slug]);
                            else $url = Url::toRoute(['/news/index', 'slug' => $data_menu->slug]);
                            ?>
                            <li<?= $has_children ? ' class="menu-item-has-children"' : '' ?>>
                                <a href="<?= $url ?>"
                                   title="<?= $data_menu->newsCategoryLanguage[$default_language]->name ?>"><?= $data_menu->newsCategoryLanguage[$default_language]->name ?><?= $has_children ? ' <i class="fa fa-caret-down"></i>' : '' ?></a>
                                <?php if ($has_children) { ?>
                                    <ul class="sub-menu">
                                        <?php
                                        foreach ($data_menu->categoryHasMany as $sub_menu) {
                                            if ($sub_menu->type == NewsCategory::TYPE_PROJECT) $sub_url = Url::toRoute(['/projects/index', 'slug' => $sub_menu->slug]);
                                            else $sub_url = Url::toRoute(['/news/index', 'slug' => $sub_menu->slug]);
                                            ?>
                                            <li>
                                                <a href="<?= $sub_url ?>"
                                                   title="<?= $sub_menu->newsCategoryLanguage[$default_language]->name ?>"><?= $sub_menu->newsCategoryLanguage[$default_language]->name ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </li>
                            <?php
                        }
                    }
                    ?>
                    <li<?php if (Yii::$app->controller->id == 'contact') echo ' class="active"'; ?>>
                        <a href="<?= Url::toRoute(['/lien-he']); ?>"
                           title="<?= Yii::t('frontend', 'Liên hệ'); ?>"><?= Yii::t('frontend', 'Liên hệ'); ?></a>
                    </li>
                    <li id="top-search">
                        <a href="javascript:void(0)" id="top-search-trigger">
                            <i class="fas fa-search"></i>
                            <i class="fas fa-times"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <form class="top-search-form" action="search.html" method="post">
                <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter.." autocomplete="off">
            </form>
        </div>
    </div>
    <a class="mobile-logo" href="<?= Url::home() ?>"><img
                src="<?= Yii::$app->assetManager->publish('@frontendWeb/images/logo.png')[1]; ?>" alt="image"></a>
</header>
<input type="checkbox" id="toggle-menu">
<label class="toggle-menu-header" for="toggle-menu"><em class="l1"></em><em class="l2"></em><em
            class="l3"></em></label>
<div id="menu-sidebar" class="menu menu-sidebar">
    <div class="menu-scroll">
        <div class="sidebar-socials">
            <?php if ($shop != null && $shop->dataMetadata('phone') != null) { ?>
                <a href="tel: <?= $shop->dataMetadata('phone') ?>" title="" target="_blank">
                    <i class="fa fa-phone"></i>
                </a>
            <?php } ?>
            <?php if ($shop != null && $shop->dataMetadata('email') != null) { ?>
                <a href="mailto: <?= $shop->dataMetadata('email') ?>" title="" target="_blank">
                    <i class="fa fa-envelope"></i>
                </a>
            <?php } ?>
            <?php
            if (count($socials) > 0) {
                foreach ($socials as $social) {
                    ?>
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
                <?php }
            } ?>
        </div>
        <div class="clearfix"></div>
        <a href="<?= Url::home() ?>" class="sidebar-logo"></a>
        <em class="sidebar-logo-text"></em>
        <a class="menu-item" href="<?= Url::home() ?>">
            <i class="fa fa-home"></i>
            <span>Trang chủ</span>
            <i class="fa fa-circle"></i>
        </a>
        <a class="menu-item" href="<?= Url::toRoute(['/gioi-thieu']); ?>">
            <i class="fa fa-info-circle"></i>
            <span>Giới thiệu</span>
            <i class="fa fa-circle"></i>
        </a>
        <?php
        if (count($menu) > 0) {
            foreach ($menu as $data_menu) {
                $has_children = $data_menu->type != NewsCategory::TYPE_PROJECT && count($data_menu->categoryHasMany) > 0;
                if (!$has_children) {
                    if ($data_menu->type == NewsCategory::TYPE_PROJECT) $url = Url::toRoute(['/projects/index', 'slug' => $data_menu->slug]);
                    else $url = Url::toRoute(['/news/index', 'slug' => $data_menu->slug]);
                    ?>
                    <a class="menu-item" href="<?= $url ?>">
                        <i class="fa fa-info-circle"></i>
                        <span><?= $data_menu->newsCategoryLanguage[$default_language]->name ?>></span>
                        <i class="fa fa-circle"></i>
                    </a>
                    <?php
                } else {
                    ?>
                    <div class="submenu-item">
                        <input type="checkbox" data-submenu-items="4" class="toggle-submenu"
                               id="toggle-<?= $data_menu->id ?>">
                        <label class="menu-item" for="toggle-<?= $data_menu->id ?>"><i
                                    class="<?= $data_menu->icon ?: 'fa fa-archive' ?>"></i><span><?= $data_menu->newsCategoryLanguage[$default_language]->name ?></span></label>
                        <div class="submenu-wrapper">
                            <?php
                            foreach ($data_menu->categoryHasMany as $sub_menu) {
                                if ($sub_menu->type == NewsCategory::TYPE_PROJECT) $sub_url = Url::toRoute(['/projects/index', 'slug' => $sub_menu->slug]);
                                else $sub_url = Url::toRoute(['/news/index', 'slug' => $sub_menu->slug]);
                                ?>
                                <a href="<?= $sub_url ?>"
                                   class="menu-item">
                                    <i class="fa fa-angle-right"></i>
                                    <?= $sub_menu->newsCategoryLanguage[$default_language]->name ?>
                                    <i class="fa fa-circle"></i>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <?php
                }
            }
        }
        ?>
        <a class="menu-item" href="<?= Url::toRoute(['/lien-he']); ?>">
            <i class="fa fa-envelope"></i>
            <span>Liên hệ</span>
            <i class="fa fa-circle"></i>
        </a>
    </div>
</div>