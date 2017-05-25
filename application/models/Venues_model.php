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

    /**
     * Constructor for venues model class
     *loads database
     *
     * @param none
     * @return void
     * @todo none
     */
      public function __construct()

      {
        $this->load->database();

      }//end constructor




    /**
     * getVenues method retrieves added venues from database
     *loads database
     *
     * @param none
     * @return void
     * @todo none
     */
    public function getVenues($slug = FALSE)
    {

        
        
        if ($slug === FALSE)
        {
            $this->db->select('*');
            $this->db->from('Venue');
            $this->db->join('VenueType', 'VenueType.VenueTypeKey = Venue.VenueTypeKey');

            $query = $this->db->get();
            //$query = $this->db->get('sc_Venue');
            return $query->result_array();

        }

        $this->db->select('*');
        $this->db->from('Venue');
        $this->db->join('VenueType', 'VenueType.VenueTypeKey = Venue.VenueTypeKey')->where(array('VenueKey' => $slug));
        
        $query = $this->db->get();
        return $query->row_array();

    }//end getVenues method


    /**
     * addVenues loads CI base helper('url')
     *
     *
     * @param none
     * @return void
     * @todo none
     */
    public function addVenues()
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
        
        return $this->db->insert('Venue', $data);

}//end addVenues method
}//end class
