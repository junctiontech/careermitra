<body>

<link href="<?=base_url();?>/../css/css/tooplate_style.css" rel="stylesheet">
 <div class="row">

 <?php  if($this->session->flashdata('category_success')) { ?>
		<div class="row-fluid">
			<div class="alert alert-success">
				<strong><?=$this->session->flashdata('message')?></strong>
			</div>
		</div>
  		<?php } ?>
		</div>
		
	<div class="row">
 <?php if($this->session->flashdata('category_error')){ ?>
		<div class="form-group">
		<div class="alert alert-danger">
		<strong><?php echo $this->session->flashdata('message');?> </strong>
		</div>
		</div>
		
	</div>
		<?php } ?>
		<?php foreach ($student as $studentshow){
 
			if(!empty($studentshow->Bgimg)){?>
 
					<div class="container" style="padding-top: 60px; background:url(<?=base_url();?>/uploaded_images/<?=isset ($studentshow->Bgimg) ?$studentshow->Bgimg:''?>); repeat-y; center;">

			<?php }else {?>
			
					<div class="container" style="padding-top: 60px; background:url(<?=base_url();?>/img/back.jpg?>); repeat-y; center;">

			<?php }?>
 

<form role="form" class="form-horizontal" method="post" enctype="multipart/form-data" action="<?=base_url();?>index.php/Loginpg/student_update">

  
			<div class="col-md-12 col-sm-12 col-xs-12">
				<a class="btn btn-primary btn-md"  style="margin-top:20px; margin-left:950px;background-color:#8079C9;" data-toggle="modal" data-target="#myModal">Change Password</a>
				<a class="btn btn-primary btn-md" href="<?=base_url();?>index.php/Loginpg/role_change/user_id" style="margin-top:20px; margin-left:950px; background-color:#8079C9;">Become Mentor</a>
			</div> 

	
			<div class="text-center">

				<?php if(!empty($studentshow->Image)){?>
				<img src="<?=base_url();?>/uploaded_images/<?=isset($studentshow->Image) ?$studentshow->Image:''?>" class="avatar img-circle img-thumbnail" style="height:200px; width:200px; margin-top:-100px;"  alt="user image">
				<?php } else {?>
				<img src="<?=base_url();?>/assets/images/user-2.png" style="height:200px; width:200px">
				<?php } ?>
		
				<h5 style="color:white">Upload a different photo...</h5>
				<input type="file" id="i_file" class="text-center center-block well well-sm" name="file">
				<h5 style="color:white">Image size must be under 25kb</h5>
		
		
			</div>
		
    
    <!-- edit form column -->

	

			<div id="tooplate_main_top"></div>
					<div id="tooplate_main" >
						<h1 class="page-header">Edit profile</h1>
							<div class="row">
								<input type="hidden" name="id" value="<?=isset ($studentshow->user_id) ?$studentshow->user_id:''?>" />
								<input type="hidden" name="role_id" value="<?=isset ($studentshow->role_id) ?$studentshow->role_id:''?>" />
								 <input type="hidden" name="Status" value="<?=isset ($studentshow->Status) ?$studentshow->Status:''?>" />  
								 <input type="hidden" name="Password" value="<?=isset ($studentshow->Password) ?$studentshow->Password:''?>" />  
								 <input type="hidden" name="file1" value="<?=isset ($studentshow->Bgimg) ?$studentshow->Bgimg:''?>" /> 


   
									<div class="col-md-8 col-sm-6 col-xs-12 personal-info" style="margin-left:140px ; margin-top:10px">
										<h3>Personal info</h3>
      
										   <div class="form-group">
											  <label class="col-lg-3 control-label">About myself</label>
													<div class="col-lg-8">
														<textarea class="form-control autogrow" name="Myself" ><?=isset ($studentshow->Myself) ?$studentshow->Myself:''?> </textarea>
													</div>
											</div>
	  
											<div class="form-group">
											  <label class="col-lg-3 control-label">First name:</label>
												<div class="col-lg-8">
													<input class="form-control" name="First_name" value="<?=isset ($studentshow->First_name) ?$studentshow->First_name:''?>" type="text">
												</div>
											</div>
											<div class="form-group">
											  <label class="col-lg-3 control-label">Last name:</label>
												<div class="col-lg-8">
													<input class="form-control" name="Last_name" value="<?=isset ($studentshow->Last_name) ?$studentshow->Last_name:''?>" type="text">
												</div>
											</div>


											<div class="form-group">
												<label class="col-lg-3 control-label">Gender</label>
													<div class="col-lg-8">
														<label>
															<input type="radio" <?php if(!empty($studentshow->Gender)){ if($studentshow->Gender=='Male'){ echo"checked";}}?> style="margin-left:13px" name="Gender"class="cbrcbr-purple " value="Male">
																Male
														</label><br>
																				
														<label>
															<input type="radio" <?php if(!empty($studentshow->Gender)){ if($studentshow->Gender=='Female'){ echo"checked";}}?> style="margin-left:13px" name="Gender"class="cbrcbr-purple" Value="Female">
																Female
														</label>
												
													</div>
										   </div>
											
											<div class="form-group">
												<label class="col-lg-3 control-label">Date of birth</label>
													<div class="col-lg-8">
														<div class="input-group">
															<input type="text"  class="form-control datepicker" name="DOB" data-validate="required" data-format="D, dd MM yyyy" value="<?=isset ($studentshow->DOB) ?$studentshow->DOB:''?> ">
																<div class="input-group-addon">
																	<a href="#"><i class="fa-calendar"></i></a>
																</div>
																	
														</div>
													</div>
											</div>
											
											<div class="form-group">
												<label class="col-lg-3 control-label">Contact no</label>
													<div class="col-lg-8">
														<input class="form-control" name="Contact_no" value="<?=isset ($studentshow->Contact_no) ?$studentshow->Contact_no:''?>" type="text">
													</div>
											</div>
											
		
	
											<h3>Address</h3>
          
       
											<div class="form-group">
												<label class="col-lg-3 control-label" >House no</label>
													<div class="col-lg-8">
														<input class="form-control" name="House_no" value="<?=isset ($studentshow->House_no) ?$studentshow->House_no:''?>" id="street" placeholder="Enter your House no" />
													</div>
											</div>
							
							
											<div class="form-group">
												<label class="col-lg-3 control-label">Street</label>
													<div class="col-lg-8">
														<input class="form-control" name="Street" value="<?=isset ($studentshow->street) ?$studentshow->street:''?>" />
													</div>
											</div>
										
										
											<div class="form-group">
												<label class="col-lg-3 control-label" for="address_line_2">Address Line 2</label>
													<div class="col-lg-8">
														<input class="form-control" name="Line2" id="line_2" value="<?=isset ($studentshow->Line2) ?$studentshow->Line2:''?>" placeholder="(Optional) Secondary Address" />
													</div>
											</div>
									
											<div class="form-group">
												<label class="col-lg-3 control-label" for="city">City</label>
													<div class="col-lg-8">
														<input class="form-control" name="City" id="city"  value="<?=isset ($studentshow->City) ?$studentshow->City:''?>"placeholder="Current city" />
													</div>
											</div>
							
							
											<div class="form-group">
												<label class="col-lg-3 control-label" for="State">State</label>
											<div class="col-lg-8">
												<select name="State" class="selectboxit" data-validate="required">
										
													<Option value="">Select</option>
													<?php foreach($state as $stateshow){?>
													<Option value= "<?=isset($stateshow->State_id) ?$stateshow->State_id:''?>"<?php if(!empty($studentshow->State))
													{ if($studentshow->State==$stateshow->State_id)
													{  echo"selected"; }   }?>>
													<?=isset($stateshow->State_name)?$stateshow->State_name:''?></option> 
													<?php } ?>
													
												</select>
											</div>
											</div>
						
											<div class="form-group">
												<label class="col-lg-3 control-label" for="zip">Zip</label>
											<div class="col-lg-8">
												<input class="form-control" name="Zip" id="Zip"  data-validate="number"  value="<?=isset ($studentshow->ZIP) ?$studentshow->ZIP:''?>"placeholder="Zip Code" />
											</div>
											</div>
								
								
								<h3><b>Education Detail</b></h3>
								<h3>Post graduation</h3>
							
							
											<div class="form-group">
												<label class="col-lg-3 control-label" for="prim_subject">Subject</label>
											<div class="col-lg-8">
												<input class="form-control" name="PG_subject" id="prim_subject" value="<?=isset ($studentshow->PG_subject) ?$studentshow->PG_subject:''?>" placeholder="Post Graduation degree" />
											</div>
											</div>
										
										
											<div class="form-group">
												<label class="col-lg-3 control-label" for="prim_school">University Name</label>
											<div class="col-lg-8">
												<input class="form-control" name="PG_university" id="prim_school" value="<?=isset ($studentshow->PG_university) ?$studentshow->PG_university:''?>"placeholder="Which university did you attended" />
											</div>
											</div>
										
									<h3>Graduation</h3>
									
										
											<div class="form-group">
												<label class="col-lg-3 control-label" for="second_subject">Subject</label>
											<div class="col-lg-8">
												<input class="form-control" name="G_subject" id="second_subject" value="<?=isset ($studentshow->G_subject) ?$studentshow->G_subject:''?>" placeholder="Graduation degree" />
											</div>
											</div>
										
											
											<div class="form-group">
												<label class="col-lg-3 control-label" for="second_school">University Name</label>
											<div class="col-lg-8">
												<input class="form-control" name="G_university" id="second_school" value="<?=isset ($studentshow->G_university) ?$studentshow->G_university:''?>" placeholder="Which university did you attended" />
												</div>
											</div>
										
								
										
									
											<H3>School</H3>
									
									
											<div class="form-group">
												<label class="col-lg-3 control-label" for="second_subject">Subject</label>
											<div class="col-lg-8">
												<input class="form-control" name="School_subject" id="second_subject" value="<?=isset ($studentshow->School_subject) ?$studentshow->School_subject:''?>"placeholder="Subject" />
											</div>
										</div>
										
										
											<div class="form-group">
												<label class="col-lg-3 control-label" for="second_school">School Name</label>
											<div class="col-lg-8">
												<input class="form-control" name="School_name" id="second_school" value="<?=isset ($studentshow->School_name) ?$studentshow->School_name:''?>"placeholder="Which school did you attended" />
											</div>
										</div>
										
											<div class="form-group">
												<label class="col-lg-3 control-label" for="other_qualifications">Other Qualifications</label>
											<div class="col-lg-8">
												<textarea class="form-control autogrow" name="Other" id="other_qualifications"  placeholder="List one subject per row"><?=isset ($studentshow->Other) ?$studentshow->Other:''?></textarea>
											</div>
											</div>
											
											
								
											<div class="form-group">
												<label class="col-lg-3 control-label">Email Address</label>
											<div class="col-md-8">
												<span class="msg_box_1"></span>
												<input type="text" class="form-control " name="usermailid"  onblur="check_email('1')" id="reg-email" data-validate="required,minlength[5],email" data-message-minlength="Username must have minimum of 5 chars."
												value="<?=isset ($studentshow->usermailid) ?$studentshow->usermailid:''?>" placeholder="Could also be your email" />
											</div>
											</div>
						
									<hr>	
								<h3 style="margin-top:25px">Customize Profile</h3>	
											<div class="form-group">
												<label class="col-lg-3 control-label">Background Image</label>
											<div class="col-md-8">
							
											<h5 style="color:white">Upload a different Background image...</h5>
											<input type="file"  class="text-center center-block well well-sm" name="file1" value="<?=isset ($studentshow->Bgimg) ?$studentshow->Bgimg:''?>" Placeholder="Changes background image" />
											</div>
											</div>
						
						
											<div class="form-group">
												<label class="col-lg-3 control-label">Background color</label>
											<div class="col-md-8">
											
												<input type="text" class="form-control" name="Color" 
												value="<?=isset ($studentshow->color) ?$studentshow->color:''?>" placeholder="Changes background color" />
											</div>
											</div>
						
		
											<div class="form-group">
												<label class="col-md-3 control-label"></label>
											<div class="col-md-8">
												<input class="btn btn-primary" id="i_submit2" value="Save Changes" type="submit" style="background-color:#8079C9">
												<span></span>
									   <!-- <input class="btn btn-default" value="Cancel" type="reset">-->
											</div>
											</div>
											</div>
											</div>
								  
</form>
 

<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Change Password</h4>
      </div>
	
	  <form role="form" class="form-wizard validate" method="post" form-label-left"  action="<?=base_url();?>index.php/Loginpg/chng_password">
      <div class="modal-body">
      
			
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Old Password</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                     <input type="password" class="form-control" name="old_password" id="old_password" data-validate="required,minlength[5]" placeholder="Old password" />
                    </div>
                  </div>
				  
				  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">New Password</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                     <input type="password" class="form-control" name="password" id="password" data-validate="required,minlength[5]" placeholder="Enter strong password" />
                    </div>
                  </div>
				  
				  
				  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Confirm Password</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                     <input type="password" class="form-control" name="confirm_password" id="Confirm_password" data-validate="required,equalTo[#password]" data-message-equal-to="Passwords doesn't match." placeholder="Confirm password" />
                    </div>
                  </div>
			
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
	  </form>	
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
 
 
 

 
<?php }?>

</div>	
 
</body>
</div>
 

   



