<?php

/**
 * controllers/Profile.php
 * 
 * Profile list page for Gig Central
 *
 * @package ITC260
 * @subpackage Profile_list
 * @author Doug Doner
 * @version 1.0 2015/05/14
 * @link
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see Profile_model.php
 * @todo 
 */

class Profile extends CI_Controller {

    public function __construct()
    {//everything here is global to all methods in the controller
        parent::__construct();
        $this->load->model('profile_model');
        $this->config->set_item('banner','Global Profiles Banner');
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('email');
		$this->load->helper('url');


  }//end constructor
  
	public function index()
	{
		/*echo "test";
		die;*/
			$data['profiles'] = $this->profile_model->get_profiles();
			$data['title'] = 'Profiles';
			$this->load->view('profiles/index', $data);
	}#end index()	

	public function view($slug = NULL)
	{
			$data['profile'] = $this->profile_model->get_profiles($slug);

			if (empty($data['profile']))
			{
					show_404();
			}

			$data['first_name'] = $data['profile']['first_name'];
			$this->load->view('profiles/view', $data);

	}#end view()
    
    
    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a profile';

        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('profiles/add', $data);
            $this->load->view('templates/footer', $data);

        }
        else
        {
            $this->startup_model->set_startups();
            $this->load->view('profiles/success');
        }
    }


  public function add()
  {
	  
    $this->form_validation->set_rules('i_am_a', 'I am a', 'required');
    $this->form_validation->set_rules('first_name', 'First Name', 'required');
    $this->form_validation->set_rules('last_name', 'Last Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('languages', 'Languages', 'required');

    $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

    if ($this->form_validation->run() == FALSE) // validation hasn't been passed
    {
      $this->load->view('profiles/add');
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

      if ($this->profile_model->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
      {
        $this->load->view('profiles/success');   // or whatever logic needs to occur
      }
      else
      {
        echo 'An error occurred saving your information. Please try again later';
        // Or whatever error handling is necessary
      }
    }
  }
}
