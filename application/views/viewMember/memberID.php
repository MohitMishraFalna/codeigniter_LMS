<?php include_once(APPPATH.'views/header.php') ?>
<div class="row">
    <div class="col-sm-4 offset-sm-4">
        <div class="card">
            <div class="card-header">
                <h4>Library Identity Card</h4>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url()."controllermember/member/memberId"; ?>" method="post">
                    <div class="form-group">
                        <label for="">Email id:</label>
                        <input type="text" name="email_id" id="email_id" class="form-control" placeholder="Enter the email id."><br>
                        <?php echo validation_errors(); ?>
                        <input type="submit" value="Submit" class="btn btn-info">
                    </div>
                </form>
            </div>
        </div>             
    </div>
</div>
<?php include_once(APPPATH."views/footer.php");?>