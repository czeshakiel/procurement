<?php
    date_default_timezone_set('Asia/Manila');
    class Procurement_model extends CI_model{
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
        public function getAllUsers(){
            $query = $this->db->get('users');
            return $query->result_array();
        }
        public function save_users(){
            $id = $this->input->post('id');
            $fullname = $this->input->post('fullname');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            if($id==""){
                $data = array(
                    'fullname' => $fullname,
                    'username' => $username,
                    'password' => $password
                );
                $this->db->where('username',$username);
                $check=$this->db->get('users');
                if($check->num_rows() > 0){
                    return false;
                }else{
                    if($this->db->insert('users', $data)){
                        return true;
                    } else {
                        return false;
                    }
                }                
            } else {                
                $data = array(
                    'fullname' => $fullname,
                    'username' => $username,
                    'password' => $password
                );
                $this->db->where('id', $id);
                $this->db->update('users', $data);
                return true;
            }
        }
        public function delete_users($id){
            $this->db->where('id', $id);
            if($this->db->delete('users')){
                return true;
            } else {
                return false;
            }
        }

        public function getAllUnits(){
            $query = $this->db->get('division_unit');
            return $query->result_array();
        }

        public function save_units(){
            $id = $this->input->post('id');
            $description = $this->input->post('description');
            if($id==""){
                $data = array(
                    'description' => $description
                );
                $this->db->where('description',$description);
                $check=$this->db->get('division_unit');
                if($check->num_rows() > 0){
                    return false;
                }else{
                    if($this->db->insert('division_unit', $data)){
                        return true;
                    } else {
                        return false;
                    }
                }                
            } else {                
                $data = array(
                    'description' => $description
                );
                $this->db->where('id', $id);
                $this->db->update('division_unit', $data);
                return true;
            }
        }
        public function delete_units($id){
            $this->db->where('id', $id);
            if($this->db->delete('division_unit')){
                return true;
            } else {
                return false;
            }
        }

        public function getAllSuppliers(){
            $query = $this->db->get('suppliers');
            return $query->result_array();
        }

        public function save_suppliers(){
            $id = $this->input->post('id');
            $code= $this->input->post('code');
            $description = $this->input->post('description');
            $status=$this->input->post('status');
            if($id==""){
                $data = array(
                    'suppliercode' => $code,
                    'suppliername' => $description,
                    'status' => $status
                );
                $this->db->where('suppliername',$description);
                $check=$this->db->get('suppliers');
                if($check->num_rows() > 0){
                    return false;
                }else{
                    if($this->db->insert('suppliers', $data)){
                        return true;
                    } else {
                        return false;
                    }
                }                
            } else {                
                $data = array(
                    'suppliercode' => $code,
                    'suppliername' => $description,
                    'status' => $status
                );
                $this->db->where('id', $id);
                $this->db->update('suppliers', $data);
                return true;
            }
        }
        public function delete_suppliers($id){
            $this->db->where('id', $id);
            if($this->db->delete('suppliers')){
                return true;
            } else {
                return false;
            }
        }

        public function getAllStocks(){
            $query = $this->db->get('stocks');
            return $query->result_array();
        }

        public function save_stocks(){
            $id = $this->input->post('id');
            $code = $this->input->post('code');
            $description = $this->input->post('description');
            $unit=$this->input->post('unit');             
            if($id==""){
                $data = array(
                    'code' => $code,
                    'description' => $description,
                    'unit' => $unit
                );
                $this->db->where('description',$description);
                $check=$this->db->get('stocks');
                if($check->num_rows() > 0){
                    return false;
                }else{
                    if($this->db->insert('stocks', $data)){
                        return true;
                    } else {
                        return false;
                    }
                }                
            } else {                
                $data = array(
                    'code' => $code,
                    'description' => $description,
                    'unit' => $unit
                );
                $this->db->where('id', $id);
                $this->db->update('stocks', $data);

                $this->db->where('code', $code);
                $this->db->update('stocktable', array('description' => $description));

                return true;
            }
        }
        // public function delete_stocks($id){
        //     $this->db->where('id', $id);
        //     if($this->db->delete('stocks')){
        //         return true;
        //     } else {
        //         return false;
        //     }
        // }

        public function getAllProjects(){
            $query = $this->db->get('project');
            return $query->result_array();
        }
        public function getStartedProjects(){

            $query = $this->db->query("SELECT * FROM project WHERE status='pending' AND date_started BETWEEN '".date('Y-m-01')."' AND '".date('Y-m-t')."' ORDER BY date_started ASC");
            return $query->result_array();
        }
        public function getContinuingProjects(){
            $query = $this->db->query("SELECT * FROM project WHERE status='pending' AND date_started < '".date('Y-m-01')."' ORDER BY date_started ASC");
            return $query->result_array();
            return $query->result_array();
        }
        public function getCompletedProjects(){
            $this->db->where('status', 'completed');
            $query = $this->db->get('project');
            return $query->result_array();
        }
    }
?>
