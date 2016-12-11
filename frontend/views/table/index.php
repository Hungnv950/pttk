<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BookingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$table_type = $_GET['table_type'];
?>
<h2 style="text-align: center">Lựa chọn bàn của bạn</h2>
<a href="" id="click" class="btn btn-danger" style="text-align: right; float: right">Tiếp tục đặt bàn</a>
<div class="subject-hot">
    <div class="main-subject">
        <div class="slider">
            <ul class="ul_slide" style="width: 1100px;">
                <?php foreach ($model as $row) { ?>
                    <li class="col-md-4" style="margin-left: -20px;margin-right: 15px;">
                        <a href="<?= Url::to(['course/view/' . $row['id']]) ?>"
                           title="<?= $row['name']; ?>">
                        </a>
                        <div class="item-hot" style="height: 360px; border: 1px solid #c0c0c0">
                            <input type="checkbox" name="table" value="<?= $row['id']?>">
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
                                <a href="booking/create?table_id=<?=$row['id']?>" style="color: #ffffff">Xem chi tiết</a>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>


