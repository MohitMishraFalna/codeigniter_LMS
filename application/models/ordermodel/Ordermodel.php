<?php
    class Ordermodel extends CI_Model{
        public function search_Member($serch_item){
            // SELECT members.* FROM members INNER JOIN subscriptions ON members.memid = subscriptions.member_id WHERE membername LIKE "%M%"
            $result = $this->db->select('members.memid, members.membername, members.membcontact')
                     ->join('subscriptions','members.memid = subscriptions.member_id')
                     ->like("membername", $serch_item)
                     ->get('members');

            if(!$result){
                return false;
            }

            if($result->num_rows() > 0){
                return  $result->result_array();
            }
            return false;
        }

        public function search_Book($serch_item){
            // SELECT members.* FROM members INNER JOIN subscriptions ON members.memid = subscriptions.member_id WHERE membername LIKE "%M%"
            $result = $this->db->select('book_name')
                     ->like("book_name", $serch_item)
                     ->get('book');

            if(!$result){
                return false;
            }

            if($result->num_rows() > 0){
                return  $result->result_array();
            }
            return false;
        }

        public function book_Details($serch_item){
            // SELECT members.* FROM members INNER JOIN subscriptions ON members.memid = subscriptions.member_id WHERE membername LIKE "%M%"
            $result = $this->db->select('*')
                     ->where("book_name", $serch_item)
                     ->get('book');

            if(!$result){
                return false;
            }

            if($result->num_rows() > 0){
                return  $result->result_array();
            }
            return false;
        }

        public function save_Transaction($trans_details){
            // SELECT members.* FROM members INNER JOIN subscriptions ON members.memid = subscriptions.member_id WHERE membername LIKE "%M%"
            $this->db->insert("transactions", $trans_details);

            $result = $this->db->order_by('trans_id', "desc")
                               ->limit(1)
                               ->get("transactions");
            if(!$result){
                return false;
            }

            if($result->num_rows() > 0){
                return  $result->row()->trans_id;;
            }
            return false;
        }
        
        public function save_trans_prod($trans_details){
            // SELECT members.* FROM members INNER JOIN subscriptions ON members.memid = subscriptions.member_id WHERE membername LIKE "%M%"
            $this->db->insert("trans_products", $trans_details);
        }

        public function getData(){
            $result = $this->db->select("m.memid,m.membername, m.mememail, m.membcontact, m.memimage, m.city, m.pincode, b.book_name,b.book_image,b.book_price,b.book_price, t.issue_date, t.amount_paid")
                 ->from("members as m, book as b, transactions as t, trans_products as tp")
                 ->where("m.memid = t.member_id AND t.trans_id = tp.trans_id and b.book_id = tp.book_id")
                 ->where("t.trans_id = tp.trans_id")
                 ->where("b.book_id = tp.book_id")
                 ->get();
            
            if(!$result){
                return false;
            }

            if($result->num_rows() > 0){
                return  $result->result_array();
            }
            return false;
        }
    }
?>