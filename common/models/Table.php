<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "table".
 *
 * @property integer $id
 * @property string $name
 * @property integer $status
 * @property string $description
 * @property string $image
 * @property integer $price
 */
class Table extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'table';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['status', 'price'], 'integer'],
            [['name', 'description', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'status' => 'Status',
            'description' => 'Description',
            'image' => 'Image',
            'price' => 'Price',
        ];
    }
}
