<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PatientVisits */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-visits-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'patient_id')->hiddenInput() ?>

    <?= $form->field($model, 'summery')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
