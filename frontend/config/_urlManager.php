<?php
return [
//    'class' => 'codemix\localeurls\UrlManager',
//    'languages' => ['en', 'vi', 'jp'],
//    'enableDefaultLanguageUrlCode' => true,
//    'geoIpLanguageCountries' => [
//        'vi' => ['VN'],
//        'jp' => ['JP']
//    ],
//    'on languageChanged' => '\frontend\controllers\LangController::onLanguageChanged',
    'class' => yii\web\UrlManager::class,
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'suffix' => '.html',
    'rules' => [
        '' => '/site/index',
        'quy-tac-hoat-dong' => 'site/quy-tac-hoat-dong',
        'quy-trinh-dang-tin' => 'site/quy-trinh-dang-tin',

        ['pattern' => 've-chung-toi', 'route' => 'intro/index', 'suffix' => '.html'],
        ['pattern' => 'lien-he', 'route' => 'contact/index', 'suffix' => '.html'],
        ['pattern' => 'search-news', 'route' => 'site/search-news-html', 'suffix' => '.html'],

        /* demo */
        ['pattern' => 'bai-viet/<slug>', 'route' => 'news/view', 'suffix' => '.html'],
        ['pattern' => 'bai-viet/<slug>', 'route' => 'news/index', 'suffix' => ''],
        ['pattern' => 'du-an/<slug>', 'route' => 'projects/view', 'suffix' => '.html'],
        ['pattern' => 'du-an/<slug>', 'route' => 'projects/index', 'suffix' => ''],
        /* demo */

        /*['pattern' => 'bat-dong-san-ky-gui/trang-<page:\d+>', 'route' => 'ky-gui/index', 'suffix' => '.html'],
        ['pattern' => 'bat-dong-san-ky-gui/<slug>', 'route' => 'ky-gui/view', 'suffix' => '.html'],
        ['pattern' => 'bat-dong-san-ky-gui', 'route' => 'ky-gui', 'suffix' => '.html'],
        ['pattern' => 'bat-dong-san-ky-gui', 'route' => 'ky-gui/index', 'suffix' => '.html'],

        ['pattern' => 'tin-bat-dong-san/trang-<page:\d+>', 'route' => 'news/index', 'suffix' => '.html'],
        ['pattern' => 'tin-bat-dong-san/<slug>', 'route' => 'news/view', 'suffix' => '.html'],
        ['pattern' => 'tin-bat-dong-san', 'route' => 'news', 'suffix' => '.html'],
        ['pattern' => 'tin-bat-dong-san', 'route' => 'news/index', 'suffix' => '.html'],*/


        ['pattern' => 'robots', 'route' => 'robotsTxt/web/index', 'suffix' => '.txt'],
        ['pattern' => 'sitemap', 'route' => 'sitemap/default/index', 'suffix' => '.xml'],
    ],
];
