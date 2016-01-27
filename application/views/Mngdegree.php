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
							<h3 class="panel-title">Degree Type </h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
								
							</div>
						</div>
				<div class="panel-body">
							
							<form role="form" class="validate" method="post" action="<?=base_url();?>index.php/Institutepg/Deginsert">
								
					<div class="form-group">
							<input type="hidden" name="id" value="<?=isset($updatedata[0]->Degree_id)?$updatedata[0]->Degree_id:''?>" />
							
							<label class="col-sm-2 control-label"style="margin-top:10px" for="field-1">Degree name</label>
									
								<div class="col-sm-10"style="margin-top:10px">
									<input type="text" class="form-control" data-validate="required" name="Degree_name" value="<?=isset($updatedata[0]->Degree_name)?$updatedata[0]->Degree_name:''?>"id="field-1" placeholder="Name">
								</div>
								
							
							<label class="col-sm-2 control-label"style="margin-top:10px" for="field-1">Term</label>
									
								<div class="col-sm-10"style="margin-top:10px">
									<input type="text" class="form-control" data-validate="required" name="Term" value="<?=isset($updatedata[0]->Term)?$updatedata[0]->Term:''?>"id="field-1" placeholder="Name">
								</div>	
								
							<label class="col-sm-2 control-label"style="margin-top:10px" for="field-1">Eligibility</label>
									
								<div class="col-sm-10"style="margin-top:10px">
									<input type="text" class="form-control" name="Eligibility" value="<?=isset($updatedata[0]->Eligibility)?$updatedata[0]->Eligibility:''?>"id="field-1" placeholder="Name">
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
					<h3 class="panel-title">Exam Type View</h3>
					
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
								<th>Degree Name</th>
								<th>Term</th>
								<th>Eligibility</th>
								<th>Action</th>
								
							</tr>
						</thead>
					
						<tfoot>
							<tr>
								<th>Degree Name</th>
								<th>Term</th>
								<th>Eligibility</th>
								<th>Action</th>
								
							</tr>
						</tfoot>
					
						<tbody>
						<?php foreach($Degree as $Degreeshow){?>
							<tr>
								<td><?=isset ($Degreeshow->Degree_name) ?$Degreeshow->Degree_name:''?></td>
								<td><?=isset ($Degreeshow->Term) ?$Degreeshow->Term:''?></td>	
								<td><?=isset ($Degreeshow->Eligibility) ?$Degreeshow->Eligibility:''?></td>	
									
								<td><a href="<?=base_url();?>index.php/Institutepg/Degdelete/<?=isset ($Degreeshow->Degree_id) ?$Degreeshow->Degree_id:''?>">
								<i class= "fa-trash"></i></a>
								
								<a href="<?=base_url();?>index.php/Institutepg/Degindex/<?=isset($Degreeshow->Degree_id)?$Degreeshow->Degree_id:''?>">
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