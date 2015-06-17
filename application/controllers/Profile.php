<?php

/**
 * controllers/Profile.php
 * 
 * Profile page for Gig Central
 *
 * @package ITC260
 * @subpackage Profile
 * @author Kate Lee
 * @version 1.0 2015/05/14
 * @link
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see Profile_model.php
 * @todo
 */

class Profile extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('profile_model');
    }

    public function view($userId) {
        $userQuery = $this->profile_model->loadProfile($userId);
        if (!$userQuery->result_id->num_rows) {
            return show_404();
        }
        $userResults = $userQuery->result()[0];
        $this->config->set_item('title',$userResults->FirstName . " " . $userResults->LastName . "'s Profile");
        $data["profile"] = $userResults;
        $this->load->view("profile/index", $data);
    }
}
