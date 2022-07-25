<?php include_once(APPPATH.'views/header.php'); ?>
    <div class="row" style="margin:3%;">
        <div class="col-sm-6 offset-sm-3">
            <div class="card">
                <div class="card-header"><h4>Change Password</h4></div>
                <div class="card-body">
                    <span><img id="image" src="<?php echo base_url('static/bootstrap/img/changepasswordlogo.jpg');?>" style="height:150px; width:150px; float:right;" onclick="imageUpload()">
                    <form action="<?= base_url('/LMS_Login/updateprofile/updateUserProfilePassword')?>" method="POST">
                        <?php if($userData):
                            foreach($userData as $usrData):?>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="inputPassword" class="col-form-label">Email Address:</label>
                                        <input type="text" class="form-control " id="email" name="email" value="<?php echo $usrData['emp_email'];?>" placeholder="Enter Your Email Address.">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="inputPassword" class="col-form-label">Old Password: </label>
                                        <input type="text" class="form-control" id="old_password" name="old_password" value="<?php echo $usrData['emp_pwd'];?>" placeholder="Enter Your Old Password.">
                                    </div>
                                </div>
                            </div> 
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="inputPassword" class="col-form-label">New Password:</label>
                                        <input type="text" class="form-control" id="new_password" name="new_password" placeholder="Enter Your New Password.">
                                    </div>
                                </div>
                            </div> 
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="inputPassword" class="col-form-label">Confirm Password: </label>
                                        <input type="text" class="form-control" id="conf_pass" name="conf_pass" placeholder="Enter Confirm Password.">
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;
                        endif;?> 
                        <div>
                            <button class="btn btn-warning btnwidth" onclick="valid()">Submit</button>
                            <a href="http://" class="btn btn-primary btnwidth">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function valid(){
            var pass = document.getElementById('new_password');
            var conf_pass = document.getElementById('conf_pass');

            if(pass == " " && conf_pass == " "){
                alert("Your Password and Confirmpassword Empty. Please Fill both fields.");
                return false;
            }
            if(pass != conf_pass){
                alert("Your Password And Confirm Password doesn't match.");
                return false;
            }
        }
    </script>
<?php include_once(APPPATH.'views/footer.php'); ?>