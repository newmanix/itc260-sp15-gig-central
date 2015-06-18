<?php

/**
* Profile_form.php form that takes profile info
*
*
* @package MEDIUM_PIECE_OF_PROGRAM
* @subpackage Profile_form
* @author Evan Smyth <evsmyth@yahoo.com>
* @version 1.0 2015/05/21
* @link http://www.example.com/
* @license http://www.apache.org/licenses/LICENSE-2.0
* @see Profile_form-model.php
* @see @see profile_form/index.php
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
    $this->load->library('form_validation');
    $this->load->database();
    $this->load->helper('form');
    $this->load->helper('email');
    $this->load->helper('url');
    $this->load->model('Profile_form_model');

  }//end constructor

  function index()
  {
    $this->form_validation->set_rules('i_am_a', 'I am a', 'required');
    $this->form_validation->set_rules('first_name', 'First Name', 'required');
    $this->form_validation->set_rules('last_name', 'Last Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('languages', 'Languages', 'required');

    $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

    if ($this->form_validation->run() == FALSE) // validation hasn't been passed
    {
      $this->load->view('profile_form/index');
    }
    else // passed validation proceed to post success logic
    {
      // build array for the model

      $form_data = array(
        'i_am_a' => set_value('i_am_a'),
        'first_name' => set_value('first_name'),
        'last_name' => set_value('last_name'),
        'email' => set_value('email'),
        'languages' => set_value('languages')
      );

      // run insert model to write data to db

      if ($this->Profile_form_model->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
      {
        $this->load->view('profile_form/success');   // or whatever logic needs to occur
      }
      else
      {
        echo 'An error occurred saving your information. Please try again later';
        // Or whatever error handling is necessary
      }
    }
  }


}//end controller
