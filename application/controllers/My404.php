<?php

/**
 * controllers/My404.php
 * 
 * 404 page for Gig Central
 *
 * @package ITC260
 * @subpackage my404
 * @author Mandy Foster mandy.s.foster@gmail.com
 * @version 2.0 2015/08/08
 * @link
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see none
 * @todo none
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
                $this->config->set_item("banner", "Global 404 Banner");
                $this->load->helper('form');
        }
    
        public function index()
        {
                $this->output->set_status_header('404');
                $data['title'] = '404 Page'; 
                $data['content'] = 'error_404';
                $this->load->view('my404/index', $data);
        }

}//END 404
