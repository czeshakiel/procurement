<?php
ini_set('max_execution_time', 0);
ini_set('memory_limit','2048M');
date_default_timezone_set('Asia/Manila');
    class Pages extends CI_Controller{
        public function index(){
            $page = "index";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){redirect(base_url('main'));}                       
            $this->load->view('pages/'.$page);                 
        }
        public function authenticate(){
            $this->load->model('Procurement_model');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $login = $this->Procurement_model->authenticate($username, $password);
            if($login){
                $userdata=array(
                    'username' => $username,
                    'fullname' => $login['fullname'],
                    'user_login' => true
                );
                $this->session->set_userdata($userdata);
                redirect(base_url('main'));
            } else {
                redirect(base_url());
            }
        }
        public function main(){
            $page = "main";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if(!$this->session->user_login){redirect(base_url());}
            $data['title'] = "Projects";
            $data['all_projects'] = $this->Procurement_model->getAllProjects();
            $data['started_projects'] = $this->Procurement_model->getStartedProjects();
            $data['continuing_projects'] = $this->Procurement_model->getContinuingProjects();
            $data['completed_projects'] = $this->Procurement_model->getCompletedProjects();
            $this->load->view('includes/header');            
            $this->load->view('includes/sidebar');
            $this->load->view('includes/navbar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('includes/modal');
            $this->load->view('includes/footer');
        }

        public function logout(){
            $this->session->unset_userdata('user_login');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('fullname');
            redirect(base_url());
        }

        public function manage_users(){
            $page = "manage_users";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if(!$this->session->user_login){redirect(base_url());}
            $data['title'] = "User Management";
            $data['users'] = $this->Procurement_model->getAllUsers();
            $this->load->view('includes/header');            
            $this->load->view('includes/sidebar');
            $this->load->view('includes/navbar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('includes/modal');
            $this->load->view('includes/footer');
        }

        public function save_users(){
            $save=$this->Procurement_model->save_users();
            if($save){
                $this->session->set_flashdata('success', 'User saved successfully.');
            } else {
                $this->session->set_flashdata('error', 'Username already exists. Please choose a different username.');
            }
            redirect(base_url('manage_users'));
        }

        public function delete_users($id){
            $save=$this->Procurement_model->delete_users($id);
            if($save){
                $this->session->set_flashdata('success', 'User deleted successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to delete user.');
            }
            redirect(base_url('manage_users'));                        
        }
        public function manage_units(){
            $page = "manage_units";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if(!$this->session->user_login){redirect(base_url());}
            $data['title'] = "Unit Management";
            $data['units'] = $this->Procurement_model->getAllUnits();
            $this->load->view('includes/header');            
            $this->load->view('includes/sidebar');
            $this->load->view('includes/navbar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('includes/modal');
            $this->load->view('includes/footer');
        }

        public function save_units(){
            $save=$this->Procurement_model->save_units();
            if($save){
                $this->session->set_flashdata('success', 'Unit saved successfully.');
            } else {
                $this->session->set_flashdata('error', 'Unit already exists. Please choose a different unit name.');
            }
            redirect(base_url('manage_units'));
        }

        public function delete_units($id){
            $save=$this->Procurement_model->delete_units($id);
            if($save){
                $this->session->set_flashdata('success', 'Unit deleted successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to delete unit.');
            }
            redirect(base_url('manage_units'));                        
        }

        public function manage_suppliers(){
            $page = "manage_suppliers";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if(!$this->session->user_login){redirect(base_url());}
            $data['title'] = "Supplier Management";
            $data['suppliers'] = $this->Procurement_model->getAllSuppliers();
            $this->load->view('includes/header');            
            $this->load->view('includes/sidebar');
            $this->load->view('includes/navbar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('includes/modal');
            $this->load->view('includes/footer');
        }

        public function save_suppliers(){
            $save=$this->Procurement_model->save_suppliers();
            if($save){
                $this->session->set_flashdata('success', 'Supplier saved successfully.');
            } else {
                $this->session->set_flashdata('error', 'Supplier already exists. Please choose a different supplier name.');
            }
            redirect(base_url('manage_suppliers'));
        }

        public function delete_suppliers($id){
            $save=$this->Procurement_model->delete_suppliers($id);
            if($save){
                $this->session->set_flashdata('success', 'Supplier deleted successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to delete supplier.');
            }
            redirect(base_url('manage_suppliers'));                        
        }

        public function manage_stocks(){
            $page = "manage_stocks";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if(!$this->session->user_login){redirect(base_url());}
            $data['title'] = "Stock Management";
            $data['stocks'] = $this->Procurement_model->getAllStocks();
            $data['units'] = $this->Procurement_model->getAllUnits();
            $this->load->view('includes/header');            
            $this->load->view('includes/sidebar');
            $this->load->view('includes/navbar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('includes/modal');
            $this->load->view('includes/footer');
        }

        public function save_stocks(){
            $save=$this->Procurement_model->save_stocks();
            if($save){
                $this->session->set_flashdata('success', 'Stock saved successfully.');
            } else {
                $this->session->set_flashdata('error', 'Stock already exists. Please choose a different stock name.');
            }
            redirect(base_url('manage_stocks'));
        }

        // public function delete_stocks($id){
        //     $save=$this->Procurement_model->delete_stocks($id);
        //     if($save){
        //         $this->session->set_flashdata('success', 'Stock deleted successfully.');
        //     } else {
        //         $this->session->set_flashdata('error', 'Failed to delete stock.');
        //     }
        //     redirect(base_url('manage_stocks'));                        
        // }
        public function save_projects(){
            $save=$this->Procurement_model->save_projects();
            if($save){
                $this->session->set_flashdata('success', 'Project saved successfully.');
            } else {
                $this->session->set_flashdata('error', 'Project already exists. Please choose a different project name.');
            }
            redirect(base_url('main'));
        }

        public function view_project($id){
            $page = "view_project";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if(!$this->session->user_login){redirect(base_url());}
            $data['title'] = "Manage Project";
            $data['project'] = $this->Procurement_model->getSingleProject($id);    
            $data['id'] = $id;      
            $this->load->view('includes/header');            
            $this->load->view('includes/sidebar');
            $this->load->view('includes/navbar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('includes/modal');
            $this->load->view('includes/footer');
        }
        public function purchase_request($id){
            $page = "purchase_request";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if(!$this->session->user_login){redirect(base_url());}            
            $project = $this->Procurement_model->getSingleProject($id);
            $data['title'] = "<small><a href='".base_url('view_project/'.$id)."'>".$project['projectname']."</a></small> >> Purchase Request";
            $data['id'] = $id;  
            $data['requests'] = $this->Procurement_model->getAllRequests($id);  
            $this->load->view('includes/header');            
            $this->load->view('includes/sidebar');
            $this->load->view('includes/navbar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('includes/modal');
            $this->load->view('includes/footer');
        }
        public function create_request(){            
            $save=$this->Procurement_model->save_request();                
        }
        public function manage_request($id,$project_id){
            $page = "manage_request";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if(!$this->session->user_login){redirect(base_url());}            
            $project = $this->Procurement_model->getSingleProject($project_id);
            $data['title'] = "<small><a href='".base_url('view_project/'.$project_id)."'>".$project['projectname']."</a></small> >> <small><a href='".base_url('purchase_request/'.$project_id)."'>Purchase Request</a></small> >> Manage Request";
            $data['pono'] = $id;  
            $data['requests'] = $this->Procurement_model->getAllRequests($id);  
            $this->load->view('includes/header');            
            $this->load->view('includes/sidebar');
            $this->load->view('includes/navbar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('includes/modal');
            $this->load->view('includes/footer');
        }
}
?>
