<?php
    class Plans extends CI_Model{
        public function addPlan($data_arr){
            return $this->db->insert("plans", $data_arr);
        }
        public function search($src){
            $this->db->select("*");
            $this->db->like("planname",$src);
            return $this->db->get("plans")->result_array();
        }

        public function updatePlan($plan_id, $plan_details){
            $this->db->where("planid", $plan_id)
                        ->update("plans", $plan_details);
        }

        public function getDetails(){
            $result = $this->db->select("planid, planname, validity, amount")->get("plans");

            if(!$result){
                return false;
            }

            if($result->num_rows() > 0){
                return $result->result_array();
            }

            return false;
        }

        public function getMEMBERPlan($member_details, $plan_details){
            $response = $this->db->select("m.memid, m.membername, m.mememail, m.membcontact, m.memimage, m.total_issued, m.total_paid, p.*")
                                //  ->from("members as m, plans as p")
                                 ->where($member_details, array("planid", $plan_details))
                                 ->get("members as m, plans as p");

            if(!$response){
                return false;
            }

            if($response->num_rows() > 0){
                return  $response->row();
            }
            return false;
        }

        public function applySubscription($subscribeArray){
            // print_r($subscribeArray['member_id']);die();
            $response = $this->db->insert("subscriptions", $subscribeArray);
            if($response){
                $result = $this->db->select("*")
                                   ->where($subscribeArray)
                                   ->get("subscriptions");
                if(!$result){
                    return false;
                }
    
                if($result->num_rows() > 0){
                    return  $result->row();
                }
                return false;
            }
        }
    }
?>