<?php
/**
* view.php is view page for an individual gig for Gigs controller
*
* views/gigs/view.php
* 
* @package ITC 260 Gig Central CodeIgnitor
* @subpackage Gig Controller
* @author Patricia Barker <pbarke01@seattlecentral.edu>
* @version 2.2 2015/06/11
* @link http://www.tcbcommercialproperties.com/sandbox/codeignitor/
* @license http://www.apache.org/licenses/LICENSE-2.0
* @see Gig_model.php
* @see Gig.php
* @todo none
*/
?>
<?php $this->load->view($this->config->item('theme') . 'header'); ?>

<div class="container">
    <h2><?php echo $gig['CompanyName']; ?></h2>
    <p><b>Company Address:</b><?php echo $gig['CompanyAddress']; ?></p>
    <p><b>City: </b><?php echo $gig['City']; ?></p>
    <p><b>State: </b><?php echo $gig['CompanyState']; ?></p>
    <p><b>Website: </b><?php echo $gig['CompanyWebsite']; ?></p>
    <p><b>Contact Name: </b><?php echo $gig['FirstName'] . " " . $gig['LastName']; ?></p>
    <p><b>Email: </b><?php echo $gig['Email']; ?></p>
    <p><b>Phone: </b><?php echo $gig['Phone']; ?></p>
    <p><b>Employment Type: </b><?php echo $gig['EmploymentType']; ?></p>
    <p><b>Gig information: </b><?php echo $gig['GigOutline']; ?></p>
    <p><b>Special Instructions: </b><?php echo $gig['SpInstructions']; ?></p>
    <p><b>Pay Rate: </b><?php echo $gig['PayRate']; ?></p>
    <p><b>Date Posted: </b><?php echo $gig['GigPosted']; ?></p>
    <p><b>Last Update: </b><?php echo $gig['LastUpdated']; ?></p>
</div>

<?php $this->load->view($this->config->item('theme') . 'footer'); ?>
