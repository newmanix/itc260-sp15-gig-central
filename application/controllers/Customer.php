<?php

/**
 * controllers/Customer.php
 * controller for a generic Customer
 * used to show how to do CRUD in CodeIgniter
 *
 * @package ITC260
 * @subpackage Customer
 * @author 
 * @version 1.0 2015/05/14 
 * @link 
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see Customer_model.php
 * @see index.php
 * @todo none
 */

/**
 * Customer controller for our CRUD demo
 *
 * @see models/Customer_model.php
 * @todo none
 */

class Customer extends CI_Controller {

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
                $this->load->model('customer_model');
                $this->config->set_item("banner", "Global Customer Banner");
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
                $data['query'] = $this->customer_model->getCustomers();
                $data['title'] = 'Form';
                $this->load->view('gig/index', $data);
 
                 

        }

public function addForm()
	{ #will create a form for adding customers
		  
		$this->load->helper('form');
		$this->config->set_item('title', 'Form'); 
		$this->load->view('gig/form');
		
	}#end add()

}//END Customer
