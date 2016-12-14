<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\BookingService */
//
//$this->title = $model->id;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Booking Services'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;

//var_dump($booking_service);die;

?>
<div class="booking-service-view">

    <table class="table">
        <thead>
            <tr class="filters">
                <th>Tên dịch vụ</th>
                <th>Giá </th>
                <th>Số lượng</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($booking_service as $row) {
            $service = \common\models\AdvancedService::find()->where(['id'=>$row['service_id']])->all();
//                var_dump($service);die;
            ?>
                <tr>
                    <td><?= $service[0]['name'] ?></td>
                    <td><?= $service[0]['price'] ?> </td>
                    <td><?= $row['quantity'] ?></td>
                </tr>
        <?php
            }
        ?>
        </tbody>
    </table>

</div>
