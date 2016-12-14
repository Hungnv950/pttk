<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\Booking */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Đặt bàn';
//$booking = array_values($booking);
//$booking = json_encode($booking);
//print_r($booking);

$tab = ArrayHelper::map(\common\models\Table::find()->all(),'id', 'name');
$i=1;
?>
<h1 >Chào mừng bạn đến với chức năng đặt bàn</h1>
<div class="container">
    <div class="col-md-5 booking-form">

        <h4><b>Loại Buffet</b>: <?=$table_type['0']['name']?> ( <span id="table_price"><?=$table_type['0']['status']?></span><span>/Suất</span>)</h4>
        <h5><b>Mô tả</b>: <span style="color:#00a7d0 "><?=$table_type['0']['description']?></span></h5>
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'number_people')->textInput() ?>

        <?= $form->field($model, 'eat_time')->widget(DatePicker::className(), [
            'options' => ['placeholder' => 'Chọn ngày'],
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true
            ]
        ]);
        ?>

        <?= $form->field($model, 'shift')->dropDownList(
            ArrayHelper::map(\common\models\Shift::find()->all(),'id','time'),['prompt'=>'Chọn thời gian'])
        ?>

        <?= $form->field($model, 'book_status')->dropDownList(
            $items = ['1' => 'Thanh toán sau', '3' => 'Thanh toán luôn'],           // Flat array ('id'=>'label')
            ['prompt'=>'Chọn loại thanh toán']    // options
        )?>

        <?= $form->field($model, 'table_id')->checkboxList(
            $tab,
            [
                'itemOptions' => [
                    'class' => 'switch',
                    'data' => [
//                        'on-text' => 'ON',
//                        'off-text' => 'OFF',
//                        'on-color' => 'teal'
                    ],
                ],
            ]
        ) ?>

        <h4>Tài khoản của bạn: <?php if($user['money'] == null) echo "0 VNĐ"; else echo $user['money']." VNĐ"?></h4>

        <h4>Phí phải trả: <span id="money">0</span></h4>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

    <div class="col-md-7">
        <hr>
        <a href="<?= Url::to(['table/index']).'?table_type='.$table_type[0]['id']?>">Xem chi tiết các bàn</a>
        <img src="<?= Url::to('@imgs/imgs/', true).'/location.jpg'?>" style="width: 95%;display: inline-block;border: 1px solid #ddd;border-radius: 4px;    padding: 5px;    transition: 0.3s; margin-top: 20px;" alt="">
    </div>
</div>

