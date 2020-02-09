<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\Product;
use Yii;
use yii\data\Pagination;
use yii\web\HttpException;

class CategoryController extends AppController
{
    public function actionIndex() {
        $hits = Product::find()->where(['hit' => '1'])->all();
        $this->setMeta('Sphere', '', 'Торговая площадка для продажи авторских изделий: хенд мейд одежда и обувь, украшения, подарки и сувениры, аксессуары, сумки, косметика ручной работы');
        return $this->render('index', compact('hits'));
    }

    public function actionView($id) {
        // $id = Yii::$app->request->get('id'); // 2-ой Вариант получения id
        //        $products = Product::find()->where(['category_id' => $id])->all();

        $category = Category::findOne($id);

        if (empty($category)) {
            throw new HttpException(404, 'Данной категории не существует');
        }

        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 6,
            'forcePageParam' => false,
            'pageSizeParam' => false,
        ]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $this->setMeta('Sphere | ' . $category->name, $category->keyword, $category->desc);
        return $this->render('view', compact('products', 'category', 'pages'));
    }

    public function actionSearch() {
        $q = trim(Yii::$app->request->get('q'));
        $this->setMeta('Sphere | Поиск: ' . $q);
        if (!$q) {
          return $this->render('search');
        }
        $query = Product::find()->where(['like', 'name' , $q]);

        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 6,
            'forcePageParam' => false,
            'pageSizeParam' => false,
        ]);

        $products = $query->offset($pages->offset)->limit($pages->limit)->all();


        return $this->render('search', compact('products', 'pages', 'q'));
    }


}
