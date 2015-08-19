<?php
/**
 * models/Profile_List_model.php
 * controller for a generic Profile_List
 * used to show how to do CRUD in CodeIgniter
 *
 * @package ITC260
 * @subpackage Profile_List
 * @author
 * @version 1.0 2015/5/14
 * @link
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see Profile_list.php
 * @see index.php
 * @todo none
 */
/**
 * Profile_List model for our CRUD demo
 *
 * @see controllers/Profile.php
 * @todo none
 */
 
class Profile_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    
    }//end constructor

    public function get_profiles($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $query = $this->db->get('Profile');
            return $query->result_array();
        }
        $query = $this->db->get_where('Profile', array('id' => $slug));
        return $query->row_array();
     
    }//end get_profiles method

    public function set_profiles()
    {
         $this->load->helper('url');

         $slug = url_title($this->input->post('first_name'), 'dash', TRUE);

         $data = array(
            'first_name' => $this->input->post('first_name'),
            'id' => $slug,
            'email' => $this->input->post('email')
         );
        return $this->db->insert('Profile', $data);
    }//end set_profiles method
	
	function SaveForm($form_data)
	{
		$this->db->insert('Profile', $form_data);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}

		return FALSE;
	}//end function SaveForm
}//end class
