 <!--------------------------------------------Jumbotron-----------------------------------
------------------------------------------------------->

<?php foreach ($student as $studentshow){?>
 <Body style="background-color:#FFF0F5">
<div class="container">
<?php if(!empty($studentshow->Bgimg)){?>
  <div class="jumbo" style="background:url(<?=base_url();?>/uploaded_images/<?=isset ($studentshow->Bgimg) ?$studentshow->Bgimg:''?>);">
	
  <?php }else {?>
  <div class="jumbo" style=" background:url(<?=base_url();?>/img/back.jpg?>); repeat-y; center;">

 <?php }?>
     <div class="card-info"> 
				<h3 style="margin-top:50px;margin-left:70px;font-size:70px;color:white; font-family:French Script MT"><?=isset ($studentshow->First_name) ?$studentshow->First_name:''?>
					<?=isset ($studentshow->Last_name) ?$studentshow->Last_name:''?></h3>
					<h3 style="margin-top:-5px; margin-left:70px; font-size:55px;color:white; font-family:French Script MT"><?=isset ($studentshow->role_id) ?$studentshow->role_id:''?></h3>
				<h3 style="margin-top:-127px; margin-left:970px; font-size:55px;color:white; font-family:French Script MT"><?=isset ($studentshow->Gender) ?$studentshow->Gender:''?></h3>

        </div>
	<?php }?>
</div>
  


<!-------------------------------------------------------------------->



	<!--<div class="breadcrumb-env">
					
		<ol class="breadcrumb bc-1" style="margin-left:20px" "margin-top:0px">
			<li><a href="<?=base_url();?>"><i class="fa-home"></i>Home</a></li>
			<li class="active"><a href="<?=base_url();?>/../index.php/Loginpg/stpro">profile</a></li>
		</ol>
								
	</div>-->
	
	
	<!-----------------------------body------------profile view-------------------
-------------------------------------------------------------->


   <!-- <div class="card hovercard">
        
        <div class="card-background">
            <img class="card-bkimg" alt="" src="<?=base_url();?>img/16.jpg">
           
        </div>-->
		<div class="row">
	<div class=" col-md-8 col-lg-8">	
		<?php foreach ($student as $studentshow){?>
        <div class="useravatar">
		<?php if(!empty($studentshow->Image)){?>
            <img alt="user image" src="<?=base_url();?>/uploaded_images/<?=isset($studentshow->Image) ?$studentshow->Image:''?>" class="avatar img-thumbnail" 
			style="height:150px; width:150px ; margin-left:20px;margin-top:30px" alt="user image">
			  <?php } else {?>
			   <img src="<?=base_url();?>/assets/images/user-2.png" style="height:150px; width:150px ; margin-left:20px;margin-top:30px" alt="user image">
		<?php } ?>
        </div>
        
  
	
		<?php }?>
	
	
	<div class="panel panel-info1" style="margin-top:40px;margin-left:20px">
	<div class="panel-heading">
        <h3 class="panel-title" style="margin-top:10px">About myself</h3>
     </div>
		<div class="panel-body" >
              <div class="row">
			   <div class=" col-md-12 col-lg-12 "> 
			 
			   <p><?=isset ($studentshow->Myself) ?$studentshow->Myself:''?></p>
			   </div>
			   </div>
			   </div>
			   </div>
			   
<!--div class= "col-sm-8 col-md-8 col-lg-8" style="margin-top:-30px; margin-left:0px">-->
<div class="panel panel-info1" style="margin-top:0px;margin-left:20px">
	<div class="panel-heading">
        <h1 class="panel-title" style="margin-top:10px">Profile</h1>
     </div>
		<div class="panel-body" >
              <div class="row">
			   <div class=" col-md-12 col-lg-12 "> 
                  <table class="table table-user-information">
                    <tbody>

			<?php foreach ($student as $studentshow){?>
					<tr><td>
						<h4 style="color:#8079c9;margin-top:15px">Personal information</h4>
						<td></tr>
					

                      <tr>
                        <td>Date of Birth</td>
                        <td><?=isset ($studentshow->DOB) ?$studentshow->DOB:''?></td>
                      </tr>

                     <tr>
                        <td>Contact no</td>
                        <td><?=isset ($studentshow->Contact_no) ?$studentshow->Contact_no:''?></td>
                     </tr>

					<tr>
                        <td>Email Address</td>
                        <td><?=isset ($studentshow->usermailid) ?$studentshow->usermailid:''?></td>
                     </tr>
                   
					</tr>
					 
				
				<?php }?>
                    
                    </tbody>
                  </table>
                  
                 
                </div>
          </div>
		  </div>
    </div>       
    </div>
