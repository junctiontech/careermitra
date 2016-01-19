
<!--------------------------------------------Jumbotron-----------------------------------
------------------------------------------------------->


   <div class="container">
  <div class="jumbotron"> 
	
     <h1>Job Opening</h1>
  </div>
  
</div>

<!-------------------search button-----------
---------------------------------------------->
<div class="container">
	<!---<div class="col-sm-3 col-md-3 pull-right">
		<form class="search" >
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
					<div class="input-group-btn">
						<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
					</div>
			</div>
										
					<div class="input-group-btn">
						<a href="javascript" class="btn btn-default btn-md" type="button" style="background-color:#8079C9;color:white;
								margin-top:10px; margin-left:120px;" id="srch-term">Mentors advice</a>
					</div>
		</form>						
	</div>-->


	<div class="breadcrumb-env">
					
		<ol class="breadcrumb bc-1" style="margin-left:20px" "margin-top:0px">
			<li><a href="<?=base_url();?>"><i class="fa-home"></i>Home</a></li>
			<li class="active"><a href="<?=base_url();?>/../index.php/Jobpg">Job opening</a></li>
		</ol>
								
	</div>


<!-----------------------------body----------------
-------------------------------------------------------------->


	
<div class="row">
		<?php if(!empty($notify)){?>
	<div class="col-md-4">
		
					<!-- Default panel -->
			<div class="panel panel-color panel-purple" style="margin-top:30px">
				<div class="panel-heading">
					RECENT NOTIFICATION
				</div>
						
				<div class="panel-body">
				<marquee behavior="scroll" direction="up" onmouseover="this.stop();" onmouseout="this.start();">			
					<?php foreach($notify as $notifyshow) {?>
					<i class="fa-star"style="color:#C979C2;margin-top:15px;margin-bottom:5px; font-size:15px"> <?=isset ($notifyshow->Description) ?$notifyshow->Description:''?></i></br>
					<a href="<?=isset ($notifyshow->Link_url) ?$notifyshow->Link_url:''?>"><?=isset ($notifyshow->Link_url) ?$notifyshow->Link_url:''?></a>
					<?php }?>
					
				</marquee>	
				</div>
			</div>
				
	</div>
	<?php }?>					
		

	
<div class="col-md-8">
			<?php if(!empty($intro)){?>	
		<div class="panel panel-color panel-purple" style="margin-top:30px">
			<div class="panel-heading">
					INTRODUCTION
			</div>
			
			<div class="panel-body">
					
					<?php foreach($intro as $introshow) {?>
					<p style="color:grey"><?=isset ($introshow->Description) ?$introshow->Description:''?></p>
					<?php }?>
					
				
			</div>
		</div>	
			<?php }?>
		
