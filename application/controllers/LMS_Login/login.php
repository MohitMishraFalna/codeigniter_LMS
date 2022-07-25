<?php
    class Login extends CI_Controller{
        public function index(){
            if($this->session->userdata('logged_in')){
                return redirect('employee_panel/workbanch');
            }
            // The data coming from Html Page.
            $email =  $this->input->post('email');
            $password = $this->input->post('password');
            if(!empty($email) && !empty($password)){
                // call the model and its function.
                $this->load->model('LMS_Regi_Model/register');
                $result = $this->register->userLogin($email,$password);
                // // it print the data as array. if data comming from database.
                // echo "<pre>";
                // print_r($result);
                // echo "</pre>";
                // exit();

                // if result has data so this condition true and execute the if block otherwise else block
                if($result){
                    // यह एक Array है जो उन Data को Contain कर रहा है जिसे हम Session के जरिए Retrieve कर सकेगें। 
                    $setSession = array(
                        'user_id' => $result->id,
                        'user_email' => $result->emp_email,
                        'user_img' => $result->emp_image,
                        'logged_in' => TRUE,
                    );

                    // echo "<pre>";
                    // print_r($setSession);
                    // echo "</pre>";
                    // exit();

                    // set_userdata is the function which is set the session using session global variable.
                    $this->session->set_userdata($setSession);
                    return redirect('employee_panel/workbanch');
                }else{
                    // if result has no data so result return the false and then this block is run.
                    $this->session->set_flashdata('login_failed', 'Invalid Username/password. if you forget password click on right upper corner link.');
                    // return to login page.
                    return redirect('LMS_Login/login');
                }
            }

            $this->load->view('LMS_Login/login');
        }
        
        public function newPasswordUpdate(){
            if($this->session->userdata('logged_in')){
                return redirect('employee_panel/workbanch');
            }
            $email = $this->input->post('usremail');

            if(!empty($email)){
                $this->load->model('LMS_Regi_Model/register');
                $result =  $this->register->getDataNewPass($email);
                // echo "<pre>";
                // print_r($result);
                // echo "</pre>";
                // exit();
                if($result){
                    $this->load->view('LMS_Login/newpassword', ['email'=>$result]);
                }else{
                    // set_flashdata is a function which is help to display the message for the user.
                    $this->session->set_flashdata('emailnotfound', "User Doesn't exits Please Fill Charrect Email!");
                    $this->load->view('LMS_Login/changepassword');
                }
            }else{
                $this->load->view('LMS_Login/changepassword');
            }
        }
        public function newPassword(){
            if($this->session->userdata('logged_in')){
                return redirect('employee_panel/workbanch');
            }
            // this is the hide value access from the html page.
            $email = $this->input->post('hide_value');
            $password = $this->input->post('pword');

            // both field are not empty that's mean is the if condition is true.
            if(!empty($email) && !empty($password)){
                $this->load->model('LMS_Regi_Model/register');
                $this->register->newpasswordupdate($email, $password);
                redirect('LMS_Login/login');
            }
            $this->load->view('LMS_Login/newpassword');
        }

        public function userLogout(){
           // if session is login so we can logout the user using unset_userdata function.
            if($this->session->userdata('logged_in')):
                $this->session->unset_userdata('logged_in');
            endif;
            redirect('LMS_Login/login');
        }
    }
?>