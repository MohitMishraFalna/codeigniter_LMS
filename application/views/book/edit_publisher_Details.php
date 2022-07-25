<?php include_once(APPPATH.'views/header.php') ?>
<div class="row" style="margin:3%;">
    <div class="col-sm-6 offset-sm-3">
        <div class="card">
            <div class="card-header"><h4>Edit Publisher Detail</h4></div>
            <div class="card-body">
                <form id="myForm">
                <div id="divAlert"></div>
                <div class="row">
                    <label for="exampleInputEmail1" class="col-sm-4">Company Name:</label>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <input type="text" class="form-control" list="pubComp_list" id="comp_name" name="comp_name" aria-describedby="emailHelp" placeholder="Enter Company Name.">
                            <datalist id="pubComp_list"><datalist>
                        </div>
                    </div>    
                </div>
                <div class="row">
                        <label for="exampleInputEmail1" class="col-sm-4">Publisher Name:</label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="hide_pubID" name="pub_id" aria-describedby="emailHelp" placeholder="Enter Publisher Name.">
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
    function getPublisherData(){
        let company_Name = document.getElementById("comp_name").value;
        let pubComp_List = document.getElementById("pubComp_list");
        let publisher_Name = document.getElementById("pub_name");
        let hide_pubID = document.getElementById("hide_pubID");
        let publisher_Email = document.getElementById("pub_email");
        let publisher_Contact = document.getElementById("pub_cont");
        let publisher_Pincode = document.getElementById("pincode");
        let publisher_Cityname = document.getElementById("city_name");
        let publisher_DistrictName = document.getElementById("dist_name");
        let publisher_Region = document.getElementById("region_name");
        let publisher_Statename = document.getElementById("state_name");
        let publisher_Contryname = document.getElementById("contry_name");

        if(company_Name){
            let req = new XMLHttpRequest();
            req.open("POST", "<?php echo base_url(). 'book/Books/edit_publisherDetails'; ?>", true);
            req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            req.send("data="+company_Name);

            req.onreadystatechange = function(){
                if(req.readyState == 4 && req.status == 200){
                    let db_publisherdetails = JSON.parse(req.responseText);

                    pubComp_List.innerHTML = "";
                    for(let pub = 0; pub < db_publisherdetails.result.length; pub++){
                        let publisher_Option = document.createElement("option");
                        publisher_Option.value = db_publisherdetails['result'][pub]['pub_company'];
                        pubComp_List.appendChild(publisher_Option);

                        hide_pubID.value = db_publisherdetails['result'][pub]['pub_id'];
                        publisher_Name.value = db_publisherdetails['result'][pub]['pub_name'];
                        publisher_Email.value = db_publisherdetails['result'][pub]['pub_email'];
                        publisher_Contact.value = db_publisherdetails['result'][pub]['pub_contact'];
                        publisher_Pincode.value = db_publisherdetails['result'][pub]['pub_pincode'];
                        publisher_Cityname.value = db_publisherdetails['result'][pub]['pub_city'];
                        publisher_DistrictName.value = db_publisherdetails['result'][pub]['pub_distict'];
                        publisher_Region.value = db_publisherdetails['result'][pub]['pub_region'];
                        publisher_Statename.value = db_publisherdetails['result'][pub]['pub_state'];
                        publisher_Contryname.value = db_publisherdetails['result'][pub]['pub_contry'];
                    }
                }
            }
        }else{
            hide_pubID.value = "";
            publisher_Email.value =    "";
            publisher_Contact.value =  "";
            publisher_Pincode.value =  "";
            publisher_Cityname.value = "";
            publisher_DistrictName.value = "";
            publisher_Region.value =   "";
            publisher_Statename.value =    "";
            publisher_Contryname.value =   "";
        }
    }

    document.getElementById("comp_name").onkeyup = getPublisherData;
    
    var myFormData = document.getElementById("myForm");
    myForm.addEventListener("submit", function(e){
        e.preventDefault();

        let hide_pubId = myFormData.hide_pubID.value;
        let publisherCompany = myFormData.comp_name.value;
        let publisherName = myFormData.pub_name.value;
        let publisherEmail = myFormData.pub_email.value;
        let publisherContact = myFormData.pub_cont.value;
        let pincode = myFormData.pincode.value;
        let cityName = myFormData.city_name.value;
        let distName = myFormData.dist_name.value;
        let regionName = myFormData.region_name.value;
        let stateName = myFormData.state_name.value;
        let contryName = myFormData.contry_name.value;

        let validationArray = [publisherCompany, publisherName, publisherEmail, publisherContact, pincode, cityName, distName, regionName, stateName, contryName ];
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
                hide_PublisherId:hide_pubId,
                publisher_Company :publisherCompany,
                publisher_Name :publisherName,
                publisher_Email :publisherEmail,
                publisher_Contact :publisherContact,
                publisher_Pincode :pincode,
                publisher_CityName :cityName,
                publisher_DistName :distName,
                publisher_RegionName :regionName,
                publisher_StateName :stateName,
                publisher_ContryName :contryName,
            }
        data = JSON.stringify(data);
        
        if(result == true){
            var req = new XMLHttpRequest();
            req.open("POST", "<?php echo base_url(). 'book/Books/update_publisherDetails'; ?>", true);
            req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            req.send("data="+data);

            req.onreadystatechange = function(){
                if(req.readyState == 4 && req.status == 200){
                    console.log(req.responseText);
                    let scs = JSON.parse(req.responseText);

                    if(scs){
                        let divAlert = document.getElementById("divAlert");
                        divAlert.className = "alert alert-success";
                        divAlert.style.display="block";
                        divAlert.textContent = scs.success;
                                                
                        setTimeout(() => {
                            divAlert.style.transition = "opacity 400ms";
                            divAlert.style.display="none";
                        }, 4000);
                    }
                }
            }
        }
    });
</script>
<?php include_once(APPPATH."views/footer.php");?>