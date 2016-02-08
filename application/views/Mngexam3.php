
	<!-------------------------------------main content-----------------
--------------------------------------------------------------------------------------------->	
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
							<h3 class="panel-title">Exam Detail</h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
								
							</div>
						</div>
				<div class="panel-body">
							
							<form role="form" class="validate" method="post" action="<?=base_url();?>index.php/Exampg/exinsert1">
								
					<div class="form-group">
					
							<label class="col-sm-4 control-label"style="margin-bottom:10px">Select Exam type</label>
									<div class="col-sm-8"style="margin-bottom:10px">
									<select class="form-control" data-validate="required" name="type_id">
											<option value="">Select</option>
											<?php foreach ($exam as $examshow) {?>
											
											<option value="<?=isset($examshow->type_id)?$examshow->type_id:''?>"<?php if(!empty($updatedata[0]->examtype))
											{ if($updatedata[0]->examtype==$examshow->examtype)
											{  echo"selected"; }   }?>>
											<?=isset($examshow->examtype)?$examshow->examtype:''?></option>
											
											<?php }?>
									</select>
									</div>
							<label class="col-sm-4 control-label">Select Exam </label>
									
									<div class="col-sm-8">
										<select class="form-control"  data-validate="required" name="exam_id">
											<option value="">Select</option>
											<?php foreach ($exam4 as $exam4show) {?>
											
											<option value="<?=isset($exam4show->exam_id)?$exam4show->exam_id:''?>"<?php if(!empty($updatedata[0]->examsubtype))
											{ if($updatedata[0]->examsubtype==$exam4show->examsubtype)
											{  echo"selected"; }   }?>>
											<?=isset($exam4show->examsubtype)?$exam4show->examsubtype:''?></option>
											
											<?php }?>
										</select>
									</div>
									
							<label class="col-sm-4 control-label"style="margin-top:10px" for="field-1">Exam Name </label>
									
									<div class="col-sm-8"style="margin-top:10px">
										<input type="text" class="form-control" data-validate="required" id="field-1" name="Exam_name" value="<?=isset($updatedata[0]->Exam_name)?$updatedata[0]->Exam_name:''?>" placeholder="Name">
									</div>
									
									
							<label class="col-sm-4 control-label" style="margin-top:10px">Career</label>
									<div class="col-sm-8"style="margin-top:10px">
									<select class="form-control" name="Career_id">
											<option value="">Select</option>
											<?php foreach($career as $careershow){?>
									
											<Option value= "<?=isset($careershow->Career_id)?$careershow->Career_id:''?>"<?php if(!empty($updatedata[0]->Career_name))
											{ if($updatedata[0]->Career_name==$careershow->Career_name)
											{  echo"selected"; }   }?>>
											<?=isset($careershow->Career_name)?$careershow->Career_name:''?></option> 
											<?php } ?>
											
									</select>
									</div>
									
							<label class="col-sm-4 control-label"style="margin-top:10px">Job</label>
									<div class="col-sm-8"style="margin-top:10px">
									<select class="form-control" name="Job_id">
											<option value="">Select</option>
											<?php foreach ($job as $jobshow) {?>
											<Option value= "<?=isset($jobshow->Job_id)?$jobshow->Job_id:''?>"<?php if(!empty($updatedata[0]->Company_name))
											{ if($updatedata[0]->Company_name==$jobshow->Company_name)
											{  echo"selected"; }   }?>>
											<?=isset($jobshow->Company_name) ?$jobshow->Company_name:''?></option> 
											<?php } ?>
											
									</select>
									</div>
									
							<label class="col-sm-4 control-label"style="margin-top:10px">Institute</label>
									
									<div class="col-sm-8"style="margin-top:10px">
									<select class="form-control" name="Institute_id">
									<Option value="">Select</option>
									<?php foreach($Inst as $Instshow){?>
									
									<Option value= "<?=isset($Instshow->Institute_id)?$Instshow->Institute_id:''?>"<?php if(!empty($updatedata[0]->Institute_name))
									{ if($updatedata[0]->Institute_name==$Instshow->Institute_name)
									{  echo"selected"; }   }?>>
									<?=isset($Instshow->Institute_name)?$Instshow->Institute_name:''?></option> 
									<?php } ?>
									
									</select>
									</div>
									
							<label class="col-sm-4 control-label" style="margin-top:10px" for="field-5">Description</label>
									
								<div class="col-sm-8" style="margin-top:10px">
										<textarea class="form-control ckeditor"  data-validate="required" name="Description" id="field-5"><?=isset($updatedata[0]->Description)?$updatedata[0]->Description:''?></textarea>
								</div>
								
									
							<label class="col-sm-4 control-label"style="margin-top:10px" for="field-1">Eligibility </label>
									
									<div class="col-sm-8"style="margin-top:10px">
										<input type="text" class="form-control"  name="Eligibility" value="<?=isset($updatedata[0]->Eligibility)?$updatedata[0]->Eligibility:''?>" id="field-1" placeholder="Name">
									</div>
									
							<label class="col-sm-4 control-label" style="margin-top:10px" for="field-5">Syllabus</label>
									<div class="col-sm-8"style="margin-top:10px">
										<textarea class="form-control ckeditor" cols="5" data-validate="required" name="Syllabus" id="field-5"><?=isset($updatedata[0]->Syllabus)?$updatedata[0]->Syllabus:''?></textarea>
									</div>
									
							<label class="col-sm-4 control-label"style="margin-top:10px" for="field-1">Date of Exam </label>
									
									<div class="col-sm-8" style="margin-top:10px" >
								
									<input type="date" class="form-control"  name="Date_of_exam"  value="<?=isset($updatedata[0]->Date_of_exam)?$updatedata[0]->Date_of_exam:''?>" id="field-1">
											
										
							</div>
									
							<label class="col-sm-4 control-label"style="margin-top:10px" for="field-1">Start Date of form submission</label>
									
									<div class="col-sm-8" style="margin-top:10px" >
								
									<input type="date" class="form-control" name="Startdate_of_formsubmission"  value="<?=isset($updatedata[0]->Startdate_of_formsubmission)?$updatedata[0]->Startdate_of_formsubmission:''?>" id="field-1">
											
								
							</div>

                            <label class="col-sm-4 control-label"style="margin-top:10px" for="field-1">Last Date of Form submission </label>
									
							<div class="col-sm-8" style="margin-top:10px" >
								
									<input type="date" class="form-control"  name="Lastdate_of_formsubmission" value="<?=isset($updatedata[0]->Lastdate_of_formsubmission)?$updatedata[0]->Lastdate_of_formsubmission:''?>" id="field-1">
											
							</div>

							<label class="col-sm-4 control-label"style="margin-top:10px" for="field-1">Official link</label>
									
									<div class="col-sm-8"style="margin-top:10px">
										<input type="text" class="form-control" data-validate="required" name="Official_link" value="<?=isset($updatedata[0]->Official_link)?$updatedata[0]->Official_link:''?>" id="field-1" placeholder="Name">
									</div>
								
									
							<label class="col-sm-4 control-label" style="margin-top:10px"for="field-1">Language Id</label>
									
								<div class="col-sm-8" style="margin-top:10px">
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
					<h3 class="panel-title">Exam Subtype detail View</h3>
					
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
								<th>Exam Type </th>
								<th>Exam Subtype Name </th>
								<th>Exam Name</th>
								<th>Career</th>
								<th>Job</th>
								<th>Institute</th>
								<th>Description</th>
								<th>Eligibility</th>
								<th>Syllabus</th>
								<th>Date of exam</th>
								<th>Start date of form submission</th>
								<th>Last date of form submission</th>
								<th>Official link</th>
								
								<th>Language Id</th>
								<th>Action</th>
								
							</tr>
						</thead>
					
						<tfoot>
							<tr>
								<th>Exam Type </th>
								<th>Exam Subtype Name </th>
								<th>Exam Name</th>
								<th>Career</th>
								<th>Job</th>
								<th>Institute</th>
								<th>Description</th>
								<th>Eligibility</th>
								<th>Syllabus</th>
								<th>Date of exam</th>
								<th>Start date of form submission</th>
								<th>Last date of form submission</th>
								<th>Official link</th>
								
								<th>Language Id</th>
								<th>Action</th>
								
							</tr>
						</tfoot>
					
						<tbody>
						<?php foreach($exam3 as $exam3show) {?>
							<tr>
								<td><?= isset ($exam3show->examtype)?$exam3show->examtype:''?></td>
								<td><?= isset ($exam3show->examsubtype)?$exam3show->examsubtype:''?></td>
								<td><?= isset ($exam3show->Exam_name)?$exam3show->Exam_name:''?></td>
								<td><?= isset ($exam3show->Career_name)?$exam3show->Career_name:''?></td>
								<td><?= isset ($exam3show->Company_name)?$exam3show->Company_name:''?></td>
								
								<td><?= isset ($exam3show->Institute_name)?$exam3show->Institute_name:''?></td>
								<td><?= isset ($exam3show->Description)?$exam3show->Description:''?></td>
								<td><?= isset ($exam3show->Eligibility)?$exam3show->Eligibility:''?></td>
								<td><?= isset ($exam3show->Syllabus)?$exam3show->Syllabus:''?></td>
								<td><?= isset ($exam3show->Date_of_exam)?$exam3show->Date_of_exam:''?></td>
								<td><?= isset ($exam3show->Startdate_of_formsubmission)?$exam3show->Startdate_of_formsubmission:''?></td>
								<td><?= isset ($exam3show->Lastdate_of_formsubmission)?$exam3show->Lastdate_of_formsubmission:''?></td>

								<td><?= isset ($exam3show->Official_link)?$exam3show->Official_link:''?></td>
								
								<td><?= isset ($exam3show->Language_id)?$exam3show->Language_id:''?></td>
								
								<td><a href="<?=base_url();?>index.php/Exampg/exdelete1/<?=isset ($exam3show->Examdetail_id) ?$exam3show->Examdetail_id:''?>">
								<i class= "fa-trash"></i></a>
								
								<a href="<?=base_url();?>index.php/Exampg/Mngexindex2/<?=isset($exam3show->Examdetail_id)?$exam3show->Examdetail_id:''?>">
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