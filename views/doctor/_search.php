<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DoctorsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="doctors-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'exp_edu_detail') ?>

    <?= $form->field($model, 'phone') ?>

    <?= $form->field($model, 'tel') ?>

    <?php // echo $form->field($model, 'timing') ?>

    <?php // echo $form->field($model, 'header_detail') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'create_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
