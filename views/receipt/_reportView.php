
<div  style="width: 820px;">
    <table>
        <tbody>
            <tr>
                <td width="415px" style="border-bottom: 1px solid gray">
                    <?php if(isset($model->doctor)){
                        $exp_edu_detail=$model->doctor->exp_edu_detail;
                        $exp_edu_detail=explode(",",$exp_edu_detail);
                        ?>
                    <p style="font-weight: bolder; font-size: 28px"><?=$model->doctor->name ?></p>
                    <p >
                        <?php foreach ($exp_edu_detail as $exp){ ?>
                            <span><?=$exp?><br/></span>
                        <?php }?>
                    </p>
                    <?php } ?>
                </td>
                <td width="100px"></td>
                <td width="305px">
                    <div style="">
                        <br>
                        <p>Address:</p>
                        <?php if(isset($model->doctor)){
                        $exp_edu_detail=$model->doctor->address;
                        $address=explode(",",$exp_edu_detail);
                        ?>
                        <p style="font-size: 18px; font-weight: bolder"><?= (isset($address[0]))?$address[0]:""?></p>
                        <p ><?= (isset($address[1]))?$address[1]:""?></p>
                        <?php } ?>
                    </div>
                </td>
            </tr>

            <tr>
                <td colspan="3" height="80px">

                </td>
            </tr>

            <tr >
                <td colspan="3" style="width:  820px">
                    <table class="tabless" style="width:  820px" >
                        <tbody >
                            <tr >
                                <td width="70px" height="650px" style="border-right: 1px solid gray;vertical-align: top;">
                                    <table width="100px">
                                        <tbody>
                                            <tr>
                                                <td  height="120" style="border-bottom: 1px solid gray;vertical-align: top;" >
                                                    <span><?=$model->body_deail?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="120" style="border-bottom: 1px solid gray;vertical-align: top;">
                                                    <p><b>Diagnosis</b></p>
                                                    <br/>
                                                    <span><?=$model->diagnosis?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="120" style="border-bottom: 1px solid gray;vertical-align: top;">
                                                    <p><b>Symptoms</b></p>
                                                    <br/>
                                                    <span><?=$model->symptoms?></span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td height="120" style="border-bottom: 1px solid gray;vertical-align: top;">
                                                    <p><b>Test Advices</b></p>
                                                    <br/>
                                                    <span><?=$model->test_advised?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="120" style="vertical-align: top;">
                                                    <p><b>Clinical Note</b></p>
                                                    <br/>
                                                    <span><?= $model->cilinical_note?></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </td>
                                <td width="720px" height="650px" style="vertical-align: top;">
                                    <table class="" style="width: 720px;">
                                        <tbody>
                                        <?php if(isset($model->patient)){ ?>
                                            <tr style="border-bottom: 1px solid gray">
                                                <td><b>Name:</b></td>
                                                <td><?=$model->patient->name?></td>
                                                <td><b>Age:</b></td>
                                                <td><?=$model->patient->age?></td>
                                                <td><b>Gender: </b></td>
                                                <td><?=$model->patient->gender?></td>
                                            </tr>
                                        <?php } ?>
                                            <tr><td colspan="6" style="border-bottom: 1px solid gray;padding-top: -10px"><br></td></tr>
                                            <tr>
                                                <td colspan="3" style="text-align: center;font-weight: bold">Medicines</td>
                                                <td><b>Morning</b></td>
                                                <td><b>Afternoon</b></td>
                                                <td><b>Evening</b></td>
                                            </tr>
                                            <tr><td colspan="6"><br></td></tr>
                                            <?php foreach ($model->mediciness as $key=>$medicine) { if($medicine->medicine){ ?>
                                            <tr >
                                                <td colspan="3" height="40px"><?=$medicine->medicine->name?></td>
                                                <td><?=$medicine->morning?></td>
                                                <td><?=$medicine->afternoon?></td>
                                                <td><?=$medicine->evening?></td>
                                            </tr>
                                        <?php }} ?>

                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3"><br></td>
            </tr>
            <tr >
                <td colspan="3" >
                    <table style="width: 100%" width="100%" >
                        <tbody>
                            <tr>
                                <td width="70%">Special Instruction:</td>
                                <td width="30%" style="text-align: right">Next Visit:_________________</td>

                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3" height="400px"></td>
            </tr>
            <tr >
                <td colspan="3" >
                    <table style="width: 100%" width="100%" >
                        <tbody>
                        <tr>
                            <td width="40%"><b>Not Valid for court evidence</b></td>
                            <td width="30%">
                                <?php if(isset($model->doctor)){
                                ?>
                                For Appointment:<br></br><?=$model->doctor->phone?><br><?=$model->doctor->tel?></td>
                            <?php }?>

                            <td width="30%" style="text-align: right">

                                <?php if(isset($model->doctor)){
                                $exp_edu_detail=$model->doctor->timing;
                                $address=explode(",",$exp_edu_detail);
                                ?>
                                <?=(isset($address[0]))?$address[0]:""?>
                            <br><span style="background-color: #0f0f0f;color: white"> <?=(isset($address[1]))?$address[1]:""?></span>
                            <?php } ?>
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>


</div>
<br/>
