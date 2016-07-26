<?php

/**
 * controllers/Disclaimer.php
 * 
 * Disclaimer page for Gig Central
 *
 * @package ITC260
 * @subpackage Disclaimer
 * @author Derek Juhl
 * @version 1.0 2015/06/11
 * @link
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see 
 * @todo 
 *
 * View Gig Central disclaimer here:
 *
 * http://derekjuhl.com/itc260/gig-central/ci/disclaimer/
 */

class Disclaimer extends CI_Controller {	
	
	public function __construct()
	{		
		//everything here is global to all methods in the controller
      parent::__construct();
      $this->config->set_item("banner", "Global Customer Banner");
   }
	 
   public function index()
	{		
      $data['title'] = 'Disclaimer';
      $this->load->view('pages/disclaimer', $data);
	  $this->config->set_item('banner-img', 'img/Gig-logo.png');
   }
	
}//END Disclaimer