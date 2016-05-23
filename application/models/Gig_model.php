<?php
/**
* Gig_model.php model for Gig Controller
*
* @package ITC 260 CodeIgnitor - Gig Central
* @subpackage Gig Controller
* @author Patricia Barker <patriciabethbarker@gmail.com>
* @version 2.1 2015/06/11
* @link http://www.tcbcommercialproperties.com/sandbox/codeignitor/
* @license http://www.apache.org/licenses/LICENSE-2.0
* @see controllers/Gig.php
* @see views/gigs/add.php
* @see add.php
* @todo none
*/

/**
 * Gigs_form model for our Gig Central Project
 *
 * @see Gigs_form
 * @todo none
 */
class Gig_model extends CI_Model {

     /**
     * Loads default data into Object
     *
     * @param none
     * @param void
     * @todo none
     */
    public function __construct()
    {
            $this->load->database();
    }#end constructor

       
    //public function get_gigs()
    public function get_gigs($slug = FALSE)
    {
        if ($slug === FALSE)
        {
             $query = $this->db->get('Gigs');
             return $query->result_array();
        }

        $query = $this->db->get_where('Gigs', array('GigID'=> $slug));
        return $query->row_array();
    }#end get_gigs()
    
    
    public function add_gig()
    {
        $this->load->helper('url');

        $data = array(
        'CompanyName' => $this->input->post('CompanyName'),
        'CompanyAddress' => $this->input->post('CompanyAddress'),
        'City' => $this->input->post('City'),
        'CompanyState' => $this->input->post('CompanyState'),
        'ZipCode' => $this->input->post('ZipCode'),
        'CompanyPhone' => $this->input->post('CompanyPhone'),
        'CompanyWebsite' => $this->input->post('CompanyWebsite'),
        'FirstName' => $this->input->post('FirstName'),
        'LastName' => $this->input->post('LastName'),
        'Email' => $this->input->post('Email'),
        'Phone' => $this->input->post('Phone'),
        'GigQualify' => $this->input->post('GigQualify'),
        'EmploymentType' => $this->input->post('EmploymentType'),
        'GigOutline' => $this->input->post('GigOutline'),
        'SpInstructions' => $this->input->post('SpInstructions'),
        'PayRate' => $this->input->post('PayRate'),
        'GigPosted' => $this->input->post('GigPosted'),//What is this field for?
        'LastUpdated' => $this->input->post('LastUpdated'),//Change this to current time
        );
        
        return $this->db->insert('Gigs', $data);

    }

}#end of the Gig_model
