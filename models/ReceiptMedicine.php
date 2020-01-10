<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "receipt_medicine".
 *
 * @property int $id
 * @property int $receipt_id
 * @property int $medicine_id
 * @property int $morning
 * @property int $afternoon
 * @property int $evening
 */
class ReceiptMedicine extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'receipt_medicine';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['receipt_id', 'medicine_id'], 'required'],
            [['receipt_id', 'medicine_id', 'morning', 'afternoon', 'evening'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'receipt_id' => 'Receipt ID',
            'medicine_id' => 'Medicine ID',
            'morning' => 'Morning',
            'afternoon' => 'Afternoon',
            'evening' => 'Evening',
        ];
    }

    public function getMedicine() {
        return $this->hasOne(Medicines::className(), ['id'=> 'medicine_id']);
    }
}
