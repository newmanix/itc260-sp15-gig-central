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


    <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
      <fieldset>
        <?php
        $attributes = array('class' => '', 'id' => '');
        echo form_open('Profile', $attributes);
        ?>

        <div class="form-group">
          <legend><h2><strong>Add Profile</strong></h2></legend>
        </div>
        <div class="form-group">
            <label for="i_am_a" class="col-lg-3 control-label">
                    
            </label>
            <div class="col-lg-6">
                <img src="<?=base_url()?>img/picID.jpg" alt="Picture ID" id="pic_id">
            </div>
        </div>
        <div class="form-group">
            <label for="i_am_a" class="col-lg-3 control-label">
                    
            </label>
            
          <div class="col-lg-6">
            <input type="file" class="form-control"  name="userfile" id="userfile">
          </div>
        </div>
        
        <div class="form-group">
            <label for="i_am_a" class="col-lg-3 control-label">I am <span class="required">*</span></label>
            <?php echo form_error('i_am_a'); ?>
          <div class="col-lg-6">
            <select name="i_am_a" id="i_am_a" class="form-control">
              <option value="employee">Employee</option>
              <option value="employer">Employer</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="first_name" class="col-lg-3 control-label">First Name <span class="required">*</span></label>
            
          <div class="col-lg-6">
            <input id="first_name" class="form-control" type="text" name="first_name"  value="<?php echo set_value('first_name'); ?>">
          </div>
          <?php echo form_error('first_name'); ?>
        </div>

        <div class="form-group">
          <label for="last_name" class="col-lg-3 control-label">Last Name <span class="required">*</span></label>
            
          <div class="col-lg-6">
            <input id="last_name" class="form-control" type="text" name="last_name"  value="<?php echo set_value('last_name'); ?>">
          </div>
          <?php echo form_error('last_name'); ?>
        </div>

        <div class="form-group">
          <label for="email" class="col-lg-3 control-label">Email <span class="required">*</span></label>
            
          <div class="col-lg-6">
            <input id="email" class="form-control" type="text" name="email"  value="<?php echo set_value('email'); ?>">
          </div>
          <?php echo form_error('email'); ?>
        </div>
        <div class="form-group">
          <label for="password" class="col-lg-3 control-label">Password <span class="required">*</span></label>
            
          <div class="col-lg-6">
            <input id="password" class="form-control" type="password" name="password"  value="<?php echo set_value('password'); ?>">
          </div>
          <div class="col-lg-3">
          <?php echo form_error('password'); ?>
          </div>
        </div>
        
        <div class="form-group">
          <label for="re_password" class="col-lg-3 control-label">Retype Password <span class="required">*</span></label>
          <div class="col-lg-6">
            <input id="re_password" class="form-control" type="password" name="re_password">
          </div>
          <div class="col-lg-3">
          <?php echo form_error('re_password'); ?>
          </div>
        </div>
        
        <div class="form-group">
          <label for="languages" class="col-lg-3 control-label">Bio<span class="required">*</span></label>
          <div class="col-lg-3">
            <?php echo form_textarea( array( 'name' => 'bio', 'rows' => '5', 'cols' => '53', 'value' => set_value('bio') ) )?>
          </div>
          <?php echo form_error('bio'); ?>
        </div>
        
        <div class="form-group">
          <label for="subscribed_to_newsletters" class="col-lg-3 control-label">Subscribe to Newsletter?</label>           
          <div class="col-lg-6">
            <input id="subscribed_to_newsletters" class="form-control" type="checkbox" name="subscribed_to_newsletters" value="1" checked>
          </div>
        </div>
        
        <div class="form-group text-right">
            <div class="col-lg-3">
            </div>
            <div class="col-lg-6">
            <?php echo form_submit('Submit', 'Add',"class='btn btn-success'"); ?>
            </div>
        </div>
        <?php echo form_close(); ?>

      </fieldset>
    </form>
  </div>
</div>

<?php
$this->load->view($this->config->item('theme').'footer');
?>
