<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReceiptsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="receipts-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'doctor_id') ?>

    <?= $form->field($model, 'patient_id') ?>

    <?= $form->field($model, 'body_deail') ?>

    <?= $form->field($model, 'symptoms') ?>

    <?php // echo $form->field($model, 'diagnosis') ?>

    <?php // echo $form->field($model, 'cilinical_note') ?>

    <?php // echo $form->field($model, 'test_advised') ?>

    <?php // echo $form->field($model, 'special_instruction') ?>

    <?php // echo $form->field($model, 'next_visit') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
