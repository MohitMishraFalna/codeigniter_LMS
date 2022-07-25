<?php
    class Updateprofile extends CI_Controller{
        public function index(){
          // check session is set or not
          if(!$this->session->userdata('logged_in')):            
            // if session is not set so redirect on login page
            redirect('LMS_Login/login');
          endif;
          // session is set so display the updateprofile page on the brawoser.

          // get the user id from session.
          $user_id = $this->session->userdata('user_id');
          
          $this->load->model('LMS_Regi_Model/register');
          $db_userData = $this->register->getUserData($user_id);

          // create array and send data to view.
          $data = array();
          $data['userData']=$db_userData;  
          
          // send data on view.
          $this->load->view('LMS_Login/updateprofile', $data);
        }
        public function updatepassword(){
          if(!$this->session->userdata('logged_in')){
              redirect('LMS_Login/login');
          }
          
          $user_id = $this->session->userdata('user_id');
          $this->load->model('LMS_Regi_Model/register');
          $db_userData = $this->register->getUserData($user_id);

          $this->load->view('LMS_Login/updatepassword', ['userData' => $db_userData]);
        }

        public function upadateUserDetail(){
          if(!$this->session->userdata('logged_in')){
            redirect('LMS_Login/login');
          }

          // Upload image.

          // config path, image type, image size, image width, image height.
          $config['upload_path'] = './uploads/';
          $config['allowed_types'] = 'gif|jpg|png|jpeg|jfif';
          $config['max_size'] = '1000';
          $config['max_width']  = '1024';
          $config['max_height']  = '800';       

          // intialize the image file
          // $this->upload->initialize($config);

          
          // Include/load Library.
          $this->load->library('upload',$config);

          // upload the image in upload folder.
          $this->upload->do_upload('upload_signature');
          $data = $this->upload->data();
          /*echo "<pre>";
          print_r($data);
          echo "</pre>";
          exit;*/
          
          // get the path of image which is save the database.
          $img_path = base_url('uploads/' . $data['raw_name'] . $data['file_ext']);
        
          // get user id from session for update user details.
          $user_id = $this->session->userdata('user_id');

          // create array for storing html data to update.
          $formArray = array();
          $formArray['emp_signature'] = $img_path;
          $formArray['emp_name'] = $this->input->post('emp_name');
          $formArray['emp_contact'] = $this->input->post('emp_contact');
          $formArray['emp_roll'] = $this->input->post('emp_roll');
          $formArray['emp_email'] = $this->input->post('emp_email');
          $formArray['emp_classname'] = $this->input->post('emp_class');
          $formArray['emp_passingyear'] = $this->input->post('emp_passinyear');
          $formArray['emp_percent'] = $this->input->post('emp_percent');
          $formArray['emp_pincode'] = $this->input->post('pincode');
          $formArray['emp_cityname'] = $this->input->post('city_name');
          $formArray['emp_districtname'] = $this->input->post('district_name');
          $formArray['emp_state'] = $this->input->post('state_name');
          $formArray['emp_contry'] = $this->input->post('contry_name');
          $formArray['emp_dob'] = $this->input->post('emp_dob');

          // save photo in database.
         
          $this->load->model('LMS_Regi_Model/register');
          $this->register->updateUserData($user_id, $formArray);
                         
          return redirect('LMS_Login/updateprofile');
      }

      public function updateUserProfilePassword(){

        if(!$this->session->userdata('logged_in')){
          redirect('LMS_Login/login');
        }
        // get user id from session for update user details.
        $user_id = $this->session->userdata('user_id');

        $formArray = array();
        $formArray['id'] = $user_id;
        $formArray['emp_email'] = $this->input->post('email');
        $formArray['emp_pwd'] = $this->input->post('old_password');

        $newPassword = $this->input->post('new_password');
        
        $this->load->model('LMS_Regi_Model/register');
        $this->register->updateUserPassword($formArray, $newPassword);

        return redirect('LMS_Login/updateprofile/updatepassword');
      }

      public function saveProfileImage(){
        // get user id from session for update user details.
        $user_id = $this->session->userdata('user_id');

        // config path, image type, image size, image width, image height.
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '500';
        $config['max_width']  = '2048';
        $config['max_height']  = '1600';       

        // intialize the image file
        // $this->upload->initialize($config);

        
        // Include/load Library.
        $this->load->library('upload',$config);

        // upload the image in upload folder.
        $this->upload->do_upload('imagefile');
        $data = $this->upload->data();
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;

        // get the path of image which is save the database.
        $img_path = base_url('uploads/' . $data['raw_name'] . $data['file_ext']);
        
        $this->load->model("LMS_Regi_Model/register");
        $imageDisplay = $this->register->updateUserPhoto($user_id, $img_path);
        // echo json_encode('<img src="'.$imageDisplay.'">');
        echo json_encode($imageDisplay);
      }
    }
?>