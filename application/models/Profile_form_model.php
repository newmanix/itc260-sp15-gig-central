<?php

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
