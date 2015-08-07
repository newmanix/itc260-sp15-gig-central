<?php
/**
 * models/Startup_model.php
 * controller for a generic Startups
 * used to show how to do CRUD in CodeIgniter
 *
 * @package ITC260
 * @subpackage Startups
 * @author
 * @version 1.0 2015/5/14
 * @link
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see Startups.php
 * @see index.php
 * @todo none
 */
/**
 * Startups model for our CRUD demo
 *
 * @see controllers/Startups.php
 * @todo none
 */
class Startup_model extends CI_Model {

      public function __construct()
            {
        $this->load->database();

}//end constructor


    public function get_startups($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $query = $this->db->get('test_Customers');
            return $query->result_array();

}

        $query = $this->db->get_where('test_Customers', array('slug' => $slug));
        return $query->row_array();

}//end get_news method


    public function set_startups()
    {
         $this->load->helper('url');

                 $slug = url_title($this->input->post('title'), 'dash', TRUE);

         $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'text' => $this->input->post('text')

         );

        return $this->db->insert('test_Customers', $data);

}//end set_startups method
}//end class
