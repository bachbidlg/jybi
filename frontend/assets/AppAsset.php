<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
//    public $basePath = '@webroot';
//    public $baseUrl = '@web';
    public $sourcePath = '@frontendWeb';
    public $css = [
        '/third_party/owl.carousel/dist/assets/owl.carousel.min.css',
        '/third_party/owl.carousel/dist/assets/owl.theme.default.min.css',
        '/third_party/@fortawesome/fontawesome-free/css/fontawesome.min.css',
        '/third_party/@fortawesome/fontawesome-free/css/brands.min.css',
        '/third_party/@fortawesome/fontawesome-free/css/solid.min.css',
        '/third_party/fancybox/dist/jquery.fancybox.min.css',
        '/third_party/wow.js/css/libs/animate.css',
        '/css/style.css'
    ];
    public $js = [
        '/third_party/bootstrap/js/bootstrap.min.js',
        '/third_party/owl.carousel/dist/owl.carousel.min.js',
        '/third_party/fancybox/dist/jquery.fancybox.min.js',
        '/third_party/wow.js/dist/wow.min.js',
        '/js/scripts.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
