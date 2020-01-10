<?php

/* @var $this yii\web\View */

$this->title = 'E-Medical';
?>
<div class="site-index">

    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Patients</span>
                    <span class="info-box-number"><?=$patients?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-files-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Reciepts</span>
                    <span class="info-box-number"><?=$rec?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-star-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Medicines</span>
                    <span class="info-box-number"><?=$medi?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-file"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Today Patients</span>
                    <span class="info-box-number"><?=$rect?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
</div>
