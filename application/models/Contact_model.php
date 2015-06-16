<?php
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
