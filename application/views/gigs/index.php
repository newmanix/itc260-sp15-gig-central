<?php
/**
* index.php is the view page of all gigs for Gigs controller
*
* views/gigs/index.php
*
* @package ITC 260 Gig Central CodeIgnitor
* @subpackage Gig Controller
* @author Patricia Barker <pbarke01@seattlecentral.edu>
* @version 1.0 2015/05/25
* @link http://www.tcbcommercialproperties.com/sandbox/ci/
* @license http://www.apache.org/licenses/LICENSE-2.0
* @see Gig_model.php
* @see Gig.php
* @todo none
*/
?>

<?php $this->load->view($this->config->item('theme') . 'header'); ?>

<h1>Gigs List</h1>
<h2><strong>Gig Opportunity</strong></h2>

<?php foreach ($gigs as $gig): ?>
<h3><?php echo $gig['CompanyName'] ?></h3>
<p><?php echo $gig['City'] ?></p>
<p><?php echo $gig['GigOutline'] ?></p>
<p><?php echo anchor('gig/'.$gig['GigID'] , 'Read More');?></p>

<?php endforeach ?>

<?php $this->load->view($this->config->item('theme') . 'footer'); ?>
