<?php
/**
 * models/Profile_model.php
 * controller for a generic Profile
 * used to show how to do CRUD in CodeIgniter
 *
 * @package ITC260
 * @subpackage Profile
 * @author
 * @version 1.0 2015/5/14
 * @link
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see Profile.php
 * @see index.php
 * @todo none
 */
/**
 * Profile model for our CRUD demo
 *
 * @see controllers/Profile.php
 * @todo none
 */

class Profile_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function loadProfile($userId) {
        return $this->db->get_where('Profile', array('ProfileID' => $userId));
    }
}
