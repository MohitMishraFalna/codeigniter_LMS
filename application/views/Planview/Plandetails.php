<?php include_once(APPPATH.'views/header.php'); 
if($response){
    $position=0;
    $count = 1;
?>

<?php for($table_row=1; $table_row<=$row1; $table_row++){ ?>
    <div class="row mt-2">
        <?php for($table_col=1; $table_col<=4; $table_col++){?>
            <div class="col">
                <div class="card plncard">
                    <table class="table table-striped">
                        <?php while($position < count($response)){?>
                            <input type="hidden" id="hidden_planid<?php echo $position; ?>" name="hidden_planid" value="<?php echo $response[$position]["planid"]; ?>">
                            <p class="text-center mt-2 plnfont"><?php echo $response[$position]['planname']; ?></p>
                            <tr><th>Plan Validity:</th><td><?php echo $response[$position]['validity']; ?></td></tr>                        
                            <tr><th>Plan Rupees:</th><td><?php echo $response[$position]['amount']; ?></td></tr>  
                            <label for="" id="sbc_src<?php echo $position; ?>" class="subscribe text-right"><span class="subcribelabel">Subscribe</span></label>
                            <?php 
                            $position++;
                            break;
                        } 
                        if($count == $dbtable_row):
                            break;
                        endif;
                        $count++; ?>
                    </table>
                </div>
            </div>
        <?php }?>
    </div>
<?php }?>

<script>
    // var url = '/invoice_system/invoiceprint?orderNo='+orderNo;
    // window.location.href=url;

    document.addEventListener('DOMContentLoaded', function(){
        // let searchBox;
        let subcribelabel = document.getElementsByClassName("subcribelabel");
        
        for(let i = 0; i<subcribelabel.length; i++){
            let search = document.getElementsByClassName("subscribe");
            search.innerHTML = "";
            
            subcribelabel[i].addEventListener("click",  function(){
                // let planSubscribe = document.getElementById("hidden_planid"+i).value;
                // console.log(planSubscribe);
                let searchBox = document.createElement("input");
                let datalist = document.createElement("datalist");
    
                // create datalist and dynamic input
                searchBox.id = "searchInput"+i;
                searchBox.className = "form-control searchInput";
                searchBox.placeholder = "mem_Id no/Email";
                searchBox.style.width="100%";
                searchBox.style.borderRadius = "20px";
                subcribelabel[i].style.display = "none";
    
                
                searchBox.setAttribute('list','memberList'+i);
                datalist.id = "memberList"+i;
    
                search[i].appendChild(searchBox);
                search[i].appendChild(datalist);
    
                let mem_id = [];
                let mem_email = [];
    
                // get input and its id attribute then id's value and attach addeventlistener
                let searchBy = document.getElementsByTagName("input");
                let input_id = searchBy[i].getAttribute('id');
                let searchId = document.getElementById(input_id);

                // add event listener on received id
                searchId.addEventListener("keyup", function(e){
                    let search1 = searchBy[i].value;
    
                    if(/^[a-zA-Z ]*$/.test(search1) && search1 != ""){
                        let req = new XMLHttpRequest();
                        let url = "<?php echo base_url('/Plancontroller/Plan/searchMemberDetails'); ?>"    
                        req.open("get", url+"?data="+search1, true)
                        req.send();
                        // let dl = document.getElementsByClassName("memberList");
    
                        datalist.innerHTML="";
                        req.onreadystatechange = function(){
                            if(req.readyState == 4 && req.status == 200){
                                let searchResult = JSON.parse(req.responseText);
                                
                                for(let i = 0; i < searchResult.search_result.length; i++){
                                    let optList = document.createElement("option");
                                    optList.value = searchResult['search_result'][i]['mememail'];
                                    datalist.appendChild(optList);
                                
                                    mem_id[i] = searchResult['search_result'][i]['memid'];
                                    mem_email[i] = searchResult['search_result'][i]['mememail'];                                
                                }
                            }
                        }
                    }
                });
    
                                              
                searchId.addEventListener("focusout", function(e){
                    // let data = document.getElementsByClassName("searchInput");
                    let planSubscribe = document.getElementById("hidden_planid"+i).value;
                    let mem_details;
                    let mail_id = searchId.value;

                    // if input value as email so validate this block and create data for next page
                    if(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(searchId.value)){

                        for(let j=0; j<mem_id.length; j++){
                            if(searchId.value == mem_email[j]){
                                mem_details = {"mail_id": mail_id, "mem_id":mem_id[j], "plan_id":planSubscribe}
                            }
                        }
                    }
    
                    // if input value as plan id so validate this block and create data for next page
                    if(/^[0-9]*$/.test(searchId.value)){
                        let member_id = searchId.value;
                        
                        mem_details = {"mail_id":"", "plan_id":planSubscribe, "member_id":member_id}

                        // let url = '< ?php echo base_url()?>/Plancontroller/Plan/memberData/?data='+memberid;
                        // window.location.href=url;               
                    }
    
                    mem_details = JSON.stringify(mem_details);
                    console.log(mem_details);
                    let url = '<?php echo base_url()?>/Plancontroller/Plan/memberData/?data='+mem_details;
                    window.location.href=url; 
                });
            });
        }    
    });
    
</script>

<?php }
include_once(APPPATH.'views/footer.php') ?>