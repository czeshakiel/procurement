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
        public function save_projects(){
            $id = $this->input->post('id');
            $projectname = $this->input->post('projectname');
            $contractor = $this->input->post('contractor');
            $date_started = $this->input->post('date_started');
            $date_ended = $this->input->post('date_ended');
            $amount_approved = $this->input->post('amount_approved');
            $date=date('Y-m-d');
            if($id==""){
                $data = array(
                    'projectname' => $projectname,
                    'contractor' => $contractor,
                    'date_started' => $date_started,
                    'date_ended' => $date_ended,
                    'amount_approved' => $amount_approved,
                    'datearray' => $date,
                    'status' => 'pending'
                );
                $this->db->where('projectname',$projectname);
                $check=$this->db->get('project');
                if($check->num_rows() > 0){
                    return false;
                }else{
                    if($this->db->insert('project', $data)){
                        return true;
                    } else {
                        return false;
                    }
                }                
            } else {                
                $data = array(
                    'projectname' => $projectname,
                    'contractor' => $contractor,
                    'date_started' => $date_started,
                    'date_ended' => $date_ended,
                    'amount_approved' => $amount_approved
                );
                $this->db->where('id', $id);
                $this->db->update('project', $data);
                return true;
            }
        }
        public function getSingleProject($id){
            $this->db->where('id', $id);
            $query = $this->db->get('project');
            return $query->row_array();            
        }
        public function getAllRequests($id){
            $this->db->where('project_id', $id);
            $this->db->where('status', 'pending');
            $this->db->order_by('date_requested', 'DESC');
            $query = $this->db->get('podetails');
            return $query->result_array();            
        }
        public function save_request(){
            $project_id = $this->input->post('project_id');
            $pono = 'PR-'.date('YmdHis');
            $date_requested = $this->input->post('date_requested');
            $trantype = $this->input->post('trantype');
            $data = array(
                'project_id' => $project_id,
                'pono' => $pono,
                'date_requested' => $date_requested,
                'trantype' => $trantype,
                'requested_by' => $this->session->fullname
            );
            if($this->db->insert('podetails', $data)){
                redirect('manage_request/'.$pono.'/'.$project_id);
            } else {
                $this->session->set_flashdata('error', 'Unable to create request. Please try again.');
                redirect('purchase_request/'.$project_id);
            }
        }
        public function getItemsByDescription($description){
            $this->db->like('description', $description);
            $query = $this->db->get('stocks');
            return $query->result_array();
        }
        public function getAllRequestsDetails($id){
            $this->db->where('pono', $id);
            $query = $this->db->get('purchaseorder');
            return $query->result_array();            
        }
        public function getQty($code){
            $this->db->where('code', $code);
            $query = $this->db->get('stocktable');
            return $query->result_array();
        }
        public function getSuppliersByItemCode($code){
            $this->db->where('code', $code);
            $this->db->group_by('suppliercode');
            $query = $this->db->get('stocktable');
            return $query->result_array();
        }
        public function add_request_item(){
            $pono = $this->input->post('pono');
            $project_id = $this->input->post('project_id');
            $code = $this->input->post('code');
            $quantity = $this->input->post('quantity');
            $unit_price = $this->input->post('unit_price');
            $supplier = $this->input->post('supplier');
            $preferred_supplier = $this->input->post('preferred_supplier');
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $requested_by = $this->session->fullname;
            if($preferred_supplier != ""){
                $supp = explode("_", $preferred_supplier);
                $suppliercode = $supp[0];
                $suppliername = $supp[1];
            }else{
                $supp = explode("_", $supplier);
                $suppliercode = $supp[0];
                $suppliername = $supp[1];
            }
            if($supplier == ""){
                return false;
            }
            $this->db->where('code', $code);
            $item = $this->db->get('stocks')->row_array();
            $description = $item['description'];
            $data = array(
                'pono' => $pono,
                'project_id' => $project_id,
                'code' => $code,
                'quantity' => $quantity,
                'unitcost' => $unit_price,
                'suppliercode' => $suppliercode,
                'suppliername' => $suppliername,
                'date_requested' => $date,
                'time_requested' => $time,
                'description' => $description,
                'requested_by' => $requested_by,
                'status' => 'pending'
            );
            $this->db->where('pono', $pono);
            $this->db->where('code', $code);
            $check=$this->db->get('purchaseorder');
            if($check->num_rows() > 0){
                $existing = $check->row_array();
                $new_qty = $existing['quantity'] + $quantity;
                $this->db->where('id', $existing['id']);
                if($this->db->update('purchaseorder', array('quantity' => $new_qty))){
                    return true;
                } else {
                    return false;
                }
            }else{
                if($this->db->insert('purchaseorder', $data)){
                    return true;
                } else {
                    return false;
                }
            } 
        }  
        public function delete_request_item($id){
            $this->db->where('id', $id);
            if($this->db->delete('purchaseorder')){
                return true;
            } else {
                return false;
            }
        }   
        public function getAllRequestByStatus($status,$id){
            $this->db->where('status', $status);
            $this->db->where('project_id', $id);
            $query = $this->db->get('podetails');
            return $query->result_array();            
        }
        public function getSingleRequest($id){
            $this->db->where('pono', $id);
            $query = $this->db->get('podetails');
            return $query->row_array();            
        }
        public function finalize_purchase_request($pono){
            $this->db->where('pono', $pono);
            $query = $this->db->update('purchaseorder', array('status' => 'finalized'));
            if($query){
                return true;
            }else{
                return false;
            }
        }
         public function revert_finalize_request($pono){
            $this->db->where('pono', $pono);
            $query = $this->db->update('purchaseorder', array('status' => 'pending'));
            if($query){
                return true;
            }else{
                return false;
            }
        }
        public function cancel_request($pono){
            $this->db->where('pono', $pono);
            $query = $this->db->update('podetails', array('status' => 'cancelled'));
            if($query){
                $this->db->where('pono', $pono);
                $this->db->update('purchaseorder', array('status' => 'cancelled'));
                return true;
            }else{
                return false;
            }
        }
        public function getAllReceivingDetails($id){
            $this->db->where('pono', $id);
            $this->db->where('status', 'finalized');    
            $this->db->order_by('id', 'ASC');        
            $query = $this->db->get('purchaseorder');
            return $query->result_array();            
        }
        public function post_receiving($rrno,$pono,$project_id){  
            // $codes = $this->input->post('code');
            // $suppliercode = $this->input->post('suppliercode');
            // $suppliername = $this->input->post('suppliername');
            // $description = $this->input->post('description');
            // $unitcost = $this->input->post('unitcost');
            $quantity = $this->input->post('quantity');
            $this->db->where('pono', $pono);
            $this->db->where('status', 'finalized');
            $this->db->order_by('id', 'ASC');
            $query = $this->db->get('purchaseorder');
            $requests = $query->result_array();
            $date=date('Y-m-d');
            $time=date('H:i:s');  
            $user=$this->session->fullname;  
            $count=0;
            foreach($requests as $index => $request){
                if($quantity[$index] >= $request['quantity']){
                    $quantity[$index] = $request['quantity'];
                }else{
                    $remqty = $request['quantity'] - $quantity[$index];
                    $this->db->insert('purchaseorder', array(
                        'pono' => $pono,
                        'project_id' => $project_id,
                        'code' => $request['code'],
                        'quantity' => $remqty,
                        'unitcost' => $request['unitcost'],
                        'suppliercode' => $request['suppliercode'],
                        'suppliername' => $request['suppliername'],
                        'date_requested' => $date,
                        'time_requested' => $time,
                        'description' => $request['description'],
                        'requested_by' => $user,
                        'status' => 'finalized'
                    ));
                    $count++;
                }
                $data = array(
                'rrno' => $rrno,
                'suppliercode' => $request['suppliercode'],
                'suppliername' => $request['suppliername'],
                'code' => $request['code'],
                'description' => $request['description'],
                'unitcost' => $request['unitcost'],
                'quantity' => $quantity[$index],                
                'project_id' => $project_id,                
                'datearray' => $date,
                'timearray' => $time
                );                
                if($quantity[$index] > 0){
                    $this->db->insert('stocktable', $data);
                    $this->db->where('id', $request['id']);
                    $this->db->update('purchaseorder', array('rrno' => $rrno,'date_received' => $date,'time_received' => $time,'received_by' => $user,'status' => 'received'));
                }else{
                    $count++;
                }
            }
            if($count == 0){                                
                $this->db->where('pono', $pono);
                $this->db->update('podetails', array('status' => 'received','date_received' => $date,'received_by' => $user));                
            }
        }
        public function getReceivingReport($id){
            $this->db->where('rrno', $id);
            $query = $this->db->get('stocktable');
            return $query->result_array();            
        }

        public function getReceivingReportOrder($id){
            $this->db->where('rrno', $id);            
            $query = $this->db->get('purchaseorder');
            return $query->result_array();            
        }
        public function getReceivingCount(){            
            $this->db->group_by('rrno');
            $query = $this->db->get('stocktable');
            return $query->num_rows();
        }
    }
?>
