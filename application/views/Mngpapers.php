
<!---------------------------------------------Main Content------------------------------
-------------------------------------------------------------------------------------------->		
<div class="main-content">
		
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
		<div class="body">
		
		 <?php  if($this->session->flashdata('message_type')=='success') { ?>
		  <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>
                <strong><?=$this->session->flashdata('message')?></strong>  </div>
		 <?php }?>
		</div>
		</div>
				
			<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Paper </h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
								
							</div>
						</div>
				<div class="panel-body">
							
							<form role="form" class="validate" method="post" enctype="multipart/form-data" action="<?=base_url();?>index.php/Exampg/insert3">
								
					<div class="form-group">
					
					
							<label class="col-sm-2 control-label"style="margin-bottom:10px">Select Exam type</label>
									<div class="col-sm-10"style="margin-bottom:10px">
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
							<label class="col-sm-2 control-label" style="margin-bottom:10px">Select Exam </label>
									
									<div class="col-sm-10" style="margin-top:10px">
										<select class="form-control"  data-validate="required" name="exam_id">
											<option value="">Select</option>
											<?php foreach ($exam1 as $exam1show) {?>
											
											<option value="<?=isset($exam1show->exam_id)?$exam1show->exam_id:''?>"<?php if(!empty($updatedata[0]->examsubtype))
											{ if($updatedata[0]->examsubtype==$exam1show->examsubtype)
											{  echo"selected"; }   }?>>
											<?=isset($exam1show->examsubtype)?$exam1show->examsubtype:''?></option>
											
											<?php }?>
										</select>
									</div>
									
									<label class="col-sm-2 control-label"style="margin-bottom:10px">Exam Name </label>
									
									<div class="col-sm-10" style="margin-top:10px">
										<select class="form-control"  data-validate="required" name="Examdetail_id">
											<option value="">Select</option>
											<?php foreach ($exam2 as $exam2show) {?>
											
											<option value="<?=isset($exam2show->Examdetail_id)?$exam2show->Examdetail_id:''?>"<?php if(!empty($updatedata[0]->Exam_name))
											{ if($updatedata[0]->Exam_name==$exam2show->Exam_name)
											{  echo"selected"; }   }?>>
											<?=isset($exam2show->Exam_name)?$exam2show->Exam_name:''?></option>
											
											<?php }?>
										</select>
									</div>
									
									
							<input type="hidden" name="id" value="<?=isset($updatedata[0]->Paper_id)?$updatedata[0]->Paper_id:''?>" />
							
							<label class="col-sm-2 control-label"style="margin-bottom:10px">Select Subject</label>
									
									<div class="col-sm-10" style="margin-top:10px">
										<select class="form-control" data-validate="required" name="Subject_id">
											<option value="">Select</option>
											<?php foreach($sub as $subshow){?>
											
											
											<option value="<?=isset($subshow->Subject_id)?$subshow->Subject_id:''?>"<?php if(!empty($updatedata[0]->Subject))
											{ if($updatedata[0]->Subject==$subshow->Subject)
											{  echo"selected"; }   }?>>
											<?=isset($subshow->Subject)?$subshow->Subject:''?></option>
											
											<?php }?>
										</select>
									</div>
								
							<label class="col-sm-2 control-label" style="margin-top:10px" for="field-1">Paper</label>
									
								<div class="col-sm-10" style="margin-top:10px">
									<input type="file" class="form-control" data-validate="required" name="file" value="<?=isset($updatedata[0]->Paper_name)?$updatedata[0]->Paper_name:''?>"id="field-1" placeholder="Name">
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
					<h3 class="panel-title">Paper View</h3>
					
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
							<tr><th>Exam type</th>
								<th>Exam name</th>
								<th>Exam</th>
								<th>Subject name</th>
								<th>Paper </th>
								
								<th>Action</th>
								
							</tr>
						</thead>
					
						<tfoot>
							<tr>
								<th>Exam type</th>
								<th>Exam name</th>
								<th>Exam</th>
								<th>Subject name</th>
								<th>Paper </th>
								
								<th>Action</th>
								
							</tr>
						</tfoot>
					
						<tbody>
						<?php foreach($paper as $papershow){?>
							<tr>
								<td><?=isset ($papershow->examtype) ?$papershow->examtype:''?></td>
								<td><?=isset ($papershow->examsubtype) ?$papershow->examsubtype:''?></td>
								<td><?=isset ($papershow->Exam_name) ?$papershow->Exam_name:''?></td>	
								<td><?=isset ($papershow->Subject) ?$papershow->Subject:''?></td>
								<td><?=isset ($papershow->Paper_name) ?$papershow->Paper_name:''?></td>
															
								<td><a href="<?=base_url();?>index.php/Exampg/delete3/<?=isset ($papershow->Paper_id)?$papershow->Paper_id:''?>">
								<i class= "fa-trash"></i></a>
								
								<a href="<?=base_url();?>index.php/Exampg/index3/<?=isset($papershow->Paper_id)?$papershow->Paper_id:''?>">
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