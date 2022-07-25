<?php include_once(APPPATH.'views/header.php') ?>
<?php if($error = $this->session->flashdata('emailnotfound')): ?>
    <div class="alert alert-danger">
        <?php echo $error; ?>
    </div>
<?php endif; ?>
<div class="card logincard mt-4" style="width: 18rem;">
    <div class="d-flex justify-content-center">
        <img src="<?= base_url('static/bootstrap/img/Loginfaveicon5.jpg');?>" width="100px" height="100px">
    </div>
    <div class="card-body">
        <?php echo form_open('LMS_Login/login/newPasswordUpdate', ['class'=>'form-horizontal', 'pageload' =>'emptyField()']);?>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <?php echo form_input(['name'=>'usremail', 'type'=>'email', 'id'=>'email', 'placeholder'=>'Enter Email', 'class'=>'form-control']);?>
            </div>
            <?php echo form_submit(['name'=>'submit', 'value'=>'Submit', 'onclick'=>'emptyField()', 'class'=>'btn btn-primary']);?>
            <?php echo form_close();?>
    </div>
</div>
<script type="text/javascript">
    function emptyField(){
        var usrEmail = document.getElementById('email').value;
        if(usrEmail == ""){
            alert("Your Email is Required");
        }
    }
</script>
<?php include_once(APPPATH.'views/footer.php') ?>