<?php include_once(APPPATH.'views/header.php');?>

<div class="card-header text-center col-sm-6 offset-sm-3 mb-4"><h3>Print invoice</h3></div>

<div class="row">
    <div class="col-sm-6 offset-sm-3">
        <span class="float-right">
            <img src="<?php echo $result[0]['memimage']?>" height="120px" width="100px">
        </span>
        <span>
            <table>
                <tr><th>Member ID:</th><td width="10%">:</td><td><?php echo $result[0]['memid']?></td></tr>
                <tr><th>Member name:</th><td width="10%">:</td><td><?php echo $result[0]['membername']?></td></tr>
                <tr><th>Membedr contact</th><td width="10%">:</td><td><?php echo $result[0]['membcontact']?></td></tr>
                <tr><th>City</th><td width="10%">:</td><td><?php echo $result[0]['city']?></td></tr>
                <tr><th>Pincode</th><td width="10%">:</td><td><?php echo $result[0]['pincode']?></td></tr>
                <tr><th>Total amount</th><td width="10%">:</td><td><?php echo $result[0]['amount_paid']?></td></tr>
            </table>
        </span>
    </div>
</div>
<div class="row mt-4">
    <div class="col-sm-6 offset-sm-3">
        <table class="table">
            <thead>
                <tr>
                    <th>Book name</th>
                    <th>Book price</th>
                    <th>Issue date</th>
                    <th>Book image</th>
                </tr>
            </thead>
            <?php foreach($result as $res):?>
                <tr>
                    <td><?php echo $res['book_name']?></td>
                    <td><?php echo $res['book_price']?></td>
                    <td><?php echo $res['issue_date']?></td>
                    <td><img src="<?php echo $res['book_image']?>" height="50px" width="50px"></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <button id="print" class="btn btn-info float-right btn-lg d-print-none">Print</button>
    </div>
</div>
<script>
    document.getElementById('print').onclick = function(){
        window.print();
    }
</script>
<?php include_once(APPPATH.'views/footer.php') ?>