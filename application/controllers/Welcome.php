<?php

/**
 * controllers/Welcome.php
 * 
 * Welcome page for Gig Central
 *
 * @package ITC260
 * @subpackage Welcome
 * @author Kate Lee
 * @version 1.0 2015/05/14
 * @link
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see
 * @todo 
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	
	
	public function index()
	{
		$this->load->model('gig_model');
		$data['gigs'] = $this->gig_model->get_gigs();
		
		$this->load->view('welcome_page', $data);

		// $this->load->view('templates/header'); // Alex's path
        $this->load->view($this->config->item('theme') . 'header');

        //$this->load->view('templates/footer'); // Alex's path
        $this->load->view($this->config->item('theme') . 'footer');

	}
}