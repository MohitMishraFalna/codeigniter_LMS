<?php
    class member extends CI_Controller{
        public function index(){
            if(!$this->session->userdata('logged_in')){
                redirect('LMS_Login/login');
            }

            $mem_name = $this->input->post("member_name");
            if(!empty($mem_name)){
                // upload image
                $this->load->library("upload");

                $config['upload_path'] = "./uploads";
                $config['allowed_types'] = "jpg|jpeg|png|gif";
                $config['max_size'] = "500";
                $config['max_width'] = "2048";
                $config['max_height'] = "1600";

                $this->upload->initialize($config);
                
                $this->upload->do_upload('member_image');
                $data = $this->upload->data();

                $this->upload->do_upload('sign_image');
                $data1 = $this->upload->data();

                $img_path = base_url('uploads/' . $data['raw_name'] . $data['file_ext']);
                $img_path1 = base_url('uploads/' . $data1['raw_name'] . $data1['file_ext']);

                $member_details = array();
                $member_details['membername'] = $mem_name;
                $member_details['membcontact'] = $this->input->post('member_cont');
                $member_details['mememail'] = $this->input->post('member_email');
                $member_details['gender'] = $this->input->post('member_gender');
                $member_details['pincode'] = $this->input->post('pincode');
                $member_details['city'] = $this->input->post('city_name');
                $member_details['district'] = $this->input->post('dist_name');
                $member_details['rigion	'] = $this->input->post('region_name');
                $member_details['state'] = $this->input->post('state_name');
                $member_details['contry'] = $this->input->post('contry_name');
                $member_details['DOB'] = $this->input->post('dob');
                $member_details['DOJ'] = $this->input->post('doj');
                $member_details['memimage'] = $img_path;
                $member_details['signimage'] = $img_path1;

                $this->load->model("membermodel/members");
                $this->members->saveMember($member_details);

                echo json_encode(["success" => "A New Member add in your database."]);
            }else{
                $this->load->view("viewMember/add_member");
            }
        }

        public function memberedit(){
            $member_name = $this->input->post('data');
            if(!empty($member_name)){
                $this->load->model("membermodel/members");
                $result = $this->members->getMemberDetails($member_name);
                echo json_encode(["result" => $result]);
            }else{
                $this->load->view("viewMember/edit_member");
            }
        }
        
        public function updatemember(){
            // if(!$this->session->userdata('logged_in')){
            //     redirect('LMS_Login/login');
            // }
           
        
            $mem_name = $this->input->post("member_name");
            if(!empty($mem_name)){
                $img_path = $this->input->post("hide_memberimage");
                $img_path1 = $this->input->post("hide_signimage");

                $member_image = $_FILES["member_image"]["name"];
                $sign_image = $_FILES["sign_image"]["name"];
                
                // upload image
                $this->load->library("upload");

                $config['upload_path'] = "./uploads";
                $config['allowed_types'] = "jpg|jpeg|png|gif";
                $config['max_size'] = "500";
                $config['max_width'] = "2048";
                $config['max_height'] = "1600";

                $this->upload->initialize($config);

                if(!empty($member_image)){              
                    $this->upload->do_upload('member_image');
                    $data = $this->upload->data();
                    $img_path = base_url('uploads/' . $data['raw_name'] . $data['file_ext']);
                }                
                if(!empty($sign_image)){
                    $this->upload->do_upload('sign_image');
                    $data1 = $this->upload->data();
                    $img_path1 = base_url('uploads/' . $data1['raw_name'] . $data1['file_ext']);
                }

                $member_details = array();
                
                $mem_id = $this->input->post("hide_memberID");

                $member_details['membername'] = $mem_name;
                $member_details['membcontact'] = $this->input->post('member_cont');
                $member_details['mememail'] = $this->input->post('member_email');
                $member_details['gander'] = $this->input->post('member_gender');
                $member_details['pincode'] = $this->input->post('pincode');
                $member_details['city'] = $this->input->post('city_name');
                $member_details['district'] = $this->input->post('dist_name');
                $member_details['rigion	'] = $this->input->post('region_name');
                $member_details['state'] = $this->input->post('state_name');
                $member_details['contry'] = $this->input->post('contry_name');
                $member_details['DOB'] = $this->input->post('dob');
                $member_details['DOJ'] = $this->input->post('doj');
                $member_details['memimage'] = $img_path;
                $member_details['signimage'] = $img_path1;

                $this->load->model("membermodel/members");
                $this->members->updateMemberDetails($mem_id, $member_details);

                echo json_encode(["success" => "Member Details Updated seccussfully."]);
            }else{
                $this->load->view("viewMember/add_member");
            }
        }

        public function memberId(){
            // Validate
            $this->form_validation->set_rules("email_id", "Email", "required|valid_email");
            if($this->form_validation->run() == FALSE){
                $this->load->view("viewMember/memberID");
            }else{
                $email_id = $this->input->post("email_id");
                $this->load->model("membermodel/members");
                $response = $this->members->getMmberIdDetails($email_id);
                $this->load->view("viewMember/memberIDPrint", compact("response"));
            }
        }
    }
?>