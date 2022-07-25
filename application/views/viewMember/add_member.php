<?php include_once(APPPATH.'views/header.php') ?>
<div class="row" style="margin:3%;">
    <div class="col-sm-8 offset-sm-2">
        <div class="card">
            <div class="card-header"><h4>Add New Member Detail</h4></div>
            <div class="card-body">
                <form enctype="multipart/form-data" method="POST" id="myForm">
                    <div id="divAlert"></div>
                    <div class="row">
                        <label for="exampleInputEmail1" class="col-sm-3">Member Name:</label>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <input type="text" class="form-control" id="member_name" name="member_name" aria-describedby="emailHelp" placeholder="Enter Member Name.">
                            </div>
                        </div>    
                    </div>
                    <div class="row">
                        <label for="exampleInputEmail1" class="col-sm-3">Member Email:</label>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <input type="text" class="form-control" id="member_email" name="member_email" aria-describedby="emailHelp" placeholder="Enter Member Email.">
                            </div>
                        </div>    
                    </div>
                    <div class="row">
                        <label for="exampleInputEmail1" class="col-sm-3">Member Contact:</label>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <input type="text" class="form-control" id="member_cont" name="member_cont" aria-describedby="emailHelp" placeholder="Enter Member Contact.">
                            </div>
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Member Gender:</label>
                                <select class="form-control" id="member_gender" name="member_gender">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                        </div> 
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Date of Birth:</label>
                                <input type="date" class="form-control" id="dob" name="dob">
                            </div>        
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Date of Join:</label>
                                <input type="date" class="form-control" id="doj" name="doj">
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
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputPassword1">District Name:</label>
                                <input type="text" class="form-control" id="dist_name" name="dist_name" placeholder="Enter District Name.">
                            </div>        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Region Name:</label>
                                <input type="text" class="form-control" id="region_name" name="region_name" placeholder="Enter Your Region.">
                            </div>        
                        </div>
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
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Upload Image:</label>
                                <input type="file" class="form-control-file" id="member_image" name="member_image">
                            </div>        
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Upload Signature:</label>
                                <input type="file" class="form-control-file" id="sign_image" name="sign_image">
                            </div>        
                        </div>
                        <div class="col mt-4">
                            <div class="form-group">
                                <button  type="submit" id="btn_submit" class="btn btn-primary btnwidth">Submit</button>
                                <a href="#"><button class="btn btn-warning btnwidth">Back</button></a>
                            </div>        
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>

    // function getAddress(){
    //     var pincode = document.getElementById("pincode").value;

    //     if(pincode != ""){
    //         var req = new XMLHttpRequest();

    //         req.open("POST", "http://localhost/LMS/book/Books/apiAddress/", true)
    //         req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //         req.send("pincode="+pincode);

    //         req.onreadystatechange = function(){
    //             if(req.readyState == 4 && req.status == 200){
    //                 var db_Address = JSON.parse(req.responseText);

    //                 let db_AddressStatus = db_Address.Status;
    //                 if(db_AddressStatus != "Error"){
    //                     let db_AddressLength = db_Address.PostOffice.length;
    //                     for(let add = 0; add < db_AddressLength; add++){
    //                         let listOption = document.createElement("option");
    //                         listOption.value = db_Address.PostOffice[add]["Name"];

    //                         document.getElementById("city_list").appendChild(listOption);

    //                         document.getElementById("dist_name").value = db_Address.PostOffice[add]["District"];
    //                         document.getElementById("region_name").value = db_Address.PostOffice[add]["Region"];
    //                         document.getElementById("state_name").value = db_Address.PostOffice[add]["State"];
    //                         document.getElementById("contry_name").value = db_Address.PostOffice[add]["Country"];
    //                     }
    //                 }else{
    //                     let divAlert = document.getElementById("divAlert");
    //                     divAlert.className = "alert alert-danger";
    //                     divAlert.style.display="block";
    //                     divAlert.style.opacity = 1;
    //                     divAlert.textContent = "Your Picode is Not Found.";
                        
    //                     setTimeout(() => {
    //                         divAlert.style.display="none";
    //                     }, 4000);
    //                 }
    //             }
    //         }
    //     }
    // }

    // document.getElementById("pincode").onchange = getAddress;

    var myFormData = document.getElementById("myForm");
    myFormData.addEventListener("submit", function(e){
        e.preventDefault();

        let memberName = myFormData.member_name.value;
        let memberEmail = myFormData.member_email.value;
        let memberContact = myFormData.member_cont.value;
        let memberGender = myFormData.member_gender.value;
        let memberDOB = myFormData.dob.value;
        let memberDOJ = myFormData.doj.value;
        let pincode = myFormData.pincode.value;
        let cityName = myFormData.city_name.value;
        let distName = myFormData.dist_name.value;
        let regionName = myFormData.region_name.value;
        let stateName = myFormData.state_name.value;
        let contryName = myFormData.contry_name.value;
        let memberImage = myFormData.member_image.value;

        let validationArray = [memberName, memberEmail, memberGender, memberDOB, memberDOJ, memberContact, pincode, cityName, distName, regionName, stateName, contryName ];
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

        // var data = {
        //        member_Name :memberName,
        //        member_Email :memberEmail,
        //        member_Gender :memberGender,
        //        member_Contact :memberContact,
        //        member_Pincode :pincode,
        //        member_CityName :cityName,
        //        member_DistName :distName,
        //        member_RegionName :regionName,
        //        member_StateName :stateName,
        //        member_ContryName :contryName,
        //        member_ContryName :memberImage,
        //     }
        // data = JSON.stringify(data);

        if(result == true){
            var req = new XMLHttpRequest();
            req.open("POST", "<?php echo base_url(). 'controllerMember/member' ?>", true);
            // req.open("POST", "http://localhost/LMS/controllerMember/member", true)
            req.send(new FormData(myFormData));

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