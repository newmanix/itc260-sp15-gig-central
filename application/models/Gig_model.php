<?php
/**
* Gig_model.php model for Gig Controller
*
* @package ITC 260 CodeIgnitor - Gig Central
* @subpackage Gig Controller
* @author Patricia Barker <patriciabethbarker@gmail.com>, Turner Tackitt <turner8193@gmail.com>, Spencer Echon
* @version 2.2 2016/06/14
* @link http://www.tcbcommercialproperties.com/sandbox/codeignitor/
* @license http://www.apache.org/licenses/LICENSE-2.0
* @see controllers/Gig.php
* @see views/gigs/add.php
* @see add.php
* @todo fix Gigposted and Lastupdated to output actual time
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

       
     /**
     * Retreive a list of available gigs from the DB.
     *
     * @param $slug string Retreives data about a specific gig by slug. If $sinceDate is specified, this parameter must be explicitly given a value of FALSE. Can be omitted to retreive a list of all gigs posted.
     * @param $sinceDate int (timestamp from eg, time() function) If specified, this function will only return gigs posted since the specified date. The time portion of this timestamp is ignored. Timestamp is based off the number of seconds elapsed since the Unix Epoch (January 1 1970 00:00:00 GMT), and can be retreived using a function like time(). 
     * @return array() of array(GigID, CompanyID, GigQualify, EmploymentType, GigOutline, SpInstructions, PayRate, GigPosted, LastUpdated, Name, Address, CompanyCity, State, ZipCode, CompanyPhone, Website, FirstName, LastName, Email, Phone). This is a join between the Gig and Company tables.
     * @todo none
     */
    public function getGigs($slug = FALSE, $sinceDate = FALSE)
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
        //$query = $this->db->like('GigOutline', $slug);
        return $query->row_array();
    }#end getGigs()
    


    /**
     * Add a new gig to the DB using POST parameters.
     *
     * @return void
     * @todo Refactor functino so POST parameters are replaced with function parameters, allowing bulk-imports of new gigs.
     */
    public function addGig()
    {
        $this->load->helper('url');

        $data = array(
            'Name' => $this->input->post('Name'),
            'Address' => $this->input->post('CompanyAddress'),
            'CompanyCity' => $this->input->post('CompanyCity'),
            'State' => $this->input->post('CompanyState'),
            'ZipCode' => $this->input->post('ZipCode'),
            'CompanyPhone' => $this->input->post('CompanyPhone'),
            'Website' => $this->input->post('CompanyWebsite'),
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
            $companyid = $row->CompanyID;//Joins CompanyID for gig and company tables
        }
        
        $data2 = array(
            'CompanyID' => $companyid,    
            'GigQualify' => strip_tags($this->input->post('GigQualify'),'<p>'),
            'EmploymentType' => $this->input->post('EmploymentType'),
            'GigOutline' => strip_tags($this->input->post('GigOutline'),'<p>'),
            'SpInstructions' => strip_tags($this->input->post('SpInstructions'),'<p>'),
            'PayRate' => $this->input->post('PayRate'),
            'GigPosted' => date("Y-m-d H:i:s"),
            'LastUpdated' => date("Y-m-d H:i:s")
        );
        
        return $this->db->insert('Gigs', $data2);

    }

}#end of the Gig_model
