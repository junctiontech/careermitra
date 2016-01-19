	<!-- Form wizard with validation starts here -->
			
			<body style="background-color:#E8E8E8">
			
<div class="container" style="margin-top:100px; margin-bottom:200px; ">
			<h3 class="text-gray">
				Create your account <br />
				
			</h3>
			<br />
			
			
			
			<form role="form" id="rootwizard" class="form-wizard validate" method="post" enctype="multipart/form-data" action="<?=base_url();?>index.php/Mentorpg/insert">
			<input type="hidden" name="role_id"  value="mentor" />
				
				<ul class="tabs">
					<li class="active">
						<a href="#fwv-1" data-toggle="tab">
							Personal Info
							<span>1</span>
						</a>
					</li>
					<li>
						<a href="#fwv-2" data-toggle="tab">
							Professional info
							<span>2</span>
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
									
										<label class="control-label" style="margin-left:13px" for="full_name">Gender</label><br>
												
											
											<label>
												<input type="radio" style="margin-left:13px" name="Gender"class="cbrcbr-purple" value="Male">
												Male
											</label><br>
											
											<label>
												<input type="radio" style="margin-left:13px" name="Gender"class="cbrcbr-purple" value="Female">
												Female
											</label>
												
												
											
							</div></div>
						</div>
						
					</div>
					
					<div class="tab-pane with-bg" id="fwv-2">
						
						
						
						
						
						<div class="row">
							
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label" for="city">Qualification</label>
									<textarea class="form-control autogrow" name="Qualification" id="field-1" data-validate="required" placeholder="Education"></textarea>
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label" for="city">Current job</label>
									<input class="form-control" name="Current_job" id="field-1" data-validate="required" placeholder="Current Job" />
								</div>
							</div>
							
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label" for="Email">Email Address</label>
									<input class="form-control" name="Email" id="field-1" data-validate="required,email" placeholder="Email" />
								</div>
							</div>
							
							
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label" for="Contact no">Contact no</label>
									<input class="form-control" name="Contact_no" id="field-1" data-validate="number" placeholder="Number" />
								</div>
							</div>
						</div>
						
						<div class="row">
								<div class="form-group">
									<label class="control-label" for="More info">More info</label>
									<textarea class="form-control autogrow" name="More_info" id="field-1" data-validate="required" placeholder="Info"></textarea>
								</div>
				
						</div>
					</div>
					
					
					
					<div class="tab-pane with-bg" id="fwv-5">
									
						<div class="form-group">
							<label class="control-label">Choose Username</label>
							
							<div class="input-group">
								<div class="input-group-addon">
									<i class="linecons-user"></i>
								</div>
								
								<input type="text" class="form-control" name="usermailid" id="username" data-validate="required,minlength[5]" data-message-minlength="Username must have minimum of 5 chars." placeholder="Could also be your email" />
							</div>
						</div>
						
						<div class="row">
							
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Choose Password</label>
									
									<div class="input-group">
										<div class="input-group-addon">
											<i class="linecons-lock"></i>
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
											<i class="linecons-lock"></i>
										</div>
										
										<input type="password" class="form-control" name="Confirm_password" id="password" data-validate="required,equalTo[#password]" data-message-equal-to="Passwords doesn't match." placeholder="Confirm password" />
									</div>
								</div>
							</div>
							
						</div>
						
						
									
						<div class="form-group">
							<input type="checkbox" class="cbr" name="chk-rules" id="chk-rules" data-validate="required" data-message-message="You must accept rules in order to complete this registration.">
							<label for="chk-rules">By registering I accept terms and conditions.</label>
						</div>
						
						<div class="form-group">
							<button type="submit" style="background-color:#8079C9"class="btn btn-primary">Finish Registration</button>
						</div>
						
					</div>
					
					
					
			</form>
			
	</div>	</div></body>