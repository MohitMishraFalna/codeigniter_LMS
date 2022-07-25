<?php include_once(APPPATH.'views/header.php') ?>
<div class="row" style="margin:5%;">
    <div class="col-sm-6 offset-sm-3">
        <div class="card">
            <div class="card-header"><h4>Add New Book Detail</h4></div>
            <div class="card-body">
                <form enctype="multipart/form-data" method="POST" id="myForm">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Book Name</label>
                                <input type="text" class="form-control" id="book_name" name="book_name" aria-describedby="emailHelp" placeholder="Enter Book Name.">
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
                                <label for="exampleInputPassword1">Upload Image</label>
                                <input type="file" class="form-control-file" id="book_image" name="book_image">
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

// get the form using id.
  const myForm = document.getElementById("myForm");
  myForm.addEventListener("submit", (e) => {
    // stop the default working of the form.
    e.preventDefault();

    let bookName = myForm.book_name.value;
    let bookCode = myForm.book_code.value;
    let bookQty  = myForm.book_qty.value;
    let bookPrice = myForm.book_price.value;
    let bookImage = myForm.book_image.value;

    let validationArray = [bookName, bookCode, bookQty,bookPrice, bookImage];
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
            request.open("POST", "<?php base_url(). '/LMS/book/Books/' ?>);
        // this is function is run when our request is return 200.
            request.onload = function(){
                console.log(request.responseText);
            }
        // send data from the view to controller.
            request.send(new FormData(myForm));
    }
  });
</script>
<?php include_once(APPPATH."views/footer.php");?>