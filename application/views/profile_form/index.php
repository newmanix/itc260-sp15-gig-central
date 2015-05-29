<?php
/**
* index.php view page for generic profile_form controller
*
*
*view/profile_form/index.php
*
* @package LARGE_PIECE_OF_PROGRAM
* @subpackage Profile_form
* @author Evan Smyth <evsmyth@yahoo.com>
* @version 1.0 2015/05/21
* @link http://www.example.com/
* @license http://www.apache.org/licenses/LICENSE-2.0
* @see Profile_model.php
* @see Profile_form.php
* @todo none
*/

$this->load->view($this->config->item('theme') . 'header');
?>



<?php


echo '
<div class="container">
  <div class="col-lg-10">
  <form class="form-horizontal" role="form" method="post">


      <fieldset>
        <div class="form-group">
          <legend><h2><strong>Profile Form</strong></h2></legend>
        </div>

        <div class="form-group">
        <label for="User" class="col-lg-3 control-label">I am a</label>
          <div class="col-lg-6">
            <select class="form-control" id="User">
              <option value="select">Select One</option>
              <option value="student">Student</option>
              <option value="alumni">Alumni</option>
              <option value="staff">Staff</option>
            </select>
            </div>
          </div>

          <div class="form-group">
				    <label for="firstName" class="col-lg-3 control-label">First Name</label>
				    <div class="col-lg-6">
				      <input type="text" class="form-control" name="FirstName" id="FirstName" placeholder="First Name">
				    </div>
				  </div>

          <div class="form-group">
				    <label for="LastName" class="col-lg-3 control-label">Last Name</label>
				    <div class="col-lg-6">
				      <input type="text" class="form-control" name="LastName" id="LastName" placeholder="Last Name">
				    </div>
				  </div>

          <div class="form-group">
				    <label for="Email" class="col-lg-3 control-label">Email</label>
				    <div class="col-lg-6">
				      <input type="email" class="form-control" name="Email" id="Email" placeholder="Email">
				    </div>
				  </div>

          <div class="form-group">
            <label for="Languages" class="col-lg-3 control-label"><strong>Languages/Skills</strong></label>
            <div class="col-lg-6">
              <textarea id="Languages" name="Languages" cols="53" placeholder="List Languages/Skill comma seperated" rows="4"></textarea>
            </div>

          </div>


              <button type="submit" class="btn btn-default">Submit</button>


        </fieldset>
      </form>
    </div>
</div>';


$this->load->view($this->config->item('theme') . 'header');
?>
