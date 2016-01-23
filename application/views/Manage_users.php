
<div class="main-content">
		
	<div class="row">
		<div class="col-sm-12">
			
			
			<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Add user </h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
								
							</div>
					</div>
				
				
						<!-- breadcrumbs starts -->
	<div class="breadcrumb-env">
		<ol class="breadcrumb bc-1">
			<li>
				<a href="javascript:;"><i class="fa-home"></i>Home</a>
			</li>
			<li><a href="<?=base_url();?>index.php/Managerole/user_role">
				<strong>Manage User</strong>
			</a></li>
			<li class="active">
				<strong>Add User</strong>
			</li>
		</ol>
	</div>
					
		<div class="panel-body">
			<!-- page title closed -->
			<!-- body container  starts -->
<div class="row">
	<?php  if($this->session->flashdata('category_error')) { ?>
		<div class="form-group">
			<div class="alert alert-danger">
				<strong><?=$this->session->flashdata('message')?></strong> 
			</div>
		</div>
	<?php }?>
	<?php  if($this->session->flashdata('message_type')) { ?>
		<div class="form-group">
			<div class="alert alert-danger">
				<strong><?=$this->session->flashdata('message')?></strong> 
			</div>
		</div>
	<?php }?>
	<?php  if($this->session->flashdata('category_success')) {  ?>
		<div class="form-group">
			<div class="alert alert-success">
				<a href="javascript:;" class="goto-register"><strong><?=$this->session->flashdata('message')?></strong></a>
			</div>
		</div>
	<?php }?> 
		
					<form role="form" class="form-horizontal" method="post" action="<?=base_url();?>index.php/Managerole/user_add">
						
						<div class="form-group">
							<label class="col-sm-2 control-label" for="user id">Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="First_name" id="space"  placeholder="Name of user" >
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label" for="email">Email</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="usermailid" id="email" placeholder="Email" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="email">Role</label>
							<div class="col-sm-10">
								<select name="role_id" class="selectboxit">
									<optgroup label="Role">
										<?php  foreach($role_list as $lists){ ?>
												<option value="<?=$lists->role_id?>" ><?=$lists->role_id; ?></option>
											<?php } ?>
									</optgroup>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="password">Password</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" name="password" id="password" placeholder="password" required >
							</div>
						</div>
						<div class="form-group-separator"></div>
						<div class="form-group">
							<button type="submit" class="btn btn-success" onclick="space_alert()" >Submit</button>
							<button type="reset" class="btn btn-white" onClick="window.history.back();">Cancel</button>
						</div>
					</form>
				
			
		</div>
		</div>
</div>
			<!-- body container ends starts -->
		</div><!-- main content div end -->
	</div><!-- page container div end -->
	</div>
	</div>
	</div>
	</div>