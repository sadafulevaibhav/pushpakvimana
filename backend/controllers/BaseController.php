<?php

namespace backend\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;

class BaseController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'except' => ['login', 'error'], // Actions that don't require authentication
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
}
