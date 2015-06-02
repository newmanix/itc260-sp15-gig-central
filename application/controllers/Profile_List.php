<?php
//Startups.php controller
class Profile_List extends CI_Controller {

    public function __construct()
    {//everything here is global to all methods in the controller
         parent::__construct();
         $this->load->model('profile_model');
         $this->config->set_item('banner','Global Startup Banner');
    }#end constructor()

	public function index()
	{
			$data['profiles'] = $this->startup_model->get_startups();
			$data['title'] = 'Profiles';
			$this->load->view('profiles/index', $data);
	}#end index()

	public function view($slug = NULL)
	{
			$data['profile'] = $this->startup_model->get_startups($slug);

			if (empty($data['profile']))
			{
					show_404();
			}

			$data['title'] = $data['profile']['title'];
			$this->load->view('profiles/view', $data);
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
