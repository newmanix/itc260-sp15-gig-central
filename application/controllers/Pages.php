<?php
/**
 * Pages for Gig Central
 * @author ITC260 Seattle Central College
 * @version 2.0 2016/06/14
 * @link http://
 * @package ITC260
 * @subpackage Pages
 * @link
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see
 * @todo 
 */
 



class Pages extends CI_Controller {

function _remap($method)
    {
        is_file(APPPATH.'views/pages/'.$method.'.php') OR show_404();
		$headerdata['title'] = ucfirst($method);
		$this->load->view("pages/$method", $headerdata);
    }
}
