<?php
/**
 * controllers/About.php
 * 
 *
 * @package ITC260
 * @subpackage About
 * @author Ron Redmond
 * @version 1.0 2015/05/14
 * @link
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see view/pages/about.php
 * @todo 
 */

class About extends CI_Controller {
    
        public function index()
        {
                $this->load->view('pages/about');
        }
}