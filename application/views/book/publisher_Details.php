<?php include_once(APPPATH.'views/header.php') ?>
<div class="row" style="margin:3%;">
    <div class="col-sm-6 offset-sm-3">
        <div class="card">
            <div class="card-header"><h4>Add New Publisher Detail</h4></div>
            <div class="card-body">
                <form enctype="multipart/form-data" method="POST" id="myForm">
                    <div id="divAlert"></div>
                    <div class="row">
                        <label for="exampleInputEmail1" class="col-sm-4">Company Name:</label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input type="text" class="form-control" id="comp_name" name="comp_name" aria-describedby="emailHelp" placeholder="Enter Company Name.">
                            </div>
                        </div>    
                    </div>
                    <div class="row">
                        <label for="exampleInputEmail1" class="col-sm-4">Publisher Name:</label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input type="text" class="form-control" id="pub_name" name="pub_name" aria-describedby="emailHelp" placeholder="Enter Publisher Name.">
                            </div>
                        </div>    
                    </div>
                    <div class="row">
                        <label for="exampleInputEmail1" class="col-sm-4">Publisher Email:</label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input type="text" class="form-control" id="pub_email" name="pub_email" aria-describedby="emailHelp" placeholder="Enter Publisher Email.">
                            </div>
                        </div>    
                    </div>
                    <div class="row">
                        <label for="exampleInputEmail1" class="col-sm-4">Publisher Contact:</label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input type="text" class="form-control" id="pub_cont" name="pub_cont" aria-describedby="emailHelp" placeholder="Enter Publisher Contact.">
                            </div>
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Pincode:</label>
                                <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter pincode.">
                            </div>        
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputPassword1">City Name:</label>
                                <input type="text" class="form-control" list="city_list" id="city_name" name="city_name" placeholder="Enter City Name.">
                                <datalist id="city_list"></datalist>
                            </div>        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputPassword1">District Name:</label>
                                <input type="text" class="form-control" id="dist_name" name="dist_name" placeholder="Enter District Name.">
                            </div>        
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <img id="image" >
                                <label for="exampleInputPassword1">Region Name:</label>
                                <input type="text" class="form-control" id="region_name" name="region_name" placeholder="Enter Your Region.">
                            </div>        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputPassword1">State Name:</label>
                                <input type="text" class="form-control" id="state_name" name="state_name" placeholder="Enter Your State.">
                            </div>        
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <img id="image" >
                                <label for="exampleInputPassword1">Contry Name:</label>
                                <input type="text" class="form-control" id="contry_name" name="contry_name" placeholder="Enter Your Contry.">
                            </div>        
                        </div>
                    </div>
                    <button  type="submit" id="btn_submit" class="btn btn-primary btnwidth">Submit</button>
                    <a href="#"><button class="btn btn-warning btnwidth">Back</button></a>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
function getAddress(){
        var pincode = document.getElementById("pincode").value;

        if(pincode != ""){
            var req = new XMLHttpRequest();

            req.open("POST", "<?php echo base_url('book/Books/apiAddress/') ?>", true)
            req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            req.send("pincode="+pincode);

            req.onreadystatechange = function(){
                if(req.readyState == 4 && req.status == 200){
                    var db_Address = JSON.parse(req.responseText);

                    let db_AddressStatus = db_Address.Status;
                    if(db_AddressStatus != "Error"){
                        let db_AddressLength = db_Address.PostOffice.length;
                        for(let add = 0; add < db_AddressLength; add++){
                            let listOption = document.createElement("option");
                            listOption.value = db_Address.PostOffice[add]["Name"];

                            document.getElementById("city_list").appendChild(listOption);

                            document.getElementById("dist_name").value = db_Address.PostOffice[add]["District"];
                            document.getElementById("region_name").value = db_Address.PostOffice[add]["Region"];
                            document.getElementById("state_name").value = db_Address.PostOffice[add]["State"];
                            document.getElementById("contry_name").value = db_Address.PostOffice[add]["Country"];
                        }
                    }else{
                        let divAlert = document.getElementById("divAlert");
                        divAlert.className = "alert alert-danger";
                        divAlert.style.display="block";
                        divAlert.style.opacity = 1;
                        divAlert.textContent = "Your Picode is Not Found.";
                        
                        setTimeout(() => {
                            divAlert.style.transition = "opacity 400ms";
                            divAlert.style.display="none";
                        }, 4000);
                    }
                }
            }
        }
    }
    document.getElementById("pincode").onchange = getAddress;

    var myFormData = document.getElementById("myForm");
    myForm.addEventListener("submit", function(e){
        e.preventDefault();

        // get value from form.
        let comName = myFormData.comp_name.value;
        let pubName = myFormData.pub_name.value;
        let pubEmail = myFormData.pub_email.value;
        let pubContact = myFormData.pub_cont.value;
        let pincode = myFormData.pincode.value;
        let cityName = myFormData.city_name.value;
        let distName = myFormData.dist_name.value;
        let regionName = myFormData.region_name.value;
        let stateName = myFormData.state_name.value;
        let contryName = myFormData.contry_name.value;

        // validation
        let validationArray = [pubName, pubEmail, pubContact, pincode, cityName, distName, regionName, stateName, contryName ];
        let validationArrayLength = validationArray.length;

        // validation
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

        var data = {
               com_Name :comName,
               pub_Name :pubName,
               pub_Email :pubEmail,
               pub_Contact :pubContact,
               pub_Pincode :pincode,
               pub_CityName :cityName,
               pub_DistName :distName,
               pub_RegionName :regionName,
               pub_StateName :stateName,
               pub_ContryName :contryName,
            }
        data = JSON.stringify(data);
        console.log(data);
        if(result == true){
            var req = new XMLHttpRequest();
            req.open("POST", "<?php echo base_url(). 'book/Books/add_publisherDetails' ?>", true);
            req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            req.send("data="+data);

            req.onreadystatechange = function(){
                if(req.readyState == 4 && req.status == 200){
                    let scs = JSON.parse(req.responseText);
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
            }
        }
    });
</script>
<?php include_once(APPPATH."views/footer.php");?>