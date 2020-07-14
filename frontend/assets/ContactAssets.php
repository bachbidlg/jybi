<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/10/2020
 * Time: 16:06
 */

namespace frontend\assets;


use yii\web\AssetBundle;

class ContactAssets extends AssetBundle
{
    public $sourcePath = '@frontendWeb';
//    public $css = [
//
//    ];
    public $js = [
        '/js/contact.js'
    ];
    public $depends = [
        AppAsset::class
    ];
}