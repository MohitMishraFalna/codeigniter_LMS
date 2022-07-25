<?php
    class Register extends CI_Model{
        public function registeration($rgr_Array)
        {
            # Connect from table
            try{
                $this->db->insert("employeed", $rgr_Array);
            }catch(Exception $e){
                echo $e;
            }
            
        }

        public function update($rgr_Array)
        {
            // get the last record from database. ;
            $emp_id = $this->db->order_by('id', "desc")
                                ->limit(1)
                                ->get("employeed")
                                ->row()->id;
            // Update Your data;
            $this->db->where('id', $emp_id)
                    ->update("employeed", $rgr_Array);
        }

        public function userLogin($email, $password){
            // retrieve the data from data base according to condition.
            $this->db->select('id, emp_email, emp_pwd, emp_image');
            $this->db->where(['emp_email'=>$email, 'emp_pwd'=>$password]);
            $query = $this->db->get('employeed');
            $row = $query->row();
            // echo "<pre>";
            // print_r($row);
            // echo "</pre>";
            // exit();
            return $row;
        }

        public function getDataNewPass($email){
            $this->db->select('emp_email');
            $this->db->where('emp_email',$email);
            $query = $this->db->get('employeed');
            $row = $query->row();
            return $row;            
        }
        public function newpasswordupdate($email, $password)
        {
           // Update Your data;
            $this->db->where('emp_email', $email)
                    ->update("employeed", ['emp_pwd'=>$password]);
        }

        public function getUserData($session_id){
            // get all record from database table according to condition.
            $this->db->where('id',$session_id);
            $userData = $this->db->get("employeed")->result_array();
            // echo '<pre>';
            // print_r($userData);
            // echo '</pre>';
            // exit; 
            return $userData;
        }

        public function updateUserData($user_id, $formArray){

            $this->db->where('id', $user_id);
            $this->db->update("employeed", $formArray);
            // echo '<pre>';
            // print_r($user_id);
            // print_r($formArray);
            // echo '</pre>';
            // exit;
        }

        public function updateUserPassword($formArray, $newPassword){

            $this->db->where($formArray);
            $result = $this->db->update("employeed", ['emp_pwd' => $newPassword]);
            // echo '<pre>';
            // // print_r($user_id);
            // print_r($result);
            // echo '</pre>';
            // exit;
        }

        public function updateUserPhoto($user_id, $newImage){

            // update and select
            $this->db->where('id', $user_id);
            $result = $this->db->update("employeed", ['emp_Image' => $newImage]);
            // echo '<pre>';
            // // print_r($user_id);
            // print_r($result);
            // echo '</pre>';
            // exit;
            // image select.
            $this->db->where('id',$user_id);
            $retrieveImage = $this->db->get("employeed");
            $imagedisplay = $retrieveImage->row()->emp_Image;
            return $imagedisplay;
        }
    }
?>