<?php include_once(APPPATH.'views/header.php') ?>
<div class="card logincard" style="width: 18rem;">
    <div class="d-flex justify-content-center">
        <img src="<?= base_url('static/bootstrap/img/profile4.jpg');?>" width="100px" height="100px">
    </div>
    <div class="card-body">
        <!-- <form action="<?php //echo base_url('LMS_Register/registration/profileupdate');?>" encript="multipart" method="POST"> -->
        <?php echo form_open_multipart('LMS_Register/registration/profileupdate');?>
            <div class="form-group">
            <label for="username">Contact No.</label>
                <input type="text" class="form-control" id="contact_no" name="contact_no" aria-describedby="contact_no" placeholder="Enter Contact No.">               
            </div>
            
            <div class="form-group">
                <label for="username">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" aria-describedby="dob">
            </div>
            
            <div class="form-group">
                <label for="exampleFormControlFile1">Upload Signature</label>
                <input type="file" class="form-control-file" id="upload_signature" name="upload_signature">
            </div>            
            
            <div class="form-group">
                <label for="exampleFormControlFile1">Upload Photo</label>
                <input type="file" class="form-control-file" id="upload_photo" name="upload_photo">
            </div>            
            <button type="submit" class="btn btn-primary" onclick="emptyField()">Submit</button>
            <a href="<?= base_url('LMS_Login/login');?>" class="btn btn-primary">Skip</a>
        </form>
    </div>
</div>
<script type="text/javascript">
    function emptyField(){
        var contactNo = document.getElementById('contact_no').value;
        var dateOfBirth = document.getElementById('dob').value;
        var uploadSignature = document.getElementById('upload_signature').value;
        var uploadImage = document.getElementById('upload_photo').value;

        if(contactNo == ""){
            alert("Your Contact Number is also Required");
        }
        else if(dateOfBirth == ""){
            alert("Your Date of Birth is also Required");
        }
        else if(uploadSignature == ""){
            alert("Your Signature also Required");
        }
        else if(uploadImage == ""){
            alert("Your Image is also Required.");
        }
    }
</script>
<?php include_once(APPPATH.'views/footer.php') ?>