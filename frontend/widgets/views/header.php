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
use yii\helpers\Html;

$default_language = $this->params['default_language'];
$shop = $this->params['shop'];
?>
<header id="header">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center position-relative">
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
                            <i class="fa fa-search"></i>
                            <i class="fa fa-times"></i>
                        </a>
                    </li>
                    <li class="top-lang">
                        <a href="#" onClick="doGTranslate('en|vi');return false;" title="English" class="gflag nturl" ><img src="/images/vietnam.png" height="32" width="32" alt="English" /></a>
                        <a href="#" onClick="doGTranslate('vi|en');return false;" title="Vietnamese" class="gflag nturl"><img src="/images/united-kingdom.png" height="32" width="32" alt="Vietnamese" /></a>
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
                    $icon = null;
                    if($social->type == Socials::TYPE_ICON){
                        $icon = Html::tag('i', '', [
                            'class' => $social->image
                        ]);
                    } else if($social->type == Socials::TYPE_IMAGE){
                        $image = $social->getImage();
                        if($image != null) {
                            $icon = Html::img($image, [
                                'alt' => $social->name
                            ]);
                        }
                    }
                    if($icon != null){
                    ?>
                    <a href="<?= $social->url != null ? $social->url : '#' ?>" title="<?= $social->name ?>"
                       target="_blank">
                        <?= $icon ?>
                    </a>
                <?php }
                }
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
                        <i class="<?= $data_menu->icon ?: 'fa fa-info-circle' ?>"></i>
                        <span><?= $data_menu->newsCategoryLanguage[$default_language]->name ?></span>
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
        <a class="menu-item flag-vi" href="#" onClick="doGTranslate('en|vi');return false;" title="English" class="gflag nturl" >
            <img src="/images/vietnam.png" height="32" width="32" alt="English" />
        </a>
        <a class="menu-item flag-en" href="#" onClick="doGTranslate('vi|en');return false;" title="Vietnamese" class="gflag nturl">
            <img src="/images/united-kingdom.png" height="32" width="32" alt="Vietnamese" />
        </a>
    </div>
</div>

<div id="google_translate_element2"></div>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>
<script type="text/javascript">
    function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'vi',autoDisplay: false}, 'google_translate_element2');}
</script>

<script type="text/javascript">
    /* <![CDATA[ */
    eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}));
    /* ]]> */
</script>