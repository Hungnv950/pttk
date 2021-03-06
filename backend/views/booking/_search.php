<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BookingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="booking-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'table_id') ?>

    <?= $form->field($model, 'table_type') ?>

    <?= $form->field($model, 'number_people') ?>

    <?php // echo $form->field($model, 'employee_id') ?>

    <?php // echo $form->field($model, 'eat_time') ?>

    <?php // echo $form->field($model, 'shift') ?>

    <?php // echo $form->field($model, 'book_time') ?>

    <?php // echo $form->field($model, 'book_status') ?>

    <?php // echo $form->field($model, 'money_payed') ?>

    <?php // echo $form->field($model, 'cost') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
