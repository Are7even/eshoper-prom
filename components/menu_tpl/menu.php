<?php use yii\helpers\Html;
use yii\helpers\Url; ?>

<li>
    <?php echo Html::a($category['name'],Url::to(['category/view', 'id' => $category['id']]),['class'=>'']);?>

    <?php if (isset($category['childs'])): ?>
        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
    <?php endif; ?>

    <?php if (isset($category['childs'])): ?>
        <ul>
            <?php echo $this->getMenuHtml($category['childs']) ?>
        </ul>
    <?php endif; ?>

</li>