<div class="col-md-4 col-sm-3" id="profile" >
			
				
					<h3>Notification</h3>
					<ul>
						<li>
							<h4><a href="blog.html">This is just a place holder</a></h4>
							<span>by: Anna | Mar. 2, 2012</span>
							<p>
								This is just a place holder, so you can see what the site would look like.
							</p>
						</li>
						<li>
							<h4><a href="blog.html">This is just a place holder</a></h4>
							<span>by: Joan | Mar. 17, 2012</span>
							<p>
								This is just a place holder, so you can see what the site would look like.
							</p>
						</li>
						<li>
							<h4><a href="blog.html">This is just a place holder</a></h4>
							<span>by: Mark | Mar. 21, 2012</span>
							<p>
								This is just a place holder, so you can see what the site would look like.
							</p>
						</li>
					</ul>
				</div>
</div>				

<div class="row">
<div class=" col-md-8 col-lg-8">
<div class="panel panel-info1" style="margin-top:10px;margin-left:20px">
	<div class="panel-heading">
        <h1 class="panel-title" style="margin-top:10px">Address</h1>
     </div>
		<div class="panel-body">
              <div class="row">			
                <div class=" col-md-12 col-lg-12 " style="margin-top:20px"> 
                  <table class="table table-user-information">
                    <tbody>
					
					<?php foreach ($student as $studentshow){?>
					
                   
					<tr>
                        
                        <td>House no-<?=isset ($studentshow->House_no) ?$studentshow->House_no:''?></br></br>
						Street-<?=isset ($studentshow->street) ?$studentshow->street:''?></br></br>
						Line2-<?=isset ($studentshow->Line2) ?$studentshow->Line2:''?></br></br>
						City-<?=isset ($studentshow->City) ?$studentshow->City:''?></br></br>
						State-<?=isset ($studentshow->State) ?$studentshow->State:''?></br></br>
						Zip-     <?=isset ($studentshow->ZIP) ?$studentshow->ZIP:''?></td>
                     </tr>

					
				<?php }?>
                    
                    </tbody>
                  </table>
                  
                 
                </div>

		
		
		</div>
          
            </div></div>
			</div></div>
	
	
	
	
	<div class="row">
<div class=" col-md-8 col-lg-8">
<div class="panel panel-info1" style="margin-top:10px;margin-left:20px">
	<div class="panel-heading">
        <h1 class="panel-title" style="margin-top:10px">Education Qualification</h1>
     </div>
		<div class="panel-body">
              <div class="row">			
                <div class=" col-md-12 col-lg-12 " style="margin-top:20px"> 
                  <table class="table table-user-information">
                    <tbody>
					
					<?php foreach ($student as $studentshow){?>		
		

						<tr>
					
                        <td>Post graduation detail</td>
                        <td>Post Graduation subject-<?=isset ($studentshow->PG_subject) ?$studentshow->PG_subject:''?></br></br>
							Post Graduation university-<?=isset ($studentshow->PG_university) ?$studentshow->PG_university:''?></td>
                     </tr>
                      <tr>
                        <td>Graduation detail</td>
                        <td>Graduation subject-<?=isset ($studentshow->G_subject) ?$studentshow->G_subject:''?></br></br>
							Graduation university-<?=isset ($studentshow->G_university) ?$studentshow->G_university:''?></td>
                      </tr>
                        <td>School detail</td>
                        <td>School subject-<?=isset ($studentshow->School_subject) ?$studentshow->School_subject:''?></br></br>
							School name-<?=isset ($studentshow->School_name) ?$studentshow->School_name:''?></td>  
                      </tr>

					<tr>
						<td>More information</td>
						<td><?=isset ($studentshow->Other) ?$studentshow->Other:''?></td>
					</tr>
					
					<?php }?>
                    
                    </tbody>
                  </table>

                 <div class="panel-footer">
                        
                            <a href=<?=base_url();?>index.php/Loginpg/editprofile/<?=isset($studentshow->user_id) ?$studentshow->user_id:''?> data-original-title="Edit my profile" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                           <!-- <a data-original-title="Delete my account" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>-->
                        </span>
                    </div>
            
     </div> </div> </div> </div> </div> </div>
</div>	 
	
</BODY>


<!------------------------------------------------------------------------------------------------------->
