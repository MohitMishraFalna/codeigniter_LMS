<?php include_once(APPPATH.'views/header.php') ?>
<div class="card logincard mt-4" style="width: 18rem;">
    <div class="d-flex justify-content-center">
        <img src="<?= base_url('static/bootstrap/img/Loginfaveicon5.jpg');?>" width="100px" height="100px">
    </div>
  <div class="card-body">
        <?php echo form_open('LMS_Register/registration/userRegister', ['class'=>'form-horizontal', 'pageload' =>'emptyField()']);?>
            <div class="form-group">
                <label for="username">Username</label>
                <?php echo form_input(['name'=>'username','id'=>'username', 'placeholder'=>'Enter Username', 'class'=>'form-control']);?>
            </div>
            
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <?php echo form_input(['name'=>'usremail', 'type'=>'email', 'id'=>'email', 'placeholder'=>'Enter Email', 'class'=>'form-control']);?>
            </div>
            
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <?php echo form_password(['name'=>'pword', 'placeholder'=>'Enter Password', 'id'=>'pword', 'class'=>'form-control']);?>
            </div>
            
            <div class="form-group">
                <label for="exampleInputPassword1">Confirm Password</label>
                <?php echo form_password(['name'=>'conf_pword', 'placeholder'=>'Enter Confirm Password', 'id'=>'conf_pword', 'class'=>'form-control']);?>
            </div>
            
            <?php echo form_submit(['name'=>'submit', 'value'=>'Next', 'onclick'=>'emptyField()', 'class'=>'btn btn-primary']);?>
            <!-- < ?php echo form_submit(['name'=>'submit', 'value'=>'Reset', 'class'=>'btn btn-primary float-right']);?> -->
            <?php echo form_close();?>
  </div>
</div>
<script type="text/javascript">
    function emptyField(){
        var usr = document.getElementById('username').value;
        var usrEmail = document.getElementById('email').value;
        var usrPassword = document.getElementById('pword').value;
        var usrConfPword = document.getElementById('conf_pword').value;

        if(usr == ""){
            alert("Your Username is Required");
        }
        else if(usrEmail == ""){
            alert("Your Email is Required");
        }
        else if(usrPassword == "" && usrConfPword == ""){
            alert("Your Password and Confirmpassword are Required");
        }
        else if(usrPassword != usrConfPword){
            alert("Your Password And Confirm Password doesn't match.");
        }
    }
</script>
<?php include_once(APPPATH.'views/footer.php') ?>