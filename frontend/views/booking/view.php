<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Booking */

$this->title = 'Cảm ơn bạn đã ủng hộ nhà hàng của chúng tôi';
?>
<div class="booking-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Chỉnh sửa', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xóa', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//          'attributes' => [
            'id',
            'user_id',
            'table_id',
            'table_type',
            'number_people',
            'employee_id',
            'eat_time',
            'shift',
            'book_time:datetime',
            'book_status',
            'money_payed',
            'cost',
        ],
    ]) ?>
    <h3>Nhân viên sẽ gọi lại cho bạn trong ít phút, mọi thắc mắc xin liên hệ : 043770095</h3>

</div>
