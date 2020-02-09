<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "css/font-awesome.min.css",
        "css/prettyPhoto.css",
        "css/price-range.css",
        "css/animate.css",
        "css/responsive.css",
        "css/main.css"
    ];
    public $js = [
        "js/jquery.scrollUp.min.js",
        "js/price-range.js",
        "js/jquery.prettyPhoto.js",
//        "js/jquery.accordion",
//        "js/jquery.cookie",
        "js/main.js"

    ];
    public $jsOptions = ['position' => \yii\web\View::POS_END,];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
