<?php
/**
* Profile_form_model.php model that handles profile data
*
* Inserts data into profile database
*
* @package MEDIUM_PIECE_OF_PROGRAM
* @subpackage Profile_form_model
* @author Evan Smyth <evsmyth@yahoo.com>
* @version 1.0 2015/05/21
* @link http://www.example.com/
* @license http://www.apache.org/licenses/LICENSE-2.0
* @see Profile_form.php
* @see profile_form/index.php
* @todo none
*/



class Profile_form_model extends CI_Model {// Begin model


	/**
	* Loads default data into object
	*
	*
	* @param none
	* @return void
	* @todo none
	*/
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}



	/**
	* function SaveForm()
	*
	* insert form data
	* @param $form_data - array
	* @return Bool - TRUE or FALSE
	*/

	function SaveForm($form_data)
	{
		$this->db->insert('Profiles', $form_data);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}

		return FALSE;
	}
}//End model
?>
