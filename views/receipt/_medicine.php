
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
            <a href="javascript:void(0)" class="btn btn-danger remove"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a>
        </div>
    </div>
