<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/2/2020
 * Time: 19:33
 */

/* @var $menu array */

use yii\helpers\Url;
use milkyway\language\models\table\LanguageTable;

$default_language = LanguageTable::getDefaultLanguage()->id;
?>
<header id="header">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div id="logo">
                <a href="/" title="iWay"><img
                            src="<?= Yii::$app->assetManager->publish('@frontendWeb/images/logo.png')[1]; ?>"
                            alt="logo"></a>
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
                            $has_children = isset($data_menu['children']) && count($data_menu['children']) > 0;
                            ?>
                            <li<?= $has_children ? ' class="menu-item-has-children"' : '' ?>>
                                <a href="<?= $data_menu['url'] ?>"
                                   title="<?= $data_menu['name'] ?>"><?= $data_menu['name'] ?><?= $has_children ? ' <i class="fas fa-caret-down"></i>' : '' ?></a>
                                <?php if ($has_children) { ?>
                                    <ul class="sub-menu">
                                        <?php foreach ($data_menu['children'] as $sub_menu) { ?>
                                            <li>
                                                <a href="<?= $sub_menu['url'] ?>"
                                                   title="<?= $sub_menu['name'] ?>"><?= $sub_menu['name'] ?></a>
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
                </ul>
            </nav>
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
            <a href="#" title="" target="_blank"><i class="fas fa-phone-alt"></i></a>
            <a href="#" title="" target="_blank"><i class="fas fa-envelope"></i></a>
            <a href="#" title="" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="#" title="" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="#" title="" target="_blank"><i class="fab fa-youtube"></i></a>
            <a href="#" title="" target="_blank"><i class="fab fa-linkedin-in"></i></a>
        </div>
        <div class="clearfix"></div>
        <a href="<?= Url::home() ?>" class="sidebar-logo"></a>
        <em class="sidebar-logo-text"></em>
        <a class="menu-item" href="<?= Url::home() ?>">
            <i class="fas fa-home"></i>
            <span>Trang chủ</span>
            <i class="fa fa-circle"></i>
        </a>
        <a class="menu-item" href="<?= Url::toRoute(['/gioi-thieu']); ?>">
            <i class="fas fa-info-circle"></i>
            <span>Giới thiệu</span>
            <i class="fa fa-circle"></i>
        </a>
        <?php
        if (count($menu) > 0) {
            foreach ($menu as $data_menu) {
                $has_children = isset($data_menu['children']) && count($data_menu['children']) > 0;
                if (!$has_children) {
                    ?>
                    <a class="menu-item" href="<?= $data_menu['url'] ?>">
                        <i class="fas fa-info-circle"></i>
                        <span><?= $data_menu['name'] ?>></span>
                        <i class="fa fa-circle"></i>
                    </a>
                    <?php
                } else {
                    ?>
                    <div class="submenu-item">
                        <input type="checkbox" data-submenu-items="4" class="toggle-submenu"
                               id="toggle-<?= $data_menu['id'] ?>">
                        <label class="menu-item" for="toggle-<?= $data_menu['id'] ?>"><i
                                    class="<?= $data_menu['icon'] ?: 'fas fa-archive' ?>"></i><span><?= $data_menu['name'] ?></span></label>
                        <div class="submenu-wrapper">
                            <?php foreach ($data_menu['children'] as $sub_menu) { ?>
                                <a href="<?= $sub_menu['url'] ?>" class="menu-item">
                                    <i class="fa fa-angle-right"></i>
                                    <?= $sub_menu['name'] ?>
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
            <i class="fas fa-envelope"></i>
            <span>Liên hệ</span>
            <i class="fa fa-circle"></i>
        </a>
    </div>
</div>

