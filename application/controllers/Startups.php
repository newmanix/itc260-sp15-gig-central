<?php

/**
 * controllers/Startups.php
 * 
 * Startups page for Gig Central
 *
 * @package ITC260
 * @subpackage Startups
 * @author Rafael Malave
 * @version 1.0 2015/05/14
 * @link
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see Startup_model.php
 * @todo 
 */

class Startups extends CI_Controller {

    public function __construct()
    {//everything here is global to all methods in the controller
         parent::__construct();
         $this->load->model('startup_model');
         $this->config->set_item('banner','Global Startup Banner');
         $this->config->set_item("banner-img", "img/Startup-logo.png");
    }#end constructor()

	public function index()
	{
			$data['startups'] = $this->startup_model->get_startups();
			$data['title'] = 'Startups';
			$this->load->view('startups/index', $data);
	}#end index()

	public function view($slug = NULL)
	{
			$data['startup'] = $this->startup_model->get_startups($slug);

			if (empty($data['startup']))
			{
					show_Startups();
			}

			$data['title'] = $data['startup']['title'];
			$this->load->view('startups/view', $data);
	}#end view()


    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a new startup';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'text', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('startups/create', $data);
            $this->load->view('templates/footer', $data);

        }
        else
        {
            $this->startup_model->set_startups();
            $this->load->view('startups/success');
        }
    }
}
