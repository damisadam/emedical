<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Receipts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="receipts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'doctor_id')->textInput() ?>

    <?= $form->field($model, 'patient_id')->textInput() ?>

    <?= $form->field($model, 'body_deail')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'symptoms')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'diagnosis')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cilinical_note')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'test_advised')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'special_instruction')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'next_visit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
