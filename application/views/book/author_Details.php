<?php include_once(APPPATH.'views/header.php') ?>
<div class="row" style="margin:3%;">
    <div class="col-sm-6 offset-sm-3">
        <div class="card">
            <div class="card-header"><h4>Add New Author Detail</h4></div>
            <div class="card-body">
                <form enctype="multipart/form-data" method="POST" id="myForm">
                    <div id="divAlert"></div>
                    <div class="row">
                        <label for="exampleInputEmail1" class="col-sm-4">Author Name:</label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input type="text" class="form-control" id="author_name" name="author_name" aria-describedby="emailHelp" placeholder="Enter Author Name.">
                            </div>
                        </div>    
                    </div>
                    <div class="row">
                        <label for="exampleInputEmail1" class="col-sm-4">Author Email:</label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input type="text" class="form-control" id="auth_email" name="auth_email" aria-describedby="emailHelp" placeholder="Enter Author Email.">
                            </div>
                        </div>    
                    </div>
                    <div class="row">
                        <label for="exampleInputEmail1" class="col-sm-4">Author Contact:</label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input type="text" class="form-control" id="auth_cont" name="auth_cont" aria-describedby="emailHelp" placeholder="Enter Author Contact.">
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

            req.open("POST", "<?php echo base_url()?>book/Books/apiAddress/", true)
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

        let authorName = myFormData.author_name.value;
        let authorEmail = myFormData.auth_email.value;
        let authorContact = myFormData.auth_cont.value;
        let pincode = myFormData.pincode.value;
        let cityName = myFormData.city_name.value;
        let distName = myFormData.dist_name.value;
        let regionName = myFormData.region_name.value;
        let stateName = myFormData.state_name.value;
        let contryName = myFormData.contry_name.value;

        let validationArray = [authorName, authorEmail, authorContact, pincode, cityName, distName, regionName, stateName, contryName ];
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
               author_Name :authorName,
               author_Email :authorEmail,
               author_Contact :authorContact,
               author_Pincode :pincode,
               author_CityName :cityName,
               author_DistName :distName,
               author_RegionName :regionName,
               author_StateName :stateName,
               author_ContryName :contryName,
            }
        data = JSON.stringify(data);
        if(result == true){
            var req = new XMLHttpRequest();
            req.open("POST", "<?php echo base_url(). 'book/Books/add_authorDetails' ?>", true);
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