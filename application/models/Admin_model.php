<?php
//Admin_model.php

class Admin_model extends CI_Model {
       public function __construct()
        {
                $this->load->database();
        }
        
        public function get_infor($slug = FALSE)
        {
            $res_pass = "";
            if ($slug === FALSE)
            {
             $query = $this->db->get('Admin');
             return $query->result_array();
            }
            $email = $this->input->post('Email');
            $pwd = $this->input->post('Pwd');
             $this->db->select('AdminPassword');
             $this->db->from('Admin');
             $this->db->where('AdminEmail',$email);
            $res_pass = $this->db->get()->row()->AdminPassword;//here get the password
           
            if ($res_pass != ""){
                if($res_pass == $pwd){
                    $msg = "The Password in correct!";    
                }else{
                    $msg = "Sorry The Password is not correct!";    
                }
            }else{
                $msg = "Sorry The Password is not correct!";
            }
            return $msg;
            //$query = $this->db->get_where('Admin', array('AdminEmail'=> $slug));
            //return $query->result();
            
        } 
        
        
}