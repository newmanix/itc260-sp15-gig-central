<?php
/**
 * controllers/Pages.php
 * 
 * Pages for Gig Central
 *
 * @package ITC260
 * @subpackage Pages
 * @author Douglas Doner and Aleksandar Petrovic
 * @version 1.0 2015/05/14
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
		$this->load->view("pages/$method");
    }
}
