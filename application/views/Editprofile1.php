<body>

<link href="<?=base_url();?>/../css/css/tooplate_style.css" rel="stylesheet">
 <?php foreach ($student as $studentshow){
 
   if(!empty($studentshow->Bgimg)){?>
 
 <div class="container" style="padding-top: 60px; background:url(<?=base_url();?>/uploaded_images/<?=isset ($studentshow->Bgimg) ?$studentshow->Bgimg:''?>); repeat-y; center;">


  <?php }else {?>
  <div class="container" style="padding-top: 60px; background:url(<?=base_url();?>/img/back.jpg?>); repeat-y; center;">

 <?php }?>
 

<form role="form" class="form-horizontal" method="post" enctype="multipart/form-data" action="<?=base_url();?>index.php/Loginpg/mentor_update">

  
  <div class="col-md-12 col-sm-12 col-xs-12">

            <a class="btn btn-primary btn-md"  style="margin-top:20px; margin-left:950px;background-color:#8079C9;" data-toggle="modal" data-target="#myModal">Change Password</a>
            
            <a class="btn btn-primary btn-md"  style="margin-top:20px; margin-left:950px; background-color:#8079C9;" data-toggle="modal" data-target="#myModal1">Change role</a>
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

    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info" style="margin-left:140px ; margin-top:10px">
    <!--  <div class="alert alert-info alert-dismissable">
        <a class="panel-close close" data-dismiss="alert">×</a> 
        <i class="fa fa-coffee"></i>
        This is an <strong>.alert</strong>. Use this to show important messages to the user.
      </div>-->

	  
	  
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
          <label class="col-lg-3 control-label">Contact no</label>
          <div class="col-lg-8">
            <input class="form-control" name="Contact_no" value="<?=isset ($studentshow->Contact_no) ?$studentshow->Contact_no:''?>" type="text">
          </div>
        </div>
		
								<h3>Qualifications</h3>
								
								<div class="form-group">
									<label class="col-lg-3 control-label" for="other_qualifications">Education Detail </label>
									<div class="col-lg-8">
									<textarea class="form-control autogrow" name="Qualification" id="other_qualifications"  placeholder="List one subject per row"><?=isset ($studentshow->Qualification) ?$studentshow->Qualification:''?></textarea>
								</div>
								
								</div>


								<div class="form-group">
									<label class="col-lg-3 control-label" for="other_qualifications">Current job</label>
									<div class="col-lg-8">
									<textarea class="form-control autogrow" name="Current_job" id="Current_job"  placeholder="Current job"><?=isset ($studentshow->Current_job) ?$studentshow->Current_job:''?></textarea>
								</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label" for="other_qualifications">More information</label>
									<div class="col-lg-8">
									<textarea class="form-control autogrow" name="More_info" id="other_qualifications"  placeholder="List one subject per row"><?=isset ($studentshow->More_info) ?$studentshow->More_info:''?></textarea>
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
</form><div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Change Password</h4>
      </div>
      <div class="modal-body">
      
       <form class="form-horizontal form-label-left">
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Old Password</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" placeholder="Old password" class="form-control">
                    </div>
                  </div>
				  
				  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">New Password</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" placeholder="New password" class="form-control">
                    </div>
                  </div>
				  
				  
				  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Confirm Password</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" placeholder="Confirm  password" class="form-control">
                    </div>
                  </div>
			</form>	
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
 
 
 
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Change Role</h4>
      </div>
      <div class="modal-body">
      
       <form class="form-horizontal form-label-left">
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
		</form>	
     
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php }?>

</div>	
</body>



   



	