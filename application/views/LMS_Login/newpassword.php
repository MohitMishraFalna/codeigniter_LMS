<?php include_once(APPPATH.'views/header.php') ?>
<div class="card logincard mt-4" style="width: 18rem;">
    <div class="d-flex justify-content-center">
        <img src="<?= base_url('static/bootstrap/img/Loginfaveicon5.jpg');?>" width="100px" height="100px">
    </div>
  <div class="card-body">
        <?php echo form_open('LMS_Login/login/newPassword', ['class'=>'form-horizontal', 'pageload' =>'emptyField()']);?>
            <div class="form-group">
                <label for="exampleInputPassword1">New Password</label>
                <?php echo form_password(['name'=>'pword', 'placeholder'=>'Enter Password', 'id'=>'pword', 'class'=>'form-control']);?>
                <input type="hidden" name="hide_value" value="<?php if(isset($email)){echo $email->emp_email;} ?>">
            </div>
            
            <div class="form-group">
                <label for="exampleInputPassword1">Confirm Password</label>
                <?php echo form_password(['name'=>'conf_pword', 'placeholder'=>'Enter Confirm Password', 'id'=>'conf_pword', 'class'=>'form-control']);?>
            </div>
            
            <?php echo form_submit(['name'=>'submit', 'value'=>'Submit', 'onclick'=>'emptyField()', 'class'=>'btn btn-primary']);?>
            <?php echo form_close();?>
  </div>
</div>
<script type="text/javascript">
    function emptyField(){
        var usrPassword = document.getElementById('pword').value;
        var usrConfPword = document.getElementById('conf_pword').value;
        if(usrPassword == "" && usrConfPword == ""){
            alert("Your Password and Confirmpassword are Required");
        }
        else if(usrPassword != usrConfPword){
            alert("Your Password And Confirm Password doesn't match.");
        }
    }
</script>
<?php include_once(APPPATH.'views/footer.php') ?>