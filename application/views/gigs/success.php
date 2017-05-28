<?php
/**
* success.php Success view page for generic Venue controller
*
* views/venues/success.php
*
* @package ITC 260 Gig Central CodeIgnitor
* @subpackage Gigs
* @author Mitchell Thompson
* @version 3.0 2016/05/24
* @license http://www.apache.org/licenses/LICENSE-2.0
* @see Venues_model.php
* @see Venues.php
* @todo none
*/

$this->load->view($this->config->item('theme').'header');

?>
<div class="container">
    <h1>Success!</h1>
    <p>You have successfully created a gig!</p>
    
    <p><?php echo anchor('gig/', 'Back to Gigs List'); ?></p>
    
</div>

<?php $this->load->view($this->config->item('theme').'footer'); ?>