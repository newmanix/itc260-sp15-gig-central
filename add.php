<?php
/**
* add.php is the add gigs page for Gigs controller
*
* views/gigs/add.php
*
* @package ITC 260 Gig Central CodeInitor
* @subpackage Gig Controller
* @author Patricia Barker <pbarke01@seattlecentral.edu>
* @version 2.1 2015/06/11
* @link http://www.tcbcommercialproperties.com/sandbox/codeignitor/
* @license http://www.apache.org/licenses/LICENSE-2.0
* @see Gig_model.php
* @see Gig.php
* @todo none
*/
//error messages for form validation

?>

<?php $this->load->view($this->config->item('theme') . 'header'); ?>

<!--javascript liabraries for the datepicker function in date closed--> 
<script type="text/javascript" src="lib/moment.js"></script>

<script type="text/javascript" src="lib/bootstrap.js"></script>

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css">

 <script src ="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="container">
  <div class="col-lg-10">

        <form class="form-horizontal" role="form" method="post" action="add">
        <fieldset>
            
            <div class="form-group">
                <h1><strong>Add a Gig</strong></h1><br />
                <legend><h3><strong>Company Information</strong></h3></legend>

            </div>
            <div class="form-group">
                <label for="Name" class="col-lg-3 control-label"><em>Company Name</em></label>
                    <div class="col-md-6">
                        <?php echo form_error('Name'); ?>
                        <input type="text" class="form-control" id="Name" name="Name" placeholder="Company Name" value="<?php echo set_value('Name'); ?>">
                    </div>
            </div>
            <div class="form-group">
                <label for="CompanyAddress" class="col-lg-3 control-label"><em>Company Address</em></label>
                    <div class="col-md-6">
                        <?php echo form_error('CompanyAddress'); ?>
                        <input type="text" class="form-control" id="CompanyAddress" name="CompanyAddress" placeholder="Company Address" value="<?php echo set_value('CompanyAddress'); ?>">
                    </div>
            </div>
            <div class="form-group">
                <label for="CompanyCity" class="col-lg-3 control-label"><em>City</em></label>
                    <div class="col-md-6">
                        <?php echo form_error('CompanyCity'); ?>
                        <input type="text" class="form-control" id="CompanyCity" name="CompanyCity" placeholder="City" value="<?php echo set_value('CompanyCity'); ?>">
                    </div>
            </div>
            <div class="form-group">
                <label for="CompanyState" class="col-lg-3 control-label"><em>State</em></label>
                    <div class="col-md-6">
                        <?php echo form_error('CompanyState'); ?>
                        <input type="text" class="form-control" id="CompanyState" name="CompanyState" placeholder="State" value="<?php echo set_value('CompanyState'); ?>">
                    </div>
            </div>
            <div class="form-group">
                <label for="ZipCode" class="col-lg-3 control-label"><em>Zip Code</em></label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="ZipCode" name="ZipCode" placeholder="Zip Code" value="<?php echo set_value('ZipCode'); ?>">
                    </div>
            </div>
            <div class="form-group">
                <label for="CompanyPhone" class="col-lg-3 control-label"><em>Company Phone</em></label>
                    <div class="col-md-6">
                        <?php echo form_error('CompanyPhone'); ?>
                        <input type="text" class="form-control" id="CompanyPhone" name="CompanyPhone" placeholder="Phone Number" value="<?php echo set_value('CompanyPhone'); ?>">
                    </div>
            </div>
            <div class="form-group">
                <label for="CompanyWebsite" class="col-lg-3 control-label"><em>Company Website</em></label>
                    <div class="col-md-6">
                        <?php echo form_error('CompanyWebsite'); ?>
                        <input type="text" class="form-control" id="CompanyWebsite" name="CompanyWebsite" placeholder="Company Website" value="<?php echo set_value('CompanyWebsite'); ?>">
                    </div>
            </div>
            <br>
            <br>
                <fieldset>
                <legend><h3><strong>Company Gig Contact</strong></h3></legend>
            <div class="form-group">
                <label for="FirstName" class="col-lg-3 control-label"><em>First Name</em></label>
                    <div class="col-md-6">
                        <?php echo form_error('FirstName'); ?>
                        <input type="text" class="form-control" id="FirstName" name="FirstName" placeholder="First Name" value="<?php echo set_value('FirstName'); ?>">
                    </div>
            </div>
            <div class="form-group">
                <label for="LastName" class="col-lg-3 control-label"><em>Last Name</em></label>
                    <div class="col-md-6">
                        <?php echo form_error('LastName'); ?>
                        <input type="text" class="form-control" id="LastName" name="LastName" placeholder="Last Name" value="<?php echo set_value('LastName'); ?>">
                    </div>
            </div>
            <div class="form-group">
                <label for="Email" class="col-lg-3 control-label"><em>Email</em></label>
                    <div class="col-md-6">
                        <?php echo form_error('Email'); ?>
                        <input type="text" class="form-control" id="Email" name="Email" placeholder="Gig Contact Email" value="<?php echo set_value('Email'); ?>">
                    </div>
            </div>
            <div class="form-group">
                <label for="Phone" class="col-lg-3 control-label"><em>Phone</em></label>
                    <div class="col-md-6">
                        <?php echo form_error('Phone'); ?>
                        <input type="text" class="form-control" id="Phone" name="Phone" placeholder="Gig Contact Phone" value="<?php echo set_value('Phone'); ?>">
                    </div>
            </div>
            </fieldset>
            <fieldset>
            <div class="form-group">
                <label for="EmploymentType" class="col-lg-3 control-label"><em>Employment Type</em></label>
                    <div class="col-md-6">
                        <?php echo form_error('EmploymentType'); ?>
                        <select class="form-control" id="EmploymentType" name="EmploymentType">
                            <option value="0">Select One</option>
                            <option value="contract" <?php echo set_select('EmploymentType', 'contract'); ?>>Contract</option>
                            <option value="intern" <?php echo set_select('EmploymentType', 'intern'); ?>>Intern</option>
                            <option value="temporary" <?php echo set_select('EmploymentType', 'temporary'); ?>>Temporary</option>
                            <option value="permanent" <?php echo set_select('EmploymentType', 'permanent'); ?>>Permanent</option>
                        </select>
                    </div>
            </div>
                </fieldset>
                <fieldset>
            <div class="form-group">
                <label for="PayRate" class="col-lg-3 control-label"><em>Pay rate</em></label>
                    <div class="col-md-6">
                        <?php echo form_error('PayRate'); ?>
                        <input type="text" class="form-control" id="PayRate" name="PayRate" placeholder="Pay rate" value="<?php echo set_value('PayRate'); ?>">
                    </div>
            </div>
                </fieldset>
            <fieldset>
                <div class="form-group">
                     <label for="DateClosed" class="col-lg-3 control-label"><em>Date Closed</em></label>
                    <div class="col-md-6">
                <div class='input-group date' id='datepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                    </div>
               </div>
                 <script type="text/javascript">
            $(function () {
                $('#datepicker1').datepicker();
            });
        </script>
            </fieldset>
        <br>
        <br>
                 <fieldset>
                <legend><h3><strong>Gig Description</strong></h3></legend>
            <div class="form-group">
                <label for="GigOutline" class="col-lg-3 control-label hidden-label"><em>Gig Outline</em></label>
                    <div class="col-md-6">
                        <?php echo form_error('GigOutline'); ?>
                        <textarea class="form-control" rows="15" cols="25" id="GigOutline" name="GigOutline" placeholder="Project/Gig Description"><?php echo set_value('GigOutline'); ?></textarea>

                    </div>
            </div>
                </fieldset>
            <br>
            <br>
                <fieldset>
                <legend><h3><strong>Gig Qualifications</strong></h3></legend>
            <div class="form-group">
                <label for="GigQualify" class="col-lg-3 control-label hidden-label"><em>Qualifications</em></label><br>
                    <div class="col-md-6">
                        <?php echo form_error('GigQualify'); ?>
                        <textarea  rows="15" cols="25" class="form-control" id="GigQualify" name="GigQualify" placeholder="Qualifications"><?php echo set_value('GigQualify'); ?></textarea>
                    </div>
            </div>
                </fieldset>
        <br>
        <br>
                <fieldset>
                <legend><h3><strong>Gig Special Instructions</strong></h3></legend>
            <div class="form-group">
                <label for="SpInstructions" class="col-lg-3 control-label hidden-label"><em>Special Instructions</em></label><br>
                    <div class="col-md-6">
                        <?php echo form_error('SpInstructions'); ?>
                        <textarea rows="15" cols="25" class="form-control" id="SpInstructions" name="SpInstructions" placeholder="Special Instructions"><?php echo set_value('SpInstructions'); ?></textarea>
                    </div>
            </div>
                </fieldset>
        <br>
        <fieldset>
            <div class="col-xs-12 col-md-6 col-lg-9">
                <button type="submit" class="btn btn-default pull-right">Submit</button>
            </div>
        </fieldset>
        </form>
    </div>
</div>
<?php $this->load->view($this->config->item('theme') . 'footer'); ?>