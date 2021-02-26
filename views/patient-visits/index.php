<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PatientVisitsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Patient Visits';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-visits-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Patient Visits', ['visit','id'=>$id], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'summery:ntext',
            'status',
            'created_at:datetime',
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update} {view}'

            ],
        ],
    ]); ?>


</div>
