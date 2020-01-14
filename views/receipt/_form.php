<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Receipts */
/* @var $form yii\widgets\ActiveForm */
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="receipts-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-lg-12">
    <?= $form->field($model, 'patient_id')->dropDownList($model->getSpecialtiesList(),['prompt'=>'Select Patient ']) ?>

    <div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <h4>Body Detail</h4>
            <div class="col-lg-1">
                <label>Pulse</label>
                <input type="text" name="pluse" class="form-control" placeholder="Temp"/>
            </div>
            <div class="col-lg-1">
                <label>Temp</label>
                <input type="text" name="temp" class="form-control" placeholder="Temp"/>
            </div>
            <div class="col-lg-1">
                <label>R/R</label>
                <input type="text" name="rr" class="form-control" placeholder="R/R"/>
            </div>
            <div class="col-lg-1">
                <label>BP</label>
                <input type="text" name="BP" class="form-control" placeholder="BP"/>
            </div>
            <div class="col-lg-1">
                <label>Weight</label>
                <input type="text" name="weight" class="form-control" placeholder="Weight"/>
            </div>
            <div class="col-lg-1">
                <label>Height</label>
                <input type="text" name="height" class="form-control" placeholder="Height"/>
            </div>
            <div class="col-lg-1">
                <label>BMI</label>
                <input type="text" name="bmi" class="form-control" placeholder="BMI"/>
            </div>
        </div>
    </div>
    </div>
    <br>
    <div class="form-group fieldGroup">
        <h4>Medicine Suggested</h4>
        <div class="input-group">
            <div class="col-lg-6">
                <select  class="form-control" name="medi[]">
                    <option value="">Please select Medicine</option>
                    <?php foreach ($model->getMediList() as $key=>$medi){ ?>

                        <option value="<?=$key?>"><?=$medi?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-lg-2">
                <select  class="form-control" name="morning[]">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
            <div class="col-lg-2">
                <select  class="form-control" name="afternoon[]">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
            <div class="col-lg-2">
                <select  class="form-control" name="evening[]">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>

            <div class="input-group-addon" style="    padding: 0">
                <a href="javascript:void(0)" class="btn btn-success addMore"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add</a>
            </div>
        </div>
    </div>

    </div>
    <div class="col-lg-12">
        <div class="col-lg-6">
    <?= $form->field($model, 'symptoms')->textarea(['rows' => 2]) ?>
        </div>
        <div class="col-lg-6">
    <?= $form->field($model, 'diagnosis')->textarea(['rows' => 2]) ?>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="col-lg-6">
    <?= $form->field($model, 'cilinical_note')->textarea(['rows' => 2]) ?>
        </div>
        <div class="col-lg-6">
    <?= $form->field($model, 'test_advised')->textarea(['rows' => 2]) ?>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="col-lg-6">
    <?= $form->field($model, 'next_visit')->input('date',['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>



    <!-- copy of input fields group -->
    <div class="form-group fieldGroupCopy" style="display: none;">
        <div class="input-group">
            <div class="col-lg-6">
                <select  class="form-control" name="medi[]">
                    <option value="">Please select Medicine</option>
                    <?php foreach ($model->getMediList() as $key=>$medi){ ?>

                        <option value="<?=$key?>"><?=$medi?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-lg-2">
                <select  class="form-control" name="morning[]">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
            <div class="col-lg-2">
                <select  class="form-control" name="afternoon[]">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
            <div class="col-lg-2">
                <select  class="form-control" name="evening[]">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
            <div class="input-group-addon" style="    padding: 0">
                <a href="javascript:void(0)" class="btn btn-danger remove"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a>
            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function(){
        //group add limit
        var maxGroup = 10;

        //add more fields group
        $(".addMore").click(function(){
            if($('body').find('.fieldGroup').length < maxGroup){
                var fieldHTML = '<div class="form-group fieldGroup">'+$(".fieldGroupCopy").html()+'</div>';
                $('body').find('.fieldGroup:last').after(fieldHTML);
            }else{
                alert('Maximum '+maxGroup+' groups are allowed.');
            }
        });

        //remove fields group
        $("body").on("click",".remove",function(){
            $(this).parents(".fieldGroup").remove();
        });
    });
</script>
