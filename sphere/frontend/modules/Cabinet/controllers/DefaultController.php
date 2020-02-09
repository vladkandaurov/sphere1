<?php

namespace frontend\modules\Cabinet\controllers;

use yii\web\Controller;


/**
 * Default controller for the `cabinet` module
 */
class DefaultController extends AppCabinetController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

}
