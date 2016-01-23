<!--------------------------------------------Jumbotron-----------------------------------
------------------------------------------------------->


<div class="container">
	<div class="jumbotron" id="jumbo1"> 
	
				<h1>Exams</h1>
	</div>
  
</div>

<!-------------------search button-----------breadcrumb--------------button-------------
-------------------------------------------------------------------------------------------->
	<div class="container">
					<!--<div class="col-sm-3 col-md-3 pull-right">
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
					</div>-->


					<div class="breadcrumb-env">
					
								<ol class="breadcrumb bc-1" style="margin-left:20px" "margin-top:0px">
									<li><a href="<?=base_url();?>"><i class="fa-home"></i>Home</a></li>
									<li class="active"><a href="<?=base_url();?>/../index.php/Exampg">Exams</a></li>
								</ol>
								
					</div>

<!------------------body----------------------------------------------------------------------
-------------------------------------------------------------------------------------------------->



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
							<i class="fa-star"style="color:#C979C2;margin-top:15px;margin-bottom:5px; font-size:15px"><?=isset ($notifyshow->Description) ?$notifyshow->Description:''?></i></br>
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
						<?php 
					
							foreach($intro as $introshow) {?>
							<p style="color:grey"><?=isset ($introshow->Description) ?$introshow->Description:''?></p>
							<?php }?>
					
				
				</div>
	</div>
<?php }?>	

<?php if(!empty($exam)){ ?>
<div class="panel panel-color panel-purple" style="margin-top:30px">
				<div class="panel-heading">
						EXAMS
				</div>
				
			<div class="panel-body">
						
								<?php foreach($exam as $data){ ?>
																
									<div class="col-md-4" >
									
										<label class ="control-label "><?=isset($data->description)?$data->description:''?></label>
										
											<?php  $get_examdetails=$this->Exampg_model->get_examdetails(isset($data->type_id)?$data->type_id:'');
													
												if(!empty($get_examdetails))
												{ 
													foreach($get_examdetails as $get_examdetailed){ ?>
																			
														<li><a href="<?=base_url();?>index.php/Exampg/index/Exam/<?=isset($get_examdetailed->exam_id)?$get_examdetailed->exam_id:''?>"> <?=isset($get_examdetailed->description)?$get_examdetailed->description:''?></a></li>
											
											<?php } }?>
										
									</div>
					
				<?php } }?>
			</div>
</div>			
				<?php if($action="Exam" && !empty($examdetail)){ ?>
				<div class="panel panel-color panel-purple" style="margin-top:30px">
				<div class="panel-heading">
						EXAMS
				</div>
				
			<div class="panel-body">
				
							<div class="col-md-4">
							
								<?php foreach($examdetail as $data){ ?>
								
									<li><a href="<?=base_url();?>index.php/Exampg/index/ExamSubtype/<?=isset($data->Examdetail_id)?$data->Examdetail_id:''?>"><?=isset($data->Exam_name)?$data->Exam_name:''?></a></li>
											
								<?php  } ?>
										
							</div>
					
				
			</div>
</div>
<?php } ?>
</div>
</div>
</div>				
<?php if($action="Examsubtype" && !empty($examsubdetail)){ ?>	
<div class="container">	
<div class="row">

	<div class="panel panel-color panel-purple" style="margin-top:30px">
	
				<div class="panel-heading">
				<?php foreach ($examsubdetail as $data){ ?>
					<?=isset($data->Exam_name)?$data->Exam_name:''?>
				<?php }?>
				</div>
				
			<div class="panel-body">	
				
				
					
						<div class="col-md-12">
					
					<ul class="nav nav-tabs nav-tabs-justified">
						<li class="active">
							<a href="#home-3" data-toggle="tab">
								<span class="visible-xs"><i class="fa-home"></i></span>
								<span class="hidden-xs">Description</span>
							</a>
						</li>
						<li>
							<a href="#profile-3" data-toggle="tab">
								<span class="visible-xs"><i class="fa-user"></i></span>
								<span class="hidden-xs">Syllabus</span>
							</a>
						</li>
						<li>
							<a href="#messages-3" data-toggle="tab">
								<span class="visible-xs"><i class="fa-envelope-o"></i></span>
								<span class="hidden-xs">Important date</span>
							</a>
						</li>
						<li>
							<a href="#settings-3" data-toggle="tab">
								<span class="visible-xs"><i class="fa-cog"></i></span>
								<span class="hidden-xs">Official link</span>
							</a>
						</li>
						<li>
							<a href="#inbox-3" data-toggle="tab">
								<span class="visible-xs"><i class="fa-bell-o"></i></span>
								<span class="hidden-xs">Previous paper</span>
							</a>
						</li>
					</ul>
					
					<div class="tab-content">
						<div class="tab-pane active" id="home-3">
							
							<div>
							<?php foreach ($examsubdetail as $data){ ?>
								
							
							<p><?=isset($data->Description)?$data->Description:''?></p>
							
									<?php  } ?>
					</div>
						</div>	
						
						<div class="tab-pane" id="profile-3">
						
							
							<?php foreach ($examsubdetail as $data){ ?>
							
							<p><?=isset($data->Syllabus)?$data->Syllabus:''?></p>
							<?php }?>							
						</div>
						
						<div class="tab-pane" id="settings-3">
							
						<?php foreach ($examsubdetail as $data){ ?>
						<?=isset($data->Official_link)?$data->Official_link:''?>
						<?php }?>
						</div>
						
						<div class="tab-pane" id="messages-3">
						<?php foreach ($examsubdetail as $data){ ?>
						<h4 style="color:#8079C9">Date_of_exam-</h4><?=isset($data->Date_of_exam)?$data->Date_of_exam:''?>	<br>
						<h4 style="color:#8079C9">Startdate_of_formsubmission</h4><?=isset($data->Startdate_of_formsubmission)?$data->Startdate_of_formsubmission:''?></br>
	
						<h4 style="color:#8079C9">Lastdate_of_formsubmission</h4><?=isset($data->Lastdate_of_formsubmission)?$data->Lastdate_of_formsubmission:''?>
						<?php }?>
						</div>
						
						<div class="tab-pane" id="inbox-3">
							<?php foreach ($examsub as $data){ ?>
							<li><a target="_blank" href="<?=base_url();?>index.php/Exampg/Quepaper/<?=isset($data->Subject_id) ?$data->Subject_id:''?>/<?=isset($data->Examdetail_id) ?$data->Examdetail_id:''?>">
							<?=isset($data->Subject)?$data->Subject:''?></li>
							
							<?php }?>
						</div>
										
					
					
				</div>
							
									
										
				</div>
				
				<?php } ?>
						
					
				
