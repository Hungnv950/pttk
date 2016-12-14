<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\Booking */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Booking',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bookings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');

$booking_id = $_GET['id'];
?>
<div class="booking-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <a href="<?= Url::to(['/booking-service/index'], true).'?id='.$booking_id?>" class="btn btn-success">Xem dịch vụ</a>

</div>
