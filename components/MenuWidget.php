<?php
namespace app\components;
use Yii;
use yii\base\Widget;
use app\models\Category;

class MenuWidget extends Widget
{

    public $tpl;
    public  $data; //массив всех категорий
    public $tree; // строит с обычного массива дерево вложеностей
    public $menuHtml; // хранится уже готовый шаблон исходя от свойства которое хранится в $tpl

    public function init(){
        parent::init();
        if ($this->tpl === null){
            $this->tpl = 'menu';
        }
        $this->tpl .='.php';
    }

    public function run(){
        //get cash
        $menu = Yii::$app->cache->get('menu');
        if ($menu) return $menu;
        //sat cash
        $this->data = Category::find()->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);
        Yii::$app->cache->set('menu',$this->menuHtml,24*60*60);
        return $this->menuHtml;
    }

    public function getTree(){
        $tree = [];
        foreach ($this->data as $id=>&$node) {
            if (!$node['parent_id'])
                $tree[$id] = &$node;
            else
                $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
        }
        return $tree;
    }

   public function getMenuHtml($tree){
        $str = '';
        foreach ($tree as $category){
            $str.=$this->catToTemplate($category);
        }
        return $str;
   }

   public function catToTemplate($category){
        ob_start();
        include __DIR__ . '/menu_tpl/'.$this->tpl;
        return ob_get_clean();
   }

}