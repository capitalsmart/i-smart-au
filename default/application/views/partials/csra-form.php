
<div id="status">

</div>
<div class="topbar">
    Contact Details
</div>
<form id="customer_form" method="post" autocomplete="off">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group" id="first_name-error">
                <label for="first_name">First Name</label>
                <div class="form-group icon">
                    <input place_error="mov_err" class="form-control" name="first_name" id="first_name" value=""
                           type="text"
                           placeholder="Enter First Name  "/>
                    <i class=""> <img src="<?php echo base_url('assets/images/icon-name.png'); ?>" alt="img"/>
                    </i>
                </div>
                <span class="validation">
<!--                            <i class="fa fa-times-circle"></i> Invalid Username-->
                </span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group" id="surname-error">
                <label for="surname">Surname</label>
                <div class="form-group icon">
                    <input place_error="mov_err" class="form-control" id="surname" name="surname" type="text"
                           placeholder="Enter Surname  "/>
                    <i class=""> <img src="<?php echo base_url('assets/images/icon-name.png'); ?>" alt="img"/>
                    </i>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group" id="email-error">
                <label for="email">Email</label>
                <div class="form-group icon">
                    <input place_error="mov_err" class="form-control" id="email" name="email" type="text"
                           placeholder="Enter Email Address * "/>
                    <i class=""> <img src="<?php echo base_url('assets/images/icon-email.png'); ?>" alt="img"/>
                    </i>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group" id="phone-error">
                <label for="phone">Phone</label>
                <div class="form-group icon">
                    <input place_error="mov_err" class="form-control" id="phone" name="phone" type="text"
                           placeholder="Enter Phone Number  "/>
                    <i class=""> <img src="<?php echo base_url('assets/images/icon-phone.png'); ?>" alt="img"/>
                    </i>
                </div>
            </div>
        </div>
   <!-- 
        <div class="col-md-12"> 
            <div class="form-group" id="order_number-error">
                <label for="order_number">Order Number</label>
                <div class="form-group icon">
                    <input place_error="mov_err" class="form-control" id="order_number" name="order_number"
                           type="text"
                           placeholder="Enter Order Number  "/>
                    <i class=""> <img src="<?php echo base_url('assets/images/icon-registeration.png'); ?>"
                                      alt="img"/>
                    </i>
                </div>
            </div>
        </div>
		-->
        <div class="col-md-12" style="padding-top: 15px">
            <div class="form-group" id="csra_site-error">
                <div class="form-group select-arrow icon">
                    <select class="form-control form-control-select" name="csra_site" id="csra_site" place_error="mov_err"
                            placeholder="Select your Site * ">
                        <option hidden value="">Select Your Site *</option>
                        <option value="Airport West">Airport West</option>
                        <option value="Blackburn">Blackburn</option>
                        <option value="Carrum Downs">Carrum Downs</option>
						<option value="Coburg">Coburg</option>
						<option value="Dandenong S.M.A.R.T.">Dandenong S.M.A.R.T.</option>
						<option value="Dandenong Plus">Dandenong Plus</option>
						<option value="East Bentleigh">East Bentleigh</option>
						<option value="Hallam">Hallam</option>
						<option value="Hoppers Crossing">Hoppers Crossing</option>
						<option value="Knoxfield">Knoxfield</option>
						<option value="Murrumbeena">Murrumbeena</option>
						<option value="Mulgrave">Mulgrave</option>
						<option value="Moorabbin">Moorabbin</option>
						<option value="Preston">Preston</option>
						<option value="Rowville">Rowville</option>
						<option value="Rowville Plus">Rowville Plus</option>
						<option value="Sunshine">Sunshine</option>
						<option value="Tullamarine">Tullamarine</option>
						<option value="Tullamarine Plus">Tullamarine Plus</option>
                    </select>
                    <i class=""> <img src="<?php echo base_url('assets/images/icon-site.png'); ?>" alt="img"/>
                    </i>
                </div>

            </div>
        </div>
    </div>
    <br/>
    <div class="topbar">
        Vehicle Details
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group" id="vehicle_registration-error">
                <label for="vehicle_registration">Vehicle Registration</label>
                <div class="form-group icon">
                    <input place_error="mov_err" class="form-control" id="vehicle_registration"
                           name="vehicle_registration" type="text"
                           placeholder="Enter Vehicle Registration * "/>
                    <i class=""> <img src="<?php echo base_url('assets/images/icon-registeration.png'); ?>"
                                      alt="img"/>
                    </i>
                </div>
            </div>
        </div>
       <!-- 
	   
	   <div class="col-md-6">
            <div class="form-group" id="car_make-error">
                <label for="car_make">Car Make</label>
                <div class="form-group icon">
                    <input place_error="mov_err" class="form-control" id="car_make" name="car_make" type="text"
                           placeholder="Enter Car Make * "/>
                    <i class=""> <img src="<?php echo base_url('assets/images/icon-make.png'); ?>" alt="img"/>
                    </i>
                </div>
                <div id="suggestions" class="suggestions-box hide"></div>
            </div>
        </div>  
		-->
       <!--
		<div class="col-md-6">
            <div class="form-group" id="car_model-error">
                <label for="car_model">Car Model</label>
                <div class="form-group icon">
                    <input place_error="mov_err" place_error="mov_err" class="form-control" id="car_model"
                           name="car_model" type="text"
                           placeholder="Enter Car Model * "/>
                    <i class=""> <img src="<?php echo base_url('assets/images/icon-model.png'); ?>" alt="img"/>
                    </i>
                </div>
                <div id="suggestions2" class="suggestions-box hide"></div>
            </div>
        </div>
		-->
		<!--
        <div class="col-md-6">
            <div class="form-group" id="car_year-error">
                <label for="car_year">Car Year</label>
                <div class="form-group icon">
                    <input place_error="mov_err" class="form-control" id="car_year" name="car_year" type="text"
                           placeholder="Enter Car Year "/>
                    <i class=""> <img src="<?php echo base_url('assets/images/icon-year.png'); ?>" alt="img"/>
                    </i>
                </div>
            </div>
        </div>
		-->
        <!--  <div class="col-md-6">
            <div class="form-group" id="car_type-error">
                <label for="car_type">Body Type</label>
                <div class="form-group icon">
                    <input place_error="mov_err" class="form-control" id="car_type"
                           name="car_type" type="text"
                           placeholder="Enter Body Type  "/>
                    <i class=""> <img src="<?php /* echo base_url('assets/images/icon-model.png'); */ ?>" alt="img"/>
                    </i>
                </div>
            </div>
        </div>-->
		<!--
        <div class="col-md-6">
            <div class="form-group" id="car_type-error">
                <label for="car_type">Body Type</label>
                <div class="form-group select-arrow icon">
                    <select class="form-control form-control-select" name="car_type" id="car_type" place_error="mov_err"
                            placeholder="Select your Site * ">
                        <option hidden value="">Select Body Type</option>
                        <option value="Sedan">Sedan </option>
                        <option value="Hatch">Hatch </option>
                        <option value="Coupe">Coupe </option>
                        <option value="Convertible">Convertible </option>
                        <option value="Ute">Ute </option>
                        <option value="Wagon">Wagon </option>
                        <option value="Van">Van </option>
                    </select>
                    <i class=""> <img src="<?php echo base_url('assets/images/icon-model.png'); ?>" alt="img"/>
                    </i>
                </div>

            </div>
			
        </div>-->
        <div class="col-md-6">
            <div class="form-group" id="vin_number-error">
                <label for="vin_number">VIN Number</label>
                <div class="form-group icon">
                    <input place_error="mov_err" place_error="mov_err" class="form-control" id="vin_number"
                           name="vin_number" type="text"
                           placeholder="Enter VIN Number  "/>
                    <i class=""> <img src="<?php echo base_url('assets/images/icon-model.png'); ?>" alt="img"/>
                    </i>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group" id="car_color-error">
                <label for="car_color">Color </label>
                <div class="form-group select-arrow icon">
                    <select class="form-control form-control-select" name="car_color" id="car_color" place_error="mov_err"
                            placeholder="Select your Site * ">
                        <option hidden value="">Select Car Color</option>
                        <option value="Aqua">Aqua </option>
                        <option value="Beige">Beige </option>
                        <option value="Black">Black </option>
                        <option value="Blue">Blue </option>
                        <option value="Brown">Brown </option>
                        <option value="Champagne">Champagne </option>
                        <option value="Gold">Gold </option>
                        <option value="Green">Green </option>
                        <option value="Grey">Grey </option>
                        <option value="Maroon">Maroon </option>
                        <option value="Orange">Orange </option>
                        <option value="Pink">Pink </option>
                        <option value="Purple">Purple </option>
                        <option value="Red">Red </option>
                        <option value="Silver">Silver </option>
                        <option value="White">White </option>
                        <option value="Yellow">Yellow </option>
                    </select>
                    <i class=""> <img src="<?php echo base_url('assets/images/icon-make.png'); ?>" alt="img"/>
                    </i>
                </div>

            </div>
        </div>

    </div>

    <br/>
   <!--
	<div class="topbar">
        Damage Capture
    </div>
    <div class="row">
        <div class="col-md-12">
           <div class="col-xs-12 well">
                <ul>
                    <li>Click on car part to zoom-in.</li>
                    <li>Click on the appropriate damage type button (dent, scratch, renew), then click on the
                        panel to let us know where the damage is.
                    </li>
                    <li>Click the damage type button again to deselect it, and click the orange car part to zoom
                        back out (only possible after deselecting damage type).
                    </li>
                    <li>If you make a mistake, you can delete the damage type by dragging and dropping it
                        on to the bin icon displayed in the top left corner.
                    </li>
                </ul>
            </div>
			<br>
			<center>
                <div id="car-app-tools"></div>
            </center>
            <br>
            <div id="car-app-container"></div>    
			
        </div>
    </div> 
	-->
    <br>

    <div class="topbar" id="photos-error">
       Add Photos of the damage <span class="hind small">(recommended 5-8)</span>
    </div>
    <div class="row">
        <div class="col-md-12">
		  <div class="col-xs-12 well">
                <ul>
                    <li>To get an accurate quote, we require clear photos of your vehicle</li>
                    <li>Pleae provide photos from each side and corner of your vehicle
                    </li>
                    <li>Add close up photos of the damaged areas.
                    </li>
                    <li>If you make a mistake, you can delete the photo and re-upload.
                    </li>
                </ul>
            </div>
			<br>
			<center>

            <div id="fine-uploader-gallery" class="form-group"></div>
            <div class="clearfix"></div>
            <div id="msg" class="error text-center"></div>
			</center>
        </div>
        
    </div>
    <br/>
    <div class="topbar">
        Further Details
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group" id="comments-error">
                <div class="form-group icon">
                    <textarea place_error="mov_err" class="form-control comments" id="comments" name="comments"
                              rows="5"
                              placeholder="Comments"></textarea>
                </div>
            </div>
        </div>
    </div>
    <canvas id="canvas-svg" width="1024" height="712" style="display:none;"></canvas>
    <input type="hidden" name="annotated-image" id="image-annottated">
    <br/>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group1">
                <input type="submit" id="form_submit" name="form_submit" value="Submit Details"
                       class="cbtn btn-1 btn-block"/>
            </div>
        </div>
    </div>
</form>
