<?php

use yii\helpers\Url;
use modava\auth\models\User;

?>

<nav class="hk-nav hk-nav-light">
    <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i
                    data-feather="x"></i></span></a>
    <div class="nicescroll-bar">
        <div class="navbar-nav-wrap">
            <div class="nav-header">
                <span>Dashboard</span>
                <span>UI</span>
            </div>
            <ul class="navbar-nav flex-column">
                <li class="nav-item<?php if (Yii::$app->controller->id == 'site') echo ' active'; ?>">
                    <a class="nav-link" href="<?= Url::home(); ?>">
                        <i class="ion ion-md-analytics"></i>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>
            </ul>
            <hr class="nav-separator">
            <div class="nav-header">
                <span>User Modules</span>
                <span>UI</span>
            </div>
            <ul class="navbar-nav flex-column">
                <?php if (Yii::$app->user->can(User::DEV) ||
                    Yii::$app->user->can('news') ||
                    Yii::$app->user->can('newsNews-category') ||
                    Yii::$app->user->can('newsNews-categoryIndex') ||
                    Yii::$app->user->can('newsNews') ||
                    Yii::$app->user->can('newsNewsIndex') ||
                    Yii::$app->user->can('newsProject-category') ||
                    Yii::$app->user->can('newsProject-categoryIndex') ||
                    Yii::$app->user->can('newsProject') ||
                    Yii::$app->user->can('newsProjectIndex') ||
                    Yii::$app->user->can('newsSupport-category') ||
                    Yii::$app->user->can('newsSupport-categoryIndex') ||
                    Yii::$app->user->can('newsSupport') ||
                    Yii::$app->user->can('newsSupportIndex')) { ?>
                    <li class="nav-item<?php if (Yii::$app->controller->module->id == 'news') echo ' active'; ?>">
                        <a class="nav-link" href="<?= Url::toRoute(['/news/news-category']); ?>">
                            <i class="ion ion-md-list"></i>
                            <span class="nav-link-text"><?= Yii::t('backend', 'News'); ?></span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (Yii::$app->user->can(User::DEV) ||
                    Yii::$app->user->can('language') ||
                    Yii::$app->user->can('languageLanguage') ||
                    Yii::$app->user->can('languageLanguageIndex')) { ?>
                    <li class="nav-item<?php if (Yii::$app->controller->module->id == 'language') echo ' active'; ?>">
                        <a class="nav-link" href="<?= Url::toRoute(['/language']); ?>">
                            <i class="ion ion-md-flag"></i>
                            <span class="nav-link-text"><?= Yii::t('backend', 'Language'); ?></span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (Yii::$app->user->can(User::DEV) ||
                    Yii::$app->user->can('contact') ||
                    Yii::$app->user->can('contactContact') ||
                    Yii::$app->user->can('contactContactIndex')) { ?>
                    <li class="nav-item<?php if (Yii::$app->controller->module->id == 'contact') echo ' active'; ?>">
                        <a class="nav-link" href="<?= Url::toRoute(['/contact']); ?>">
                            <i class="ion ion-ios-chatbubbles"></i>
                            <span class="nav-link-text"><?= Yii::t('backend', 'Contact'); ?></span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (Yii::$app->user->can(User::DEV) ||
                    Yii::$app->user->can('slider') ||
                    Yii::$app->user->can('sliderSlider') ||
                    Yii::$app->user->can('sliderSliderIndex') ||
                    Yii::$app->user->can('sliderPartner') ||
                    Yii::$app->user->can('sliderPartnerIndex')) { ?>
                    <li class="nav-item<?php if (Yii::$app->controller->module->id == 'slider') echo ' active'; ?>">
                        <a class="nav-link" href="<?= Url::toRoute(['/slider']); ?>">
                            <i class="ion ion-ios-images"></i>
                            <span class="nav-link-text"><?= Yii::t('backend', 'Slider'); ?></span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (Yii::$app->user->can(User::DEV) ||
                    Yii::$app->user->can('freetype') ||
                    Yii::$app->user->can('freetypeFreetype') ||
                    Yii::$app->user->can('freetypeFreetypeIndex')) { ?>
                    <li class="nav-item<?php if (Yii::$app->controller->module->id == 'freetype') echo ' active'; ?>">
                        <a class="nav-link" href="<?= Url::toRoute(['/freetype']); ?>">
                            <i class="ion ion-ios-document"></i>
                            <span class="nav-link-text"><?= Yii::t('backend', 'Freetype'); ?></span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (Yii::$app->user->can(User::DEV) ||
                    Yii::$app->user->can('label') ||
                    Yii::$app->user->can('labelLabel') ||
                    Yii::$app->user->can('labelLabelIndex')) { ?>
                    <li class="nav-item<?php if (Yii::$app->controller->module->id == 'label') echo ' active'; ?>">
                        <a class="nav-link" href="<?= Url::toRoute(['/label']); ?>">
                            <i class="ion ion-ios-at"></i>
                            <span class="nav-link-text"><?= Yii::t('backend', 'Label'); ?></span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (Yii::$app->user->can(User::DEV) ||
                    Yii::$app->user->can('shop') ||
                    Yii::$app->user->can('shopShop') ||
                    Yii::$app->user->can('shopShopIndex')) { ?>
                    <li class="nav-item<?php if (Yii::$app->controller->module->id == 'shop') echo ' active'; ?>">
                        <a class="nav-link" href="<?= Url::toRoute(['/shop']); ?>">
                            <i class="ion ion-ios-cog"></i>
                            <span class="nav-link-text"><?= Yii::t('backend', 'Shop Info'); ?></span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (Yii::$app->user->can(User::DEV) ||
                    Yii::$app->user->can('icons')) { ?>
                    <li class="nav-item<?php if (Yii::$app->controller->module->id == 'icons') echo ' active'; ?>">
                        <a class="nav-link" href="<?= Url::toRoute(['/icons']); ?>">
                            <i class="icon-layers"></i>
                            <span class="nav-link-text"><?= Yii::t('backend', 'Icons'); ?></span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (Yii::$app->user->can(User::DEV) ||
                    Yii::$app->user->can('authUser') ||
                    Yii::$app->user->can('authUserIndex')) { ?>
                    <li class="nav-item<?php if (Yii::$app->controller->module->id == 'auth') echo ' active'; ?>">
                        <a class="nav-link" href="<?= Url::toRoute(['/auth/user']); ?>">
                            <i class="ion ion-ios-person"></i>
                            <span class="nav-link-text"><?= Yii::t('backend', 'Users'); ?></span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <?php if (Yii::$app->user->can(User::DEV)) { ?>
                <hr class="nav-separator">
                <div class="nav-header">
                    <span>User Interface</span>
                    <span>UI</span>
                </div>
                <ul class="navbar-nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);" data-toggle="collapse"
                           data-target="#Components_drp">
                            <i class="ion ion-md-outlet"></i>
                            <span class="nav-link-text">Components</span>
                        </a>
                        <ul id="Components_drp" class="nav flex-column collapse collapse-level-1">
                            <li class="nav-item">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="alerts.html">Alerts</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="avatar.html">Avatar</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="badge.html">Badge</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="buttons.html">Buttons</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="cards.html">Cards</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="carousel.html">Carousel</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="collapse.html">Collapse</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="dropdowns.html">Dropdown</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="list-group.html">List Group</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="modal.html">Modal</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="nav.html">Nav</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="navbar.html">Navbar</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="nestable.html">Nestable</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pagination.html">Pagination</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="popovers.html">Popovers</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="progress.html">Progress</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="tooltip.html">Tooltip</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);" data-toggle="collapse"
                           data-target="#content_drp">
                            <i class="ion ion-md-clipboard"></i>
                            <span class="nav-link-text">Content</span>
                        </a>
                        <ul id="content_drp" class="nav flex-column collapse collapse-level-1">
                            <li class="nav-item">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="typography.html">Typography</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="images.html">Images</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="media-object.html">Media Object</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);" data-toggle="collapse"
                           data-target="#utilities_drp">
                            <i class="ion ion-md-git-branch"></i>
                            <span class="nav-link-text">Utilities</span>
                        </a>
                        <ul id="utilities_drp" class="nav flex-column collapse collapse-level-1">
                            <li class="nav-item">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="background.html">Background</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="border.html">Border</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="colors.html">Colors</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="embeds.html">Embeds</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="icons.html">Icons</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="shadow.html">Shadow</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="sizing.html">Sizing</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="spacing.html">Spacing</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#forms_drp">
                            <i class="ion ion-md-calculator"></i>
                            <span class="nav-link-text">Forms</span>
                        </a>
                        <ul id="forms_drp" class="nav flex-column collapse collapse-level-1">
                            <li class="nav-item">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="form-element.html">Form Elements</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="input-groups.html">Input Groups</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="form-layout.html">Form Layout</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="form-mask.html">Form Mask</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="form-validation.html">Form Validation</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="form-wizard.html">Form Wizard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="file-upload.html">File Upload</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="editor.html">Editor</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#tables_drp">
                            <i class="ion ion-md-grid"></i>
                            <span class="nav-link-text">Tables</span>
                        </a>
                        <ul id="tables_drp" class="nav flex-column collapse collapse-level-1">
                            <li class="nav-item">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="basic-table.html">Basic Table</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="data-table.html">Data Table</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="responsive-table.html">Responsive Table</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="editable-table.html">Editable Table</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#charts_drp">
                            <i class="ion ion-md-stats"></i>
                            <span class="nav-link-text">Charts</span>
                        </a>
                        <ul id="charts_drp" class="nav flex-column collapse collapse-level-1">
                            <li class="nav-item">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="line-charts.html">Line Chart</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="area-charts.html">Area Chart</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="bar-charts.html">Bar Chart</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pie-charts.html">Pie Chart</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="realtime-charts.html">Realtime Chart</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="mini-charts.html">Mini Chart</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#maps_drp">
                            <i class="ion ion-md-map"></i>
                            <span class="nav-link-text">Maps</span>
                        </a>
                        <ul id="maps_drp" class="nav flex-column collapse collapse-level-1">
                            <li class="nav-item">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="google-map.html">Google Map</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="vector-map.html">Vector Map</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            <hr class="nav-separator">
            <div class="nav-header">
                <span>Getting Started</span>
                <span>GS</span>
            </div>
            <ul class="navbar-nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="documentation.html">
                        <i class="ion ion-md-bookmarks"></i>
                        <span class="nav-link-text">Documentation</span>
                    </a>
                </li>
            </ul>
            <?php } ?>
        </div>
    </div>
</nav>
<div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>