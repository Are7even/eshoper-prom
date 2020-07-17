<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $name;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!--    <div class="alert alert-danger">-->
<!--        --><?//= nl2br(Html::encode($message)) ?>
<!--    </div>-->

    <body>
    <div class="site-error">
    <div class="container text-center">
        <div class="logo-404">
            <a href="<?php echo Url::home()?>"><?php echo Html::img('@web/images/home/logo.png',['alt'=>'E-SHOPPER'])?></a>
        </div>
        <div class="content-404">
            <img src="/images/404/404.png" class="img-responsive" alt="" />
            <h1><b>OPPS!</b><?php echo Html::encode($this->title) ?></h1>
            <p><?php echo nl2br(Html::encode($message)) ?></p>
            <h2><a href="<?php echo Url::home() ?>">Bring me back Home</a></h2>
        </div>
    </div>
    </div>
    </body>
<?php $this->endPage(); ?>