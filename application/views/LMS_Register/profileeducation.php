<?php include_once(APPPATH.'views/header.php') ?>
<div class="card logincard" style="width: 18rem;">
    <div class="d-flex justify-content-center">
        <img src="<?= base_url('static/bootstrap/img/education3.png');?>" width="150px" height="100px">
    </div>
  <div class="card-body">
        <form action="<?= base_url('LMS_Register/registration/profileeducation');?>" method="GET">
            <div class="form-group">
                <label for="username">Class Name</label>
                <input type="text" class="form-control" id="class_name" name="class_name" aria-describedby="class_name" placeholder="Enter Class Name">               
            </div>
            
            <div class="form-group">
                <label for="exampleInputEmail1">Passing Year</label>
                <input type="date" class="form-control" id="passed_year" name="passed_year" aria-describedby="passed_year">               
            </div>
            
            <div class="form-group">
                <label for="exampleInputPassword1">Percentage</label>
                <input type="text" class="form-control" id="percentage" name="percentage" placeholder="Percentage">
            </div>            
            <button type="submit" class="btn btn-primary" onclick="emptyField()">Submit</button>
            <a href="<?= base_url('LMS_Register/registration/profileupdate');?>" class="btn btn-primary">Skip</a>
        </form>
  </div>
</div>
<script type="text/javascript">
    function emptyField(){
        var className = document.getElementById('class_name').value;
        var passedYear = document.getElementById('passed_year').value;
        var percentage = document.getElementById('percentage').value;
        if(className == ""){
            alert("Your Class Name is Required");
        }
        else if(passedYear == ""){
            alert("Your Passed Year is also Required");
        }
        else if(percentage == ""){
            alert("Your Percentage is also Required");
        }
    }
</script>
<?php include_once(APPPATH.'views/footer.php') ?>