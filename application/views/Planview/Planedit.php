<?php include_once(APPPATH.'views/header.php') ?>
<div class="row" style="margin:5%;">
    <div class="col-sm-6 offset-sm-3">
        <div class="card">
            <div class="card-header"><h4>Edit Plan Detail</h4></div>
            <div class="card-body">
                <div id="divAlert"></div>
                <form method="POST" id="myForm">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Plan Name:</label>
                                <input type="hidden" id="plan_id" name="plan_id">
                                <input type="text" class="form-control" list="plan_list" id="plan_name" name="plan_name" aria-describedby="emailHelp" placeholder="Enter plan name.">
                                <datalist id="plan_list"></datalist>
                            </div>
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Plan Validity:</label>
                                <input type="text" class="form-control" id="plan_valid" name="plan_valid" placeholder="Enter plan validity.">
                            </div>        
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Plan Amount:</label>
                                <input type="text" class="form-control" id="plan_amt" name="plan_amt" placeholder="Enter plan amount.">
                            </div>        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Plan Status:</label>
                                <select id="status" name="status" class="form-control">
                                    <option>Activate</option>
                                    <option>deactivate</option>
                                </select>
                            </div>        
                        </div>
                    </div>
                    <br>
                    <button  type="submit" id="btn_submit" class="btn btn-primary btnwidth">Submit</button>
                    <a href="#"><button class="btn btn-warning btnwidth">Back</button></a>
                </form>
            </div>
        </div>
    </div>
</div>
<script>

document.getElementById("plan_name").onkeyup = function(){
    let plan_name = document.getElementById("plan_name").value;
    let plan_list = document.getElementById("plan_list");
    let plan_id = document.getElementById("plan_id");
    let plan_valid = document.getElementById("plan_valid");
    let plan_amt = document.getElementById("plan_amt");
    let status = document.getElementById("status");

    if(plan_name != ''){
        let req = new XMLHttpRequest();

        // req.open("POST", "< ?php echo base_url(). 'Plancontroller/Plan/editDetails' ?>");
        req.open("POST", "/LMS/Plancontroller/Plan/editDetails");
        req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        req.send("data="+plan_name);

        req.onreadystatechange = function(){
            if(req.readyState == 4 && req.status == 200){
                let res = JSON.parse(req.responseText);
                plan_list.innerHTML = "";
                for(let i = 0; i<res.search_result.length; i++){
                    let opt = document.createElement("option");
                    opt.value = res["search_result"][i]["planname"];
                    plan_list.appendChild(opt);

                    plan_id.value = res["search_result"][i]["planid"]
                    plan_valid.value = res["search_result"][i]["validity"]
                    plan_amt.value = res["search_result"][i]["amount"]
                    status.value = res["search_result"][i]["status"]
                }
            }
        }
    }else{
        plan_id.value="";
        plan_valid.value="";
        plan_amt.value="";
        status.value="";
    }
}

// get the form using id.
const myForm = document.getElementById("myForm");
myForm.addEventListener("submit", function(e){
    e.preventDefault();

    let planId = myForm.plan_id.value;
    let planName = myForm.plan_name.value;
    let planValid = myForm.plan_valid.value;
    let planAmt  = myForm.plan_amt.value;
    
    let validationArray = [planName, planValid, planAmt];
    let validationArrayLength = validationArray.length;
    let result=true;
    let count = 0;
    for(let checkValid = 0; checkValid < validationArrayLength; checkValid++){
        if(validationArray[checkValid] == ""){
            count++;
            result = false;
        }
    }
    if(count>0){
        alert("Your " + count + " Field/Fields are empty.");
    }

    if(result == true){
        // create object of the xmlhttprequest();
            const request = new XMLHttpRequest();

        // create url of the post.
            // request.open("POST", "< ?php echo base_url(). 'Plancontroller/Plan/' ?>");
            request.open("POST", "/LMS/Plancontroller/Plan/updatePlanDetails");
        // this is function is run when our request is return 200.
            request.onload = function(){
                let scs = JSON.parse(request.responseText);

                if(scs){
                    let divAlert = document.getElementById("divAlert");
                    divAlert.className = "alert alert-success";
                    divAlert.style.display="block";
                    divAlert.style.opacity = 1;
                    divAlert.textContent = scs.success;
                    
                    setTimeout(() => {
                        divAlert.style.display="none";
                    }, 4000);
                }
            }
        // send data from the view to controller.
            request.send(new FormData(myForm));
    }

});
</script> 
<?php include_once(APPPATH."views/footer.php");?>