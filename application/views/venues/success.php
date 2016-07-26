<?php
/**
* success.php Success view page for generic Venue controller
*
* views/venues/success.php
*
* @package ITC 260 Gig Central CodeIgnitor
* @subpackage Venues
* @author Anna Atiagina, Jenny Crimp
* @version 2.0 2015/08/11
* @license http://www.apache.org/licenses/LICENSE-2.0
* @see Venues_model.php
* @see Venues.php
* @todo none
*/

$this->load->view($this->config->item('theme').'header');
?>


<div class="container">
    <h1>Success!</h1>
    <p>You have successfully created a startup!</p>
    
    <p><?php echo anchor('venues/', 'Back to Venue List'); ?></p>
    
</div>

<?php $this->load->view($this->config->item('theme').'footer'); ?>
