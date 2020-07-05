<?php


namespace app\controllers;


use yii\web\Controller;
use Yii;
use app\models\Category;
use app\models\Product;


class CategoryController extends AppController
{
    public $statusActive = 1;

    public function actionIndex(){

        $hits= Product::find()->where(['hit'=>$this->statusActive])->limit(6)->all();
        $this->setMetaTag('E-SHOPPER');

        return $this->render('index',[
            'hits'=>$hits,
        ]);
    }

    public function actionView($id){
        $id = Yii::$app->request->get('id');
        $products = Product::find()->where(['category_id'=>$id])->all();
        $category = Category::findOne($id);
        $this->setMetaTag('E-SHOPPER | '.$category->name,$category->keywords,$category->description);
        return $this->render('view', [
            'products'=>$products,
            'category'=>$category,
        ]);
    }

}