<?php
/**
 * models/Startupform_model.php
 * controller for a generic Startup_form

 * used to show how to do CRUD in CodeIgniter
 *
 * @package ITC260
 * @subpackage Forms
 * @author
 * @version 1.0 2015/06/09
 * @link
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see Startup_form.php
 * @see index.php
 * @todo none
 */

/**
 * Startup_form model for our CRUD demo
 *
 * @see controllers/Startup_form.php
 * @todo none
 */
 
class Startupform_model extends CI_Model {

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

    public function get_startup_form()
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

}//END Startupform_model
