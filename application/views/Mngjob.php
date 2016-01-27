

<!----------------------------------------------main content----------------------------------------------------------
--------------------------------------------------------------------------------------------------------------->
		
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
							<h3 class="panel-title">Job Option Form</h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
								
							</div>
						</div>
				<div class="panel-body">
							
							<form role="form" class="validate" method="post" action="<?=base_url();?>index.php/Jobpg/insert">
								
					<div class="form-group">
					<input type="hidden" name="id" value="<?=isset($updatedata[0]->Job_id)?$updatedata[0]->Job_id:''?>" />
						<h4 style="margin-left:10px; margin-top:15px">Job</h4>
							<label class="col-sm-3 control-label"style="margin-top:10px" for="field-1">Career Name</label>
									
								<div class="col-sm-9"style="margin-top:10px">
									<select class="form-control" data-validate="required" name="Career_id" onchange="Getexam(this.value);">
									<Option value="">Select</option>
									<?php foreach($career as $careershow){?>
									
									<Option value= "<?=isset($careershow->Career_id)?$careershow->Career_id:''?>"<?php if(!empty($updatedata[0]->Career_name))
									{ if($updatedata[0]->Career_name==$careershow->Career_name)
									{  echo"selected"; }   }?>>
									<?=isset($careershow->Career_name)?$careershow->Career_name:''?></option> 
									<?php } ?>
									
									</select>
								</div>
									
									
							<label class="col-sm-3 control-label"style="margin-top:10px" for="field-1">Company Name</label>
									
								<div class="col-sm-9" style="margin-top:10px">
									<input type="text" class="form-control" data-validate="required" name="Company_name" value="<?=isset($updatedata[0]->Company_name)?$updatedata[0]->Company_name:''?>"id="field-1" placeholder="Name">
								</div>
								
							
								
								
							<label class="col-sm-3 control-label" style="margin-top:10px" for="field-5">Job description</label>
									
								<div class="col-sm-9" style="margin-top:10px">
										<textarea class="form-control" data-validate="required" name="Description" cols="5" id="field-5"> <?=isset($updatedata[0]->Description)?$updatedata[0]->Description:''?> </textarea>
								</div>
								
									
							<label class="col-sm-3 control-label" style="margin-top:10px"for="field-1">Post Name</label>
									
								<div class="col-sm-9" style="margin-top:10px">
									<input type="text" class="form-control" data-validate="required" name="Post_name" value="<?=isset($updatedata[0]->Post_name)?$updatedata[0]->Post_name:''?>" id="field-1" placeholder="Name">
								</div>
								
		
							<label class="col-sm-3 control-label" style="margin-top:10px" for="field-1">No of Vacancy</label>
									
								<div class="col-sm-9"style="margin-top:10px" >
									<input type="number_format" class="form-control" data-validate="required" name="No_of_vacancy" value="<?=isset($updatedata[0]->No_of_vacancy)?$updatedata[0]->No_of_vacancy:''?>" id="field-1" placeholder="Available post">
								</div>
								
							<label class="col-sm-3 control-label" style="margin-top:10px" for="field-1">Pay Scale</label>
									
								<div class="col-sm-9"style="margin-top:10px" >
									<input type="number_format" class="form-control" name="Pay_scale" value="<?=isset($updatedata[0]->Pay_scale)?$updatedata[0]->Pay_scale:''?>" id="field-1" placeholder="salary in rupee">
								</div>
										
							<h4 style="margin-left:10px; margin-top:15px">Eligibility</h4>
								

								<label class="col-sm-3 control-label" style="margin-top:10px" for="field-5">Education Qualification</label>
								<div class="col-sm-9" style="margin-top:10px">
										<textarea class="form-control" cols="5" name="Qualification" id="field-5"> <?=isset($updatedata[0]->Qualification)?$updatedata[0]->Qualification:''?></textarea>
								</div>
								
							
								
							<label class="col-sm-3 control-label" style="margin-top:10px" for="field-1">Nationality</label>
									
								<div class="col-sm-9"style="margin-top:10px" >
									<input type="text" class="form-control" data-validate="required" name="Nationality"value="<?=isset($updatedata[0]->Nationality)?$updatedata[0]->Nationality:''?>" id="field-1" placeholder="Eligible country ">
								</div>
								
							<label class="col-sm-3 control-label" style="margin-top:10px" for="field-1">Age Limit</label>
									
								<div class="col-sm-9"style="margin-top:10px" >
									<input type="number_format" class="form-control" name="Age_limit" value="<?=isset($updatedata[0]->Age_limit)?$updatedata[0]->Age_limit:''?>"id="field-1" placeholder="Age">
								</div>
		
								
							<label class="col-sm-3 control-label" style="margin-top:10px" for="field-1">Job Location</label>
									
								<div class="col-sm-9" style="margin-top:10px" >
									<input type="text" class="form-control" name="Job_location" value="<?=isset($updatedata[0]->Job_location)?$updatedata[0]->Job_location:''?>" id="field-1" placeholder="Location">
								</div>
								
						<label class="col-sm-3 control-label" style="margin-top:10px" for="field-1">Selection Process</label>
								<div class="col-sm-9" style="margin-top:10px" >
								<Select class="form-control selectionprocess" name="Selection_process" >
								<Option value="">Select</Option>
								<option value="Exam" <?php if(!empty($updatedata[0]->Selection_process)){ if($updatedata[0]->Selection_process=="Exam"){  echo"selected"; }   }?>>Exam</option>
								<option value="Interview" <?php if(!empty($updatedata[0]->Selection_process)){ if($updatedata[0]->Selection_process=="Interview"){  echo"selected"; }   }?>>Interview</option>
								</select>
								</div>
					
				
					
					<div class="Exam" style="display:none">		
								
					</div>


					<div class="Interview" style="display:none">		
						<label class="col-sm-3 control-label" style="margin-top:10px" for="field-1">Interview Date</label>
									
							<div class="col-sm-9" style="margin-top:10px" >
								<div class="input-group">
									<input type="text" class="form-control datepicker" name="Detail1" data-format="D, dd MM yyyy" value="<?=isset($updatedata[0]->Detail)?$updatedata[0]->Detail:''?>">
											<div class="input-group-addon">
												<a href="#"><i class="linecons-calendar"></i></a>
											</div>
								</div>		
							</div>
					</div>
					
					
					<script>
								$('.selectionprocess').change(function(){
									
									var selectedval= $('.selectionprocess').val();
									if(selectedval=='Exam'){
										$(".Exam").css("display","block");
										$(".Interview").css("display","none");
									}
									if(selectedval=='Interview'){
										$(".Interview").css("display","block");
										$(".Exam").css("display","none");
									}
									
								});
								
								<?php if(!empty($updatedata[0]->Selection_process))
								{
									if($updatedata[0]->Selection_process=="Exam")
									{
								 ?>
										$(".Exam").css("display","block");
										$(".Interview").css("display","none");
								
								<?php  }elseif($updatedata[0]->Selection_process=="Interview"){ ?>
									
									$(".Interview").css("display","block");
										$(".Exam").css("display","none");
								
								<?php	}}?>
										
									
										
					</script>


					
						<label class="col-sm-3 control-label" style="margin-top:10px"for="field-1">Language Id</label>
									
								<div class="col-sm-9" style="margin-top:10px">
									<select class="form-control" data-validate="required" name="Language_id">
									<Option value="">Select</option>
									<?php foreach($lang as $langshow){?>
									
									<Option value= "<?=isset($langshow->Language_id)?$langshow->Language_id:''?>"<?php if(!empty($updatedata[0]->Language_id))
									{ if($updatedata[0]->Language_id==$langshow->Language_id)
									{  echo"selected"; }   }?>>
									<?=isset($langshow->Language_id)?$langshow->Language_id:''?></option> 
									<?php } ?>
									
									</select>
								</div>
							
								<div class="col-sm-12" >
								<input type="submit" class="btn btn-default" value="submit" style="background-color:#8079C9; float:right ;margin-top:10px"></input>
								</div>		
							
					</div>
				</div>
			</div>	
			
			<hr>
