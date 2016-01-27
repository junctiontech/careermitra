
	<!------------------------------------------------------------------Main content--------------
-------------------------------------------------------------------------------------------------------------->
	
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
							<h3 class="panel-title">Exam </h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
								
							</div>
						</div>
				<div class="panel-body">
							
							<form role="form" class="validate" method="post" action="<?=base_url();?>index.php/Exampg/exinsert">
								
					<div class="form-group">
							<input type="hidden" name="id" value="<?=isset ($updatedata[0]->exam_id) ?$updatedata[0]->exam_id:''?>"/>
							<label class="col-sm-3 control-label">Select Exam Type</label>
									
									<div class="col-sm-9">
										<select class="form-control" data-validate="required" name="type_id">
											<option value="">Select</option>
											<?php foreach($exam as $examshow){?>
											
											
											<option value="<?=isset($examshow->type_id)?$examshow->type_id:''?>"<?php if(!empty($updatedata[0]->examtype))
											{ if($updatedata[0]->examtype==$examshow->examtype)
											{  echo"selected"; }   }?>>
											<?=isset($examshow->examtype)?$examshow->examtype:''?></option>
											
											<?php }?>
										</select>
									</div>
									
							<label class="col-sm-3 control-label"style="margin-top:10px" for="field-1">Exam </label>
									
									<div class="col-sm-9"style="margin-top:10px">
										<input type="text" class="form-control" data-validate="required" name="description" value="<?=isset($updatedata[0]->description)?$updatedata[0]->description:''?>"id="field-1" placeholder="Name">
									</div>
									
							<label class="col-sm-3 control-label" style="margin-top:10px"for="field-1">Language Id</label>
									
								<div class="col-sm-9" style="margin-top:10px">
									<select class="form-control"  data-validate="required" name="Language_id">
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
					<h3 class="panel-title">Exam  View</h3>
					
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
					
					<table id="example-1" cellspacing="0" class="table table-small-font table-bordered table-striped">
							<thead style="white-space:nowrap;">
							<tr>
								<th>Exam Type </th>
								<th>Exam  </th>
								<th>Language_id</th>
								<th>Action</th>
							</tr>
						</thead>
					
						<tfoot>
							<tr>
								<th>Exam Type </th>
								<th>Exam  </th>
								<th>Language_id</th>
								<th>Action</th>
								
								
							</tr>
						</tfoot>
					
						<tbody>
						<?php foreach($exam2 as $exam2show){?>
						<tr>								
						<td><?=isset ($exam2show->examtype1)?$exam2show->examtype1:''?></td>							
						<td><?=isset ($exam2show->description)?$exam2show->description:''?></td>
						<td><?=isset ($exam2show->Language_id)?$exam2show->Language_id:''?></td>
						
						<td><a href="<?=base_url();?>index.php/Exampg/exdelete/<?=isset ($exam2show->exam_id) ?$exam2show->exam_id:''?>">
						<i class= "fa-trash"></i></a>
								
						<a href="<?=base_url();?>index.php/Exampg/Mngexindex1/<?=isset($exam2show->exam_id)?$exam2show->exam_id:''?>">
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