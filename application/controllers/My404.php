<?php

/**
 * controllers/404.php
 * 
 * 404 page for Gig Central
 *
 * @package ITC260
 * @subpackage my404
 * @author Jacob
 * @version 1.0 2015/05/14
 * @link
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see
 * @todo 
 */

class my404 extends CI_Controller {

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
                $this->load->model('My404_model');
                $this->config->set_item("banner", "Global 404 Banner");
                $this->load->helper('form');
        }

        /**
         * Shows initial 404 Database data
         *
         * @param none
         * @return void
         * @todo none
         */
        public function index()
        {
                $data['content'] = 'error_404';
                $this->load->view('my404/index', $data);
        }

        /**
         * Shows form example with BootStrap classes
         *
         * @param none
         * @return void
         * @todo none
         */
        

}//END 404
