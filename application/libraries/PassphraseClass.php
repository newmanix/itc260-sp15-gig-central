<?php 
/**
 * libraries/PassphraseClass.php
 *
 * library for one passphrase login feature
 *
 * @package GigCentral
 * @subpackage PassPhrase
 * @author Kate Lee, Casey Choiniere
 * @version 1.0 2015/5/14
 * @link
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see views/passphrase/index.php
 *
 * <code>
 * $this->load->library('passphraseclass');
 * $this->passphraseclass->passphrase();
 * </code>
 * 
 * @todo none
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class PassphraseClass {

    public function passphrase()
    {
        $_SESSION['passed-phrase'] = '';
        $CI =& get_instance(); //assign the CodeIgniter object to a variable to use load class
        $key ='gigcentral'; //store the passcode
        $data['red'] = $_SERVER['REQUEST_URI'];
        
        if(isset($_SESSION['passed-phrase']) == false){ 
        //If not key stored in session do this.
            
            if( isset($_POST['submit']) && $_POST['password'] == $key ) {
            //if summitted password matches the key
                
                $_SESSION['passed-phrase'] = $_POST['password'];
                //store the correct password to a session variable and  
                //show the page
                
            }elseif( isset($_POST['submit']) && $_POST['password'] != $key ){
            // else if summitted password is wrong
                
                $data['message'] = 'Wrong password. Please enter again.';
                $CI->load->view('passphrase/index', $data); 
                exit();
            
            }else{
            //default show log-in form            
                
                $data['message'] = 'Enter your password to see this page';
                $CI->load->view('passphrase/index', $data); 
                exit();
            }
        }
        //show current page
    }
}
/* End of file LoginClass.php */