<?php


namespace app\controllers;


use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\web\Controller;
use Yii;
use app\models\Category;
use app\models\Product;
use yii\web\HttpException;


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

        $category = Category::findOne($id);
        if (empty($category)){
            throw new HttpException(404,'Такой категории не существует :)');
        }

        $id = Yii::$app->request->get('id');

        $query = Product::find()->where(['category_id'=>$id]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 3]);
        $pages->pageSizeParam = false;
        $pages->forcePageParam = false;

        $id = Yii::$app->request->get('id');

        $products = new ActiveDataProvider([
           'query'=> Product::find()->where(['category_id'=>$id]),
            'pagination' => [
                'pageSize' => 3,
                'forcePageParam' => false,
                'pageSizeParam'=> false,
            ],
        ]);



        $this->setMetaTag('E-SHOPPER | '.$category->name,$category->keywords,$category->description);
        return $this->render('view', [
            'products'=>$products,
            'category'=>$category,
            'pages'=>$pages,
        ]);
    }

}