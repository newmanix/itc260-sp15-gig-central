<?php
/**
* Gig.php controller for Gigs at SCC
*
* @package ITC 260 Gig Central CodeIgnitor
* @subpackage Gig Controller
* @author Patricia Barker, Mitchell Thompson, Spencer Echon, Turner Tackitt 
* @version 2.3 2016/06/14
* @license http://www.apache.org/licenses/LICENSE-2.0
* @see Gig_model.php
* @see view/gigs/index.php
* @see view/gigs/view.php
* @see view/gigs/add.php
* @see view/gigs/success.php
* @todo none
*/


class Gig extends CI_Controller
{//begin controller
/**
 * Gig Class extends the CI_Controller class
 *
 * The constructor creates an instance of the Gig Class that loads Gig_model.php and sets
 * the banner. 
 *
 * A profile object can be created in this manner:
 *
 * <code>
 * $myGig = new Gig();
 * </code>
 *
 * The index() method of the gig object created will get all the data from Gig_model and load them into the view gigs/index
 *
 * The view($slug) method of the gig object created will get  the data of that slug from Gig_model and load them into the view gigs/view
 * 
 * The add() method of the gig object created will load a form , validate it and add gigs.
 * 
 * 
 * @see Gig_model
 * @return void
 * @todo none
 */
    public function __construct()
    {//begin constructor
        parent::__construct();
        $this->load->model('gig_model');
        $this->config->set_item('banner', 'Global News Banner');
        $this->config->set_item('nav-active', 'Gigs');//sets active class on all gig children
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
    }#end function view

    public function add()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'Add a new gig';

        $this->form_validation->set_rules('Name', 'Company Name', 'required');
        $this->form_validation->set_rules('State', 'Company State', 'required');
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
            
           $this->load->view('gigs/success', $data);

        }
    }#end function add()

    public function sendnewsletter()
    {
    	// XXX TODO FIXME add authentication to this so not just anybody can spam everybody with newsletters
    	
    	// Ensure that the request is a POST. POST signifies an intentional action, as opposed to passively requesting information.
        if( $this->input->method(/*capitalizeReturnValue=*/TRUE) === "POST" )
        {        
            // XXX TODO check for a "secret" post value to ensure that a GigCentral process authorized this. Random POST requests shouldn't trigger this            
            $this->load->library('email');
            $this->config->load('email');
            $this->load->helper('url');

            // XXX add config option for this
            $email = $this->config->item('autoemail_from_address'); $name = $this->config->item('autoemail_from_name');
            $subject = $this->config->item('autoemail_from_name');
            
            // time() will get a timestamp representing the current date/time. Used to filter the database for gigs posted today.
            $data['gigs'] = $this->gig_model->get_gigs( /*slug=*/FALSE, /*sinceDate=*/time()  );
            
            ob_start(); // Begin capture of view output for email
            $this->load->view('gigs/gignewsletter-email',$data);
            $message = ob_get_contents();
            ob_end_clean(); // discard the output buffer. it's contents are saved into $message, and we don't want to print it directly

            $this->load->model('profile_model');
            foreach( $this->profile_model->get_profiles(/*slug=*/FALSE, /*newsletterUsersOnly=*/TRUE) as $subscribedUser)
            {
                $this->email->from($email, $name);
                $this->email->to( $subscribedUser['email'] );
                $this->email->subject($subject);
                $this->email->set_mailtype("html");

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
    }#end function sendnewsletter()
}#end Gigs class/controller
