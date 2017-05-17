<?php
/**
* add.php is the add admins page for Admin controller
*
* views/admins/add.php
*
* @package itc-260-sp15-gig-central
* @subpackage Admin Controller
* @author Rattana Neak 
* @version 1.0 2016/05/22
* @link 
* @license http://www.apache.org/licenses/LICENSE-2.0
* @see Admin_model.php
* @see Admin.php
* @todo none
*/

?>


<?php $this->load->view($this->config->item('theme') . 'header'); ?>

<?php
if(isset($_POST['submit'])){
    
}else{
?>

<div class="container">
    <div class="row col-xs-12 col-md-8 lg-6 lg-offset-3">
        <form role="form" action="add" method="post">
            <div class="form-group">
                <label for="name">Admin name:</label>
                <input type="text" class="form-control" id="Name" name="Name">
            </div>
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="Email" name="Email">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="Pwd" name="Pwd">
            </div>
            <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
            </div>
            <button type="submit" class="btn btn-default" name="submit">Submit</button>
        </form>
    </div><!-- end row form -->
</div><!-- end .container -->

<?php } ?>

<?php $this->load->view($this->config->item('theme') . 'footer'); ?>
