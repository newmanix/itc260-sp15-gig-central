<?php
/**
* Gig.php controller for Gigs at SCC
*
* Used to show how to do CRUD in CodeIgnitor
*
* @package ITC 260 Gig Central CodeIgnitor
* @subpackage Gigs_form
* @author Patricia Barker <patriciabethbarker@gmail.com>
* @version 2.2 2015/06/12
* @link http://www.tcbcommercialproperties.com/sandbox/codeignitor/
* @license http://www.apache.org/licenses/LICENSE-2.0
* @see Gig_model.php
* @see view/gigs/add.php
* @see view/gigs/view.php
* @todo none
*/

/**
 * Gigs_form controller
 *
 *
 * @see Gig_model.php
 * @todo none
 */
class Gig extends CI_Controller
{//begin controller

   /**
  * Loads default data into object
  *
  *
  * @param none
  * @return void
  * @todo none
  */
    public function __construct()
    {//begin constructor
        parent::__construct();
        $this->load->model('gig_model');
        $this->config->set_item('banner', 'Global News Banner');
    }#end constructor

    public function index()
    {//begin function index
        $data['gigs'] = $this->gig_model->get_gigs();
        $data['title']= 'Gigs';
        
        $this->load->view($this->config->item('theme') . 'header');
        $this->load->view('gigs/index', $data);
        $this->load->view($this->config->item('theme') . 'footer');
    }#end function index

    public function view($slug = NULL)
    {//begin function index
        $data['gig'] = $this->gig_model->get_gigs($slug);
        if (empty($data['gig']))
        {
                show_404();
        }
        $data['title']= 'Gig';
        
        $this->load->view($this->config->item('theme') . 'header');
        $this->load->view('gigs/view', $data);
        $this->load->view($this->config->item('theme') . 'footer');
    }#end function index

    public function add()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'Add a new gig';

        $this->form_validation->set_rules('CompanyName', 'Company Name', 'required');
        $this->form_validation->set_rules('Email', 'Email', 'required');

        if ($this->form_validation->run() === FALSE)
        {//create form to add gigs
            $this->load->view($this->config->item('theme') . 'header');
            $this->load->view('gigs/add', $data); 
            $this->load->view($this->config->item('theme') . 'footer');
        }
        else
        {//this processes
            $data['gigs'] = $this->gig_model->get_gigs();
            $data['title']= 'Gigs';
            $this->gig_model->add_gig();
            
            $this->load->view($this->config->item('theme') . 'header');
            $this->load->view('gigs/index', $data);
            $this->load->view($this->config->item('theme') . 'footer');
        }
    }#end function addForm()






}#end Gigs class/controller
