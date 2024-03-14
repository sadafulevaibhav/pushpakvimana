<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
    ],
    'modules' => [
        'gridview' =>  [
            'class' => \kartik\grid\Module::class,
            'bsVersion' => '4.x', // or '3.x'
            // 'downloadAction' => 'gridview/export/download',
            // 'i18n' => [],
            // 'exportEncryptSalt' => 'tG85vd1',
        ]       
        ],
];
