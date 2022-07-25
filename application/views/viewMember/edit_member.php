<?php include_once(APPPATH.'views/header.php') ?>
<div class="row" style="margin:3%;">
    <div class="col-sm-8 offset-sm-2">
        <div class="card">
            <div class="card-header"><h4>Edit Member Detail</h4></div>
            <div class="card-body">
                <form enctype="multipart/form-data" method="POST" id="myForm">
                    <div id="divAlert"></div>
                    <div class="row">
                        <label for="exampleInputEmail1" class="col-sm-3">Member Name:</label>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="hide_memberID" name="hide_memberID" aria-describedby="emailHelp">
                                <input type="text" class="form-control" list="member_list" id="member_name" name="member_name" aria-describedby="emailHelp" placeholder="Enter Member Name.">
                                <datalist id="member_list"></datalist>
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
                                <label for="exampleInputPassword1">Contry Name:</label>
                                <input type="text" class="form-control" id="contry_name" name="contry_name" placeholder="Enter Your Contry.">
                            </div>        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Upload Image:</label>
                                <img id="image">
                                <input type="file" class="form-control-file" id="member_image" name="member_image">
                                <input type="hidden" id="hide_memberimage" name="hide_memberimage">
                            </div>        
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Upload Signature:</label>
                                <img id="signimage">
                                <input type="file" class="form-control-file" id="sign_image" name="sign_image">
                                <input type="hidden" id="hide_signimage" name="hide_signimage">
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
    function getMemberData(){
        let member_name = document.getElementById("member_name").value;
        let member_List = document.getElementById("member_list");
        let hide_MemberID = document.getElementById("hide_memberID");
        let member_Email = document.getElementById("member_email");
        let member_Contact = document.getElementById("member_cont");
        let member_Gender = document.getElementById("member_gender");
        let member_DOB = document.getElementById("dob");
        let member_DOJ = document.getElementById("doj");
        let member_Pincode = document.getElementById("pincode");
        let member_Cityname = document.getElementById("city_name");
        let member_DistrictName = document.getElementById("dist_name");
        let member_Region = document.getElementById("region_name");
        let member_Statename = document.getElementById("state_name");
        let member_Contryname = document.getElementById("contry_name");
        let member_Image = document.getElementById("image");
        let member_Signimage = document.getElementById("signimage");
        let hide_memberimage = document.getElementById("hide_memberimage");
        let hide_signimage = document.getElementById("hide_signimage");

        let validationArray = [member_name, member_Email, member_Contact, member_Gender, member_DOB, member_Cityname, member_DistrictName, member_Region, member_Statename, member_Contryname];
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
            let req = new XMLHttpRequest();
            req.open("POST", "http://localhost/LMS/controllerMember/member/memberedit", true);
            req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            req.send("data="+member_name);

            req.onreadystatechange = function(){
                if(req.readyState == 4 && req.status == 200){
                    let db_Memdetails = JSON.parse(req.responseText);

                    member_List.innerHTML = "";
                    for(let mem = 0; mem < db_Memdetails.result.length; mem++){
                        let member_Option = document.createElement("option");
                        member_Option.value = db_Memdetails['result'][mem]['membername'];
                        member_List.appendChild(member_Option);

                        hide_MemberID.value = db_Memdetails['result'][mem]['memid'];
                        hide_memberimage.value = db_Memdetails['result'][mem]['memimage']; 
                        hide_signimage.value = db_Memdetails['result'][mem]['signimage'];

                        member_Email.value = db_Memdetails['result'][mem]['mememail'];
                        member_Contact.value = db_Memdetails['result'][mem]['membcontact'];
                        member_Gender.value = db_Memdetails['result'][mem]['gander'];
                        member_DOB.value = db_Memdetails['result'][mem]['DOB'];
                        member_DOJ.value = db_Memdetails['result'][mem]['DOJ'];
                        member_Pincode.value = db_Memdetails['result'][mem]['pincode'];
                        member_Cityname.value = db_Memdetails['result'][mem]['city'];
                        member_DistrictName.value = db_Memdetails['result'][mem]['district'];
                        member_Region.value = db_Memdetails['result'][mem]['rigion'];
                        member_Statename.value = db_Memdetails['result'][mem]['state'];
                        member_Contryname.value = db_Memdetails['result'][mem]['contry'];

                        member_Image.src = db_Memdetails['result'][mem]['memimage'];
                        member_Signimage.src = db_Memdetails['result'][mem]['signimage'];

                        member_Image.style.height = "100px";
                        member_Image.style.width = "100px";
                        member_Image.className = "img-thumbnail";

                        member_Signimage.style.height = "100px";
                        member_Signimage.style.width = "100px";
                        member_Signimage.className = "img-thumbnail";
                    }
                }
            }
        }else{
            hide_MemberID.value = "";
            member_Email.value =    "";
            member_Contact.value =  "";
            member_DOB.value =    "";
            member_DOJ.value =  "";
            member_Pincode.value =  "";
            member_Cityname.value = "";
            member_DistrictName.value = "";
            member_Region.value =   "";
            member_Statename.value =    "";
            member_Contryname.value =   "";
            hide_memberimage.value = "";
            hide_signimage.value = "";
            member_Image.src = "";
            member_Signimage.src = "";
        }
    }

    document.getElementById("member_name").onkeyup = getMemberData;

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

        if(result == true){
            let req = new XMLHttpRequest();

            req.open("POST", "http://localhost/LMS/controllerMember/member/updatemember", true);
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
<?php include_once(APPPATH.'views/footer.php') ?>