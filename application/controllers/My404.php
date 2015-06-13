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
                $this->load->model('customer_model');
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
        

}//END Customer
