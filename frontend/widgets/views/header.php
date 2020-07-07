<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/2/2020
 * Time: 19:33
 */

use yii\helpers\Url;

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
                    <li class="menu-item-has-children">
                        <a href="#" title="">Dự án <i class="fas fa-caret-down"></i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="#" title="">Biệt thự</a>
                            </li>
                            <li>
                                <a href="#" title="">Nhà phố</a>
                            </li>
                            <li>
                                <a href="#" title="">Căn hộ</a>
                            </li>
                            <li>
                                <a href="#" title="">Văn phòng và công trình khác</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Báo giá <i class="fas fa-caret-down"></i></a>

                        <ul class="sub-menu">
                            <li>
                                <a href="#" title="">Quy trình làm việc</a>
                            </li>
                            <li>
                                <a href="#" title="">Phương pháp tính diện tích</a>
                            </li>
                            <li>
                                <a href="#" title="">Mô tả phàn thô - hoàn thiện</a>
                            </li>
                            <li>
                                <a href="#" title="">Giá thiết kế kiến trúc</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">Tư vấn <i class="fas fa-caret-down"></i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="#" title="">Mẫu nhà phố đẹp</a>
                            </li>
                            <li>
                                <a href="#" title="">Mẫu biệt thự đẹp</a>
                            </li>
                            <li>
                                <a href="#" title="">Cẩm nang xây nhà</a>
                            </li>
                            <li>
                                <a href="#" title="">Phong thủy</a>
                            </li>
                        </ul>
                    </li>
                    <li<?php if (Yii::$app->controller->id == 'contact') echo ' class="active"'; ?>>
                        <a href="<?= Url::toRoute(['/lien-he']); ?>"
                           title="<?= Yii::t('frontend', 'Liên hệ'); ?>"><?= Yii::t('frontend', 'Liên hệ'); ?></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <a class="mobile-logo" href="#"><img
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
        <a href="/" class="sidebar-logo"></a>
        <em class="sidebar-logo-text"></em>
        <a class="menu-item" href="/">
            <i class="fas fa-home"></i>
            <span>Trang chủ</span>
            <i class="fa fa-circle"></i>
        </a>
        <a class="menu-item" href="#">
            <i class="fas fa-info-circle"></i>
            <span>Giới thiệu</span>
            <i class="fa fa-circle"></i>
        </a>
        <div class="submenu-item">
            <input type="checkbox" data-submenu-items="4" class="toggle-submenu" id="toggle-1">
            <label class="menu-item" for="toggle-1"><i class="fas fa-archive"></i><span>Dự án</span></label>
            <div class="submenu-wrapper">
                <a href="#" class="menu-item">
                    <i class="fa fa-angle-right"></i>
                    Biệt thự
                    <i class="fa fa-circle"></i>
                </a>
                <a href="#" class="menu-item">
                    <i class="fa fa-angle-right"></i>
                    Nhà phố
                    <i class="fa fa-circle"></i>
                </a>
                <a href="#" class="menu-item">
                    <i class="fa fa-angle-right"></i>
                    Căn hộ
                    <i class="fa fa-circle"></i>
                </a>
                <a href="#" class="menu-item">
                    <i class="fa fa-angle-right"></i>
                    Văn phòng và công trình khác
                    <i class="fa fa-circle"></i>
                </a>
            </div>
        </div>
        <div class="submenu-item">
            <input type="checkbox" data-submenu-items="4" class="toggle-submenu" id="toggle-2">
            <label class="menu-item" for="toggle-2"><i class="fas fa-layer-group"></i><span>Báo giá</span></label>
            <div class="submenu-wrapper">
                <a href="#" class="menu-item">
                    <i class="fa fa-angle-right"></i>
                    Quy trình làm việc
                    <i class="fa fa-circle"></i>
                </a>
                <a href="#" class="menu-item">
                    <i class="fa fa-angle-right"></i>
                    Phương pháp tính diện tích
                    <i class="fa fa-circle"></i>
                </a>
                <a href="#" class="menu-item">
                    <i class="fa fa-angle-right"></i>
                    Mô tả phần thô - hoàn thiện
                    <i class="fa fa-circle"></i>
                </a>
                <a href="#" class="menu-item">
                    <i class="fa fa-angle-right"></i>
                    Giá thiết kế kiến trúc
                    <i class="fa fa-circle"></i>
                </a>
            </div>
        </div>
        <div class="submenu-item">
            <input type="checkbox" data-submenu-items="4" class="toggle-submenu" id="toggle-3">
            <label class="menu-item" for="toggle-3"><i class="fas fa-glasses"></i><span>Tư vấn</span></label>
            <div class="submenu-wrapper">
                <a href="#" class="menu-item">
                    <i class="fa fa-angle-right"></i>
                    Mẫu nhà phố đẹp
                    <i class="fa fa-circle"></i>
                </a>
                <a href="#" class="menu-item">
                    <i class="fa fa-angle-right"></i>
                    Mẫu biệt thự đẹp
                    <i class="fa fa-circle"></i>
                </a>
                <a href="#" class="menu-item">
                    <i class="fa fa-angle-right"></i>
                    Cẩm nang xây nhà
                    <i class="fa fa-circle"></i>
                </a>
                <a href="#" class="menu-item">
                    <i class="fa fa-angle-right"></i>
                    Phong thủy
                    <i class="fa fa-circle"></i>
                </a>
            </div>
        </div>
        <a class="menu-item" href="#">
            <i class="fas fa-envelope"></i>
            <span>Liên hệ</span>
            <i class="fa fa-circle"></i>
        </a>
    </div>
</div>

