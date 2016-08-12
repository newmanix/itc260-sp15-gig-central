<?php

/**
 * controllers/Profile.php
 * 
 * Profile controller for Gig Central
 *
 * @package ITC260
 * @subpackage Profile_list
 * @author Doug Doner ,Souha Amor, Rattana Neak
 * @version 1.0 2015/05/14
 * @link
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see Profile_model.php
 * @see views/profiles/
 * @todo none
 */



/**
 * Profile Class extends the CI_Controller class
 *
 * The constructor an instance of the  Profile Class creates multiple instances of the
 * Profile class to store data from the DB.
 *
 * A profile object (an instance of the Profile class) can be created in this manner:
 *
 *<code>
 *$myProfile = new Profile();
 *</code>
 *
 *
 * The index() method of the profile object created will get all the data from Profile_model and load them into the view profiles/index
 *
 * The view($slug) method of the profile object created will get  the data of that slug from Profile_model and load them into the view profiles/view
 * 
 * The add() method of the profile object created will load a form , validate it and add profiles.
 * 
 * The edit method  of the profile object created will edit  forms,only if we are logged in as an admin.
 * 
 * @see Profile_model
 * @todo none
 */



class Profile extends CI_Controller {

/**
	 * Constructor for Profile class. 
	 *
	 * @return void 
	 * @todo none
	 */ 
    public function __construct()
    {//everything here is global to all methods in the controller
        parent::__construct();
        $this->load->model('profile_model');
        $this->config->set_item('banner','Global Profiles Banner');
		$this->load->library('form_validation');
        $this->load->library('session');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('email');
		$this->load->helper('url');
        $this->config->set_item('nav-active', 'Profiles');//sets active class on all Profile children


  }//end constructor
  
  
  /**
	 * index method for Answer class. 
	 *
	 * @return void 
	 * @todo none
	 */ 
	public function index()
	{
		/*echo "test";
		die;*/
			$data['profiles'] = $this->profile_model->get_profiles();
			$data['title'] = 'Profiles';
			$this->load->view('profiles/index', $data);
	}#end index()	
	
	
	/**
	 * view method for Answer class. 
	 *
	 * @param string $slug , to get the view of it
	 * @return void 
	 * @todo none
	 */ 

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
    
    
    /**
	 * add method for Answer class. 
	 *
	 * @return void 
	 * @todo none
	 */ 
    
    public function add()
    {
    
            $data['title'] = 'Add Profile';
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
                $this->form_validation->set_rules('bio', 'bio', 'required');    

                $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
            
            
            
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
                'bio'  => set_value('bio'),
                'subscribed_to_newsletters' => set_value('subscribed_to_newsletters')
                
            );
            //encrypt password here
            $form_data['password'] = pass_encrypt($form_data['password'],KEY_ENCRYPT);
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
            $this->load->view('profiles/add',$data);   
       }
    }
    
    /**
	 * edit method for Answer class. 
	 * 
	 * @return void 
	 * @todo none
	 */ 
    
    public function edit(){
         $data['title'] = 'Edit Profile';
        if ($this->session->logged_in == TRUE)
        {//if logged get all data from session
                $data['i_am'] = $this->session->status;
                $data['first_name'] = $this->session->first_name;
                $data['last_name'] = $this->session->last_name;
                $data['email'] = $this->session->email;
                $data['picture'] = $this->session->picture;
                $data['bio'] = $this->session->bio;
                 
            
        }else{//redirect to login page
                redirect("admin/login");
        }
        
        if (isset($_POST['Submit']))
        {//save update
            //validate the form 
                $this->form_validation->set_rules('i_am_a', 'I am a', 'required');
                $this->form_validation->set_rules('first_name', 'First Name', 'required');
                $this->form_validation->set_rules('last_name', 'Last Name', 'required');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                $this->form_validation->set_rules('userfile', 'userfile');
                $this->form_validation->set_rules('bio', 'bio', 'required');    

                $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
                  
            if ($this->form_validation->run() == FALSE) // validation hasn't been passed
            { 
                $this->load->view('profiles/edit', $data);
            }else{
            
        
            if($_FILES['userfile']['name']!=''){
                 //some config for upload photo
                    $config['upload_path']          = './img/';
                    $config['allowed_types']       = 'gif|jpg|png';
                    $config['max_size']            = 500000;
                    $config['max_width']           = 1024;
                    //$config['max_height']          = 768;
                    $config['file_name']          = date('Ymdhis');
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                     //upload image files
                    if ($this->upload->do_upload('userfile'))
                        {
                                $data = array('upload_data' => $this->upload->data());
                                $pic_id = $this->upload->data('file_name');
                                if (file_exists('./img/'.$this->session->picture)){
                                    if ($this->session->picture !="picID.jpg"){
                                        unlink('./img/'.$this->session->picture);    
                                    }
                                    
                                }
                                  $newdata = array(
                                    'picture'=> $this->upload->data('file_name'), 
                                );
                                $this->session->set_userdata($newdata);
                                
                               
                        }else{
                            echo  $this->upload->display_errors();
                        }
            }else{
                $pic_id = $this->session->picture;
            }
            /*
            if($_POST['password']!=""){
                
                $this->form_validation->set_rules('password', 'password', 'required');
                $this->form_validation->set_rules('re_password', 'Password Confirmation', 'required|matches[password]');
                
                if($this->profile_model->get_pass($_POST['old_password']) == TRUE){
                    echo set_value('password');
              
                        $password = pass_encrypt(set_value('password'),KEY_ENCRYPT);
                }else{
                    $this->form_validation->set_rules('old_password', 'old_password','required',
                    array(
                     'required' => 'Your old_password is not correct.'   
                    ));
                }
                     if ($this->form_validation->run() == FALSE) // validation hasn't been passed
                        { 
                            $this->load->view('profiles/edit', $data);
                        }
                  die;        
            }else{
                $password = $this->session->pass;
            }
            */
            
                //initial data
            $form_data = array(
                'i_am_a' => set_value('i_am_a'),
                'first_name' => set_value('first_name'),
                'last_name'  => set_value('last_name'),
                'picture' => $pic_id,
                'email'      => set_value('email'),
                'bio'  => set_value('bio'),
                'subscribed_to_newsletters' => set_value('subscribed_to_newsletters')
            );
            //update database
            if ($this->profile_model->update_profile($form_data) == TRUE) // the information has therefore been successfully saved in the db
            {
                $this->load->view('profiles/success');   // or whatever logic needs to occur
            }
            else
            {
                
                echo 'An error occurred saving your information. Please try again later';
                // Or whatever error handling is necessary
            }
           }
        }else{//show form
               $this->load->view('profiles/edit',$data);
        }
        
        
        
    }
}
