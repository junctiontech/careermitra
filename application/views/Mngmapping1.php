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
							<h3 class="panel-title">Degree Institute Mapping</h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
								
							</div>
						</div>
				<div class="panel-body">
							
							<form role="form" class="validate" method="post" action="<?=base_url();?>index.php/Institutepg/Mainsert1">
								
					<div class="form-group">
							<input type="hidden" name="id" value="<?=isset($updatedata[0]->Mapping_id)?$updatedata[0]->Mapping_id:''?>" />
							
							<label class="col-sm-2 control-label" style="margin-top:10px" for="field-1">Degree Name</label>
								
								<div class="col-sm-10" style="margin-top:10px">
								<select  multiple class="form-control" data-validate="required" name="Degree_id[]">
										
										<?php foreach($Degree as $Degreeshow){?>
									
										<Option value= "<?=isset($Degreeshow->Degree_id)?$Degreeshow->Degree_id:''?>"<?php if(!empty($updatedata[0]->Degree_name))
											{ if($updatedata[0]->Degree_name==$Degreeshow->Degree_name)
											{  echo"selected"; }   }?>>
											<?=isset($Degreeshow->Degree_name)?$Degreeshow->Degree_name:''?></option> 
											<?php }?>
								</select>
								</div>
							
								<label class="col-sm-2 control-label" style="margin-top:10px" for="field-1">Institute Name</label>
								
								<div class="col-sm-10" style="margin-top:10px">
								<select  multiple class="form-control" data-validate="required" name="Institute_id[]">
									
									<?php foreach($Inst as $Instshow){?>
									
									<Option value= "<?=isset($Instshow->Institute_id)?$Instshow->Institute_id:''?>"<?php if(!empty($updatedata[0]->Institute_name))
									{ if($updatedata[0]->Institute_name==$Instshow->Institute_name)
									{  echo"selected"; }   }?>>
									<?=isset($Instshow->Institute_name)?$Instshow->Institute_name:''?></option> 
									<?php }?>
									
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
					<h3 class="panel-title">Mapping View</h3>
					
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
								<th>Degree Name </th>
								<th>Institute Name</th>
					
								<th>Action</th>
								
							</tr>
						</thead>
					
						<tfoot>
							<tr>
								<th>Degree Name </th>
								<th>Institute Name</th>
					
								<th>Action</th>
								
							</tr>
						</tfoot>
					
						<tbody>
						<?php foreach($data1 as $data1show){?>
							<tr>
								<td><?=isset ($data1show->Degree_name) ?$data1show->Degree_name:''?></td>
								<td><?=isset ($data1show->Institute_name) ?$data1show->Institute_name:''?></td>	
								
									
								<td><a href="<?=base_url();?>index.php/Institutepg/Madelete1/<?=isset ($data1show->Mapping_id) ?$data1show->Mapping_id:''?>">
								<i class= "fa-trash"></i></a>
								
								
							</tr>
						<?php }?>
							
						</tbody>
					</table>
					
				</div>
			
	</div>
</div>
</div>	