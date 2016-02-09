<!---------------------------------------------Main Content------------------------------
-------------------------------------------------------------------------------------------->		
<div class="main-content">
		
	<div class="row">
		<div class="col-sm-12">
		
		
		 <?php  if($this->session->flashdata('message_type')=='success') { ?>
		  <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>
                <strong><?=$this->session->flashdata('message')?></strong>  </div>
		 <?php }?>
		
				
			<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Verify Mentor </h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
								
							</div>
						</div>
						
			<div class="breadcrumb-env">
					
								<ol class="breadcrumb bc-1">
									<li>
							<a href="javascript:;"><i class="fa-home"></i>Home</a>
						</li>
							<li class="active">
						
										<a href="<?=base_url();?>index.php/Loginpg/mentoractive"><strong>Manage Mentor</strong></a>
								</li>
							
								</ol>
								
			</div>
			
					<?php if(!empty($mentor)){?>	
				<div class="panel-body">
				
				<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						$("#example-1").dataTable({
							aLengthMenu: [
								[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]
							]
						});
					});
					</script>
						
				
                  <table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
					
                    
					<thead>
					<tr>
					<td>User id</td><td>Mentors Name</td><td>Status</td><td>Action</td>
					</tr>
					</thead>
			<?php foreach ($mentor as $profileshow){?>
				
                   
				   <tbody>
					<tr>
                    <td><?=isset ($profileshow->user_id) ?$profileshow->user_id:''?></td>
					
					
					<td><a href="<?=base_url();?>index.php/Loginpg/mentor_profile/<?=isset ($profileshow->user_id) ?$profileshow->user_id:''?>">
					<?=isset ($profileshow->First_name) ?$profileshow->First_name:''?>
					<?=isset ($profileshow->Last_name) ?$profileshow->Last_name:''?></a></td>
					
					<td><?=isset ($profileshow->Status) ?$profileshow->Status:''?></td>
					
					<?php if($profileshow->Status=='Inactive'){?>
					<td>
                      <div class="btn-group">
						<a class="btn btn-small btn-primary show-tooltip" title="Active" href="<?php echo base_url();?>index.php/Loginpg/mentor_activate/<?=isset ($profileshow->user_id) ?$profileshow->user_id:''?>"><i class="fa fa-foursquare"></i> Active</a>
					</div> 
					<?php }elseif($profileshow->Status=='Active'){?>
					
					<td>
                      <div class="btn-group">
						<a class="btn btn-small btn-success show-tooltip" title="Inactive" href="<?php echo base_url();?>index.php/Loginpg/mentor_deactivate/<?=isset ($profileshow->user_id) ?$profileshow->user_id:''?>"><i class="fa fa-foursquare"></i>Inactive</a>
					</div>
					<?php }?>

					
                      <div class="btn-group">
						<a class="btn btn-small btn-danger show-tooltip" title="Delete" href="<?php echo base_url();?>index.php/Loginpg/delete/<?=isset ($profileshow->user_id) ?$profileshow->user_id:''?>"><i class="fa fa-foursquare"></i>Delete</a>
					</div> 
					</td>
                     </tr>  
                   
					<?php }?>
                    
                    </tbody>
                  </table>
                  
                 <?php }?>
              
					
					
					
						
				<div class="row">
               <?php if(!empty($profile)){?>
			   
                <div class=" col-md-12 col-lg-12 "> 
                  <table class="table table-user-information">
                    <tbody>

			<?php foreach ($profile as $profileshow){?>
					
					<tr><td><h2><?=isset ($profileshow->First_name) ?$profileshow->First_name:''?>
					<?=isset ($profileshow->Last_name) ?$profileshow->Last_name:''?></h2></a></td></tr>
					
					<tr><td>
						<h4 style="color:#8079c9;margin-top:15px">Personal information</h4>
						<td></tr>
						
						<tr>
				<td><img src="<?=base_url();?>/uploaded_images/<?= isset ($profileshow->Image) ?$profileshow->Image:''?>"
												height="90px" width="90px"></td>
					</tr>
						
					<tr>
                    <td>User_id</td><td><?=isset ($profileshow->user_id) ?$profileshow->user_id:''?></td>
					</tr>
					
					
					
					<tr>
                        <td>Gender</td>
                        <td><?=isset ($profileshow->Gender) ?$profileshow->Gender:''?></td>
                     </tr>

                     
                     <tr>
                        <td>Contact no</td>
                        <td><?=isset ($profileshow->Contact_no) ?$profileshow->Contact_no:''?></td>
                     </tr>

					<tr>
                        <td>Email Address</td>
                        <td><?=isset ($profileshow->usermailid) ?$profileshow->usermailid:''?></td>
                     </tr>
                   

					<tr><td><h4 style="color:#8079c9; margin-top:15px"> Qualification</h4></td></tr>

					<tr>
					
                        <td>Education detail</td>
                        <td><?=isset ($profileshow->Qualification) ?$profileshow->Qualification:''?></td>
							
                     </tr>
                      <tr>
                        <td>Current job</td>
                        <td><?=isset ($profileshow->Current_job) ?$profileshow->Current_job:''?></td>
                      </tr>
                        <tr><td>More Detail</td>
                        <td><?=isset ($profileshow->More_info) ?$profileshow->More_info:''?></td>  
                      </tr>
					  <tr><td>
					  <?php if($profileshow->Status=='Inactive'){?>
                      <div class="btn-group">
						<a class="btn btn-small btn-primary show-tooltip" title="Active" href="<?php echo base_url();?>index.php/Loginpg/mentor_activate/<?=isset ($profileshow->user_id) ?$profileshow->user_id:''?>"><i class="fa fa-foursquare"></i> Active</a>
					</div> 
						<?php }elseif($profileshow->Status=='Active'){?>
						
						<div class="btn-group">
						<a class="btn btn-small btn-success show-tooltip" title="Inactive" href="<?php echo base_url();?>index.php/Loginpg/mentor_deactivate/<?=isset ($profileshow->user_id) ?$profileshow->user_id:''?>"><i class="fa fa-foursquare"></i> Inactive</a>
					</div> 
					<?php }?>
					
                      <div class="btn-group">
						<a class="btn btn-small btn-danger show-tooltip" title="Delete" href="<?php echo base_url();?>index.php/Loginpg/delete/<?=isset ($profileshow->user_id) ?$profileshow->user_id:''?>"><i class="fa fa-foursquare"></i>Delete</a>
					</div> 
					</td>
						</tr>					
					
					
				<?php }?>
                    
                    </tbody>
                  </table>
                  
                 
                </div>
				<?php }?>
            </div>
				
			
			
		