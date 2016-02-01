

			<!-- Form wizard with validation starts here -->
			
			<body style="background-color:#E8E8E8">
			
<div class="container" style="margin-top:100px; margin-bottom:200px; ">

			<h3 class="text-gray">
				Create your account <br />
				
			</h3>
			<br />
			
			
			
			<form role="form" id="rootwizard" class="form-wizard validate" method="post" enctype="multipart/form-data" action="<?=base_url();?>index.php/Loginpg/insert1">
				<input type="hidden" name="role_id" value="student" />
				<input type="hidden" name="Status" value="Inactive" />
				<ul class="tabs">
					<li class="active">
						<a href="#fwv-1" data-toggle="tab">
							Personal Info
							<span>1</span>
						</a>
					</li>
					<li>
						<a href="#fwv-2" data-toggle="tab">
							Address
							<span>2</span>
						</a>
					</li>
					<li>
						<a href="#fwv-3" data-toggle="tab">
							Education
							<span>3</span>
						</a>
					</li>
					
					<li>
						<a href="#fwv-5" data-toggle="tab">
							Register
							<span>4</span>
						</a>
					</li>
				</ul>
				
				<div class="progress-indicator">
					<span></span>
				</div>
				
				<div class="tab-content no-margin">
					
					<!-- Tabs Content -->
					<div class="tab-pane with-bg active" id="fwv-1">
						
						<div class="row">
							
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label" for="full_name">First Name</label>
									<input class="form-control" name="First_name" id="full_name" data-validate="required" placeholder="Your first name" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label" for="full_name">Last Name</label>
									<input class="form-control" name="Last_name" id="full_name" data-validate="required" placeholder="Your last name" />
								</div>
							</div>
						</div>

						<div class="row">
						
							<div class="col-md-6">
						<label class="control-label" for="image" >Image</label>
						<input type="file" class="form-control" id="field-1"  name="file" ><?=isset($updatedata[0]->Image)?$updatedata[0]->Image:''?>
							
							</div>
						
						
						
						
						<div class="col-md-6">
								<div class="form-group">
									<label class="control-label" for="birthdate">Date of Birth</label>
								
								<div class="input-group">
								<input type="text"  class="form-control datepicker" name="DOB" data-validate="required" data-format="D, dd MM yyyy" value="<?=isset($updatedata[0]->Detail)?$updatedata[0]->Detail:''?>">
											<div class="input-group-addon">
												<a href="#"><i class="fa-calendar"></i></a>
											</div>
								</div>
								</div>
							
							
						</div>
						</div>
						<div class="row">
							<div class="col-md-6">
									<div class="form-group">
									
										<label class="control-label" style="margin-left:13px" for="full_name">Gender</label><br>
												
											
											<label>
												<input type="radio" style="margin-left:13px" name="Gender"class="cbrcbr-purple " value="Male">
												Male
											</label><br>
											
											<label>
												<input type="radio" style="margin-left:13px" name="Gender"class="cbrcbr-purple" Value="Female">
												Female
											</label>
									</div>
							</div>
									
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label" for="Contact no">Contact no</label>
									<div class="input-group">
									<input class="form-control" name="Contact_no" id="Contact_no" data-validate="required,number" placeholder="Phone number" />
									</div>
								</div>
							</div>				
											
						</div>
							
						</div>
						
					
					
					<div class="tab-pane with-bg" id="fwv-2">
						
						<div class="row">
							
							<div class="col-md-8">
								<div class="form-group">
									<label class="control-label" for="street">House no</label>
									<input class="form-control" name="House_no" id="street" placeholder="Enter your House no" />
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label" for="door_no"> Street</label>
									<input class="form-control" name="Street" id="door_no" />
								</div>
							</div>
							
						</div>
						
						<div class="row">
							
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label" for="address_line_2">Address Line 2</label>
									<input class="form-control" name="Line2" id="adress_line_2" placeholder="(Optional) Secondary Address" />
								</div>
							</div>
							
						</div>
						
						<div class="row">
							
							<div class="col-md-5">
								<div class="form-group">
									<label class="control-label" for="city">City</label>
									<input class="form-control" name="City" id="city" data-validate="required" placeholder="Current city" />
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label" for="State">State</label>
									
									<select name="State" class="selectboxit" data-validate="required">
										
									
									<Option value="">Select</option>
									<?php foreach($state as $stateshow){?>
									
									<Option value= "<?=isset($stateshow->State_name) ?$stateshow->State_name:''?>"<?php if(!empty($updatedata[0]->State_name))
									{ if($updatedata[0]->State_name==$stateshow->State_name)
									{  echo"selected"; }   }?>>
									<?=isset($stateshow->State_name)?$stateshow->State_name:''?></option> 
									<?php } ?>
									
									</select>
								</div>
							</div>
							
							<div class="col-md-3">
								<div class="form-group">
									<label class="control-label" for="zip">Zip</label>
									<input class="form-control" name="Zip" id="Zip" data-mask="** *** **" data-validate="required,number" placeholder="Zip Code" />
								</div>
							</div>
							
						</div>
						
					</div>
					
					<div class="tab-pane with-bg" id="fwv-3">
						
						<strong>Post graduation</strong>
						<br />
						<br />
			
						
						<div class="row">
							
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label" for="prim_subject">Subject</label>
									<input class="form-control" name="PG_subject" id="prim_subject"  placeholder="Post Graduation degree" />
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label" for="prim_school">University Name</label>
									<input class="form-control" name="PG_university" id="prim_school" placeholder="Which university did you attended" />
								</div>
							</div>
							
							
							
						</div>
						
						<br />
						
						<strong>Graduation</strong>
						<br />
						<br />
						
						<div class="row">
							
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label" for="second_subject">Subject</label>
									<input class="form-control" name="G_subject" id="second_subject" " placeholder="Graduation degree" />
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label" for="second_school">University Name</label>
									<input class="form-control" name="G_university" id="second_school" placeholder="Which university did you attended" />
								</div>
							</div>
							
						<br/>
							
						</div>
						<strong>School</strong>
						<br />
						<br />
						
						<div class="row">
							
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label" for="second_subject">Subject</label>
									<input class="form-control" name="School_subject" id="second_subject" " placeholder="Subject" />
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label" for="second_school">School Name</label>
									<input class="form-control" name="School_name" id="second_school" placeholder="Which school did you attended" />
								</div>
							</div>
							
						
							
						</div>
						
						<br />
						
						<div class="row">
							
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label" for="other_qualifications"><strong>Other Qualifications</strong></label>
									<textarea class="form-control autogrow" name="Other" id="other_qualifications" placeholder="List one subject per row"></textarea>
								</div>
							</div>
							
						</div>
						
					</div>
					
					
					<div class="tab-pane with-bg" id="fwv-5">
									
						<div class="form-group">
							<label class="control-label">Email Address</label>
							
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa-user"></i>
								</div>
								
							<span class="msg_box_1"></span>
								<input type="text" class="form-control " name="usermailid"  onblur="check_email('1')" id="reg-email" data-validate="required,email"  placeholder="Could also be your email" />
							</div>
						</div>
						
						<div class="row">
							
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Choose Password</label>
									
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa-lock"></i>
										</div>
										
										<input type="password" class="form-control" name="password" id="password" data-validate="required,minlength[5]" placeholder="Enter strong password" />
									</div>
								</div>
							</div>
							
							<div class="col-md-6">						
								<div class="form-group">
									<label class="control-label">Repeat Password</label>
									
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa-lock"></i>
										</div>
										
										<input type="password" class="form-control" name="Confirm_password" id="password" data-validate="required,equalTo[#password]" data-message-equal-to="Passwords doesn't match." placeholder="Confirm password" />
									</div>
								</div>
							</div>
							
						</div>
						
						
						<div class="form-group">
							<button type="submit" style="background-color:#8079C9" onclick="return confirm('Would you like to continue')" class="btn btn-primary">Finish Registration</button>
						</div>
						
					</div>
					
					
					
			</form>
			
	</div>	</div></body>