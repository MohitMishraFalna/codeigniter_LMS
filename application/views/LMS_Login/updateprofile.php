<?php include_once(APPPATH."views/header.php"); ?>
<div class="card cardContainer">
    <div class="card-header styleHeader"><h3>Update Your Profile.
            <div id = "updateimage" class="updateimage effect">
                <?php if($userData):
                    foreach($userData as $usrData):?>
                        <img src="<?php echo $usrData['emp_Image'];?>" id="image">
                <?php endforeach;
                endif;?>
                <div id="text">
                    <form action="<?php echo base_url('LMS_Login/updateprofile/saveProfileImage');?>" id="addmemberForm" enctype="multipart/form-data" method="post">
                        <input type="file" name="file" id="file" class="form-control-file btn btn-sm d-flex justify-content-center">
                    </form>
                </div>
            </div>
        </h3>            
    </div><hr>
    <div class="card-body">
        <form  enctype="multipart/form-data" action="<?php echo base_url('LMS_Login/updateprofile/upadateUserDetail');?>" method="post">
        <!-- < ?php echo form_open_multipart('LMS_Login/updateprofile/upadateUserDetail');?> -->
            <?php if($userData):
            // echo '<pre>';
            // print_r($userData);
            // echo '</pre>';
            // exit;
            foreach($userData as $usrData):?>
                <h5 for="formGroupExampleInput" class="mb-3">Employee Personal Details:</h5>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Employee Name:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="emp_name" value="<?php echo $usrData["emp_name"]; ?>" placeholder="Enter Employee Name">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Employee Contact:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="emp_contact" value="<?php echo $usrData["emp_contact"]; ?>" placeholder="Enter Employee contact">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Employee Roll:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="emp_roll" value="<?php echo $usrData["emp_roll"]; ?>" placeholder="Enter Employee Roll">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Employee Email:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" name="emp_email" value="<?php echo $usrData["emp_email"]; ?>" placeholder="Enter Employee Email">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Employee Date of Birth:</label>
                            <input type="date" class="form-control" id="formGroupExampleInput2" name="emp_dob" value="<?php echo $usrData["emp_dob"]; ?>" placeholder="Enter Employee Date of Birth">
                        </div>
                    </div>
                </div><hr>
                
                <h5 for="formGroupExampleInput" class="mt-3 mb-3">Employee Highest Education Details:</h5>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Employee Class:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="emp_class" value="<?php echo $usrData["emp_classname"]; ?>" placeholder="Enter Employee Class">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Employee Passing Year:</label>
                            <input type="date" class="form-control" id="formGroupExampleInput" name="emp_passinyear" value="<?php echo $usrData["emp_passingyear"]; ?>" placeholder="Enter Employee Passing Year">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Employee Percentage:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="emp_percent" value="<?php echo $usrData["emp_percent"]; ?>" placeholder="Enter Employee percentage">
                        </div>
                    </div>
                </div><hr>
                <h5 for="formGroupExampleInput" class="mt-3 mb-3">Employee Parmanant Address:</h5>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Pincode:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="pincode" value="<?php echo $usrData["emp_pincode"]; ?>" placeholder="Enter Employee pincode">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="formGroupExampleInput">City Name:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="city_name" value="<?php echo $usrData["emp_cityname"]; ?>" placeholder="Enter Employee city name">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="formGroupExampleInput">District Name:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="district_name" value="<?php echo $usrData["emp_districtname"]; ?>" placeholder="Enter Employee District name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="formGroupExampleInput">State Name:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="state_name" value="<?php echo $usrData["emp_state"]; ?>" placeholder="Enter Employee state name">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Contry Name:</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="contry_name" value="<?php echo $usrData["emp_contry"]; ?>" placeholder="Enter Employee contry name">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Upload Signature</label>
                            <img src="<?php echo $usrData["emp_signature"];?>" height="100px" width="80px">
                            <input type="file" class="form-control-file" id="upload_signature" name="upload_signature">
                        </div> 
                    </div>
                </div><hr>
            <?php 
                endforeach;
                endif;?>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-primary btnwidth">Submit</button>
                    <button type="button" class="btn btn-warning btnwidth">Back</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include_once(APPPATH."views/footer.php"); ?>
<script>                   
    $(document).ready(function(){
        $("#file").on('change', function(){
            var fileData = $('input[type=file]')[0].files[0];
            var imageName = fileData['name'];
            var imageSize = fileData['size'];
            var data = new FormData();
            var imageExtension = imageName.split('.').pop().toLowerCase();
            data.append("imagefile",fileData);          
            if(imageExtension == 'gif' || imageExtension == 'png' || imageExtension == 'jpg' || imageExtension == 'jpeg'){
                if(imageSize <= 2000000){
                    $.ajax({
                        url:"<?php echo base_url("LMS_Login/Updateprofile/saveProfileImage")?>",
                        type:"POST",
                        data:data,                                                                                                         
                        processData: false,
                        contentType: false,
                        success:function(data){
                            var displayImage = JSON.parse(data);
                            $("#image").attr('src',displayImage);
                        }
                    });
                }else{
                    alert("Your Image Size is bigger then 2mb.");
                }                
            }else{
                alert("Your Image Extension is not Supported.");
            }
        });
    });
</script>