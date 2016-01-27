<!--------------------------------------------Jumbotron-----------------------------------
------------------------------------------------------->


<div class="container">
  <div class="jumbotron"> 
	
     <h1>About us</h1>
  </div>
  


<!-------------------search button-----------
---------------------------------------------->
<!--<div class="container">-->
	


	<div class="breadcrumb-env">
					
		<ol class="breadcrumb bc-1" style="margin-left:20px" "margin-top:0px">
			<li><a href="<?=base_url();?>"><i class="fa-home"></i>Home</a></li>
			<li class="active"><a href="<?=base_url();?>/../index.php/Aboutuspg">About us</a></li>
		</ol>
								
	</div>


<!-----------------------------body----------------
-------------------------------------------------------------->


	
<div class="row">
		<?php if(!empty($about)){?>
	<div class="col-sm-6 col-md-8">
		
					<!-- Default panel -->
			<div class="panel panel-color panel-purple" style="margin-top:30px">
				<div class="panel-heading">
					Career Mitra
				</div>
						
				<div class="panel-body">
							
					<?php foreach($about as $aboutshow) {?>
					<p> <?=isset ($aboutshow->Description) ?$aboutshow->Description:''?></p>
					
					<?php }?>
				</div>
			</div>
			<?php }?>		
	</div>
					
</div>		
</div>
	

	
			