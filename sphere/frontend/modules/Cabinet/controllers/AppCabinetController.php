<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 07.02.2020
 * Time: 16:49
 */

namespace frontend\modules\Cabinet\controllers;

use yii\web\Controller;

use yii\filters\AccessControl;

class AppCabinetController extends  Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ]
            ]
        ];


    }

}