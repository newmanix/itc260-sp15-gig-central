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
    public function get_gigs($slug = FALSE, $sinceDate = FALSE)
    {
        if ($slug === FALSE)
        {
             $this->db->select('*');
             $this->db->from('Company');
             $this->db->join('Gigs', 'Gigs.CompanyID = Company.CompanyID');
             
             // If sinceDate is specified, load it as a PHP timestamp and filter out all listings created BEFORE that date. Time portion of timestamp is ignored.
             if($sinceDate !== FALSE) $this->db->where('GigPosted > ', date( 'Y-m-d 00:00:00', $sinceDate ) );
             
             $query = $this->db->get();
             return $query->result_array();
        }

        $this->db->select('*');
        $this->db->from('Company');
        $this->db->join('Gigs', 'Gigs.CompanyID = Company.CompanyID');
        $query = $this->db->get_where('',array('GigID'=> $slug));
        return $query->row_array();
    }#end get_gigs()
    
    
    public function add_gig()
    {
        $this->load->helper('url');

        $data = array(
        'Name' => $this->input->post('Name'),
        'Address' => $this->input->post('Address'),
        'CompanyCity' => $this->input->post('CompanyCity'),
        'State' => $this->input->post('State'),
        'ZipCode' => $this->input->post('ZipCode'),
        'CompanyPhone' => $this->input->post('CompanyPhone'),
        'Website' => $this->input->post('Website'),
        'FirstName' => $this->input->post('FirstName'),
        'LastName' => $this->input->post('LastName'),
        'Email' => $this->input->post('Email'),
        'Phone' => $this->input->post('Phone')
        );
        
        $this->db->insert('Company', $data);
        
        $this->db->order_by("CompanyID", "desc");
        $this->db->limit(0, 1);
        $query = $this->db->get('Company');
        $row = $query->row();
        if(isset($row)) {
            $companyid = $row->CompanyID;
        }
        
        $data2 = array(
        'CompanyID' => $companyid,    
        'GigQualify' => $this->input->post('GigQualify'),
        'EmploymentType' => $this->input->post('EmploymentType'),
        'GigOutline' => $this->input->post('GigOutline'),
        'SpInstructions' => $this->input->post('SpInstructions'),
        'PayRate' => $this->input->post('PayRate'),
        'GigPosted' => $this->input->post('GigPosted'),//What is this field for?
        'LastUpdated' => $this->input->post('LastUpdated')//Change this to current time
        );
        
        return $this->db->insert('Gigs', $data2);

    }

}#end of the Gig_model
