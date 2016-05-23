<?php
//Admin_model.php

class Admin_model extends CI_Model {
       public function __construct()
        {
                $this->load->database();
        }
        
        public function get_infor($data)
        {
           
           if ($data == ""){
            return FALSE;
            }
            $query = $this->db->get_where('Profile', array('email' => $data['email']));
            $row = $query->row();

            if (isset($row))
            {
              if(pass_decrypt($row->password) == $data['pass'])
              {
                  
                 $newdata = array(
                    'status'=> $row->i_am_a,
                    'first_name'=> $row->first_name,
                    'last_name'=> $row->last_name,
                    'picture'=>picture, 
                    'email'     => $row->email,
                    'logged_in' => TRUE,
                    'lang' => $row->languages
                  );

                    $this->session->set_userdata($newdata); 
                    $this->load->view('admins/index');
              }else{
                $error = 'The password and email is not match';
                return $error;
                  
              }
            }
        }
        
        
}