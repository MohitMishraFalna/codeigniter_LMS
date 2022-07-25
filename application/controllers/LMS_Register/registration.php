<?php
    class Registration extends CI_Controller{
        public function index(){
            // if($this->session->userdata('logged_in')){
            //     return redirect('employee_panel/workbanch');
            // }
            $this->load->view('LMS_Register/registration');
        }
        
        public function userRegister(){
            if($this->session->userdata('logged_in')){
                return redirect('employee_panel/workbanch');
            }
            $registerArray = array();
            $registerArray['emp_name'] = $this->input->post('username');
            $registerArray['emp_email'] = $this->input->post('usremail');
            $registerArray['emp_pwd'] = $this->input->post('pword');
            $this->load->model('LMS_Regi_Model/register');
            $this->register->registeration($registerArray);
            return redirect('LMS_Register/registration/profileeducation');
        }
        public function profileeducation(){
            if($this->session->userdata('logged_in')){
                return redirect('employee_panel/workbanch');
            }
            $fntclassName =  $this->input->get('class_name');
            $fntpassedYear = $this->input->get('passed_year');
            $fntpercentage =  $this->input->get('percentage');
            
            if($fntclassName == "" && $fntpassedYear == "" && $fntpercentage == "" ){
                $this->load->view('LMS_Register/profileeducation');
            }else{
                $registerArray = array();
                $registerArray['emp_classname'] = $fntclassName;
                $registerArray['emp_passingyear'] = $fntpassedYear;
                $registerArray['emp_percent'] = $fntpercentage;
                $this->load->model('LMS_Regi_Model/register');
                $this->register->update($registerArray);
                return redirect('LMS_Register/registration/profileupdate');
            }
        }
        public function profileupdate(){
            if($this->session->userdata('logged_in')){
                return redirect('employee_panel/workbanch');
            }
            $fntcontactNo = $this->input->post('contact_no');
            $fntdob = $this->input->post('dob');

            if($fntcontactNo == "" && $fntdob == ""){
                $this->load->view('LMS_Register/profileupdate');
            }else{
                $registerArray = array();
                // Load the library - no config specified here
                $this->load->library('upload');

                // Check if there was a file uploaded - there are other ways to
                // check this such as checking the 'error' for the file - if error
                // is 0, you are good to code
                // Specify configuration for File 1
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '500';
                $config['max_width']  = '1024';
                $config['max_height']  = '768';      

                // Initialize config for File 1
                $this->upload->initialize($config);

                // Upload file 1
                $this->upload->do_upload('upload_signature');
                $data = $this->upload->data();

                // Config for File 2 - can be completely different to file 1's config
                // or if you want to stick with config for file 1, do nothing!
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '500'; 
                $config['max_width']  = '1024';
                $config['max_height']  = '768';

                // Initialize the new config
                $this->upload->initialize($config);

                // Upload the second file
                $this->upload->do_upload('upload_photo');
                $data1 = $this->upload->data();
                
                // Get the image path that's path is assign in the database.
                $img_path = base_url('uploads/' . $data['raw_name'] . $data['file_ext']);
                $img_path1 = base_url('uploads/' . $data1['raw_name'] . $data1['file_ext']);
                
                // assign the path in a array which is content the other details of html page and stor the path in database fields.
                $registerArray['emp_signature'] = $img_path;
                $registerArray['emp_Image'] = $img_path1;

                // assign the Html page data in array which name is $registerArray.
                $registerArray['emp_contact'] = $fntcontactNo;
                $registerArray['emp_dob'] = $fntdob; 
                $this->load->model('LMS_Regi_Model/register');
                $this->register->update($registerArray);                
                return redirect('LMS_Login/login');
            }
        }
    }
?>