<?php
/**
 * models/Contact_model.php
 * controller for a generic Contact
 * used to show how to do CRUD in CodeIgniter
 *
 * @package ITC260
 * @subpackage Contact
 * @author
 * @version 1.0 2015/5/14
 * @link
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see Contact.php
 * @see index.php
 * @todo none
 */
 
/**
 * Contact model for our CRUD demo
 *
 * @see controllers/Contact.php
 * @todo none
 */ 
 
class Contact_model extends CI_Model {
        public function __construct()
        {
                $this->load->database();
        }

		public function get_emails($email = FALSE)
		{
			if ($email === FALSE)
			{
					$query = $this->db->get('contact');
					return $query->result_array();
			}
			$query = $this->db->get_where('contact', array('email' => $email));
			return $query->row_array();
		}

    public function set_emails()
    {
    $this->load->helper('url');

    $email = url_title($this->input->post('name'), 'dash', TRUE);

    $data = array(
        'name' => $this->input->post('name'),
        'email' => $email,
        'message' => $this->input->post('message')
    );

    return $this->db->insert('contact', $data);
  }


}
