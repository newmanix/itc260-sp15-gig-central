<?php

/**
 * controllers/Startup_form.php
 * controller for a generic Customer
 * used to show how to do CRUD in CodeIgniter
 *
 * @package ITC260
 * @subpackage Forms

 * @author Lydia King

 * @version 1.0 2015/06/09
 * @link
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see Startup_model.php
 * @see index.php
 * @todo none
 */

/**
 * Customer controller for our CRUD demo
 *
 * @see models/Startup_model.php
 * @todo none
 */

class Startup_form extends CI_Controller {

        /**
         * Loads default data into object
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

                $this->load->model('Startup_model');
                $this->config->set_item("banner", "Global Customer Banner");
                $this->load->helper('form');
        }

        /**
         * Shows initial Customer Database data
         *
         * @param none
         * @return void
         * @todo none
         */
        public function index()
        {

              $data['query'] = $this->Startup_model->get_startups();
                $data['title'] = 'Startup_form';
                $this->load->view('forms/index', $data);
                $this->config->set_item("banner-img", "img/Gig-logo.png");

        }

        /**
         * Shows form example with BootStrap classes
         *
         * @param none
         * @return void
         * @todo none
         */
        public function example() {
            $this->config->set_item('banner', 'Flatly Example Banner');
            $this->config->set_item('title', 'Flatly example');
          	$data['query'] = $this->Startup_model->get_startups();
            $this->load->view('forms/example', $data);

        }

}//END Customer
