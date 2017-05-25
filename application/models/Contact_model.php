<?php
/**
 * models/Contact_model.php
 * controller for a generic Contact
 * Turner/Hastwell:
 *
 * @package ITC260
 * @subpackage Contact
 * @author
 * @version 1.0 2015/5/14
 * @link
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see Contact.php
 * @see index.php
 * @todo Determine if this is even needed; model is not currently used by anything, including its own controller.
 */
 
/**
 * Contact model for our CRUD demo
 *
 * @see controllers/Contact.php
 * @todo none
 */ 
 
class Contact_model extends CI_Model
{
        public function __construct()
        {
                $this->load->database();
        }

	/**
	 * Retreive stored contact messages from DB
	 *
	 * @param string $email If specified, will only retreive contact messages sent by the specified email address. If omitted, all stored messages will be retreived.
	 * @return array() of array('name' => xxx, 'email' => xxx, 'message' => xxx) representing the messages stored in the database, filtered by any optional parameters.
	 * @todo none
	 */
	public function getEmails($email = FALSE)
	{
		if ($email === FALSE)
		{
			$query = $this->db->get('contact');
			return $query->result_array();
		}
		$query = $this->db->get_where('contact', array('email' => $email));
		return $query->row_array();
	}

	/**
	 * Store a new user-composed contact message in the database, using POST parameters.
	 *
	 * @return void
	 * @todo Add validation to ensure invalid data cannot be entered; currently any POST value (however malformed) will be accepted.
	 */
	public function setEmails()
	{
		$this->load->helper('url');

		$email = url_title($this->input->post('name'), 'dash', TRUE);

		$data = array
		(
			'name' => $this->input->post('name'),
			'email' => $email,
			'message' => $this->input->post('message')
		);

		return $this->db->insert('contact', $data);
	}


}