</div>
</div>
		
						
</div>
			
			
			
			
				
			
							
<!-----------Upcoming exam table-----------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------------------->
		
	<!--<div  class="col-md-8">
		<div class="page-title">
				
				<div class="title-env">
					<h4 class="title">UPCOMING EXAM</h4>
					
				</div>	
		</div>
			
			
			
			<!-- Table1 -->
		<!--<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">January</h3>
					
					<label style="float:right"> Search <input type="text" class="form-control input-sm" placeholder="Data to search"></label>
					
				</div>
				
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
								<th>Exam Name</th>
								<th>Exam Date</th>
								<th>State</th>
								<th>Qualification</th>
								<th>Official link</th>
								
							</tr>
						</thead>
					
					
					
						<tbody>
							<tr>
								<td>Tiger Nixon</td>
								<td>System Architect</td>
								<td>Edinburgh</td>
								<td>61</td>
								<td>2011/04/25</td>
								
							</tr>
							<tr>
								<td>Garrett Winters</td>
								<td>Accountant</td>
								<td>Tokyo</td>
								<td>63</td>
								<td>2011/07/25</td>
								
							</tr>
							<tr>
								<td>Ashton Cox</td>
								<td>Junior Technical Author</td>
								<td>San Francisco</td>
								<td>66</td>
								<td>2009/01/12</td>
								
							</tr>
							<tr>
								<td>Cedric Kelly</td>
								<td>Senior Javascript Developer</td>
								<td>Edinburgh</td>
								<td>22</td>
								<td>2012/03/29</td>
							
							</tr>
							
							
						</tbody>
					</table>
					
				</div>
			</div>
		
		
	
		<!-- Table2 -->
			<!--<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">February</h3>
					
					<label style="float:right"> Search <input type="text" class="form-control input-sm" placeholder="Data to search"></label>
					
				</div>
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
								<th>Exam Name</th>
								<th>Exam Date</th>
								<th>State</th>
								<th>Qualification</th>
								<th>Official link</th>
								
							</tr>
						</thead>
					
					
					
						<tbody>
							<tr>
								<td>Tiger Nixon</td>
								<td>System Architect</td>
								<td>Edinburgh</td>
								<td>61</td>
								<td>2011/04/25</td>
								
							</tr>
							<tr>
								<td>Garrett Winters</td>
								<td>Accountant</td>
								<td>Tokyo</td>
								<td>63</td>
								<td>2011/07/25</td>
								
							</tr>
							<tr>
								<td>Ashton Cox</td>
								<td>Junior Technical Author</td>
								<td>San Francisco</td>
								<td>66</td>
								<td>2009/01/12</td>
								
							</tr>
							<tr>
								<td>Cedric Kelly</td>
								<td>Senior Javascript Developer</td>
								<td>Edinburgh</td>
								<td>22</td>
								<td>2012/03/29</td>
							
							</tr>
							
							
						</tbody>
					</table>
					
				</div>
			</div>
		
		
		<!-- Table3 -->
			<!--<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">March</h3>
					
					<label style="float:right"> Search <input type="text" class="form-control input-sm" placeholder="Data to search"></label>
					
				</div>
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
								<th>Exam Name</th>
								<th>Exam Date</th>
								<th>State</th>
								<th>Qualification</th>
								<th>Official link</th>
								
							</tr>
						</thead>
					
					
					
						<tbody>
							<tr>
								<td>Tiger Nixon</td>
								<td>System Architect</td>
								<td>Edinburgh</td>
								<td>61</td>
								<td>2011/04/25</td>
								
							</tr>
							<tr>
								<td>Garrett Winters</td>
								<td>Accountant</td>
								<td>Tokyo</td>
								<td>63</td>
								<td>2011/07/25</td>
								
							</tr>
							<tr>
								<td>Ashton Cox</td>
								<td>Junior Technical Author</td>
								<td>San Francisco</td>
								<td>66</td>
								<td>2009/01/12</td>
								
							</tr>
							<tr>
								<td>Cedric Kelly</td>
								<td>Senior Javascript Developer</td>
								<td>Edinburgh</td>
								<td>22</td>
								<td>2012/03/29</td>
							
							</tr>
							
							
						</tbody>
					</table>
					
				</div>
			</div>
			
		<!-- Table4 -->
			
	</div>

</div>
</div>
			
			
			
			
	