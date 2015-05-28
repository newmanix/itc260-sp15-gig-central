<?php
//Startups.php controller
class Startups extends CI_Controller {

    public function __construct()
    {//everything here is global to all methods in the controller
         parent::__construct();
         $this->load->model('startup_model');
         $this->config->set_item('banner','Global Startup Banner');
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
					show_404();
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
