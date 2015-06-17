<?php
/**
 * controllers/About.php
 * 
 *
 * @package ITC260
 * @subpackage About
 * @author
 * @version 1.0 2015/05/14
 * @link
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see
 * @todo 
 */

class About extends CI_Controller {
    
        public function index()
        {
                $this->load->view('pages/about');
        }
}