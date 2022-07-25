<?php include_once(APPPATH.'views/header.php') ?>
<div class="row" style="margin:5%;">
    <div class="col-sm-6 offset-sm-3">
        <div class="card">
            <div class="card-header"><h4>Edit Book Detail</h4></div>
            <div class="card-body">
                <form enctype="multipart/form-data" method="POST" id="myForm">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Book Name</label>
                                <input type="hidden" class="form-control" id="book_id" name="book_id" aria-describedby="emailHelp" placeholder="Enter Book Name.">
                                <input type="text" class="form-control" list="book_list" id="book_name" name="book_name" aria-describedby="emailHelp" placeholder="Enter Book Name.">
                                <datalist id="book_list"></datalist>
                            </div>
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Book Code</label>
                                <input type="text" class="form-control" id="book_code" name="book_code" placeholder="Enter Book Code.">
                            </div>        
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Book Quantity</label>
                                <input type="text" class="form-control" id="book_qty" name="book_qty" placeholder="Enter Book Quantity.">
                            </div>        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Book Price</label>
                                <input type="text" class="form-control" id="book_price" name="book_price" placeholder="Enter Book Price.">
                            </div>        
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <img id="image">
                                <label for="exampleInputPassword1">Upload Image</label>
                                <input type="file" class="form-control-file" id="book_image" name="book_image">
                                <input type="hidden" class="form-control-file" id="hide_image" name="hide_image">
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
    // get the book input tag with help of id.
    var book_name = document.getElementById("book_name"); 
    book_name.onkeyup = function(e){
        // stop the default working of form.
        e.preventDefault();
        // get the book value from its input tag.
        let bn = book_name.value;

        // get the all input tag with help of id.
        let bookList = document.getElementById("book_list");
        let bookID = document.getElementById("book_id");
        let bookCode = document.getElementById("book_code");
        let bookQty = document.getElementById("book_qty");
        let bookPricie = document.getElementById("book_price");
        let bookImage = document.getElementById("image");
        let hideImage = document.getElementById("hide_image");

        // create json.
        var data = {book_name:bn}

        // convert json formate.
        data = JSON.stringify(data);

        // check if book name is empty this block of code not execute.
        if(bn != ""){
            // create XMLHttpRequest object.
            var req = new XMLHttpRequest();

            // create url and define method here.
            req.open("POST", "<?php echo base_url(). 'book/Books/editBookDetails' ?>", true);
            // set request header for send data.
            req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            // send data which is json format. note = this sign specify must compulusory.
            req.send("data="+data);

            // this fuction execute when our controller find.
            req.onreadystatechange = function(){
                // ready state return 4 and status return 200 means our controller find and it execute.
                if(req.readyState == 4 && req.status == 200){
                    // return data convert to the json.
                    var record = JSON.parse(req.responseText);
                    // get the return result Length.
                    var bookRecordLength = record.response.length;
                    // first empty the datalist.
                    bookList.innerHTML = "";
                    // fetch the record from return result.
                    for(let rec = 0; rec < bookRecordLength; rec++){
                        // create option tag for datalist.
                        var option = document.createElement("option");
                        // insert the value in option.
                        option.value = record['response'][rec]['book_name'];
                        // append option in datalist.
                        bookList.appendChild(option);

                        // append another value in input tag.
                        bookID.value = record['response'][rec]['book_id'];
                        bookCode.value = record['response'][rec]['book_code'];
                        bookQty.value = record['response'][rec]['book_qty'];
                        bookPricie.value = record['response'][rec]['book_price'];

                        // set the image src attribute and apply css.
                        bookImage.src = record['response'][rec]['book_image'];
                        bookImage.style.height = "80px";
                        bookImage.style.width = "80px";
                        bookImage.classList.add("img-thumbnail");

                        // get the old image path and send it hidden in controller.
                        hideImage.value = record['response'][rec]['book_image'];
                    }                
                }
            }
        }else{
            // all input and img tag empty.
            bookID.value = "";
            bookCode.value = "";
            bookQty.value = "";
            bookPricie.value = "";
            bookImage.src = "";
            bookImage.style.height = "";
            bookImage.style.width = "";
            bookImage.classList.remove("img-thumbnail");
            hideImage.value = "";
        }
    }
    
    // get the form with help of its id.
    var myFormData = document.getElementById("myForm");
    myFormData.onsubmit = function(e){
        // stop the default working of form.
        e.preventDefault();
        // create XMLHttpRequest object.
        var req = new XMLHttpRequest();

        // create url and define method here.
        req.open("POST", "<?php echo base_url(). 'book/Books/updateBookDetails'?>", true);
        // send data using FormData function.
        req.send(new FormData(myFormData));

        // this fuction execute when our controller find.
        req.onreadystatechange = function(){
            // ready state return 4 and status return 200 means our controller find and it execute.
            if(req.readyState == 4 && req.status == 200){
                let record = JSON.parse(req.responseText);
                let bookImage = document.getElementById("image");
                if(record != ""){
                    bookImage.src = record['response'];
                    bookImage.style.height = "80px";
                    bookImage.style.width = "80px";
                    bookImage.classList.add("img-thumbnail");
                }else{
                    bookImage.src = "";
                    bookImage.style.height = "";
                    bookImage.style.width = "";
                    bookImage.classList.remove("img-thumbnail");                    
                }
                
            }
        }
    }
</script>
<?php include_once(APPPATH."views/footer.php");?>