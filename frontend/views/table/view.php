<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Table */

$this->title = $model->name;
?>
<div class="table-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Quay lại ', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Đặt bàn này', ['booking', 'id' => $model->id], [
            'class' => 'btn btn-success',
            'data' => [
                'confirm' => 'Bạn có chắc chắn đặt bàn này?',
                'method' => 'post',
            ],
        ]) ?>
    </p>



</div>
