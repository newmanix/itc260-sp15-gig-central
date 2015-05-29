<?php 
/**
* libraries/PassphraseClass.php
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class PassphraseClass {
    
    public function passphrase()
    {

        $message ="";
        define('THIS_PAGE',basename($_SERVER['PHP_SELF']));
        //store the passcode
        $key ='abc123';
        if(isset($_POST['submit'])) {
                //create a session variable that will confirm your revisit before the session ends.
                $_SESSION['passed-phrase'] = $_POST['password'];
                if ($_POST['password'] == $key){//when the form get submitted check the submitted value
                    //show the page
                }else{
                    //wrong password. show log-in form
                    //createForm($message); 
                    echo ' <br/><br/><div class=login>
                    <h3 class=login-message>' . $message.  '</h3>
                    <form action="' . THIS_PAGE . '" method="post">
                    <input type="password" name="password" value=""  class="login-input"/>
                    <br />
                    <input type="submit" name="submit" value="Login" />
                    </form>
                    </div>
                    ';
                    echo 'Wrong password. Please enter again.';//should use the feedback helper, just using this for now
                    die; 
                }
        }else{
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