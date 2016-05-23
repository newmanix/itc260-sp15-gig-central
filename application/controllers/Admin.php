<?php
//Admin.php

class Admin extends CI_Controller {
         public function __construct()
        {//begin constructor
            parent::__construct();
            $this->load->model('admin_model');
            $this->load->library('form_validation');
            $this->load->database();
		    $this->load->helper('form');
		    $this->load->helper('email');
            $this->load->library('session');
        }#end constructor
        
        public function index(){
            $data['title'] ="Admin dashboard";
            if ($this->session->logged_in == TRUE){
                $logged = 'Logged';
            }else{
                $logged = 'Logout';
            }
            if (isset($this->session->email)){
                $data['email'] = $this->session->email;   
            }else{
                $data['email'] = "Login to see your person.";
            }
            
            $data['logged'] = $logged;
            $this->load->view('admins/index',$data);
        }
        public function login()
        {
            
            $data['title'] = "Login page";
            if(!isset($_POST['Submit'])){
                $data['error']='';
                $this->load->view('admins/login',$data);    
            }else{
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                $this->form_validation->set_rules('pass', 'Pass', 'trim|required',array(
                    'required' => 'The password field is required'
                ));
                if ($this->form_validation->run() == FALSE) // validation hasn't been passed
                { 
                    $this->load->view('admins/login',$data);
                    
                }else{
                    $form_data = array(
                    'email' => set_value('email'),
                    'pass' => set_value('pass')
                    );
                 if ($this->admin_model->get_infor($form_data)){
                  $data['error'] = $this->admin_model->get_infor($form_data);   
                 }else{
                   $data['error']='';
                 }
                 $this->load->view('admins/login',$data);    
                }
                
            }
            
        }
        
        public function view($slug = NULL)
        {
            $data['admins'] = $this->admin_model->get_infor($slug);
            $this->load->view('admins/view', $data);
        }
        
        public function logout(){
          /*
           unset(
            $_SESSION['email'],
            $_SESSION['logged_in']
            );
           */
            redirect('admin/');
        }
      
}