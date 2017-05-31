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

<ul class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Gigs</a></li>
  <li class="active"><?php echo $gig['Name']; ?></li>
</ul>

    <div class="container list-group">
        <div class="list-group-item">
            <h2 class="list-group-item-heading">
                <?php echo $gig['Name']; ?>
            </h2>
            <ul class="list-group-item-text">
                <li>
                    <?php echo "<b>Company Address:</b> " . $gig['Address'] . ", " . $gig['CompanyCity']  . ", " .  $gig['State']; ?>
                </li>
                <li>
                    <b>Website: </b><a href="<?php echo $gig['Website']; ?>"><?php echo $gig['Website']; ?></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="list-group-item">
        <h2 class="list-group-item-heading">
            Contact
        </h2>
        <ul class="list-group-item-text">
            <li>
                <b>Contact Name: </b><?php echo $gig['FirstName'] . " " . $gig['LastName']; ?>
            </li>
            <li>
                <b>Email: </b><?php echo $gig['Email']; ?>
            </li>
            <li>
                <b>Phone: </b><?php echo $gig['Phone']; ?>
            </li>
        </ul>
    </div>
    <div class="list-group-item">    
        <h2 class="list-group-item-heading">
            Gig Details
        </h2>
            <ul class="list-group-item-text">
                <li>
                    <b>Employment Type: </b><?php echo $gig['EmploymentType']; ?>
                </li>
                <li>
                    <b>Gig information: </b><?php echo $gig['GigOutline']; ?>
                </li>
                <li>
                    <b>Special Instructions: </b><?php echo $gig['SpInstructions']; ?>
                </li>
                <li>
                    <b>Pay Rate: </b><?php echo $gig['PayRate']; ?>
                </li>
                <li>
                    <b>Date Posted: </b><?php echo date('Y-m-d H:i:s'); ?>
                </li>
                <li>
                <a class="btn btn-warning" href="<?php echo $gig['Website']; ?>">Apply</a>
                </li>
            </ul>
        </div>
    </div>


<?php $this->load->view($this->config->item('theme') . 'footer'); ?>
