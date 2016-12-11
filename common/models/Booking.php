<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "booking".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $table
 * @property integer $table_type
 * @property integer $number_people
 * @property string $employee_id
 * @property integer $eat_time
 * @property integer $book_time
 * @property string $book_status
 * @property integer $money_payed
 * @property integer $cost
 */
class Booking extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'booking';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'table', 'table_type', 'number_people', 'employee_id', 'eat_time', 'book_time'], 'required'],
            [['user_id', 'table', 'table_type', 'number_people', 'eat_time', 'book_time', 'money_payed', 'cost'], 'integer'],
            [['employee_id'], 'string', 'max' => 32],
            [['book_status'], 'string', 'max' => 255],
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
            'table' => Yii::t('app', 'Table'),
            'table_type' => Yii::t('app', 'Table Type'),
            'number_people' => Yii::t('app', 'Number People'),
            'employee_id' => Yii::t('app', 'Employee ID'),
            'eat_time' => Yii::t('app', 'Eat Time'),
            'book_time' => Yii::t('app', 'Book Time'),
            'book_status' => Yii::t('app', 'Book Status'),
            'money_payed' => Yii::t('app', 'Money Payed'),
            'cost' => Yii::t('app', 'Cost'),
        ];
    }
}
