<?php
/**
 * models/Login_model.php
 * model for a Login
 *
 * @package Startup Central
 * @subpackage Login
 * @author
 * @version 1.0 2015/5/14
 * @link
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see index.php
 * @see controllers Login.php
 * @see view login/index.php
 * @todo none
 */

/**
 * Login model for Statup central
 *
 * @see controllers/Login.php
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
