<?php
    class members extends CI_Model{
        public function saveMember($member_details){
            try{
                $this->db->insert("members", $member_details);
            }catch(Exception $e){
                echo $e;
            }
        }

        public function getMemberDetails($mem_name){
            $this->db->select('*');
            $this->db->from('members');
            $this->db->like('membername', $mem_name);
            return $this->db->get()->result_array();
        }

        public function updateMemberDetails($mem_id, $member_details){
            $this->db->where("memid", $mem_id)
                        ->update("members", $member_details);
        }

        public function getMmberIdDetails($emailID){
            $result = $this->db->select("memid, membername, membcontact, memimage, city, DOB, DOJ")->where("mememail", $emailID)->get("members");
            if(!$result){
                return false;
            }else{
                return $result->row();
            }
        }
    }
?>