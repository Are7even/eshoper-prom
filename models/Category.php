<?php


namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Category extends ActiveRecord
{

    public static function tableName()
    {
        return 'category';
    }

    public function getProduct(){
        return $this->hasMany(Product::className(),['category_id'=>'id']);
    }



}