<?php
class Profile_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function loadProfile($userId) {
        return $this->db->get_where('profiles', array('id' => $userId));
    }
}
