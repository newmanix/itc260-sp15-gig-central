<?php

/**
 * controllers/Pages.php
 *
 * Pages for Gig Central
 * 
 * @package ITC260
 * @subpackage Pages
 * @author
 * @version 2.0 2016/06/14
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see view/pages/about.php
 * @see view/pages/disclaimer.php
 * @see view/pages/faq.php
 * @todo delete unnecessary page views in view/pages
 */
 



class Pages extends CI_Controller {

/**
     * 
     * Remaps pages views so each page doesn't need it's own controller
     *
     * @return void
     * @todo none
     */
    
function _remap($method)
    {
        is_file(APPPATH.'views/pages/'.$method.'.php') OR show_404();
		$headerdata['title'] = ucfirst($method);
		$this->load->view("pages/$method", $headerdata);
    }
}
