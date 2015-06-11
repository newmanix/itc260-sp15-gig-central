<?php
//Profile_List.php controller
class Profile_list extends CI_Controller {

    public function __construct()
    {//everything here is global to all methods in the controller
         parent::__construct();
         $this->load->model('profile_list_model');
         $this->config->set_item('banner','Global Profiles Banner');
    }#end constructor()

	public function index()
	{
			$data['profiles'] = $this->profile_list_model->get_profiles();
			$data['title'] = 'Profiles';
			$this->load->view('profiles/index', $data);
	}#end index()

	public function view($slug = NULL)
	{
			$data['profile'] = $this->profile_list_model->get_profiles($slug);

			if (empty($data['profile']))
			{
					show_404();
			}

			$data['FirstName'] = $data['profile']['FirstName'];
			$this->load->view('profiles/view', $data);

	}#end view()
    
    
    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a profile';

        $this->form_validation->set_rules('FirstName', 'First Name', 'required');
        $this->form_validation->set_rules('LastName', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('profiles/create', $data);
            $this->load->view('templates/footer', $data);

        }
        else
        {
            $this->startup_model->set_startups();
            $this->load->view('profiles/success');
        }
    }
}
