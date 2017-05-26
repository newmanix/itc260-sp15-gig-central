<?php

/**
 *Welcome page for Gig Central
 *
 * @package GIG_CENTRAL
 * @subpackage GIG
 * @author Kate Lee, Alexandre Daniels
 * @version 1.0 2016/06/09 
 * @link http://newmanix.com/ 
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @todo none
 */
 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Welcome class loads in data for the welocome_page view
 *
 * @todo none
 */

class Welcome extends CI_Controller {
/**
 * constructor for the class sets active class on Home in the nav
 *
 * @param none
 * @return none
 * @todo none
 */
	public function __construct()
    {//everything here is global to all methods in the controller
        parent::__construct();
        $this->config->set_item('nav-active', 'Home');//sets active class on Home in the nav
    }//end constructor
	
/**
 * loads, but does not create, the data required to make the view page
 *
 * @param none
 * @return none
 * @todo none
 */
	public function index()
	{
		$this->load->model('gig_model');
		$data['gigs'] = $this->gig_model->getGigs();
        $data['title'] = 'Gig Central';
		$data['api'] = $this->config->item('googleMapsKey');
		$this->load->view('welcome_page', $data);
        $this->load->view($this->config->item('theme') . 'header');
        $this->load->view($this->config->item('theme') . 'footer');

	}
}
