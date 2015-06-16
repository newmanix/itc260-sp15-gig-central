<?php
/**
 * controllers/Disclaimer.php
 * controller for disclaimer
 *
 * Derek Juhl
 * ITC 260
 * 06/11/15
 *
 * Compare:
 * itc260-sp15-gig-central/application/controllers/About.php
 *
 * View Gig Central disclaimer here:
 *
 * http://derekjuhl.com/itc260/gig-central/ci/disclaimer/
**/

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