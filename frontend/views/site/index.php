<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Home';
$baseUrl = Yii::$app->urlManager->hostInfo;
//echo Yii::getAlias('@common');die;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Chào mừng bạn đến với nhà hàng !</h1>

        <p class="lead">Ăn không chỉ để no mà còn để thưởng thức</p>

        <p><a class="btn btn-md btn-primary" href="<?= Url::to(['table-type/index'])?>">Đặt bàn ngay</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <img src="<?= $baseUrl?>/pttk/common/imgs/images%20(4).jpg" alt="">
            </div>
            <div class="col-lg-4">
                <img src="<?= $baseUrl?>/pttk/common/imgs/images%20(2).jpg" alt="">
            </div>
            <div class="col-lg-4">
                <img src="<?= $baseUrl?>/pttk/common/imgs/images%20(3).jpg" alt="">
            </div>
        </div>

    </div>
</div>
