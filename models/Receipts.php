<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "receipts".
 *
 * @property int $id
 * @property int $doctor_id
 * @property int $patient_id
 * @property string|null $body_deail
 * @property string|null $symptoms
 * @property string|null $diagnosis
 * @property string|null $cilinical_note
 * @property string|null $test_advised
 * @property string|null $special_instruction
 * @property string|null $next_visit
 * @property string $created_at
 */
class Receipts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'receipts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['doctor_id', 'patient_id'], 'required'],
            [['doctor_id', 'patient_id'], 'integer'],
            [['body_deail', 'symptoms', 'diagnosis', 'cilinical_note', 'test_advised', 'special_instruction'], 'string'],
            [['created_at'], 'safe'],
            [['next_visit'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Mr No.',
            'doctor_id' => 'Doctor ID',
            'patient_id' => 'Patient ID',
            'body_deail' => 'Body Deail',
            'symptoms' => 'Symptoms',
            'diagnosis' => 'Diagnosis',
            'cilinical_note' => 'Cilinical Note',
            'test_advised' => 'Test Advised',
            'special_instruction' => 'Special Instruction',
            'next_visit' => 'Next Visit',
            'created_at' => 'Created At',
        ];
    }

    public function getMedicines() {
        return $this->hasMany(Medicines::className(), ['id' => 'medicine_id'])
            ->viaTable('receipt_medicine', ['receipt_id' => 'id']);
    }
    public function getMediciness() {
        return $this->hasMany(ReceiptMedicine::className(), ['receipt_id' => 'id']);

    }

    public function getDoctor() {
        return $this->hasOne(Doctors::className(), ['id'=> 'doctor_id']);
    }
    public function getPatient() {
        return $this->hasOne(Patients::className(), ['id'=> 'patient_id']);
    }

    public function getSpecialtiesList(){
        return ArrayHelper::map(Patients::find()->all(),'id','name');
    }

    public function getMediList(){
        return ArrayHelper::map(Medicines::find()->all(),'id','name');
    }
}
