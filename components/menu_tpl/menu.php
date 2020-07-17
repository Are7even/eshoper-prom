<?php use yii\helpers\Html;
use yii\helpers\Url; ?>

<li>
    <a href="<?php echo Url::to(['category/view', 'id' => $category['id']]) ?>">
        <?php echo $category['name']?>
        <?php if( isset($category['childs']) ): ?>
            <span class="badge pull-right"><i class="fa fa-arrow-down"></i></span>
        <?php endif;?>
    </a>
    <?php if (isset($category['childs'])): ?>
        <ul>
            <?php echo $this->getMenuHtml($category['childs']) ?>
        </ul>
    <?php endif; ?>

</li>

