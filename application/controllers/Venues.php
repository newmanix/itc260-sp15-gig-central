<?php

/**
 * controllers/Venues.php
 * controller for Startup Venues
 * used to show how to do CRUD in CodeIgniter
 *
 * @package ITC260
 * @subpackage Forms

 * @author Lydia King, Anna Atiagina, Jenny Crimp

 * @version 2.0 2015/08/11
 * @link
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see Venues_model.php
 * @see views/venues/index.php
 * @see views/venues/view.php
 * @see views/venues/add.php
 * @see views/venues/success.php
 * @todo none
 */


class Venues extends CI_Controller {

       /**
        * Constructor Loads default data into object
        *
        * Added in v3 - Result object
        *
        * @param none
        * @return void
        * @todo none
        */
       public function __construct()
       {
            //everything here is global to all methods in the controller
            parent::__construct();
            $this->load->model('Venues_model');
            $this->config->set_item("banner", "Global Customer Banner");
            $this->load->helper('form');
            $this->config->set_item('nav-active', 'Venues');//sets active class on all Venues children
       }
    
       /**
        * index function loads venues data from Venues/Model and allows you to view in venues/index
        *
        * @param none
        * @return void
        * @todo none
        */
       public function index()
       {
             $data['venues'] = $this->Venues_model->get_venues();
             $data['title'] = 'Venues';
             $this->load->view('venues/index', $data);
       }//end index()

    /**
     * view method allows you too view venues through venues/view.php
     *
     * @param none
     * @return void
     * @todo none
     */
       public function view($slug = NULL)
	   {
			$data['venue'] = $this->Venues_model->get_venues($slug);

			if (empty($data['venue']))
			{
					show_404();
			}

			$data['title'] = $data['venue']['VenueName'];
			$this->load->view('venues/view', $data);
	   }//end view()


    /**
     * Shows for through the add.php page
     * Allows one to add info about venues
     * @param none
     * @return venues/success if form is validated correctly
     * @todo none
     */
    public function add()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Add a new Venue';
        $this->form_validation->set_rules('VenueName', 'Venue Name', 'required');
        $this->form_validation->set_rules('VenueTypeKey', 'Venue Type', 'required');
        $this->form_validation->set_rules('VenueAddress', 'Venue Address', 'required');
        $this->form_validation->set_rules('City', 'City', 'required');
        $this->form_validation->set_rules('State', 'State', 'required');
        $this->form_validation->set_rules('ZipCode', 'Zip Code', 'required');
        $this->form_validation->set_rules('VenuePhone', 'Venue Phone', 'required');
       

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('venues/add', $data);

        }
        else
        {
            $this->Venues_model->add_venues();
            $this->load->view('venues/success');
        }
    }//end add()

}//END Venues
