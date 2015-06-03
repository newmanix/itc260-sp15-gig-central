<?php
class Profile extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('profile_model');
    }

    public function view($userId) {
        $userQuery = $this->profile_model->loadProfile($userId);
        if (empty($userQuery)) {
            return show_404();
        }
        $this->config->set_item('title', $userQuery->userId);
        $data["profile"] = $userQuery;
        $this->load->view("profile/index", $data);
    }
}
