<?php include_once(APPPATH.'views/header.php') ;?>
<div class="offset-sm-3 mt-4">
    <h3>Print the Member Identity Card</h3>
    <div class="mt-2 pt-4">
        <div class="table1 float-left">
            <table class="table">
                <tr><th>Member ID:</th><td><?php echo $response->memid; ?></td></tr>
                <tr><th>Member Name:</th><td><?php echo $response->membername; ?></td></tr>
                <tr><th>Member Contact:</th><td><?php echo $response->membcontact; ?></td></tr>
                <tr><th>Member City:</th><td><?php echo $response->city; ?></td></tr>
                <tr><th>Member DOB:</th><td><?php echo $response->DOB; ?></td></tr>
                <tr><th>Member DOJ:</th><td><?php echo $response->DOJ; ?></td></tr>
            </table>
        </div>
        <div>
            <img src="<?php echo $response->memimage; ?>" height="120px" width="100px" class="imgmargin">
        </div>
        <div>
            <button id="printbtn" name="printbtn" class="printbtn btn btn-info d-print-none">Print</button>
        </div>
    </div>
</div>
<script>
    document.getElementById("printbtn").onclick = function(){
        window.print();
    }
</script>
<?php include_once(APPPATH."views/footer.php");?>