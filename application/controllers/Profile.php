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
    
    
    public function add()
    {
    
            
            if (isset($_POST['Submit'])){
                $this->form_validation->set_rules('i_am_a', 'I am a', 'required');
                $this->form_validation->set_rules('first_name', 'First Name', 'required');
                $this->form_validation->set_rules('last_name', 'Last Name', 'required');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[Profile.email]',
                array(
                'is_unique'     => 'This %s already exists.'
                ));
                $this->form_validation->set_rules('password', 'password', 'required');
                $this->form_validation->set_rules('re_password', 'Password Confirmation', 'required|matches[password]');
                $this->form_validation->set_rules('languages', 'Languages', 'required');    

                $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
            
            $data['title'] = 'Add a Profile';
            
            if ($this->form_validation->run() == FALSE) // validation hasn't been passed
            { 
                $this->load->view('profiles/add', $data);
            }
            else // passed validation proceed to post success logic
            {
            
            //some config for upload photo
            $config['upload_path']          = './img/';
            $config['allowed_types']       = 'gif|jpg|png';
            $config['max_size']            = 500000;
            $config['max_width']           = 1024;
            $config['max_height']          = 768;
            $config['file_name']          = date('Ymdhis');
            $this->load->library('upload', $config);
            $pic_id ="picID.jpg";
            // Alternately you can set preferences by calling the ``initialize()`` method. Useful if you auto-load the class:
            
            $this->upload->initialize($config);
                //upload image files
                if ($this->upload->do_upload('userfile'))
                        {
                                $data = array('upload_data' => $this->upload->data());
                                $pic_id = $this->upload->data('file_name');
                        }
                
                    
            ;
            // build array for the model
            $form_data = array(
                'i_am_a' => set_value('i_am_a'),
                'first_name' => set_value('first_name'),
                'last_name'  => set_value('last_name'),
                'password'   => set_value('password'),
                'picture'    => $pic_id,
                'email'      => set_value('email'),
                'languages'  => set_value('languages')
                
            );
            //encrypt password here
            $form_data['password'] = pass_encrypt($form_data['password']);
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
       }else{//if the form not submit
            $this->load->view('profiles/add');   
       }
    }
    
    public function duplicat(){
        
        $data['double']=$this->profile_model->check_duplicate("rattana.neak@gmail.com");
        $this->load->view('profiles/success',$data);
    }
}
