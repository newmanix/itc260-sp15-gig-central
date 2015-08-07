<?php
/**
 * models/Customer_model.php
 * controller for a generic Customer
 * used to show how to do CRUD in CodeIgniter
 *
 * @package ITC260
 * @subpackage My404
 * @author
 * @version 1.0 2015/5/14
 * @link
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see controllers/My404.php
 * @see views/my404/index.php
 * @todo none
 */
/**
 * Customer model for our CRUD demo
 *
 * @see controllers/My404.php
 * @todo none
 */
class My404_model extends CI_Model {
    /**
         * Loads default data into object
         *
         * @param none
         * @return void
         * @todo none
         */
    public function __construct()
    {
            $this->load->database();
    }
    public function get_404()
    {
        return $this->db->get('My404');
    }
   
}//END My404_model