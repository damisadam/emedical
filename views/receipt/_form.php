<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Receipts */
/* @var $form yii\widgets\ActiveForm */
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<div class="receipts-form" id="app">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-6">
                <?= $form->field($model, 'patient_id')->dropDownList($model->getSpecialtiesList(),['prompt'=>'Select Patient ','class'=>"js-example-basic-single form-control"]) ?>

            </div>
            <div class="col-lg-6" style="margin-top: 25px;">
                <button type="button" class="btn btn-primary" @click="addPatient" data-target="#modal-general">Add Patient <i class="fa fa-plus"></i></button>

            </div>
        </div>


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
        <div style="display: inline-flex;    margin: 10px;">
            <h4>Medicine Suggested &nbsp;&nbsp;&nbsp;</h4>
            <button type="button" class="btn btn-primary" @click="addMedice" data-target="#modal-medicne">Add Medicine  <i class="fa fa-plus"></i></button>
        </div>

        <div class="input-group">
            <div class="col-lg-6">
                <select class="js-example-basic-single form-control medi_class" name="medi[]">
                    <option value="">Please select Medicine</option>
                    <?php foreach (\app\models\Receipts::getMediList() as $key=>$medi){ ?>

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
    <div class="form-group fieldGroupCopy" style="display: none">
        <div class="input-group">
            <div class="col-lg-6">
                <?=
                Select2::widget([
                    'name' => 'medi[]',
                    'data' => $model->getMediList(),
                    'options' => ['class'=>'form-control medi_class', 'placeholder' => 'Please select Medicine ...']
                ]);
                ?>
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

    <div class="modal fade" id="modal-general" tabindex="-1" role="dialog" aria-labelledby="confirmDelete" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title"><span id="title">Patient Detail</span></h3>
                </div>
                <div class="modal-body">
                    <span style="color: red" v-if="message">{{message}}</span>
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="title">Name</label>
                                    <input class="form-control" placeholder="Name" id="patient_name" name="patient_name" type="text" v-model="receipt.patient.name">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="title">So/DO/WO</label>
                                    <input class="form-control" placeholder="So/DO/WO" id="so_name" name="so_name" type="text" v-model="receipt.patient.so">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="title">Age</label>
                                    <input class="form-control" placeholder="Age" id="age_name" name="age_name" type="text" v-model="receipt.patient.age">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="title">Gender</label>
                                    <select class="form-control" id="gender" name="gender"   v-model="receipt.patient.gender">
                                        <option s value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="title">Phone</label>
                                    <input class="form-control" placeholder="Phone" id="phone" name="phone" type="text" v-model="receipt.patient.phone">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="title">Address</label>
                                    <input class="form-control" placeholder="Address" id="address" name="address" type="text" v-model="receipt.patient.address">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="col-sm-4" style="padding-top: 25px">
                                <button class="btn btn-primary" @click="savePatient()"  >
                                    <section v-if="loading">
                                        Saving <i class="fa fa-spinner fa-spin"></i>
                                    </section>
                                    <section v-else>
                                        Save
                                    </section>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-medicne" tabindex="-1" role="dialog" aria-labelledby="confirmDelete" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title"><span id="title">Add Medicine</span></h3>
                </div>
                <div class="modal-body">
                    <span style="color: red" v-if="message">{{message}}</span>
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="title">Name</label>
                                    <input class="form-control" placeholder="Name" id="medi_name" name="medi_name" type="text" v-model="receipt.medicine.name">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="title">Detail</label>
                                    <input class="form-control" placeholder="Detail" id="detail_name" name="detail_name" type="text" v-model="receipt.medicine.detail">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 ">
                            <div class="col-sm-4" style="padding-top: 25px">
                                <button class="btn btn-primary" @click="saveMedicine()"  >
                                    <section v-if="loading">
                                        Saving <i class="fa fa-spinner fa-spin"></i>
                                    </section>
                                    <section v-else>
                                        Save
                                    </section>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/vue"></script>
<script src="https://unpkg.com/axios/dist/axios.js"></script>
<script src="https://unpkg.com/vue-single-select@latest"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script type="text/javascript">
    Vue.filter('formatDate', function(value) {
        if (value) {
            return moment(String(value)).format('MMMM Do YYYY, HH:mm:ss a')
        }
    });

    new Vue({
        el: '#app',
        data:function() {
            return {
                receipt: {
                    doctor: {
                        id: 1
                    },
                    patient: {
                        name: '',
                        age: '',
                        so: '',
                        gender: '',
                        phone: '',
                        address: ''
                    },
                    body_detail: {
                        pulse: '',
                        temp: '',
                        rr: '',
                        bp: '',
                        weight: '',
                        height: '',
                        bmi: ''
                    },
                    medicine: {
                        name: '',
                        detail: ''
                    },
                    medicines: {
                        id: '',
                        morning: true,
                        afternoon: true,
                        evening: true
                    },
                    symptoms: '',
                    diagnosis: '',
                    cilinical_note: '',
                    test_advised: '',
                    special_instruction: '',
                    next_visit: ''
                },
                patients:[],
                medicine_list:[],
                yes_no:[0,1],
                loading:false,
                message:''
            }
        },
        computed: {

        },
        created: function(){
            this.getPatients();
            this.getMedicns();

        },
        methods: {
            getPatients: function () {
                axios.get('/receipt/patients')
                    .then((response)=>{
                    this.patients = response.data;
            })
            .catch(function (error) {
                    console.log(error);
                })
                    .finally(() => {});
            },
            getMedicns: function () {
                axios.get('/receipt/medicines')
                    .then((response)=>{
                    this.medicine_list = response.data;
            })
            .catch(function (error) {
                    console.log(error);
                })
                    .finally(() => {});
            },
            addPatient: function () {
                this.message='';
                $('#modal-general').modal('show');
            },
            addMedice: function () {
                this.message='';
                $('#modal-medicne').modal('show');
            },
            savePatient: function () {

                if(this.receipt.patient.name==""){
                    alert("Please patient name");
                    return false;
                }
                this.loading=true;
                axios.post('/patient/save',this.receipt)
            .then((response)=>{
                    var optionValue=response.data.id
                    var optionText=response.data.id+" "+response.data.name
               $('#receipts-patient_id').append('<option selected value='+optionValue+'>'+optionText+'</option>');
                this.message='Patient is added.';

            }).catch(function (error) {
                    console.log(error);
                }).finally(() => {
                    this.loading=false;
            });
            },
            saveMedicine: function () {

                if(this.receipt.medicine.name==""){
                    alert("Please medicine name");
                    return false;
                }
                this.loading=true;
                axios.post('/patient/medi',this.receipt)
                    .then((response)=>{
                    var optionValue=response.data.id
                    var optionText=response.data.name
                    $('.medi_class').append('<option  value='+optionValue+'>'+optionText+'</option>');
                this.message='Medicine is added.';
                this.getMedicns();
            }).catch(function (error) {
                    console.log(error);
                }).finally(() => {
                    this.loading=false;
            });
            }
        },
        mounted(){


        }
    })


</script>
<script>
    $(document).ready(function(){
        $('.js-example-basic-single').select2();
        //group add limit
        var maxGroup = 10;

        //add more fields group
        $(".addMore").click(function(){

            if($('body').find('.fieldGroup').length < maxGroup){

                axios.get('/receipt/form')
                    .then((response)=>{
                    var test = response.data;
                var fieldHTML = '<div class="form-group fieldGroup">'+test+'</div>';
                $('body').find('.fieldGroup:last').after(fieldHTML);
                $('.js-example-basic-single').select2();
            })
            .catch(function (error) {
                    console.log(error);
                })
                    .finally(() => {});

            /*    var fieldHTML = '<div class="form-group fieldGroup">'+$(".fieldGroupCopy").html()+'</div>';
                $('body').find('.fieldGroup:last').after(fieldHTML);*/
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
