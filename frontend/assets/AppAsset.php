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
        'css/bootstrap.min.css',
        'css/site.css',
        // 'css/custom.css',
        'css/owl.carousel.min.css',
        'css/style.css',
        'css/responsive.css',
        'css/responsive.min.css',
        'css/style.min.css',
    ];
    public $js = [
        'js/bootstrap.bundle.min.js',
        'js/owl.carousel.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
        '\rmrevin\yii\fontawesome\AssetBundle',
    ];
}
