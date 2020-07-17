<?php


namespace app\controllers;
use app\models\Product;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\HttpException;


class ProductController extends AppController
{
    public $statusActive = 1;

    public function actionView($id){

        $id = Yii::$app->request->get('id');

        $hits = Product::find()->where(['hit'=>$this->statusActive])->all();

        $product = Product::findOne($id);
        if (empty($product)){
            throw new HttpException(404,'Такого товара не существует :)');
        }

        $this->setMetaTag('E-SHOPPER | '.$product->name,$product->keywords,$product->description);

        return$this->render('view',[
            'product' => $product,
            'hits' => $hits,
        ]);
    }

}