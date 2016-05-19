<?php

/**
 * controllers/Contact.php
 *
 * Contact page for Gig Central
 *
 * @package ITC260
 * @subpackage Contact
 * @author Victoria Moiseenko
 * @version 1.0 2015/05/14
 * @link
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see Contact_model.php
 * @todo
 */

class Contact extends CI_Controller {

    public function __construct()
    {//everything here is global to all methods in the controller
         parent::__construct();
         $this->load->model('contact_model');
    }#end constructor()

	public function index()
	{     $this->load->helper('form');
        $this->load->library('form_validation');
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
        {//process data, send email!

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

	/*
	XXX I don't think this is even used. This is redundant with code in Contact::index(), and is a canidate for being removed.
	-- Turner "Hastwell" Tackitt, 19 May 2016
	
	
        public function create()
        {
      $this->load->helper('form');
      $this->load->library('form_validation');

      $data['name'] = 'Create new email';

      $this->form_validation->set_rules('name', 'Name', 'required');
      $this->form_validation->set_rules('email', 'email');
      $this->form_validation->set_rules('message', 'message', 'required');

      if ($this->form_validation->run() === FALSE)
      {
          $this->load->view('templates/header', $data);
          $this->load->view('contact/create', $data);
          $this->load->view('templates/footer', $data);
      }
      else
      {
          $this->contact_model->set_emails();

          //get the form data
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $subject = $this->input->post('subject');
            $message = $this->input->post('message');

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
                redirect('contact/success');
            }
            else
            {
                //error
                redirect('contact/view');
            }

          }


      }
      */
  }
