<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PatientVisits */

$this->title = 'Create Patient Visits';
$this->params['breadcrumbs'][] = ['label' => 'Patient Visits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-visits-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
