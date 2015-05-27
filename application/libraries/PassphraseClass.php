<?php 
/**
* libraries/PassphraseClass.php
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 


class PassphraseClass {
    
    public function passphrase()
    {
        //load sesseion helper
        //startSession(); //wrapper for session_Start();
        
        define('THIS_PAGE',basename($_SERVER['PHP_SELF']));
        //store the passcode
        $key ='abc123';
        if(isset($_POST['submit'])) {
        //when the form get submitted check the submitted value

            if ($_POST['password'] == $key){
            //create a session variable that will confirm your revisit before the session ends.
                $_SESSION['passed-phrase'] = $_POST['password'];
                //show the page
            }else{
            //wrong password. show log-in form
                $message = 'Wrong password. Please enter again.';
                createForm($message);  
            }

        } else if ($_SESSION['passed-phrase'] == $key){
            //when the form is not submitted, check if the session had had the matched passphrase.
            //show page
        } else {
            //default show log-in form
            $message = 'Enter your password to see this page';
            //createForm($message);
            echo ' <div class=login>
            <h3 class=login-message>' . $message.  '</h3>
            <form action="' . THIS_PAGE . '" method="post">
            <input type="password" name="password" value=""  class="login-input"/>
            <br />
            <input type="submit" name="submit" value="Login" />
            </form>
            </div>
            ';
        die;
        }
    }
    
    /*
    function createForm($message){
        echo ' <div class=login>
            <h3 class=login-message>' . $message.  '</h3>
            <form action="' . THIS_PAGE . '" method="post">
            <input type="password" name="password" value=""  class="login-input"/>
            <br />
            <input type="submit" name="submit" value="Login" />
            </form>
            </div>
            ';
        die;
    }
    */
}



/* End of file LoginClass.php */