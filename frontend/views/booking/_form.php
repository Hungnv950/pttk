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
        ->dropDownList(['Sáng: 7-11h', 'Trưa: 11h30-14h','Chiều: 15h-18h','Tối: 19h-22h30'],
            ['prompt' => '---Lựa chọn thời gian---'], ['onchange'=>'myFunction()'])?>

    <?= $form->field($model, 'money_payed')->textInput() ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <form>
        <select id="mySelect" onchange="myFunction()">
            <option>Apple</option>
            <option>Orange</option>
            <option>Pineapple</option>
            <option>Banana</option>
        </select>
    </form>

    <p id="demo"></p>

    <script>
        function myFunction() {
            var x = document.getElementById("mySelect");
            var i = x.selectedIndex;
            document.getElementById("demo").innerHTML = x.options[i].text;
        }
    </script>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
