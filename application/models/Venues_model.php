<?php
/**
 * models/Venues_model.php
 * model for a generic Venues
 * used to show how to do CRUD in CodeIgniter
 *
 * @package ITC260
 * @subpackage Venues
 * @author Anna Atiagina, Jenny Crimp
 * @version 2.0 2015/8/11
 * @link
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see Venues.php
 * @see views/venues/index.php
 * @see views/venues/view.php
 * @see views/venues/add.php
 * @see views/venues/success.php
 * @todo none
 */

class Venues_model extends CI_Model {

      public function __construct()
      {
        $this->load->database();

      }//end constructor


    public function get_venues($slug = FALSE)
    {
        /*
        $this->db->select('*');
        $this->db->from('blogs');
        $this->db->join('comments', 'comments.id = blogs.id');

        $query = $this->db->get();

        // Produces: 
        // SELECT * FROM blogs
        // JOIN comments ON comments.id = blogs.id
        
        */
        if ($slug === FALSE)
        {
            $this->db->select('*');
            $this->db->from('sc_Venue');
            $this->db->join('sc_VenueType', 'sc_VenueType.VenueTypeKey = sc_Venue.VenueTypeKey');

            $query = $this->db->get();
            //$query = $this->db->get('sc_Venue');
            return $query->result_array();

        }

        $this->db->select('*');
        $this->db->from('sc_Venue');
        $this->db->join('sc_VenueType', 'sc_VenueType.VenueTypeKey = sc_Venue.VenueTypeKey')->where(array('VenueKey' => $slug));
        
        $query = $this->db->get();
        return $query->row_array();

    }//end get_venues method
    
    

    public function add_venues()
    {
         $this->load->helper('url');


         $data = array(
            'VenueName' => $this->input->post('VenueName'),
            'VenueTypeKey' => $this->input->post('VenueTypeKey'),
            'VenueAddress' => $this->input->post('VenueAddress'),
            'City' => $this->input->post('City'),
            'State' => $this->input->post('State'),
            'ZipCode' => $this->input->post('ZipCode'),
            'VenuePhone' => $this->input->post('VenuePhone'),
            'VenueWebsite' => $this->input->post('VenueWebsite'),
            'VenueHours' => $this->input->post('VenueHours'),
            'Food' => $this->input->post('Food'),
            'Bar' => $this->input->post('Bar'),
            'Outlets' => $this->input->post('Outlets'),
            'WiFi' => $this->input->post('WiFi'),
            'Outdoor' => $this->input->post('Outdoor'),
            'Wheelchair' => $this->input->post('Wheelchair'),
            'Parking' => $this->input->post('Parking')

         );
        
        return $this->db->insert('sc_Venue', $data);

}//end add_venues method
}//end class
