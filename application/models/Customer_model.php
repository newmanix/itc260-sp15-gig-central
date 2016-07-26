<?php
/**
 * models/Customer_model.php
 * controller for a generic Customer
 * used to show how to do CRUD in CodeIgniter
 *
 * @package ITC260
 * @subpackage Customer
 * @author
 * @version 1.0 2015/5/14
 * @link
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see Customer.php
 * @see index.php
 * @todo none
 */

/**
 * Customer model for our CRUD demo
 *
 * @see controllers/Customer.php
 * @todo none
 */
class Customer_model extends CI_Model {

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

    public function get_customers()
    {
        return $this->db->get('test_Customers');
    }

    // public function get_news($slug = FALSE)
    // {
    //         if ($slug === FALSE)
    //         {
    //                 $query = $this->db->get('news');
    //                 return $query->result_array();
    //         }

    //         $query = $this->db->get_where('news', array('slug' => $slug));
    //         return $query->row_array();
    // }

}//END Customer_model
