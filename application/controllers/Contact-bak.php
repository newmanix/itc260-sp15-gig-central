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
         $this->config->set_item('banner','Global Startup Banner');
         $this->config->set_item("banner-img", "img/Startup-logo.png");
    }#end constructor()

	public function index()
	{     $this->load->helper('form');
        $this->load->library('form_validation');

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
          //  $this->contact_model->send_email();
            //$this->load->view('contact/success');
        }
    }
    public function view($email = NULL)
    {
            $data['contact_item'] = $this->contact_model->get_emails($email);
            if (empty($data['contact_item']))
    {
            show_404();
    } else{

    $data['name'] = $data['contact_item']['name'];

    $this->load->view('templates/header', $data);
    $this->load->view('contact/view', $data);
    $this->load->view('templates/footer', $data);
  }
}#end view();

        public function create()
        {
      $this->load->helper('form');
      $this->load->library('form_validation');

      $data['name'] = 'Create new email';

      $this->form_validation->set_rules('name', 'Name', 'required');
      $this->form_validation->set_rules('email', 'email', 'required');
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
            $to_email = 'example@gmail.com';
            $this->load->helper('url');
            //configure email settings
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://smtp.gmail.com';
            $config['smtp_port'] = '465';
            $config['smtp_user'] = 'example@gmail.com';
            $config['smtp_pass'] = 'password';
            $config['mailtype'] = 'html';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
            $config['newline'] = "\r\n"; //use double quotes
            $this->load->library('email', $config);
            $this->email->initialize($config);

            //send mail
            $this->email->from($to_email, $name);
            $this->email->to($email);
            $this->email->subject($subject);
            $this->email->message($message);
            if ($this->email->send())
            {
                // mail sent
                $this->load->view('contact/success');
            }
            else
            {
                //error
                redirect('contact/');
            }

          }


      }
  }
