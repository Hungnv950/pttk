<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Booking */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="booking-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'eat_time')
        ->dropDownList(['Trưa: 11h30-14h','Tối: 17h-22h30'],
            ['prompt' => '---Lựa chọn thời gian---'], ['onchange'=>'myFunction()'])?>

    <?= $form->field($model, 'number_people')->textInput() ?>

    <div class="form-group" id="click">
        <?= Html::submitButton($model->isNewRecord ? 'Đặt bàn' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
