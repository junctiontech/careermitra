
<!-----------------------------body----------------
-------------------------------------------------------------->
<body style="background-color:#E8E8E8 ">
<div class="container">






	<div class="row">
	<div class="col-sm-8">
					<!---<h1 style="margin-top:100px; margin-left:395px; font-size:45px; color:#8079C9;text-shadow:5px 5px 10px #8079c9;">CareerMitra</h1>--->
					<!---<h3  style="margin-top:20px; margin-left:400px;" >A roadway  to success</h3>-->
					<div class="panel panel-default" style="margin-top:100px; margin-left:300px; margin-bottom:100px;">
					<?php  if($this->session->flashdata('message_type')=='success') { ?>
<div class="row">
<div class="alert alert-success">
<strong><?=$this->session->flashdata('message')?></strong> 
</div>
</div>
<?php }?>

	<?php  if($this->session->flashdata('message_type')=='error') { ?>
<div class="row">
<div class="alert alert-danger">
<strong><?=$this->session->flashdata('message')?></strong> 
</div>
</div>
<?php }?>
						<div class="panel-heading">
							<h3 class="panel-title" >Login Form</h3>
							
						</div>
					
						<div class="panel-body">
							
							<form role="form" method="post" action="<?=base_url();?>index.php/Loginpg/login_user">
								
								<div class="form-group">
									<label for="email-1">Email address:</label>
									<input type="text" name="usermailid" class="form-control" id="email-1" placeholder="Enter your email&hellip;">
								</div>
								
								<div class="form-group">
									<label for="password-1">Password:</label>
									<input type="password" name="password" class="form-control" id="password-1" placeholder="Enter your password">
								</div>
								
								<div class="form-group">
									<label>
										<input type="checkbox" class="cbr" checked>
										Remember me next time
									</label>
								</div>
								
								<div class="form-group">
									<button type="submit" style="background-color:#8079C9; border-color:#8079C9; color:white; border-radius:4px";class="btn btn-info btn-single">Sign in</button>
								<a href="<?=base_url();?>index.php/CareerMitra/register"><button type="button" style="background-color:#8079C9; border-color:#8079C9; color:white"; class="btn btn-info btn-single pull-right" >Register Now</button>
								</div>
								
							</form>
							
						</div>
					</div>
	</div>
	</div>
	</div>	
</body>	