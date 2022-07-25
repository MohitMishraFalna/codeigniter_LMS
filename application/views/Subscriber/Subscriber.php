<?php include_once(APPPATH.'views/header.php') ?>
<div class="card-header col-sm-9 offset-sm-1 mt-4 text-center"><h3>Member & Plan details for subscription</h3></div>
    <div class="jumbotron mt-2 border col-sm-9 offset-sm-1">
        <table>
            <tr>
                <td width="25%"><input type="text" readonly class="form-control" value="<?php echo $result->membername; ?>"></td>
                <td width="50%"><input type="text" readonly class="form-control" value="<?php echo $result->mememail; ?>"></td>
                <td width="25%"><input type="text" readonly class="form-control" value="<?php echo $result->membcontact; ?>"></td>
            </tr>
        </table>
        <span class="float-right">
            <img src="<?php echo $result->memimage; ?>" class=" mt-4" width="120" height="140">
        </span>
        <table class="mt-4">
            <tr><th>Member ID:</th><td width="25%">:</td><td id="tdmemId"><?php echo $result->memid; ?></td></tr>
            <tr><th>Plan ID:</th><td width="25%">:</td><td id="tdplanId"><?php echo $result->planid; ?></td></tr>
            <tr><th>Plan Name:</th><td width="25%">:</td><td><?php echo $result->planname; ?></td></tr>
            <tr><th>Plan Validity</th><td width="25%">:</td><td><?php echo $result->validity; ?></td></tr>
            <tr><th>Plan Price</th><td width="25%">:</td><td><?php echo $result->amount; ?></td></tr>
            <tr>
                <th>Pay Mode</th>
                <td width="25%">:</td>
                <td id="mode1">
                    <select name="mode" id="mode" class="form-control">
                        <option>Choose pay mode</option>
                        <option value="cash_mode">Cash mode</option>
                        <option value="credit_card">Credit card</option>
                        <option value="debit_card">Debit card</option>
                    </select>
                </td>
            </tr>
        </table>
        <div id="btnPrint1">
            <button class="btn btn-info btnfloat" id="btnconfirm">Confirm</button>
        </div>
    </div>

<script>
    document.getElementById("btnconfirm").onclick = function(){
        let mem_id = document.getElementById("tdmemId").textContent;
        let plan_id = document.getElementById("tdplanId").textContent;
        let payment_mode = document.getElementById("mode").value;
        let mode = document.getElementById("mode1");
        let confirm_btn = document.getElementById("btnPrint1");
        console.log(confirm_btn);

        let data = {"mem_id": mem_id, "plan_id": plan_id, "payment_mode": payment_mode}
        data = JSON.stringify(data);

        let req = new XMLHttpRequest();

        req.open("get", "<?php echo base_url()?>Plancontroller/Plan/subscriptionApply/?data="+data, true)
        req.send();

        mode.innerHTML = '';
        confirm_btn.innerHTML = '';
        req.onreadystatechange = function(){
            if(req.readyState == 4 && req.status == 200){
               let res = JSON.parse(req.responseText);
               let modeopt = document.createElement("option");
               let btnprint = document.createElement("button");
               btnprint.id = "printbtn";
               btnprint.className = "btn btn-info btnfloat d-print-none";            
               btnprint.textContent = "Print";
               modeopt.textContent = res["data"]["pay_mode"];
               mode.appendChild(modeopt);
               confirm_btn.appendChild(btnprint);
               
               document.getElementById("printbtn").addEventListener("click", function(){
                   window.print();
               });
            }
        }
    };
</script>
<?php include_once(APPPATH.'views/footer.php') ?>