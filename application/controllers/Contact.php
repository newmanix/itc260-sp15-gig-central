<?php

/**
 * controllers/Contact.php
 *
 * Contact page for Gig Central
 *
 * @package ITC260
 * @subpackage Contact
 * @author Victoria Moiseenko, Turner Tackit
 * @version 2.0 2016/06/14
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see Contact_model.php
 * @see view/contact/index.php
 * @see view/contact/success.php
 * @todo Add inline error message to form in the event of an email problem, instead of printing generic "An Error Happened" page.
 */

class Contact extends CI_Controller
{
	public function __construct()
	{//everything here is global to all methods in the controller
		parent::__construct();
		$this->load->model('contact_model');
		$this->config->set_item('nav-active', 'Contact Us');//sets active class on current nav item
	}#end constructor()

	/*
	 * Load form page to compose contact message, or send composed email to website operators.
	 *
	 * @return void
	 * @todo Add inline error message to form in the event of an email problem, instead of printing generic "An Error Happened" page.
	 */
	public function index()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('recaptcha');

		$data['title'] = 'Contact Us';
		$data['name'] = 'Contact';
		$data['contact'] = $this->contact_model->get_emails();

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('message', 'message', 'required');

		if ($this->form_validation->run() === FALSE)
		{//no data yet, show form!
		    $this->load->view('contact/index', $data);
		}
		else
		{
			//process data, send email!

			// Catch the user's answer
			$captcha_answer = $this->input->post('g-recaptcha-response');

			// Verify user's answer
			$captcha_googleresponse = $this->recaptcha->verifyResponse($captcha_answer);
			if( !$captcha_googleresponse['success'] ) { echo "Validation Failure"; return; }

			  $this->contact_model->set_emails();

			  //get the form data
			    $name = $this->input->post('name');
			    $email = $this->input->post('email');
			    $subject = $this->input->post('subject');
			    $message = $this->input->post('message');

			    $this->config->load('email');
			    $this->load->helper('url');
				$this->load->library('email');

			    //set to_email id to which you want to receive mails
			    $this->config->load('email');
			    $this->load->helper('url');


			    //send mail
			    $this->email->from($email, $name);
			    $this->email->to( $this->config->item('email_contact_sendto') );
			    $this->email->subject($subject);
			    $this->email->message($message);
			    if ($this->email->send())
			    {
				// mail sent
				//redirect('contact/success');
				$this->load->view('contact/success', $data);
			    }
			    else
			    {
				// an error occured
				// XXX TODO In the event of an error, we need to redirect back to the submission form, and show an in-line error message (eg, using session variable)
				// -- Turner Tackitt aka Hastwell, 19 May 2016
			
				//redirect('contact');
				echo "Error!";
				show_error( "<h1>Failed To Send Email</h1><p />Debug Details follow:<br />" . $this->email->print_debugger() );
			    }
	    	}
	}
  }
