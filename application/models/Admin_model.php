<?php


/**
 * models/Admin_model.php
 *
 * Admin model for Gig Central
 * 
 * @package ITC260
 * @subpackage Pages
 * @author Rattana Neak
 * @version 2.0 2016/06/14
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see controllers/Admin.php
 * @see view/admins/add.php
 * @see view/admins/admin.php
 * @see view/admins/index.php
 * @see view/admins/login.php
 * @see view/admins/reset.php
 * @see view/admins/success.php
 * @see view/admins/view.php
 * @todo
 */
 
function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
class Admin_model extends CI_Model {
       public function __construct()
        {
                $this->load->database();
        }
        
        public function getInfor($data)
        {
           
           if ($data == ""){
            return FALSE;
            }else{
            $query = $this->db->get_where('Profile', array('email' => $data['email']));
            $row = $query->row();    
                if (isset($row))
                {
                    //if(pass_decrypt($row->password,KEY_ENCRYPT) == $data['pass'])
                        if(password_verify($data['pass'], $row->password))
                    {
                    
                    $newdata = array(
                        'email' => $row->email,
                        'id' => $row->id,
                        'status'=> $row->i_am_a,
                        'first_name'=> $row->first_name,
                        'last_name'=> $row->last_name,
                        'picture'=> $row->picture, 
                        'logged_in' => TRUE,
                        'bio'     => $row->bio,
                        'pass' => $row->password
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
                    
                    //echo $tmp_pass = substr( md5( time( ) ) ,1 );//chr( mt_rand( 97 ,122 ) ) 
                    echo randomPassword();
                    echo '</br>';
                    
                    die;
                    /*
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
                    */
                }else{
                    $error = "The email doesn't exist on our database";
                        
                }
                return $error;
          }
        }
        
}