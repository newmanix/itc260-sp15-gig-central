<?php
class Pages extends CI_Controller {

function _remap($method)
    {
        is_file(APPPATH.'views/pages/'.$method.'.php') OR show_404();
		$headerdata['title'] = ucfirst($method);
		$this->load->view("pages/$method");
    }
}
