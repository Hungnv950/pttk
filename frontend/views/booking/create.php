<?php

use yii\helpers\Html;
use common\models\Table;

/* @var $this yii\web\View */
/* @var $model common\models\Booking */

$this->title = 'Đặt bàn';
?>

<div class="booking-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="col-md-6">
        <img src="<?=  \yii\helpers\Url::to('@imgs/imgs/', true) .$table['0']['image']?>" alt=""
             style="width: 100%">
    </div>
    <div class="col-md-6 create">
        <p><b>Tên bàn</b>: <?=$table['0']['name']?></p>
        <p><b>Hạng</b>: <?=$table['0']['status']?></p>
        <p><b>Mô tả</b>: <?=$table['0']['description']?></p>
        <p><b>Price</b>: <?=$table['0']['price']?></p>
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>

</div>
