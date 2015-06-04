<?php
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
