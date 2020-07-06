<?php

/* @var $this yii\web\View */

use app\components\MenuWidget;
use yii\helpers\Html;
use yii\widgets\ListView;


?>


<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-3">

                <div class="left-sidebar">

                    <h2>Categories</h2>
                    <ul class="catalog category-products" style="padding-left: 10px">
                        <h4 class="panel-title"> <?php echo MenuWidget::widget(['tpl' => 'menu']) ?></h4>
                    </ul>

                    <div class="brands_products"><!--brands_products-->
                        <h2>Brands</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
                                <li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                                <li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
                                <li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
                                <li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
                                <li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
                                <li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                            </ul>
                        </div>
                    </div><!--/brands_products-->

                    <div class="price-range"><!--price-range-->
                        <h2>Price Range</h2>
                        <div class="well text-center">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600"
                                   data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br/>
                            <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div><!--/price-range-->

                </div>
            </div>
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center"><?php echo $category->name ?></h2>

                        <?php if (!empty($products)): ?>
                            <?php echo
                            ListView::widget([
                                'dataProvider' => $products,
                                'options' => [
                                    'tag' => 'div',
                                    'class' => 'list-wrapper',
                                    'id' => 'list-wrapper',
                                ],
                                'layout' => "{items}\n{pager}",
                                'itemView' => '_item-category',
                                'summaryOptions' => [
                                    'tag' => 'div',
                                    'class' => 'clearfix',
                                ],

                            ]);
                            ?>
                        <?php else: ?>
                            <h2>В этой категории нет товаров...</h2>
                        <?php endif; ?>

                </div><!--features_items-->
            </div>
        </div>
</section>

