<?php
class Profile_List_model extends CI_Model
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
        $query = $this->db->get_where('profiles', array('slug' => $slug));
        return $query->row_array();
     
    }//end get_news method

    public function set_profiles()
    {
         $this->load->helper('url');

         $slug = url_title($this->input->post('FirstName'), 'dash', TRUE);

         $data = array(
            'FirstName' => $this->input->post('FirstName'),
            'slug' => $slug,
            'Email' => $this->input->post('Email')
         );
        return $this->db->insert('profiles', $data);
    }//end set_profiles method
}//end class
