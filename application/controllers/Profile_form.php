<?php
/**
* Customer.php controller for a generic customer
*
* Use to show how to do crud in codeigniter
*
* @package LARGE_PIECE_OF_PROGRAM
* @subpackage Profile_form
* @author Evan Smyth <evsmyth@yahoo.com>
* @version 1.0 2015/05/21
* @link http://www.example.com/
* @license http://www.apache.org/licenses/LICENSE-2.0
* @see Profile_model.php
* @see index.php
* @todo none
*/


/**
* Profile_form controller
*
*
* @see Profile_model.php
* @todo none
*/
class Profile_form extends CI_Controller {//begin controller

  /**
  * Loads default data into object
  *
  *
  * @param none
  * @return void
  * @todo none
  */
  public function __construct()
  {//begin constructor

    parent::__construct();
    $this->config->set_item('banner', 'Global News Banner');


  }//end constructor

  public function index()
  {//begin function index

    $this->load->view('profile_form/index');

}//end function index


}//end controller
