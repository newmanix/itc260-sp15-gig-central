<?php
/**
* add.php view page for generic Venue controller
*
* views/venues/add.php
*
* @package ITC 260 Gig Central CodeIgnitor
* @subpackage Venues
* @author Anna Atiagina, Jenny Crimp
* @version 2.0 2015/08/11
* @license http://www.apache.org/licenses/LICENSE-2.0
* @see Venues_model.php
* @see Venues.php
* @todo none
*/

$this->load->view($this->config->item('theme').'header');
?>


<div class="container">
  <div class="col-lg-10">
    <h1>Add a Startup Venue</h1>

        <form class="form-horizontal" role="form" method="post">

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
                <label for="VenuePhone" class="col-lg-3 control-label"><em>Phone number</em></label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="VenuePhone" name="VenuePhone" placeholder="Venue Phone Number">
                    </div>
             </div>
            <div class="form-group">
                <label for="VenueWebsite" class="col-lg-3 control-label"><em>Website</em></label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="VenueWebsite" name="VenueWebsite" placeholder="Venue Website">
                    </div>
            </div>
            </fieldset>
            <br />

            <fieldset>
            <legend><h3><strong>Venue Amenities</strong></h3></legend>

           <div class="form-group">
            <label for="VenueHours" class="col-lg-3 control-label"><em>Hours</em></label><br>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="VenueHours" name="VenueHours" placeholder="Venue Hours">
                </div>
           </div>
           <!--<div class="form-group">
              <label for="VenueTypeKey" class="col-lg-3 control-label"><em>Venue Type</em></label>
                  <div class="col-md-6">
                      <select class="form-control" id="VenueTypeKey" name="VenueTypeKey">
                          <option value="1">Cafe/Coffee Shop</option>
                          <option value="2">Library</option>
                          <option value="3">School</option>
                          <option value="4">Community Center</option>
                          <option value="5">Other</option>
                      </select>
                  </div>
          </div>-->
           <div class="form-group">
              <label for="Food" class="col-lg-3 control-label"><em>Venue Amenities</em></label>
                  <div class="col-md-6">
                        Food:<br />   
                        <input type="radio" name="Food" value="Yes">Yes<br />
                        <input type="radio" name="Food" value="No">No<br />
                    
                        Bar:<br />
                        <input type="radio" name="Bar" value="Yes">Yes<br />
                        <input type="radio" name="Bar" value="No">No<br /> 
                          
                        Electrical Outlets: <br />
                        <input type="radio" name="Outlets" value="Yes">Yes<br />
                        <input type="radio" name="Outlets" value="No">No<br />
                    
                        WiFi: <br />
                        <input type="radio" name="WiFi" value="Yes">Yes<br />
                        <input type="radio" name="WiFi" value="No">No<br />
                        
                        Outdoor Seating: <br />
                        <input type="radio" name="Outdoor" value="Yes">Yes<br />
                        <input type="radio" name="Outdoor" value="No">No<br />
                        
                        Wheelchair Access: <br />
                        <input type="radio" name="Wheelchair" value="Yes">Yes<br />
                        <input type="radio" name="Wheelchair" value="No">No<br />
                      
                        Parking: <br />
                        <input type="radio" name="Parking" value="Yes">Yes<br />
                        <input type="radio" name="Parking" value="No">No<br />
                  </div>
          </div>
          
          </fieldset>
          <br />

          <fieldset>
          <button type="submit" class="btn btn-default">Submit</button>
          </fieldset>
        </form>
    </div>
</div>


<?php $this->load->view($this->config->item('theme').'footer'); ?>