<?php
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
