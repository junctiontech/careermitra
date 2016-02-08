<div class="container" style="padding-top: 60px;">
 

<?php foreach ($student as $studentshow){?>
 <h1 class="page-header">Edit Profile</h1>

<form role="form" class="form-horizontal" method="post" enctype="multipart/form-data" action="<?=base_url();?>index.php/Loginpg/insert">
  <div class="row">

<input type="hidden" name="id" value="<?=isset ($studentshow->user_id) ?$studentshow->user_id:''?>" />
<input type="hidden" name="role_id" value="<?=isset ($studentshow->role_id) ?$studentshow->role_id:''?>" />
    <!-- left column -->
   
  <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">
	  
	  
	  <?php if(!empty($studentshow->Image)){?>
        <img src="<?=base_url();?>/uploaded_images/<?=isset($studentshow->Image) ?$studentshow->Image:''?>" class="avatar img-circle img-thumbnail" style="height:200px; width:200px" alt="user image">
	 <?php } else {?>
		 <img src="<?=base_url();?>/assets/images/user-2.png" style="height:200px; width:200px">
	<?php } ?>
		
		<h6>Upload a different photo...</h6>
        <input type="file" id="i_file" class="text-center center-block well well-sm" name="file">
		<h5>Image size must be under 25kb</h5>
      </div>
	  
	  
		
		<div class="col-md-4 col-sm-6 col-xs-12">

           <a class="btn" data-controls-modal="my-modal" value="Change password" type="button" style="margin-top:20px; margin-left:20px;background-color:#8079C9;">
            <span></span>
            <input class="btn btn-primary" value="Change role" type="button" style="margin-top:20px; margin-left:20px; background-color:#8079C9;">
			<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
			

    </div>
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
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
            <input class="btn btn-primary" id="i_submit" value="Save Changes" type="submit" style="background-color:#8079C9">
            <span></span>
           <!-- <input class="btn btn-default" value="Cancel" type="reset">-->
          </div>
        </div>
        
      
    </div>
  </div>
</form>
<?php }?>

</div>