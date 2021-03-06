<?php

use yii\helpers\Html;
use common\models\Table;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $model common\models\Booking */

$this->title = 'Đặt bàn';
$this->css= 'css/user1.css';
?>
<hr>
<div class="booking-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin(); ?>
    <div class="clearfix"></div>
    <div class="col-md-6 " id="create">
        <h5><b>Loại Buffet</b>: <?=$table_type['0']['name']?></h5>
        <h5><b>Mô tả</b>: <?=$table_type['0']['description']?></h5>

        <?= $form->field($model, 'eat_time')->widget(\kartik\date\DatePicker::classname(), [
            'options' => ['placeholder' => 'Chọn ngày'],
            'pluginOptions' => [
                'autoclose'=>true
            ]
        ]);
        ?>

        <?= $form->field($model, 'shift')->dropDownList(
            ArrayHelper::map(\common\models\Shift::find()->all(),'id','time'),['prompt'=>'Chọn thời gian'])
        ?>

        <?= $form->field($model, 'number_people')->textInput() ?>

        <?= $form->field($model, 'table_id')->checkboxList(
            ArrayHelper::map(Table::find()->all(),'id', 'name'),
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

        <div class="form-group" id="click">
            <?= Html::submitButton($model->isNewRecord ? 'Đặt bàn' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

    <div class="col-md-6">
        <p><a href="<?= Url::to(['table-type/view']).'?id='.$table_type['0']['id']?>">Xem thực đơn của  <?=$table_type['0']['name']?> hôm nay</a> </p>
        <hr>
        <img src="<?= Url::to('@imgs/imgs/', true) .$table_type['0']['image']?>" alt=""
             style="width: 100%">
        <br>
    </div>
    <br>
    <hr>
    <hr>
    <div class="clearfix"></div>



    <div class="row">
        <div class="slider">
            <ul class="ul_slide" style="width: 1100px;">
                <?php foreach ($table as $row) { ?>
                    <li class="col-md-4 " id = "table"style="margin-left: -20px;margin-right: 15px;">
                        <a href="<?= Url::to(['course/view/' . $row['id']]) ?>"
                           title="<?= $row['name']; ?>">
                        </a>
                        <div class="item-hot" style="height: 360px; border: 1px solid #c0c0c0">
                            <input type="checkbox" name="table_check[]" value="<?= $row['id']?>">
                            <div >
                                <div class="small-screen-box">
                                    <div>
                                        <a href="<?= Url::to(['table/view'])?>?id=<?= $row['id']?>"
                                           title="<?= $row['name']; ?>">
                                            <h3 class="title-course-hot" title="<?= $row['name']; ?>">
                                                <?= $row['name']; ?>
                                            </h3>
                                        </a>
                                        <img src="<?= Url::to('@imgs/imgs/', true) . $row['image'] ?>" style="height=150px; width: 100%; position: relative; bottom: 0px">
                                        <div class="des" style="float: right">
                                            <p>Loại bàn :<?= $row['description'] ?> </p>
                                            <p>Hạng: <?= $row['status'] ?></p>
                                        </div>
                                        <div class="price" style="margin-top: 5px; float: right; background: skyblue; padding: 2px 5px; border-radius: 2px;">
                                            <p>Giá đặt bàn:<?= $row['price'] ?>VNĐ</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="btn btn-sm btn-primary">
                                <a href="<?= Url::to(['table'])?>table_id=<?=$row['id']?>" style="color: #ffffff">Xem chi tiết</a>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div> <a href="#create" class="btn btn-success">Tiếp tục</a>
    </div>
</div>
