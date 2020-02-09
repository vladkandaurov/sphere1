<?php


namespace frontend\controllers;

use common\models\Category;
use common\models\Product;
use Yii;
use yii\web\HttpException;

class ProductController extends AppController
{
    public function actionView($id) {
        // $id = Yii::$app->request->get('id'); // Второй вариант получения id
        ////   $product = Product::find()->with('category')->where(['id' => $id])->limit(1)->one(); // Жадная загрузка

        $product = Product::findOne($id); // Ленивая загрузка

        if (empty($product)) {
            throw new HttpException(404, 'Данного товара не существует');
        }

        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();

        $this->setMeta('Sphere | ' . $product->name, $product->keywords, $product->description);


        return $this->render('view', compact('product','hits'));



    }

}