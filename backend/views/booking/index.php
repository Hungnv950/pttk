<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel common\models\BookingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Bookings');
$this->params['breadcrumbs'][] = $this->title;
$status = $_GET['status'];
//var_dump($dataProvider);die;
?>
<div class="booking-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Booking'), ['create'], ['class' => 'btn btn-success']) ?>
        <?php
        if ($status == 5) {
            echo "";
        }
        ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
