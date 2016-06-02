<?php
/**
* Gig.php controller for Gigs at SCC
*
* @package ITC 260 Gig Central CodeIgnitor
* @subpackage Gig Controller
* @author Patricia Barker <patriciabethbarker@gmail.com>
* @version 2.2 2015/06/12
* @link http://www.tcbcommercialproperties.com/sandbox/codeignitor/
* @license http://www.apache.org/licenses/LICENSE-2.0
* @see Gig_model.php
* @see view/gigs/index.php
* @see view/gigs/view.php
* @see view/gigs/add.php
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
        
        $this->load->view('gigs/index', $data);
    }#end function index

    public function view($slug = NULL)
    {//begin function index
        $data['gig'] = $this->gig_model->get_gigs($slug);
        if (empty($data['gig']))
        {
                show_404();
        }
        $data['title']= 'Gig';
        
        $this->load->view('gigs/view', $data);
    }#end function index

    public function add()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'Add a new gig';

        $this->form_validation->set_rules('Name', 'Company Name', 'required');
        $this->form_validation->set_rules('Email', 'Email', 'required');

        if ($this->form_validation->run() === FALSE)
        {//create form to add gigs
            $this->load->view('gigs/add', $data); 
        }
        else
        {//this processes
            $data['gigs'] = $this->gig_model->get_gigs();
            $data['title']= 'Gigs';
            $this->gig_model->add_gig();
            
            $this->load->view('gigs/success');
//            $this->load->view('gigs/index', $data);
        }
    }#end function addForm()

    public function sendnewsletter()
    {
    	// XXX TODO FIXME add authentication to this so not just anybody can spam everybody with newsletters

        if( $this->input->method(/*capitalizeReturnValue=*/TRUE) === "POST" )
        {
            // this is an intentional request to mail out newsletter subscriptions; do so now.
            $this->load->library('email');
            $this->config->load('email');
            $this->load->helper('url');

            // XXX add config option for this
            $email = 'noreply@gigcentral.com'; $name = "GigCentral Newsletter";
            
            // XXX TODO create a message with the latest available gigs
            $subject = 'GigCentral Daily Newsletter';
            $message = 'Test Subscription Message';

            $this->load->model('profile_model');
            foreach( $this->profile_model->get_profiles(/*slug=*/FALSE, /*subscribedOnly=*/TRUE) as $subscribedUser)
            {
                $this->email->from($email, $name);
                $this->email->to(  $subscribedUser->email );
                $this->email->subject($subject);

                $this->email->message($message);

                if(! $this->email->send())
                {
                    // XXX TODO: Log failure-to-sends; too many failures in a row may mean the email is no longer valid
                }
            }

        }
        else
        {
            $this->output->set_status_header('405');
            $this->output->set_header("Allow: POST");
            echo "Sorry, we don't allow random GET requests to kick off subscription emails; perhaps try a POST?";
        }
    }
}#end Gigs class/controller
