<?php include_once(APPPATH.'views/header.php') ?>
<?php if($error = $this->session->flashdata('login_failed')):?>
    <div class="alert alert-dismissible  alert-danger">
        <?php echo $error; ?>
    </div>
<?php endif; ?>
<div class="card logincard" style="width: 18rem;">
    <div class="d-flex justify-content-center">
        <img src="<?= base_url('static/bootstrap/img/Loginfaveicon1.png');?>" width="100px" height="100px">
    </div>
  <div class="card-body">
        <form action="<?= base_url('LMS_Login/login/');?>" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">               
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary" onclick="emptyField()">Submit</button>
        </form>
  </div>
</div>
<script type="text/javascript">
    function emptyField(){
        var useremail = document.getElementById('email').value;
        var userpassword = document.getElementById('password').value;
        if(useremail == ""){
            alert("Your Email is Required");
        }

        if(userpassword == ""){
            alert("Your Password is Required");
        }
    }
</script>
<?php include_once(APPPATH.'views/footer.php') ?>