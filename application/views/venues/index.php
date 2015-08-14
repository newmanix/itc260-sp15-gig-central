<?php
/**
* index.php view page for generic Venue controller
*
* views/venues/index.php
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

<h2><?php echo $title ?></h2>

<?php foreach ($venues as $venue): ?>

        <h3><?php echo $venue['VenueName'] ?></h3>
        <div class="main">
                <?php echo $venue['VenueAddress'] ?>
        </div>
<p>
<?php
    echo anchor('venues/view/' . $venue['VenueKey'],'View Venue Details');
?>
</p>




<?php endforeach ?>

<a href="<?=base_url()?>venues/add"><button type="submit" class="btn btn-default">Add a New Venue</button></a>

<?php $this->load->view($this->config->item('theme').'footer'); ?>
