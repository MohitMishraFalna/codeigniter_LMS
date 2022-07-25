<?php
    class Orderbook extends CI_Controller{
        public function search_member(){
            $serch_item = $this->input->post("data");

            $this->load->model("ordermodel/Ordermodel", "ordermodel");
            $result = $this->ordermodel->search_Member($serch_item);

            echo json_encode(['search_result'=>$result]);
        }

        public function search_book(){
            $serch_item = $this->input->post("data");

            $this->load->model("ordermodel/Ordermodel", "ordermodel");
            $result = $this->ordermodel->search_Book($serch_item);

            echo json_encode(['search_result'=>$result]);
        }

        public function book_details(){
            $serch_item = $this->input->post("data");

            $this->load->model("ordermodel/Ordermodel", "ordermodel");
            $result = $this->ordermodel->book_Details($serch_item);

            echo json_encode(['search_result'=>$result]);
        }

        public function create_order(){
            $record = $this->input->get("data");
            if($record){
                $record = json_decode($record);
                $book_id = $record->book_id;
                $trans_deatails = array();

                $trans_deatails['member_id'] = $record->member_id;
                $trans_deatails['amount_paid'] = $record->amount_paid;

                // print_r($trans_deatails);
                $this->load->model("ordermodel/Ordermodel", "ordermodel");
                $result = $this->ordermodel->save_Transaction($trans_deatails);

                $book_details = array();
                for($i=0; $i < count($book_id); $i++){
                    $book_details[$i]['book_id'] = $book_id[$i];
                    $book_details[$i]['trans_id'] = $result;
                    $result1 = $this->ordermodel->save_trans_prod($book_details[$i]);
                    
                }
                
            }else{
                $this->load->view("orderview/order");
            }
        }

        public function order_print(){
            $this->load->model("ordermodel/Ordermodel");
            $result = $this->Ordermodel->getData();
            $this->load->view("orderview/orderprint", compact("result"));
        }
    }
?>