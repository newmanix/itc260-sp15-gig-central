<?php
/**
 * models/Profile_model.php
 * model for a generic Profile_List
 * used to interact with database .
 *
 * @package itc260-sp15-gig-central
 * @subpackage application/models
 * @author
 * @version 1.0 2015/5/14
 * @link
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see Profile.php
 * @see views/profiles/
 * @todo none
 */


/**
 * Profile_model Class retrieves data info for an individual profile.
 *
 * The constructor an instance of the Profile_model class loads the database.
 * 
 *
 * A Profile_model object (an instance of the Profile_modedl class) can be created in this manner:
 *
 *<code>
 *$myProfileModel = new Profile_model();
 *</code>
 *
 * The getProfiles($slug) method of the Profile_model object created will return the profile of that $slug or all profiles if $slug=false
 * 
 * The set_profile() method of the Profile_model object created will fill the array with data
 * 
 * The saveForm($form_data) method of the Profile_model object created will save the $form_data
 * 
 * The updateProfile($form_data) method of the Profile_model object will update the form of the profile.
 *
 * @todo none
 */
 
class Profile_model extends CI_Model
{
	/**
	 * Constructor for Profile_model class. 
	 *
	 * @return void 
	 * @todo none
	 */ 
    public function __construct()
    {
        $this->load->database();
        $this->load->library('session');
    
    }//end constructor
    
    /**
	 * getProfiles method for Profile_model class. 
	 *
	 * @param int $slug
     * @param boolean $subscribed 
	 * @return array
	 * @todo none
	 */ 

    public function getProfiles($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $query = $this->db->get_where('Profile');
            return $query->result_array();
        }
        $query = $this->db->get_where('Profile', array('id' => $slug));
        return $query->result_array();       
    }

    /* get_subscribed_profiles method for Profile_model class. */
    public function get_subscribed_profiles($slug = FALSE, $subscribed = FALSE)
    {
        if ($slug === FALSE)
        {
            $query = $this->db->get_where('Profile',array('subscribed_to_newsletters'=>$subscribed));
            return $query->result_array();
        }
        $query = $this->db->get_where('Profile', array('id' => $slug,'subscribed_to_newsletters' => $subscribed));
        return $query->result_array();
    }    
    /**
	 * setProfiles method for Profile_model class. 
	 * getProfiles method for Profile_model class. 
	 * 
	 * @return void 
	 * @todo none
	 */ 
    
    public function setProfiles()
    {
         $this->load->helper('url');

         $slug = url_title($this->input->post('first_name'), 'dash', TRUE);

         $data = array(
            'first_name' => $this->input->post('first_name'),
            'id' => $slug,
            'email' => $this->input->post('email')
         );
        return $this->db->insert('Profile', $data);
    }//end setProfiles method
	
    
    /**
	 * saveForm method for Profile_model class. 
	 *
	 * @param array $form_data
	 * @return void 
	 * @todo none
	 */ 
	function SaveForm($form_data)
	{ 
		$this->db->insert('Profile', $form_data);
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}

		return FALSE;
	}//end function SaveForm
	
	/**
	 * getPass method for Profile_model class. 
	 *
	 * @param string $id
	 * @param string $pass
	 * @return void 
	 * @todo none
	 */ 
    function getPass($id,$pass){
        $query = $this->db->get_where('Profile', array('id'=>$this->session->id));
         $row = $query->row();    
        if (isset($row))
        {
            //if(pass_decrypt($row->password,KEY_ENCRYPT) == $pass)
            if(password_verify($pass, $row->password))
            {
                return TRUE;
            }
        }
        return FALSE;
        
    }//end getPass function
    
    /**
	 * updateProfile method for Profile_model class. 
	 *
	 * @param array $form_data 
	 * @return void 
	 * @todo none
	 */ 
    function updateProfile($form_data)
    {
        $this->db->where('id',$this->session->id);
        $this->db->update('Profile',$form_data);
        $query = $this->db->get_where('Profile', array('id'=>$this->session->id));
        $row = $query->row();    
                if (isset($row))
                {
                
                    
                    $newdata = array(
                        'email' => $row->email,
                        'id' => $row->id,
                        'status'=> $row->i_am_a,
                        'first_name'=> $row->first_name,
                        'last_name'=> $row->last_name,
                        'picture'=> $row->picture, 
                        'bio'     => $row->bio
                    );
                        $this->session->set_userdata($newdata); 
                 return TRUE;    
                }
                return FALSE;
    }//end function
    
}//end class
