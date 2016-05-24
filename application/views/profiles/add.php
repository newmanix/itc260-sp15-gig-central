<?php
/**
* index.php view page for generic profile_form controller
*
*
*view/profile_form/index.php
*
* @package MediumLARGE_PIECE_OF_PROGRAM
* @subpackage Profile_form
* @author Evan Smyth <evsmyth@yahoo.com>
* @version 1.0 2015/05/21
* @link http://www.example.com/
* @license http://www.apache.org/licenses/LICENSE-2.0
* @see Profile_form_model.php
* @see Profile_form.php
* @todo none
*/

$this->load->view($this->config->item('theme') . 'header'); //Loads Bootswatch theme and header
?>

<!--
/**
* Form that accepts data
*
*
* @param none
* @return void
* @todo none
*/
-->

<div class="container">

  <div class="col-lg-10">



    <form class="form-horizontal" role="form" method="post">

      <fieldset>


        <?php
        $attributes = array('class' => '', 'id' => '');
        echo form_open('Profile', $attributes);
        ?>

        <div class="form-group">
          <legend><h2><strong>Add a Profile</strong></h2></legend>
        </div>

        <div class="form-group">
          <label for="title" class="btn btn-default dropdown-toggle" >I am a <span class="required">*</span></label>
            <?php echo form_error('title'); ?>
            <?php $options = array(
              ''  => 'Please Select',
              'Student'    => 'Student',
              'Alumni'    => 'Alumni',
              'Staff'    => 'Staff'
            ); ?>
          <br /><?php echo form_dropdown('title', $options, set_value('title'))?>
        </div>

        <div class="form-group">
          <label for="first_name" class="col-lg-3 control-label">First Name <span class="required">*</span></label>
            <?php echo form_error('first_name'); ?>
          <div class="col-lg-6">
            <input id="first_name" class="form-control" type="text" name="first_name"  value="<?php echo set_value('first_name'); ?>">
          </div>
        </div>

        <div class="form-group">
          <label for="last_name" class="col-lg-3 control-label">Last Name <span class="required">*</span></label>
            <?php echo form_error('last_name'); ?>
          <div class="col-lg-6">
            <input id="last_name" class="form-control" type="text" name="last_name"  value="<?php echo set_value('last_name'); ?>">
          </div>
        </div>

        <div class="form-group">
          <label for="email" class="col-lg-3 control-label">Email <span class="required">*</span></label>
            <?php echo form_error('email'); ?>
          <div class="col-lg-6">
            <input id="email" class="form-control" type="text" name="email"  value="<?php echo set_value('email'); ?>">
          </div>
        </div>

        <div class="form-group">
          <label for="bio" class="col-lg-3 control-label">Bio<span class="required">*</span></label>
          <?php echo form_error('bio'); ?>

          <div class="col-lg-6">
            <?php echo form_textarea( array( 'name' => 'bio', 'rows' => '5', 'cols' => '80', 'value' => set_value('bio') ) )?>
          </div>
        </div>
        <br />

        <?php echo form_submit('loginSubmit', 'Login',"class='btn btn-danger'"); ?>

        <?php echo form_close(); ?>

      </fieldset>
    </form>
  </div>
</div>

<?php
$this->load->view($this->config->item('theme').'footer');
?>
