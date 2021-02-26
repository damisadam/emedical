<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PatientVisits */

$this->title = 'Update Patient Visits: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Patient Visits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="patient-visits-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
