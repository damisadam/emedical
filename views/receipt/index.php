<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReceiptsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Receipts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receipts-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Receipts', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'doctor_id',
            [
                'attribute' => 'patient_id',
                'filter'=>$searchModel->getSpecialtiesList(),
                'value' => function ($model) {   //<----- ERROR HERE!
                    return isset($model->patient)?$model->patient->name:"";
                },
            ],
            //'patient_id',
            //'body_deail:ntext',
            //'symptoms:ntext',
            //'diagnosis:ntext',
            //'cilinical_note:ntext',
            //'test_advised:ntext',
            //'special_instruction:ntext',
            'next_visit',
            'created_at',
            [
                'label' => 'Print',
                'format' => 'raw',
                'value' => function($mode){
                return Html::a('Print me', ['/receipt/report?id='.$mode->id], ['class' => 'btn btn-success btn-xs']);
                }
            ],

            ['class' => 'yii\grid\ActionColumn',      'template' => '{report} {view}'],
        ],
    ]); ?>


</div>
