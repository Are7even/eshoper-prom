<?php use yii\helpers\Html;
use yii\helpers\Url; ?>

<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="single-products">
            <div class="productinfo text-center">
                <a href="<?php echo Url::to(['product/view', 'id' => $model->id]) ?>"><?php echo Html::img('@web/images/products/' . $model->img, ['alt' => $model->name]) ?></a>
                <h2>$<?php echo $model->price; ?></h2>
                <p class="item_product_text"><a
                            href="<?php echo Url::to(['product/view', 'id' => $model->id]) ?>"><?php echo $model->name; ?></a>
                </p>
                <a href="#" class="btn btn-default add-to-cart"><i
                            class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
            <?php if ($model->sale): ?>
                <?php echo Html::img('@web/images/home/sale.png', ['class' => 'new']) ?>
            <?php elseif ($model->new): ?>
                <?php echo Html::img('@web/images/home/new.png', ['class' => 'new']) ?>
            <?php endif; ?>
        </div>
        <div class="choose">
            <ul class="nav nav-pills nav-justified">
                <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
            </ul>
        </div>
    </div>
</div>