<?php if(!empty($option)){?>
<div class="panel panel-color panel-grey" style="margin-top:30px">
					<div class="panel-heading">
					<i class ="fa-star">JOB OPENINGS</i>
					</div>				
			</div>
<?php }?>			
</div>

	
	
	
	<div class="col-md-4">
				<?php if(!empty($option)){?>
	
			
	<div class="panel panel-color panel-purple" style="margin-top:30px">
		<div class="panel-heading">
			JOB IN INDIA
		</div>	
				
		<div class="panel-body">
		
			<?php foreach($option as $optionshow) {?>
			<li><a href="<?=base_url();?>index.php/Jobpg/Index/Job/<?=isset ($optionshow->Career_id) ?$optionshow->Career_id:''?>"><?=isset ($optionshow->Career_name) ?$optionshow->Career_name:''?></a></li>
			<?php }?>
					
		</div>
				
				
	</div>
	</div>
			
				
	
	<!--<div class="col-md-4">
				
	<div class="panel panel-color panel-purple" style="margin-top:30px">
		<div class="panel-heading">
				JOB IN ABROAD
		</div>	
		<div class="panel-body">
				
			<?php foreach($option as $optionshow) {?>
			<li><a href="<?=base_url();?>index.php/Jobpg/Index/Job/<?=isset ($optionshow->Career_id) ?$optionshow->Career_id:''?>"><?=isset ($optionshow->Career_name) ?$optionshow->Career_name:''?></a></li>
			<?php }?>
					
		</div>
	</div>	
	
	</div>-->		
				<?php }?>
				
	</div>		
	
	
			
		
	
				
			<?php if( $action="Job" && !empty($job1)) {?>		
			<div class="panel panel-color panel-purple" style="margin-top:30px">
				<div class="panel-heading">
		<?php foreach($job2 as $job2show) {?>
		<?=isset ($job2show->Career_name) ?$job2show->Career_name:''?>
		<?php }?>
		</div>
		
				<div class="panel-body">
				
				<?php foreach($job1 as $job1show) {?>
				
				<li><a href="<?=base_url();?>index.php/Jobpg/Index/Data/<?=isset ($job1show->Job_id) ?$job1show->Job_id:''?>">
				<?=isset ($job1show->Company_name) ?$job1show->Company_name:''?></a></li>
				<?php }?>
					
				</div>
				</div>
				
		<?php }?>
					
					
	
			
	<div class="container">
		<div class="row">
						
			<?php if($action="Data" && !empty($detail1)){?>
		
		
		<div class="col-md-12">				
			<div class="panel panel-color panel-purple">
				
				<div class="panel-heading">
					<?php foreach ($detail1 as $detail1show){?>
						<H3><?=isset ($detail1show->Company_name) ?$detail1show->Company_name:''?></H3>
						<?php }?>
				</div>	
				
				<div class="panel-body">
					<div class "row" id="exam">
					
					
					<?php if(!empty($detail1)) {?>
						<?php foreach ($detail1 as $detail1show){?>
						<h4 style="color:#8079C9 ;margin-top:15px">Job Description</h4>
						<p style="color:grey"><?=isset ($detail1show->Description) ?$detail1show->Description:''?></p>
				
						<h4 style="color:#8079C9;margin-top:15px">Post Name</h4>
						<p style="color:grey"><?=isset ($detail1show->Post_name) ?$detail1show->Post_name:''?></p>
				
						<h4 style="color:#8079C9;margin-top:15px">No of vacancy</h4>
						<p style="color:grey"><?=isset ($detail1show->No_of_vacancy) ?$detail1show->No_of_vacancy:''?></p>
				
						<h4 style="color:#8079C9;margin-top:15px">Education Qualification</h4>
						<p style="color:grey"><?=isset ($detail1show->Qualification) ?$detail1show->Qualification:''?></p>
				
						<h4 style="color:#8079C9;margin-top:15px">Nationality</h4>
						<p style="color:grey"><?=isset ($detail1show->Nationality) ?$detail1show->Nationality:''?></p>
				
						<h4 style="color:#8079C9;margin-top:15px">Age limit</h4>
						<p style="color:grey"><?=isset ($detail1show->Age_limit) ?$detail1show->Age_limit:''?></p>
						
						<h4 style="color:#8079C9;margin-top:15px">Job location</h4>
						<p style="color:grey"><?=isset ($detail1show->Job_location) ?$detail1show->Job_location:''?></p>
						
						<h4 style="color:#8079C9;margin-top:15px">Selection process</h4>
						<p style="color:grey"><?=isset ($detail1show->Selection_process) ?$detail1show->Selection_process:''?></p>
						
						<h4 style="color:#8079C9;margin-top:15px">Detail</h4>
						<p style="color:grey"><?=isset ($detail1show->Detail) ?$detail1show->Detail:''?></p>
						
						<?php }?>
						<?php }?>
					</div>
				</div>
			</div>	
		
				
		</div>
<?php }?>		
		</div>
		</div>	
		
		</div>
		
		
		
		