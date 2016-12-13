<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%booking}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $table_id
 * @property integer $table_type
 * @property integer $number_people
 * @property string $employee_id
 * @property string $eat_time
 * @property integer $shift
 * @property integer $book_time
 * @property string $book_status
 * @property integer $money_payed
 * @property integer $cost
 */
class Booking extends \yii\db\ActiveRecord
{
    public $table_check = array();
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%booking}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'table_id', 'table_type', 'number_people', 'employee_id', 'eat_time', 'shift', 'book_time'], 'required'],
            [['user_id', 'table_type', 'number_people', 'shift','money_payed', 'cost'], 'integer'],
            [['eat_time'], 'safe'],
            [['table_id', 'book_status'], 'string', 'max' => 255],
            [['employee_id'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'table_id' => Yii::t('app', 'Bàn'),
            'table_type' => Yii::t('app', 'Table Type'),
            'number_people' => Yii::t('app', 'Số xuất ăn'),
            'employee_id' => Yii::t('app', 'Employee ID'),
            'eat_time' => Yii::t('app', 'Ngày ăn'),
            'shift' => Yii::t('app', 'Thời gian'),
            'book_time' => Yii::t('app', 'Book Time'),
            'book_status' => Yii::t('app', 'Book Status'),
            'money_payed' => Yii::t('app', 'Money Payed'),
            'cost' => Yii::t('app', 'Cost'),
        ];
    }

    /**
     * @inheritdoc
     * @return BookingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BookingQuery(get_called_class());
    }
}
