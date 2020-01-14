<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Receipts */

$this->title = "Mr No. ".$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Receipts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="receipts-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Print me', ['/receipt/report?id='.$model->id], ['class' => 'btn btn-success ']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            //'doctor_id',
            'patient.name',
            'body_deail:ntext',
            'symptoms:ntext',
            'diagnosis:ntext',
            'cilinical_note:ntext',
            'test_advised:ntext',
            'special_instruction:ntext',
            'next_visit',
            'created_at',
        ],
    ]) ?>
    <br/>
    <br/>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Medicine Suggested</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <table class="table table-condensed">
                <tbody><tr>
                    <th style="width: 10px">#</th>
                    <th>Medicine</th>
                    <th>Morning</th>
                    <th >Afternoon</th>
                    <th >Evening</th>
                </tr>
                <?php foreach ($model->mediciness as $key=>$medicine) { if($medicine->medicine){ ?>
                <tr>
                    <td><?=$key+1?></td>
                    <td><?=$medicine->medicine->name?></td>
                    <td><?=$medicine->morning?></td>
                    <td><?=$medicine->afternoon?></td>
                    <td><?=$medicine->evening?></td>
                </tr>
                <?php }} ?>

                </tbody></table>
        </div>
        <!-- /.box-body -->
    </div>
</div>
