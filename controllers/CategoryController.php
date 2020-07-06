<?php


namespace app\controllers;


use yii\data\ActiveDataProvider;
use yii\web\Controller;
use Yii;
use app\models\Category;
use app\models\Product;


class CategoryController extends AppController
{
    public $statusActive = 1;

    public function actionIndex(){

        $hits = new ActiveDataProvider([
            'query'=> Product::find()->where(['hit'=>$this->statusActive])->limit(6),
            'pagination' => [
                'pageSize' => false,
            ],
        ]);
        $this->setMetaTag('E-SHOPPER');

        return $this->render('index',[
            'hits'=>$hits,
        ]);
    }

    public function actionView($id){
        $id = Yii::$app->request->get('id');

        $products = new ActiveDataProvider([
           'query'=> Product::find()->where(['category_id'=>$id]),
            'pagination' => [
                'pageSize' => 15,
            ],
        ]);

        $category = Category::findOne($id);
        $this->setMetaTag('E-SHOPPER | '.$category->name,$category->keywords,$category->description);
        return $this->render('view', [
            'products'=>$products,
            'category'=>$category,
        ]);
    }

}