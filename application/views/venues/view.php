<?php
/**
* view.php view page for generic Venue controller
*
* views/venues/view.php
*
* @package ITC 260 Gig Central CodeIgnitor
* @subpackage Gig
* @author Anna Atiagina, Jenny Crimp
* @version 2.0 2015/08/11
* @license http://www.apache.org/licenses/LICENSE-2.0
* @see Venues_model.php
* @see Venues.php
* @todo none
*/


$this->load->view($this->config->item('theme').'header');
//$this->load->library('passphraseclass');
//$this->passphraseclass->passphrase();

?>

<div class="container">
    <h2><?php echo $venue['VenueName']; ?></h2>
    <p><b>Venue Type:</b><?php echo $venue['VenuetypeName']; ?></p>
    <p><b>Company Address:</b><?php echo $venue['VenueAddress']; ?></p>
    <p><b>City: </b><?php echo $venue['City']; ?></p>
    <p><b>State: </b><?php echo $venue['State']; ?></p>
    <p><b>Zip code: </b><?php echo $venue['ZipCode']; ?></p>
    <p><b>Website: </b><a href="<?php echo $venue['VenueWebsite']; ?>"><?php echo $venue['VenueWebsite']; ?></a></p>
    <p><b>Phone: </b><?php echo $venue['VenuePhone']; ?></p>
    <p><b>Hours: </b><?php echo $venue['VenueHours']; ?></p>
    <h3>Amenities</h3>
    <p><b>WiFi: </b><?php echo $venue['WiFi']; ?></p>
    <p><b>Electrical outlets: </b><?php echo $venue['Outlets']; ?></p>
    <p><b>Food: </b><?php echo $venue['Food']; ?></p>
    <p><b>Bar: </b><?php echo $venue['Bar']; ?></p>
    <p><b>Outdoor Seating: </b><?php echo $venue['Outdoor']; ?></p>
    <p><b>Wheelchair Access: </b><?php echo $venue['Wheelchair']; ?></p>
    <p><b>Parking: </b><?php echo $venue['Parking']; ?></p>
    <p><?php echo anchor('venues/', 'Back to Venue List'); ?></p>
</div>

<?php $this->load->view($this->config->item('theme').'footer'); ?>
