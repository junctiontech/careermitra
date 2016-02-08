

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
							<h3 class="panel-title">Career Option Form</h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
								
							</div>
						</div>
				<div class="panel-body">
				
				
				<script language="javascript" type="text/javascript">
						
							</script>
							
							<form role="form" class="validate" method="post" enctype="multipart/form-data" action="<?=base_url();?>index.php/Careerpg/insert">
								
					<div class="form-group">
					<input type="hidden" name="id" value="<?=isset ($updatedata[0]->career_id) ?$updatedata[0]->career_id:''?>"/>
							<label class="col-sm-2 control-label"style="margin-top:10px" for="field-1">Alphabet</label>
									
								<div class="col-sm-10"style="margin-top:10px">
									<input type="text" name="Alphabet_id" class="form-control" data-validate="required" id="field-1" value="<?=isset ($updatedata[0]->Alphabet_id) ?$updatedata[0]->Alphabet_id:''?>" >
								</div>
									
									
							<label class="col-sm-2 control-label"style="margin-top:10px" for="field-1">Career Name</label>
								
								<span class="msg_box_1"></span>	
								<div class="col-sm-10" style="margin-top:10px">
									<input type="text" name="Career_name" class="form-control" onblur="check_career('1');" data-validate="required" id="reg-career" placeholder="Name" value="<?=isset ($updatedata[0]->Alphabet_id) ?$updatedata[0]->Alphabet_id:''?>">
								</div>
								
							
							
								
							<label class="col-sm-2 control-label" style="margin-top:10px" for="field-5">Introduction</label>
								
								
								<div class="col-sm-10" style="margin-top:10px">
										
					
	
										<textarea class="form-control ckeditor"  data-validate="required" name="Introduction"   >
										<?=isset ($updatedata[0]->Introduction) ?$updatedata[0]->Introduction:''?></textarea></br>
								
								</div>
								
						<label class="col-sm-2 control-label" style="margin-top:10px" for="field-5">Logo</label>
									
								<div class="col-sm-10" style="margin-top:10px">
									<input type="file" class="form-control" id="i_file"  name="file"><?=isset($updatedata[0]->Image)?$updatedata[0]->Image:''?>
									<h5>Image size must be under 10kb</h5>
								</div>
								
								
									
							<label class="col-sm-2 control-label" style="margin-top:10px"for="field-1">Eligibility</label>
									
								<div class="col-sm-10" style="margin-top:10px">
									<input type="file" class="form-control"  name="file1"  placeholder="Degree" value="<?=isset ($updatedata[0]->Eligibility) ?$updatedata[0]->Eligibility:''?>">
									
								</div>
								
								<div class="col-sm-10" style="margin-top:10px;margin-left:168px">
									<input type="text" class="form-control" data-validate="required" name="Eligibility1" id="field-1" placeholder="Text" value="<?=isset ($updatedata[0]->Eligibility) ?$updatedata[0]->Eligibility:''?>">
								</div>
								
		
							<label class="col-sm-2 control-label" style="margin-top:10px" for="field-1">Min salary</label>
									
								<div class="col-sm-10"style="margin-top:10px" >
									<input type="number_format" class="form-control" data-validate="required" name="Min_salary"id="field-1" placeholder="salary in rupee" value="<?=isset ($updatedata[0]->Min_salary) ?$updatedata[0]->Min_salary:''?>">
								</div>
									
							<label class="col-sm-2 control-label" style="margin-top:10px" for="field-1">Max salary</label>
									
								<div class="col-sm-10"style="margin-top:10px" >
									<input type="number_format" class="form-control"  data-validate="required" name="Max_salary"id="field-1" placeholder="salary in rupee" value="<?=isset ($updatedata[0]->Max_salary) ?$updatedata[0]->Max_salary:''?>">
								</div>
										
							<label class="col-sm-2 control-label" style="margin-top:10px" for="field-5">Job Prospects</label>
									
								<div class="col-sm-10" style="margin-top:10px">
										
										<textarea class="form-control ckeditor"  name="Job_prospects" id="field-5"> <?=isset ($updatedata[0]->Job_prospects) ?$updatedata[0]->Job_prospects:''?></textarea>
								</div>
		
							
								
							<label class="col-sm-2 control-label" style="margin-top:10px"for="field-1">Language Id</label>
									
								<div class="col-sm-10" style="margin-top:10px">
									<select class="form-control" data-validate="required" name="Language_id">
									<Option value="">Select</option>
									<?php foreach($Lang as $Langshow){?>
									
									<Option value= "<?=isset($Langshow->Language_id)?$Langshow->Language_id:''?>"<?php if(!empty($updatedata[0]->Language_id))
									{ if($updatedata[0]->Language_id==$Langshow->Language_id)
									{  echo"selected"; }   }?>>
									<?=isset($Langshow->Language_id)?$Langshow->Language_id:''?></option> 
									<?php } ?>
									
									</select>
								</div>
								
								<div class="col-sm-12" >
								<input type="submit" class="btn btn-default" id="i_submit" value="submit" style="background-color:#8079C9; float:right ;margin-top:10px">
								</div>
		
					</div>
					</form>
				</div>
			</div>	
			
			<hr>
<!------------------------------------------------Editting table---------------------------------------------------
-------------------------------------------------------------------------------------------------------------->
	<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Career Option View</h3>
					
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
					<table id="example-1"  cellspacing="0" class="table table-small-font table-bordered table-striped">
					<!--<table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%">-->
						<thead style="white-space:nowrap;">
							<tr>
								<th>Alphabet</th>
								<th>Image</th>
								<th>Career name</th>
								<th>Introduction</th>
								<th>Eligibility</th>
								<th>Min_salary</th>
								<th>Max_salary</th>
								<th>Job prospects</th>
							
								<th>Language Id</th>
								<th>Action</th>
							</tr>
						</thead>
					
						<tfoot>
							<tr>
								<th>Alphabet</th>
								<th>Image</th>
								<th>Career name</th>
								<th>Introduction</th>
								<th>Eligibility</th>
								<th>Min_salary</th>
								<th>Max_salary</th>
								<th>Job prospects</th>
							
								<th>Language Id</th>
								<th>Action</th>
							</tr>
						</tfoot>
					
						<tbody>
						<?php foreach($Career as $careershow){?>
							<tr>
						<td><?=isset ($careershow->Alphabet_id) ?$careershow->Alphabet_id:''?></td>
						<td><img src="<?=base_url();?>/uploaded_images/<?= isset ($careershow->Image) ?$careershow->Image:''?>"
												height="70px" width="70px"></td>
						<td><?=isset ($careershow->Career_name) ?$careershow->Career_name:''?></td>
						<td><?=isset ($careershow->Introduction) ?$careershow->Introduction:''?></td>
						<td><?=isset ($careershow->Eligibility) ?$careershow->Eligibility:''?></td>
						<td><?=isset ($careershow->Min_salary) ?$careershow->Min_salary:''?></td>
						<td><?=isset ($careershow->Max_salary) ?$careershow->Max_salary:''?></td>
						<td><?=isset ($careershow->Job_prospects) ?$careershow->Job_prospects:''?></td>
						
							 
						
						<td><?=isset ($careershow->Language_id) ?$careershow->Language_id:''?></td>
								
								
								<td><a href="<?=base_url();?>index.php/Careerpg/delete/<?=isset($careershow->career_id)?$careershow->career_id:''?>">
								<i class= "fa-trash"></i></a>
								
								
								<a href="<?=base_url();?>index.php/Careerpg/Mngcaindex/<?=isset($careershow->career_id)?$careershow->career_id:''?>">
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
