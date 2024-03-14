<?php

namespace frontend\controllers;

use yii\rest\ActiveController;
// use common\models\AboutUs;
/**
 * AboutUs controller
 */
class AboutUsController extends ActiveController
{


    public $modelClass = 'common\models\AboutUs';
    public static function allowedDomains()
{
    return [
        // '*',                        // star allows all domains
        'http://localhost:3000/',
        // 'http://test2.example.com',
    ];
}

/**
 * @inheritdoc
 */
public function behaviors()
{
    return array_merge(parent::behaviors(), [

        // For cross-domain AJAX request
        'corsFilter'  => [
            'class' => \yii\filters\Cors::class,
            'cors'  => [
                // restrict access to domains:
                'Origin' => static::allowedDomains(),
                'Access-Control-Request-Method' => ['POST', 'PUT','GET'],
                // Allow only headers 'X-Wsse'
                'Access-Control-Request-Headers' => ['X-Wsse'],
                // Allow credentials (cookies, authorization headers, etc.) to be exposed to the browser
                'Access-Control-Allow-Credentials' => true,
                // Allow OPTIONS caching
                'Access-Control-Max-Age' => 3600,
                // Allow the X-Pagination-Current-Page header to be exposed to the browser.
                'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],            // Cache (seconds)
            ],
        ],

    ]);
}
}
