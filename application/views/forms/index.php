<?php
/**
 * view/forms/index.php
 *
 * view page for generic Customer controller
 *
 * Used to TEST GigCentral
 *
 * @package ITC260
 * @subpackage Startup_Form
 * @author
 * @version 1.0 2015/6/09
 * @link
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see controllers/Startup.php
 * @see models/Startup_model.php
 * @todo none
 */


$this->load->view($this->config->item('theme').'header');
//$this->load->library('passphraseclass');
//$this->passphraseclass->passphrase();

?>
<div class="container">
  <div class="col-lg-10">
    <h1>Startup Central Form</h1>

        <form class="form-horizontal" role="form" method="post">

            <fieldset>
            <div class="form-group">
                <label for="VenueTitle" class="col-lg-3 control-label"><em>Venue</em></label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="VenueTitle" name="VenueTitle" placeholder="Title">
                    </div>
            </div>
            </fieldset>
            <br />

            <fieldset>
            <div class="form-group">
                <label for="VenueName" class="col-lg-3 control-label"><em>Venue Name</em></label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="VenueName" name="VenueName" placeholder="Venue Name">
                    </div>
            </div>

            <div class="form-group">
                <label for="VenueAddress" class="col-lg-3 control-label"><em>Venue Address</em></label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="VenueAddress" name="VenueAddress" placeholder="Venue Address">
                    </div>
            </div>
            <div class="form-group">
                <label for="City" class="col-lg-3 control-label"><em>City</em></label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="City" name="City" placeholder="City">
                    </div>
            </div>
            <div class="form-group">
                <label for="State" class="col-lg-3 control-label"><em>State</em></label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="State" name="State" placeholder="State">
                    </div>
            </div>
            <div class="form-group">
                <label for="ZipCode" class="col-lg-3 control-label"><em>Zip Code</em></label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="ZipCode" name="ZipCode" placeholder="Zip Code">
                    </div>
            </div>
            <div class="form-group">
                <label for="VenuePhone" class="col-lg-3 control-label"><em>Venue Phone</em></label>
                    <div class="col-md-6">
                        <input type="text" id="VenuePhone" name="VenuePhone" placeholder="Venue Phone Number">
                    </div>
             </div>
            <div class="form-group">
                <label for="VenueWebsite" class="col-lg-3 control-label"><em>Venue Website</em></label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="VenueWebsite" name="VenueWebsite" placeholder="Venue Website">
                    </div>
            </div>
            </fieldset>
            <br />

            <fieldset>
            <legend><h3><strong>Venue Assets</strong></h3></legend>

           <div class="form-group">
            <label for="Hours" class="col-lg-3 control-label"><em>Hours</em></label><br>
                <div class="col-md-6">
                  <input type="text" id="hours" name="hours" placeholder="Hours">
                </div>
           </div>
           <div class="form-group">
              <label for="VenueType" class="col-lg-3 control-label"><em>Venue Type</em></label>
                  <div class="col-md-6">
                      <select class="form-control" id="VenueType" name="VenueType">
                          <option value="cafe">Cafe/Coffee Shop</option>
                          <option value="school">School</option>
                          <option value="library">Library</option>
                          <option value="communitycenter">Community Center</option>
                          <option value="other">Other</option>
                      </select>
                  </div>
          </div>
           <div class="form-group">
              <label for="VenueAmenities" class="col-lg-3 control-label"><em>Venue Amenities</em></label>
                  <div class="col-md-6">
                      <select class="form-control" id="VenueAmenities" name="VenueAmenities" multiple = "yes">
                          <option value="food">Food</option>
                          <option value="drink">Drink</option>
                          <option value="electrical">Electrical Outlets</option>
                          <option value="wifi">WiFi</option>
                          <option value="seating">Outdoor Seating</option>
                          <option value="wheelchair">Wheelchair Accessible</option>
                          <option value="parking">Parking</option>
                      </select>
                  </div>
          </div>
          <div class="form-group">
           <label for="Cost" class="col-lg-3 control-label"><em>Cost</em></label><br>
               <div class="col-md-6">
                 <input type="text" id="cost" name="cost" placeholder="Cost">
               </div>
          </div>
          </fieldset>
          <br />

          <fieldset>
          <div class="form-group">
           <label for="Comment" class="col-lg-3 control-label"><em>Comment</em></label><br>
               <div class="col-md-6">
                 <textarea name="comments" id="comments">Comment</textarea><br />
               </div>
          </div>
          <div class="form-group">
           <label for="Promos" class="col-lg-3 control-label"><em>Venue Promotions</em></label><br>
               <div class="col-md-6">
                 <textarea name="promos" id="comments"></textarea><br />
               </div>
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
          </fieldset>
        </form>
    </div>
</div>


<?php $this->load->view($this->config->item('theme').'footer'); ?>
