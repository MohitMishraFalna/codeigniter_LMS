<?php include_once(APPPATH.'views/header.php'); ?>
<div class="row" style="margin:3%;">
    <div class="col-sm-6 offset-sm-3">
        <div class="card">
            <div class="card-header"><h4>Edit Author Detail</h4></div>
            <div class="card-body">
                <form enctype="multipart/form-data" method="POST" id="myForm">
                <div id='divAlert'></div>
                    <div class="row">
                        <label for="exampleInputEmail1" class="col-sm-4">Author Name:</label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="hide_authorId" name="hide_authorId" aria-describedby="emailHelp">
                                <input type="text" class="form-control" list="author_list" id="author_name" name="author_name" aria-describedby="emailHelp" placeholder="Enter Author Name.">
                                <datalist id="author_list"></datalist>
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
                                <input type="text" class="form-control" id="city_name" name="city_name" placeholder="Enter City Name.">
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
    function getAuthorData(){
        let author_Name = document.getElementById("author_name").value;
        let author_List = document.getElementById("author_list");
        let hide_authorId = document.getElementById("hide_authorId");
        let author_Email = document.getElementById("auth_email");
        let author_Contact = document.getElementById("auth_cont");
        let author_Pincode = document.getElementById("pincode");
        let author_Cityname = document.getElementById("city_name");
        let author_DistrictName = document.getElementById("dist_name");
        let author_Region = document.getElementById("region_name");
        let author_Statename = document.getElementById("state_name");
        let author_Contryname = document.getElementById("contry_name");

        if(author_Name){
            let req = new XMLHttpRequest();
            req.open("POST", "<?php echo base_url(). 'book/Books/edit_authorDetails'; ?>", true);
            req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            req.send("data="+author_Name);

            req.onreadystatechange = function(){
                if(req.readyState == 4 && req.status == 200){
                    let db_Authdetails = JSON.parse(req.responseText);

                    author_List.innerHTML = "";
                    for(let auth = 0; auth < db_Authdetails.result.length; auth++){
                        let author_Option = document.createElement("option");
                        author_Option.value = db_Authdetails['result'][auth]['auth_name'];
                        author_List.appendChild(author_Option);

                        hide_authorId.value = db_Authdetails['result'][auth]['auth_id'];
                        author_Email.value = db_Authdetails['result'][auth]['auth_email'];
                        author_Contact.value = db_Authdetails['result'][auth]['auth_contact'];
                        author_Pincode.value = db_Authdetails['result'][auth]['auth_pincode'];
                        author_Cityname.value = db_Authdetails['result'][auth]['auth_city'];
                        author_DistrictName.value = db_Authdetails['result'][auth]['auth_distict'];
                        author_Region.value = db_Authdetails['result'][auth]['auth_region'];
                        author_Statename.value = db_Authdetails['result'][auth]['auth_state'];
                        author_Contryname.value = db_Authdetails['result'][auth]['auth_contry'];
                    }
                }
            }
        }else{
            hide_authorId.value = "";
            author_Email.value =    "";
            author_Contact.value =  "";
            author_Pincode.value =  "";
            author_Cityname.value = "";
            author_DistrictName.value = "";
            author_Region.value =   "";
            author_Statename.value =    "";
            author_Contryname.value =   "";
        }
    }

    document.getElementById("author_name").onkeyup = getAuthorData;
    

    var myFormData = document.getElementById("myForm");
    myFormData.addEventListener("submit", function(e){
        e.preventDefault();

        let authorName = myFormData.author_name.value;
        let hide_authorId = myFormData.hide_authorId.value;
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
               hide_authorId :hide_authorId,
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
            req.open("POST", "<?php echo base_url(). 'book/Books/update_authorDetails'; ?>", true);
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