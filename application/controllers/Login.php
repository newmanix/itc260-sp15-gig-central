<?php
/**
 * controllers/Login.php
 * controller for a passphrase Login
 *
 * @package Startup Central
 * @subpackage Login
 * @author
 * @version 1.0 2015/5/14
 * @link
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see index.php
 * @see models
 * @todo none
 */

/**
 * Login controller for Startup Central Login
 *
 * @see models/Login_model.php
 * @todo none
 */
class Login extends CI_Controller {

        /**
         * Loads default data into object
         *
         * Added in v3 - Result object
         *
         * @param none
         * @return void
         * @todo none
         */
        public function __construct()
        {
                //everything here is global to all methods in the controller
                parent::__construct();
                //$this->load->model('login_model');
                $this->config->set_item("banner", "Global Customer Banner");
        }

        /**
         * Shows initial Login form
         *
         * @param none
         * @return void
         * @todo none
         */
        public function index()
        {
                //$data['query'] = $this->customer_model->get_customers();
                $data['title'] = 'Log In';
                $data['this-page'] = ;
            
            $passed = $this->input->post('password');
                $this->load->view('login/index', data);
        }

}//END Customer



/*

<?php
// password_inc.php
startSession(); //wrapper for session_Start();
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
		createForm($message);
}
function startSession()
{
	//if(!isset($_SESSION)){@session_start();}
	if(isset($_SESSION))
	{
		return true;
	}else{
		@session_start(); //Just run session_Start() while ignoring errors.
	}
	if(isset($_SESSION)){return true;}else{return false;}
} #End startSession()
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