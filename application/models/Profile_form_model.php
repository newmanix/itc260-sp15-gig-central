<?php

/**
 * models/Profile_form_model.php
 * controller for a generic Profile_form
 * used to show how to do CRUD in CodeIgniter
 *
 * @package ITC260
 * @subpackage Profile_form
 * @author
 * @version 1.0 2015/5/14
 * @link
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see Profile_form.php
 * @see index.php
 * @todo none
 */
/**
 * Profile_form model for our CRUD demo
 *
 * @see controllers/Profile_form.php
 * @todo none
 */
 
class Profile_form_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// --------------------------------------------------------------------

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
}
?>
