<?php
    class BooksModel extends CI_Model{
        public function newBookDetails($form){
            try{
                $this->db->insert("book", $form);
            }catch(Exception $e){
                echo $e;
            }
        }

        public function getBookDetails($book_name){
            $this->db->select("*");
            $this->db->like("book_name", $book_name);
            return $this->db->get("book")->result_array();

            // $this->db->select('*');
            // $this->db->from('book');
            // $this->db->like('book_name', $book_name);
            // return $this->db->get()->result_array();
            // both query working same.
        }

        public function updateBooks($book_id, $formarr){
            $this->db->where("book_id", $book_id)
                        ->update("book", $formarr);
            
            $this->db->where("book_id", $book_id);
            $image_path = $this->db->get("book")->row()->book_image;
            return $image_path;
        }

        public function authorDetailsSave($authorRecord){
            try{
                $this->db->insert("authors", $authorRecord);
            }catch(Exception $e){
                echo $e;
            }            
        }

        public function getAuthorDetails($auth_name){
            $this->db->select('*');
            $this->db->from('authors');
            $this->db->like('auth_name', $auth_name);
            return $this->db->get()->result_array();
        }

        public function updateAuthorDetails($auth_id, $author_details){
            $this->db->where("auth_id", $auth_id)
                        ->update("authors", $author_details);
        }

        public function publisherDetailsSave($publisherRecord){
            try{
                $this->db->insert("publishers", $publisherRecord);
            }catch(Exception $e){
                echo $e;
            }            
        }

        public function getPublisherDetails($publisher_name){
            $this->db->select('*');
            $this->db->from('publishers');
            $this->db->like('pub_company', $publisher_name);
            return $this->db->get()->result_array();
        }

        public function updatePublisherDetails($pub_id, $publisher_details){
            $this->db->where("pub_id", $pub_id)
                        ->update("publishers", $publisher_details);
        }
    }
?>