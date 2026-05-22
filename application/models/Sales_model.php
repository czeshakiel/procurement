<?php
    date_default_timezone_set('Asia/Manila');
    class Sales_model extends CI_model{
        public function __construct(){
            $this->load->database();
        }
        
        public function authenticate($username, $password){
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            $query = $this->db->get('users');
            if($query->num_rows() == 1){
                return $query->row_array();
            } else {
                return false;
            }
        }
        public function getAllProducts(){
            $query = $this->db->get('stocks');
            return $query->result_array();
        }

        public function getSingleProducts($id){
            $this->db->where('id', $id);
            $query = $this->db->get('stocks');
            if($query->num_rows() > 0){
                return $query->row_array();
            } else {
                return false;
            }
        }
    }
?>
