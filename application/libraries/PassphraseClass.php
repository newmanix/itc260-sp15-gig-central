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
        
        $CI =& get_instance(); //assign the CodeIgniter object to a variable to use load class
        $key ='gigcentral'; //store the passcode
        $data['red'] = $_SERVER['REQUEST_URI'];
        if($_SESSION['passed-phrase'] != $key){
            if(isset($_POST['submit'])) {//if any password has submitted
                $_SESSION['passed-phrase'] = $_POST['password'];//create a session variable that will confirm your revisit before the session ends.
                if ($_POST['password'] == $key){//when the form get submitted check the submitted value
                    //show the page
                }else{
                    $data['message'] = 'Wrong password. Please enter again.';
                    $CI->load->view('passphrase/index', $data); 
                    exit();s
                }
            }else{
            //default show log-in form            
                $data['message'] = 'Enter your password to see this page';
                $CI->load->view('passphrase/index', $data); 
                exit();
            }
        }
    }
}
/* End of file LoginClass.php */