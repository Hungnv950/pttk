<?php
/**
 * Created by PhpStorm.
 * User: haiye_000
 * Date: 14-Dec-16
 * Time: 1:11 PM
 */
$this->title = Yii::t('app', 'Hóa đơn');
$this->params['breadcrumbs'][] = $this->title;
//var_dump($booking_detail);
//var_dump($service_detail);
//var_dump($advanced_service);
//var_dump(intval ($service_detail[1]['service_id']));

$k=sizeof($service_detail);
for($i=0;$i<$k;$i++){
    for($j=$i+1;$j<$k;$j++) {
        if (intval ($service_detail[$i]['service_id'])==intval ($service_detail[$j]['service_id'])&&
            intval ($service_detail[$i]['service_id']!=0)) {
            $t=intval ($service_detail[$i]['quantity'])+intval ($service_detail[$j]['quantity']);
            $service_detail[$i]['quantity']=$t;
            $service_detail[$j]['quantity']=0;
        }
    }
}
$cost=$booking_detail['cost'];
for($i=0;$i<$k;$i++) {
    for ($j = 0; $j < sizeof($advanced_service); $j++) {
        if ($service_detail[$i]['service_id'] == $advanced_service[$j]['id'])
            $cost -= $advanced_service[$j]['price'] * $service_detail[$i]['quantity'];
    }
}

//var_dump($service_detail);
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>A simple, clean, and responsive HTML invoice template</title>

    <style>
        .invoice-box{
            max-width:800px;
            margin:auto;
            padding:30px;
            border:1px solid #eee;
            box-shadow:0 0 10px rgba(0, 0, 0, .15);
            font-size:16px;
            line-height:24px;
            font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color:#555;
        }

        .invoice-box table{
            width:100%;
            line-height:inherit;
            text-align:left;
        }

        .invoice-box table td{
            padding:5px;
            vertical-align:top;
        }

        /*.invoice-box table tr td:nth-child(2){*/
            /*text-align:right;*/
        /*}*/

        .invoice-box table tr.top table td{
            padding-bottom:20px;
        }

        .invoice-box table tr.top table td.title{
            font-size:45px;
            line-height:45px;
            color:#333;
        }

        .invoice-box table tr.information table td{
            padding-bottom:40px;
        }

        .invoice-box table tr.heading td{
            background:#eee;
            border-bottom:1px solid #ddd;
            font-weight:bold;
        }

        .invoice-box table tr.details td{
            padding-bottom:20px;
        }

        .invoice-box table tr.item td{
            border-bottom:1px solid #eee;
        }

        .invoice-box table tr.item.last td{
            border-bottom:none;
        }

        .invoice-box table tr.total td:nth-child(2){
            border-top:2px solid #eee;
            font-weight:bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td{
                width:100%;
                display:block;
                text-align:center;
            }

            .invoice-box table tr.information table td{
                width:100%;
                display:block;
                text-align:center;
            }
        }
    </style>
</head>

<body>
<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <td class="title">
                            <img src="../../../common/imgs/logo.jpg" style="width:100%; max-width:300px;">
                        </td>
                        <td></td>
                        <td style="text-align: right">
                            Invoice #: <?php echo $booking_detail['id'] ?><br>
                            Created: <?php echo $booking_detail['book_time']?><br>
                            Due: <?php echo $booking_detail['eat_time'] ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
                        <td>
                            Buffet F4<br>
                            144 Xuân Thủy, Cầu Giấy, Hà Nội<br>
                            Sdt : 18008198
                        </td>
                        <td></td>
                        <td style="text-align: right">
                            <?php echo $user_detail['username'] ?><br>
                            <?php echo $user_detail['phone_number'] ?><br>
                            <?php echo $user_detail['email'] ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td>
                Booking
            </td>

            <td>
                Quantity
            </td>

            <td>
                Price
            </td>
        </tr>

        <tr class="details">
            <td>
                Number People
            </td>

            <td>
                <?php echo $booking_detail['number_people']?>
            </td>

            <td>
                <?php echo $cost?>
            </td>
        </tr>

        <tr class="heading">
            <td>
                Service
            </td>
            <td>
                Quantity
            </td>
            <td>
                Price
            </td>
        </tr>
    <?php for($i=0;$i<$k;$i++){
        if(intval($service_detail[$i]['quantity'])!=0){?>
        <tr class="item">
            <td>
                <?php for($j=0;$j<sizeof($advanced_service);$j++)
            if($service_detail[$i]['service_id']==$advanced_service[$j]['id']) echo $advanced_service[$j]['name'] ?>
            </td>

            <td>
                <?php echo $service_detail[$i]['quantity'] ?>
            </td>

            <td>
                <?php for($j=0;$j<sizeof($advanced_service);$j++){
                    if($service_detail[$i]['service_id']==$advanced_service[$j]['id'])
                        echo $advanced_service[$j]['price']*$service_detail[$i]['quantity'];}  ?>
            </td>
        </tr>
    <?php } }?>
        <tr class="total">
            <td ><Strong>Total</Strong></td>
            <td></td>
            <td>
                <strong><?php echo $booking_detail['cost']?></strong>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
