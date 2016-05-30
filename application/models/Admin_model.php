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
            }else{
            $query = $this->db->get_where('Profile', array('email' => $data['email']));
            $row = $query->row();    
                if (isset($row))
                {
                    if(pass_decrypt($row->password,KEY_ENCRYPT) == $data['pass'])
                    {
                    
                    $newdata = array(
                        'status'=> $row->i_am_a,
                        'first_name'=> $row->first_name,
                        'last_name'=> $row->last_name,
                        'picture'=> $row->picture, 
                        'logged_in' => TRUE,
                        'bio'     => $row->bio
                    );

                        $this->session->set_userdata($newdata); 
                        redirect('admin/');
                    }else{
                        $error = 'The password and email is not match';
                        return $error;
                    
                    }
                }
            }
        }
        
        public function reset($email){
            $error="";
         $this->load->library('email');
          if ($email == ""){
            return FALSE;
          }else{//check the email in the database
            $query = $this->db->get_where('Profile', array('email' => $email));
            $row = $query->row();
                if (isset($row))
                {
                    $message = "This is your password :". pass_decrypt($row->password,KEY_ENCRYPT);
                    //send mail
                    $this->email->from('admin@rattananeak.com', 'Admin');
                    $this->email->to($email);
                    $this->email->subject("Password Reset");
                    $this->email->message($message);
                    if ($this->email->send())
                    {
                    $error = "The passsword has been sent to your email. Please make sure you check in the spam box.";    
                    }else{
                    $error = "<h1>Failed To Send Email</h1><p />Debug Details follow:<br />" . $this->email->print_debugger() ;    
                    }
                }else{
                    $error = "The email doesn't exist on our database";
                        
                }
                return $error;
          }
        }
        
}