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
            $this->load->model('Sales_model');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $login = $this->Sales_model->authenticate($username, $password);
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
            $data['title'] = "Products Masterfile";
            $this->load->view('includes/header');
            $this->load->view('includes/navbar');
            $this->load->view('includes/sidebar');
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

        public function products(){
            $page = "products";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if(!$this->session->user_login){redirect(base_url());}
            $data['title'] = "Products Masterfile";
            $data['items'] = $this->Sales_model->getAllProducts();
            $this->load->view('includes/header');
            $this->load->view('includes/navbar');
            $this->load->view('includes/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('includes/modal');
            $this->load->view('includes/footer');
        }

        public function manage_products($id){
            $page = "manage_products";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if(!$this->session->user_login){redirect(base_url());}
            $data['title'] = "Products Masterfile";
            $data['id'] = $id;
            $data['item'] = $this->Sales_model->getSingleProducts($id);
            $this->load->view('includes/header');
            $this->load->view('includes/navbar');
            $this->load->view('includes/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('includes/modal');
            $this->load->view('includes/footer');
        }

        public function save_products(){
            $id = $this->input->post('id');
            $sku = $this->input->post('sku');
            $description = $this->input->post('description');
            $unitcost = $this->input->post('unitcost');
            $srp = $this->input->post('srp');
            $category = $this->input->post('category');
            $reorder = $this->input->post('reorder');
            $location = $this->input->post('location');
            if($id==0){
                //update
                $save = $this->Sales_model->updateProducts($id, $sku, $description, $unitcost, $srp, $category, $reorder, $location);
                if($save){
                    $this->session->set_flashdata('success', 'Product successfully updated!');
                } else {
                    $this->session->set_flashdata('failed', 'Failed to update product!');
                }
            } else {
                //insert
                $save = $this->Sales_model->insertProducts($sku, $description, $unitcost, $srp, $category, $reorder, $location);
                if($save){
                    $this->session->set_flashdata('success', 'Product successfully added!');
                } else {
                    $this->session->set_flashdata('failed', 'Failed to add product!');
                }
            }
            redirect(base_url('products'));
    }
}
?>
