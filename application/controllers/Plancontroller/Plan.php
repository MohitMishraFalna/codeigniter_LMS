<?php
    class Plan extends CI_Controller{
        public function index(){
            $plan_name = $this->input->post("plan_name");
            if(!empty($plan_name)){
                $data_arr = array();
                $data_arr["PLANNAME"] = $plan_name;
                $data_arr["VALIDITY"] = $this->input->post("plan_valid");
                $data_arr["AMOUNT"] = $this->input->post("plan_amt");
                $data_arr["STATUS"] = $this->input->post("status"); 

                $this->load->model("Planmodel/Plans");
                $result = $this->Plans->addPlan($data_arr);
                if($result == 1){
                    echo json_encode(["success"=>"Your Plan is Activated."]);
                }
            }else{
                $this->load->view("Planview/Planadd");
            }                        
        }

        public function editDetails(){
            $src = $this->input->post("data");
            if(!empty($src)){
                $this->load->model("Planmodel/Plans");
                $result = $this->Plans->search($src);

                echo json_encode(["search_result"=>$result]);
            }else{
                $this->load->view("Planview/Planedit");
            }
        }

        public function updatePlanDetails(){
            $plan_id = $this->input->post("plan_id");
            if(!empty($plan_id)){
                $data_arr = array();
                $data_arr["PLANNAME"] = $this->input->post("plan_name");;
                $data_arr["VALIDITY"] = $this->input->post("plan_valid");
                $data_arr["AMOUNT"] = $this->input->post("plan_amt");
                $data_arr["STATUS"] = $this->input->post("status"); 

                $this->load->model("Planmodel/Plans");
                $this->Plans->updatePlan($plan_id, $data_arr);
                
                echo json_encode(["success"=>"Your Plan updated successfully."]);
                
            }else{
                $this->load->view("Planview/Planadd");
            }                        
        }

        public function getPlanDetails(){
            $this->load->model("Planmodel/Plans");
            $result = $this->Plans->getDetails();
            // die($result);
            $noOfRow = count($result);
        
            /* This line calculate the row and column. How many row display in html page and how many column display at 
            one row. */
            $divideRow = $noOfRow / 5;
            $calculatedRow = $noOfRow % 5;        

            /* This ($row) variable assign the row if $noOfRow % 3 == 0 that's mean is row's number is sum/even or if the 
            $noOfRow % 3 == 1 that's mean is row's number is Odd/nagative. it means result is 0 so we will send the even row
            and $noOfRow assign to 0. जब हम $noOfRow को 0 से assign करेंगे तो हमारे द्वारा Print कराऐ जा रहे Column में Blank Column 
            Add नही होंगे। */
            $row = 0;
            if($calculatedRow == 0){
                $row = $divideRow;
                $noOfRow = 0;
            }else{
                /*जब यह Condition True होती है तो इसका मतलब हमारी Table से जो Row की संख्‍या आ रही है उसमें भाग देने के बाद जो Result 
                Ganerate होता है वो दशमलव में हेाता है और इससे हमारे द्वारा Print करवाई जा रही Column की संख्‍या कम होगी इस लिए आने वाले 
                Result में हम एक जोड़ देते हैं। जिससे हमारी Row के अन्‍दर सभी Data Column के रूप में Print हो जाता है। */
                $row = $divideRow + 1;
                $row = (int)$row;
            }

            $this->load->view("Planview/Plandetails",['response'=>$result, 'row1' => $row, 'dbtable_row'=>$noOfRow]);
        }

        public function searchMemberDetails(){
            $src = $this->input->get("data");
            if(!empty($src)){                
                $this->load->model("membermodel/members");
                $result = $this->members->getMemberDetails($src);

                echo json_encode(["search_result"=>$result]);
            }
        }

        public function memberData(){
            $subscription_details = json_decode($this->input->get("data"));
            $member_email = $subscription_details->mail_id;
            $plan_id = $subscription_details->plan_id;
            $details = array();
            $result = '';
            $this->load->model("Planmodel/Plans", "plans");
            if($member_email != ""){                
                $details["memid"] = $subscription_details->mem_id;
                $details["mememail"] =$member_email;
                $result = $this->plans->getMEMBERPlan($details, $plan_id);
            }else{
                $details["memid"] = $subscription_details->member_id;
                $result = $this->plans->getMEMBERPlan($details, $plan_id);
            }
            $this->load->view("Subscriber/Subscriber", compact("result"));
        }

        public function subscriptionApply(){
            $subscription_confirm = json_decode($this->input->get("data"));
            $endDate=Date('y:m:d', strtotime("+15 days"));

            $confirm_arr = array();
            $confirm_arr['member_id	']  = $subscription_confirm->mem_id;
            $confirm_arr['plan_id']     = $subscription_confirm->plan_id;
            $confirm_arr['sub_end']     = $endDate;
            $confirm_arr['pay_mode']    = $subscription_confirm->payment_mode;

            $this->load->model("Planmodel/Plans", "plans");
            $response = $this->plans->applySubscription($confirm_arr);
            echo json_encode(["data"=>$response]) ;
        }
    }
?>