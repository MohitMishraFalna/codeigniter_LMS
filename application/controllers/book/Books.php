<?php
    class Books extends CI_Controller{
        public function index(){

            if(!$this->session->userdata('logged_in')){
                redirect('LMS_Login/login');
            }

            /* get the value from html using (new FormData(myFomr)). here define book_name and ect is key this
            is html's name attribute related.*/
            $book_name = $this->input->post('book_name');
            $book_code = $this->input->post('book_code');
            $book_qty = $this->input->post('book_qty');
            $book_price = $this->input->post('book_price');
            if(!empty($book_name)){

                // load library for file upload.
                $this->load->library('upload');

                // set the file validation.
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '500';
                $config['max_width'] = '2048';
                $config['max_height'] = '1500';

                // this is attech the file validation from library.
                $this->upload->initialize($config);

                // this is save the file name in upload folder which is standing in LMS project
                $this->upload->do_upload('book_image');

                // get the data from the image array for create path which is save the database.
                $data = $this->upload->data();
                
                // create path. this path is save in database.
                $img_path = base_url('uploads/' . $data['raw_name'] . $data['file_ext']);
                // echo '<pre>';
                // print_r($img_path);
                // echo '</pre>';
                // exit;
                
                // create array for save the whole data in database.
                $form = array();

                // initialize whole data in array.
                $form['book_name'] = $book_name;
                $form['book_code'] = $book_code;
                $form['book_price'] = $book_qty;
                $form['book_qty'] = $book_price;
                $form['book_image'] = $img_path;

                // load the models and fire the insert query
                $this->load->model('book/BooksModel');
                $this->BooksModel->newBookDetails($form);
                
            }
            $this->load->view('book/add_book');
        }

        public function editBookDetails(){

            if(!$this->session->userdata('logged_in')){
                redirect('LMS_Login/login');
            }
            // access html javascript json data.
            $record = $this->input->post('data');
            // check the data is exist or not in $record variable.
            if($record){ //if data is exist in record so execute this part.
                // apply json_deoce on data. it help to access data easily and its compulsory.
                $record = json_decode($record);
                // access data after appy json_decode. book_name is a key which is related from html name attribute.
                $book_name = $record->book_name;

                // load the model for fire query in database.
                $this->load->model('book/BooksModel');
                $getResult = $this->BooksModel->getBookDetails($book_name);
                
                echo json_encode(['response' => $getResult]);

            }else{// if data is not exist in record so execute this part.
                $this->load->view('book/edit_book');
            }
        }
        public function updateBookDetails(){
            if(!$this->session->userdata('logged_in')){
                redirect('LMS_Login/login');
            }

            /* when we send data using FormData function we can use this data from its html's name or id 
            tag. here not required to data convert using json_decode function. FormData की मदद से हमें जो Data प्राप्‍त 
            होता है वो वैसा ही होता है जैेसा कि हम सिदे html के name tag का Use करके data को controller में access करते हैं। */
            $book_id = $this->input->post("book_id");
            $book_name = $this->input->post("book_name");
            $book_code = $this->input->post("book_code");
            $book_qty = $this->input->post("book_qty");
            $book_price = $this->input->post("book_price");
            $hide_image = $this->input->post("hide_image");
            
            // get the file name using $_FILES array.
            $book_image = $_FILES["book_image"]["name"];

            // if user update his signature image so this condition is true.
            if(!empty($book_image)){
                // load upload library.
                $this->load->library("upload");

                // apply condition on image file.
                $config = [
                    "upload_path"       => './uploads/',
                    "allowed_types"     => 'jpg|gif|jpeg|png|',
                    "max_size"          => '500',
                    "max_height"        => '2048',
                    "max_width"         => '1600'
                ];

                // connect to the configruation/ config from upload library.
                $this->upload->initialize($config);

                // save the image in upload folder which is created by us.
                $this->upload->do_upload("book_image");

                // get the image details for create path.
                $data = $this->upload->data();

                // create path for save in the table.
                $hide_image = base_url("uploads/" . $data["raw_name"] . $data["file_ext"]);

            }

            // create array and append all data in array for save in database.
            $formarr = array();
            $formarr["book_name"] = $book_name;
            $formarr["book_code"] = $book_code;
            $formarr["book_price"] = $book_qty;
            $formarr["book_qty"] = $book_price;
            $formarr["book_image"] = $hide_image;

            // load model.
            $this->load->model("book/BooksModel");
            // call function which is inside the model and send argument. this function return value. this value hold in a variable.
            $updata_img = $this->BooksModel->updateBooks($book_id, $formarr);

            // return the value in view convert in json formate.
            echo json_encode(["response" => $updata_img]);            
        }

        public function apiAddress(){
            if(!$this->session->userdata('logged_in')){
                redirect('LMS_Login/login');
            }

            $pincode = $this->input->post("pincode");
            
            $result = file_get_contents("http://postalpincode.in/api/pincode/" . $pincode);
            echo $result;
        }

        public function add_authorDetails(){
            if(!$this->session->userdata('logged_in')){
                redirect('LMS_Login/login');
            }
            
            $author_record = $this->input->post("data");
            if($author_record){
                // json data decode for use in controller.
                $author_record = json_decode($author_record);

                // create array.
                $formarr = array();
                
                // fetch the data from json using key.
                $formarr["auth_name"] = $author_record->author_Name;
                $formarr["auth_email"] = $author_record->author_Email;
                $formarr["auth_contact"] = $author_record->author_Contact;
                $formarr["auth_pincode"] = $author_record->author_Pincode;
                $formarr["auth_city"] = $author_record->author_CityName;
                $formarr["auth_distict"] = $author_record->author_DistName;
                $formarr["auth_region"] = $author_record->author_RegionName;
                $formarr["auth_state"] = $author_record->author_StateName;
                $formarr["auth_contry"] = $author_record->author_ContryName;
                
                // load the model.
                $this->load->model("book/BooksModel");
                // call the authorDetailsSave function which is standing in model and pass the data which is save in database.
                $this->BooksModel->authorDetailsSave($formarr);

                // Return the success Function to user.
                echo json_encode(["success" => "New Author is Add in your Channel."]);

            }else{
                $this->load->view('book/author_Details');
            }
        }

        public function edit_authorDetails(){
            if(!$this->session->userdata('logged_in')){
                redirect('LMS_Login/login');
            }

            $author_name = $this->input->post('data');
            if(!empty($author_name)){
                $this->load->model("book/BooksModel");
                $result = $this->BooksModel->getAuthorDetails($author_name);
                echo json_encode(["result" => $result]);
            }else{
                $this->load->view('book/edit_author_Details');
            }
        }

        public function update_authorDetails(){
            if(!$this->session->userdata('logged_in')){
                redirect('LMS_Login/login');
            }

            $author_record = $this->input->post("data");
            if($author_record){
                // json data decode for use in controller.
                $author_record = json_decode($author_record);

                // create array.
                $formarr = array();
                
                // fetch the data from json using key.
                $hide_authorId = $author_record->hide_authorId;
                $formarr["auth_name"] = $author_record->author_Name;
                $formarr["auth_email"] = $author_record->author_Email;
                $formarr["auth_contact"] = $author_record->author_Contact;
                $formarr["auth_pincode"] = $author_record->author_Pincode;
                $formarr["auth_city"] = $author_record->author_CityName;
                $formarr["auth_distict"] = $author_record->author_DistName;
                $formarr["auth_region"] = $author_record->author_RegionName;
                $formarr["auth_state"] = $author_record->author_StateName;
                $formarr["auth_contry"] = $author_record->author_ContryName;
                
                // load the model.
                $this->load->model("book/BooksModel");
                // call the authorDetailsSave function which is standing in model and pass the data which is save in database.
                $this->BooksModel->updateAuthorDetails($hide_authorId, $formarr);

                // Return the success Function to user.
                echo json_encode(["success" => "Author is Updated Successfully."]);

            }else{
                $this->load->view('book/author_Details');
            }
        }

        public function add_publisherDetails(){
            if(!$this->session->userdata('logged_in')){
                redirect('LMS_Login/login');
            }

            $publisher_record = $this->input->post("data");
            
            if($publisher_record){
                // json data decode for use in controller.
                $publisher_record = json_decode($publisher_record);
                
                // create array.
                $formarr = array();
                
                // fetch the data from json using key.
                $formarr["pub_company"] = $publisher_record->com_Name;
                $formarr["pub_name"] = $publisher_record->pub_Name;
                $formarr["pub_email"] = $publisher_record->pub_Email;
                $formarr["pub_contact"] = $publisher_record->pub_Contact;
                $formarr["pub_pincode"] = $publisher_record->pub_Pincode;
                $formarr["pub_city"] = $publisher_record->pub_CityName;
                $formarr["pub_distict"] = $publisher_record->pub_DistName;
                $formarr["pub_region"] = $publisher_record->pub_RegionName;
                $formarr["pub_state"] = $publisher_record->pub_StateName;
                $formarr["pub_contry"] = $publisher_record->pub_ContryName;
                
                // // load the model.
                $this->load->model("book/BooksModel");
                // call the authorDetailsSave function which is standing in model and pass the data which is save in database.
                $this->BooksModel->publisherDetailsSave($formarr);

                // Return the success Function to user.
                echo json_encode(["success" => "New Publisher is Add in your Channel."]);

            }else{
                $this->load->view('book/publisher_Details');
            }
        }

        public function edit_publisherDetails(){
            if(!$this->session->userdata('logged_in')){
                redirect('LMS_Login/login');
            }
            $publisher_name = $this->input->post('data');
            if(!empty($publisher_name)){
                $this->load->model("book/BooksModel");
                $result = $this->BooksModel->getPublisherDetails($publisher_name);
                echo json_encode(["result" => $result]);
            }else{
                $this->load->view('book/edit_publisher_Details');
            }
        }

        public function update_publisherDetails(){
            if(!$this->session->userdata('logged_in')){
                redirect('LMS_Login/login');
            }

            $publisher_record = $this->input->post("data");
            if($publisher_record){
                // json data decode for use in controller.
                $publisher_record = json_decode($publisher_record);

                // create array.
                $formarr = array();
                
                // fetch the data from json using key.
                $hide_publisherId = $publisher_record->hide_PublisherId;
                $formarr["pub_company"] = $publisher_record->publisher_Company;
                $formarr["pub_name"] = $publisher_record->publisher_Name;
                $formarr["pub_email"] = $publisher_record->publisher_Email;
                $formarr["pub_contact"] = $publisher_record->publisher_Contact;
                $formarr["pub_pincode"] = $publisher_record->publisher_Pincode;
                $formarr["pub_city"] = $publisher_record->publisher_CityName;
                $formarr["pub_distict"] = $publisher_record->publisher_DistName;
                $formarr["pub_region"] = $publisher_record->publisher_RegionName;
                $formarr["pub_state"] = $publisher_record->publisher_StateName;
                $formarr["pub_contry"] = $publisher_record->publisher_ContryName;
                
                // // load the model.
                $this->load->model("book/BooksModel");
                // call the authorDetailsSave function which is standing in model and pass the data which is save in database.
                $this->BooksModel->updatePublisherDetails($hide_publisherId, $formarr);

                // Return the success Function to user.
                echo json_encode(["success" => "Publisher Details Updated Successfully."]);

            }else{
                $this->load->view('book/edit_publisher_Details');
            }
        }
        public function test(){
            $this->load->view('book/test');
        }
    }
?>