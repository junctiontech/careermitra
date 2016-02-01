<div class="container" style="padding-top: 60px;">
<link href="<?=base_url();?>/../css/custom11.css" rel="stylesheet">
<link href="<?=base_url();?>/../css/css/tooplate_style.css" rel="stylesheet">
 <body>


 
 <?php foreach ($student as $studentshow){?>
	
<form role="form" class="form-horizontal" method="post" enctype="multipart/form-data" action="<?=base_url();?>index.php/Loginpg/insert1">

   
 
      <div class="text-center">

		
	  
		
	   <?php if(!empty($studentshow->Image)){?>
        <img src="<?=base_url();?>/uploaded_images/<?=isset($studentshow->Image) ?$studentshow->Image:''?>" class="avatar img-circle img-thumbnail" style="height:200px; width:200px; margin-top:10px;"  alt="user image">
         <?php } else {?>
		 <img src="<?=base_url();?>/assets/images/user-2.png" style="height:200px; width:200px">
		<?php } ?>
		
		<h5 style="color:white">Upload a different photo...</h5>
        <input type="file" class="text-center center-block well well-sm" name="file">
      </div>
		
	


    
    <!-- edit form column -->

	

<div id="tooplate_main_top"></div>
    <div id="tooplate_main" >

<h1 class="page-header">Edit profile</h1>

  <div class="row">

<input type="hidden" name="id" value="<?=isset ($studentshow->user_id) ?$studentshow->user_id:''?>" />
<input type="hidden" name="role_id" value="<?=isset ($studentshow->role_id) ?$studentshow->role_id:''?>" />
   



    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info" style="margin-left:140px ; margin-top:10px">
    <!--  <div class="alert alert-info alert-dismissable">
        <a class="panel-close close" data-dismiss="alert">×</a> 
        <i class="fa fa-coffee"></i>
        This is an <strong>.alert</strong>. Use this to show important messages to the user.
      </div>-->
      <h3>Personal info</h3>
      
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
									<label class="col-lg-3 control-label" for="street">House no</label>
									<div class="col-lg-8">
									<input class="form-control" name="House_no" value="<?=isset ($studentshow->House_no) ?$studentshow->House_no:''?>" id="street" placeholder="Enter your House no" />
									</div>
								</div>
							
							
								<div class="form-group">
									<label class="col-lg-3 control-label" for="door_no">Street</label>
									<div class="col-lg-8">
									<input class="form-control" name="Street" id="door_no" value="<?=isset ($studentshow->street) ?$studentshow->street:''?>" />
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
								
								
								
								
								
								<h3>Education Detail</h3>
								
								
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
											
        <!--<div class="form-group">
        <label class="col-lg-3 control-label">Old Password</label>
		<div class="col-md-8">
		<input type="password" class="form-control" name="password" id="password" data-validate="minlength[5]" placeholder="Enter strong password" />
		</div>						 
        </div>
		
		 <div class="form-group">
        <label class="col-lg-3 control-label">New Password</label>
		<div class="col-md-8">
		<input type="password" class="form-control" name="password" id="password" data-validate="minlength[5]" placeholder="Enter strong password" />
		</div>						 
        </div>
		
		<div class="form-group">
        <label class="col-lg-3 control-label">Confirm Password</label>
		<div class="col-md-8">
		<input type="password" class="form-control" name="password" id="password" data-validate="minlength[5]" placeholder="Enter strong password" />
		</div>						 
        </div>-->
		


<div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-primary" value="Save Changes" type="submit" style="background-color:#8079C9">
            <span></span>
            <input class="btn btn-default" value="Cancel" type="reset">
          </div>
        </div>
        
      
    </div>
  </div>
</form>
<?php }?>

</div>	
       
    </div> <!-- end of main -->
    <div id="tooplate_main_bottom"></div>
		

</body>



   



