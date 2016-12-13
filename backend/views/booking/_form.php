<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model common\models\Booking */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="booking-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'table_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'table_type')->textInput() ?>

    <?= $form->field($model, 'number_people')->textInput() ?>

    <?= $form->field($model, 'employee_id')->textInput(['maxlength' => true]) ?>

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

    <?= $form->field($model, 'book_time')->textInput([
        'class' => 'form-control datepicker',
        'value' => isset($model->book_time)?date('Y/m/d',$model->book_time):'',
        'placeholder' => 'Time'])
        ->label('Attendance Date') ?>

    <?= $form->field($model, 'book_status')->dropDownList(
        $array = [
            ['1' => 'Wait'],
            ['2' => 'Cancel'],
            ['3' => 'Accept'],
            ['4' => 'Eating'],
            ['5' => 'Done!']
        ],
        ['text' => 'Please select', 'options' => ['prompt', 'label' => 'Select']]
        ) ?>

    <?= $form->field($model, 'money_payed')->textInput() ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
