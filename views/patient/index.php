<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PatientsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Patients';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patients-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add Patients', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'mrn',
            'name',
            //'so_name',
            'phone',
            //'address',
            'created_at:datetime',

            [
                'label' => 'Create Visits',
                'format' => 'raw',
                'value' => function($mode){
                    return Html::a('Create Visits', ['/patient-visits/visit?id='.$mode->id], ['class' => 'btn btn-success btn-xs']);
                }
            ],
            [
                'label' => 'Visits',
                'format' => 'raw',
                'value' => function($mode){
                    return Html::a('Visits', ['/patient-visits?id='.$mode->id], ['class' => 'btn btn-success btn-xs']);
                }
            ],

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update}'

            ],
        ],
    ]); ?>


</div>