<!------------------------------------------------Editting table---------------------------------------------------
-------------------------------------------------------------------------------------------------------------->
	<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Job Option View</h3>
					
					<div class="panel-options">
						<a href="#" data-toggle="panel">
							<span class="collapse-icon">&ndash;</span>
							<span class="expand-icon">+</span>
						</a>
						<a href="#" data-toggle="remove">
							&times;
						</a>
					</div>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
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
						<thead style="white-space:nowrap;">
							<tr>
								<th>Career Name</th>
								<th>Company name</th>
								<th>Job Description</th>
								<th>Post name</th>
								<th>No of vacancy</th>
								<th>Pay Scale</th>
								<th>Education Qualification</th>
								<th>Nationality</th>
								<th>Age Limit</th>
								<th>Job Location</th>
								<th>Selection Process</th>
								<th>Detail</th>
								<th>Language id</th>
								<th>Action</th>
							</tr>
						</thead>
					
						<tfoot>
							<tr>
								<th>Career Name</th>
								<th>Company name</th>
								<th>Job Description</th>
								<th>Post name</th>
								<th>No of vacancy</th>
								<th>Pay Scale</th>
								<th>Education Qualification</th>
								<th>Nationality</th>
								<th>Age Limit</th>
								<th>Job Location</th>
								<th>Selection Process</th>
								<th>Detail</th>
								<th>Language id</th>
								<th>Action</th>
							</tr>
						</tfoot>
					
						<tbody>
							<?php foreach($job as $jobshow){?>
							<tr>
								<td><?=isset ($jobshow->Career_name) ?$jobshow->Career_name:''?></td>
								<td><?=isset ($jobshow->Company_name) ?$jobshow->Company_name:''?></td>
								<td><?=isset ($jobshow->Description) ?$jobshow->Description:''?></td>
								<td><?=isset ($jobshow->Post_name) ?$jobshow->Post_name:''?></td>
								<td><?=isset ($jobshow->No_of_vacancy) ?$jobshow->No_of_vacancy:''?></td>
								<td><?=isset ($jobshow->Pay_scale) ?$jobshow->Pay_scale:''?></td>
								<td><?=isset ($jobshow->Qualification) ?$jobshow->Qualification:''?></td>
								<td><?=isset ($jobshow->Nationality) ?$jobshow->Nationality:''?></td>
								<td><?=isset ($jobshow->Age_limit) ?$jobshow->Age_limit:''?></td>
								<td><?=isset ($jobshow->Job_location) ?$jobshow->Job_location:''?></td>
								<td><?=isset ($jobshow->Selection_process) ?$jobshow->Selection_process:''?></td>
								
								<td><?php if(!empty($jobshow->Detail) && !empty($jobshow->Selection_process)){ if($jobshow->Selection_process=="Exam"){
									$examname=$this->Jobpg_model->examname_data($jobshow->Detail);
									if(!empty($examname)){echo $examname[0]->Exam_name;}
									
										}
								else{echo $jobshow->Detail;}?></td>	
								<?php }?>
								<td><?=isset ($jobshow->Language_id) ?$jobshow->Language_id:''?></td>
								
								<td><a href="<?=base_url();?>index.php/Jobpg/delete/<?=isset ($jobshow->Job_id) ?$jobshow->Job_id:''?>">
								<i class= "fa-trash"></i></a>
								
								<a href="<?=base_url();?>index.php/Jobpg/Mngjbindex/<?=isset($jobshow->Job_id)?$jobshow->Job_id:''?>">
								<i class="fa-edit" style="margin-left:10px";></i></a></td>
							</tr>
						<?php }?>
							
						</tbody>
					</table>
					
				</div>
			</div>
	</div>
</div>
</div>	
