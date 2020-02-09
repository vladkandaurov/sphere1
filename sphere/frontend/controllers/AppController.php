<?php


namespace frontend\controllers;


use yii\web\Controller;

class AppController extends Controller {

    protected function setMeta($title = null, $keyword = null, $description = null) {
        $this->view->title = $title;
        $this->view->registerMetaTag(['name'=> 'keyword', 'content' => "$keyword"]);
        $this->view->registerMetaTag(['name'=> 'description', 'content' => "$description"]);
    }

}