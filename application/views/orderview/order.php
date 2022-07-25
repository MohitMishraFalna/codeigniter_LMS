<?php include_once(APPPATH.'views/header.php') ?>
<div class="row">
    <div class="card-header col-sm-6 offset-sm-3 text-center"><h3>Create order</h3></div>
    <div class="col-sm-6 offset-sm-3 jumbotron">
        <div class="form-group">
            <label for="exampleInputEmail1">Member Name</label>
            <input type="hidden" id="mem_id" name="mem_id">
            <input type="text" class="form-control" list="member_list" id="mem_name" name="mem_name" aria-describedby="emailHelp" placeholder="Enter Member Name.">
            <datalist id="member_list"></datalist>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Book Name</label>
            <input type="hidden" id="book_id" name="book_id">
            <input type="text" class="form-control" list="book_list" id="book_name" name="book_name" aria-describedby="emailHelp" placeholder="Enter Book Name.">
            <datalist id="book_list"></datalist>
        </div>
        <button class="btn btn-info float-right" id="new_row">Add Row</button>
    </div>
</div>

<div class="row">
    <div class="col-sm-6 offset-sm-3">
        <table class="table table-bordered text-center" id="myTable">
            <thead>
                <tr>
                    <th width="15%">Book_Id</th>
                    <th width="20%">Book code</th>
                    <th width="20%">Book name</th>
                    <th width="20%">Book price</th>
                    <th width="20%">image</th>
                </tr>
            </thead>
            <tbody id="dynmicTable">
            </tbody>
            <tfoot id="dynmicFooter">
            <tr>
                <td></td><td></td><th>Total</th><td id="tdTotal"></td><td></td>
            </tr>
            </tfoot>
        </table>
        <button id="order_submit" class="btn btn-info float-right">Order submit</button>
    </div>
</div>
</div>
<script>
    document.getElementById("mem_name").onkeyup = function(){
        let mem_name = document.getElementById("mem_name").value;
        let mem_list = document.getElementById("member_list");
        let mem_id = document.getElementById("mem_id");

        if(mem_name != ''){
            let req = new XMLHttpRequest();

            console.log("this");
            // req.open("POST", "< ?php echo base_url(). 'memcontroller/mem/editDetails' ?>");
            req.open("POST", "/LMS/ordercontroller/orderbook/search_member");
            req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            req.send("data="+mem_name);

            req.onreadystatechange = function(){
                if(req.readyState == 4 && req.status == 200){
                    let res = JSON.parse(req.responseText);
                    mem_list.innerHTML = "";
                    for(let i = 0; i<res.search_result.length; i++){
                        let opt = document.createElement("option");
                        opt.value = res["search_result"][i]["membername"]+ ", " +res["search_result"][i]["membcontact"];
                        mem_list.appendChild(opt);
                        mem_id.value = res["search_result"][i]["memid"];
                    }
                }
            }
        }else{
            mem_id.value="";
            mem_valid.value="";
        }
    }

    document.getElementById("book_name").onkeyup = function(){
        let book_name = document.getElementById("book_name").value;
        let book_list = document.getElementById("book_list");

        if(book_name != ''){
            let req = new XMLHttpRequest();

            // req.open("POST", "< ?php echo base_url(). 'bookcontroller/book/editDetails' ?>");
            req.open("POST", "/LMS/ordercontroller/orderbook/search_book");
            req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            req.send("data="+book_name);

            req.onreadystatechange = function(){
                if(req.readyState == 4 && req.status == 200){
                    let res = JSON.parse(req.responseText);
                    book_list.innerHTML = "";
                    for(let i = 0; i<res.search_result.length; i++){
                        let opt = document.createElement("option");
                        opt.value = res["search_result"][i]["book_name"];
                        book_list.appendChild(opt);

                        book_id.value = res["search_result"][i]["book_id"]
                    }
                }
            }
        }else{
            book_id.value="";
        }
    }

    let count = 1;
    let total = 0;
    document.getElementById("new_row").addEventListener('click', function(e){ 
        let book_name = document.getElementById("book_name").value;
        let dynmictr = document.getElementById("dynmicTable");

        if(book_name != ''){
            let req = new XMLHttpRequest();

            // req.open("POST", "< ?php echo base_url(). 'bookcontroller/book/editDetails' ?>");
            req.open("POST", "/LMS/ordercontroller/orderbook/book_details");
            req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            req.send("data="+book_name);

            req.onreadystatechange = function(){
                if(req.readyState == 4 && req.status == 200){
                    let res = JSON.parse(req.responseText);
                    let tot = document.getElementById('tdTotal')
                    let tr = document.createElement("tr");
                    let td1 = document.createElement("td");
                    let td2 = document.createElement("td");
                    let td3 = document.createElement("td");
                    let td4 = document.createElement("td");
                    let td5 = document.createElement("td");
                    let book_img = document.createElement("img");

                    book_img.style.width = "50px";
                    book_img.style.height = "50px";
                    td1.className="td"
                    td2.className="td"
                    td3.className="td"
                    td4.className="td"
                    td5.className="td"
                    tr.id="tr"+count++;
                    
                    let price = res.search_result[0]['book_price'];

                    book_img.src = res.search_result[0]['book_image'];
                    td1.textContent=res.search_result[0]['book_id'];
                    td2.textContent=res.search_result[0]['book_code'];
                    td3.textContent=res.search_result[0]['book_name'];
                    td4.textContent=price;
                    
                    total = total + parseInt(price);
                    tdTotal.textContent = total;

                    td5.appendChild(book_img);
                    
                    tr.appendChild(td1);
                    tr.appendChild(td2);
                    tr.appendChild(td3);
                    tr.appendChild(td4);
                    tr.appendChild(td5);
                    dynmictr.appendChild(tr);
                }
            }
        }else{
            book_id.value="";
        }
    });

    document.getElementById("order_submit").onclick = function(){
        let mytable = document.getElementById("myTable");
        let member_id = document.getElementById("mem_id").value;
        let noOfRow = mytable.rows.length

        let book_id = [];
        let book_code = [];
        let book_name = [];
        let book_price = [];
        let book_img = [];

        for(let r=2; r<noOfRow; r++){
            let row =  document.getElementById("tr"+(r-1));

            book_id.push(row.children[0].textContent);
            book_code.push(row.children[1].textContent);
            book_name.push(row.children[2].textContent);
            book_price.push(row.children[3].textContent);
            book_img.push(row.children[4].textContent);
        }

        let data={
            "member_id":member_id,
            "book_id":book_id,
            "amount_paid":total,
            // "prod_name":prod_name,
            // "prod_price":prod_price,
            // "paid_img":prod_img,
        }
        data = JSON.stringify(data);
        console.log(data);
        let req = new XMLHttpRequest();
        req.open("POST", "/LMS/ordercontroller/orderbook/create_order?data="+data);
        req.send();

        req.onreadystatechange = function(){
            if(req.readyState == 4 && req.status == 200){
                let url = "<?php echo base_url(); ?>ordercontroller/orderbook/order_print";
                window.location.href=url;
            }
        }
    }
</script>
<?php include_once(APPPATH.'views/footer.php') ?>