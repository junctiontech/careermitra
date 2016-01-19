<!--------------------------------------------Jumbotron-----------------------------------
------------------------------------------------------->


   <div class="container">
  <div class="jumbotron"> 
	
     <h1>Contact us</h1>
  </div>
  
</div>

<!-------------------search button-----------
---------------------------------------------->
<div class="container">
	


	<div class="breadcrumb-env">
					
		<ol class="breadcrumb bc-1" style="margin-left:20px" "margin-top:0px">
			<li><a href="<?=base_url();?>"><i class="fa-home"></i>Home</a></li>
			<li class="active"><a href="<?=base_url();?>/../index.php/Contactuspg">Contact us</a></li>
		</ol>
								
	</div>


<!-----------------------------body----------------
-------------------------------------------------------------->


	
<div class="row">
		<?php if(!empty($contact)){?>
	<div class="col-md-8">
		
					<!-- Default panel -->
			<div class="panel panel-color panel-purple" style="margin-top:30px">
				<div class="panel-heading">
					Contact info
				</div>
						
				<div class="panel-body">
							
					<?php foreach($contact as $contactshow) {?>
								<p style="color:#8079C9">Company Name</p><?=isset ($contactshow->Company_name) ?$contactshow->Company_name:''?></td>
								<p style="color:#8079C9">Company Address</p><?=isset ($contactshow->Company_address ) ?$contactshow->Company_address :''?></td>
								<p style="color:#8079C9">Phone Number</p><?=isset ($contactshow->Phone_no) ?$contactshow->Phone_no:''?></td>
								<p style="color:#8079C9">Email Address</p><?=isset ($contactshow->Email_address) ?$contactshow->Email_address:''?></td>
					
					<?php }?>
				</div>
			</div>
			<?php }?>		
	</div>
					
</div>		
</div>
	
