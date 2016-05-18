<?php
//Admin.php

class Admin extends CI_Controller {
         public function __construct()
        {//begin constructor
            parent::__construct();
            $this->load->model('admin_model');
            
        }#end constructor
        
        public function login()
        {
            $this->load->view('admins/admin');
        }
        
        public function view($slug = NULL)
        {
            $data['admins'] = $this->admin_model->get_infor($slug);
            $this->load->view('admins/view', $data);
        }
        
        public function loging()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('Email', 'Email', 'required');
            $this->form_validation->set_rules('Pwd', 'Password', 'required');
            $data['admins'] = $this->admin_model->get_infor();
            $this->load->view('admins/view', $data);
        }
}