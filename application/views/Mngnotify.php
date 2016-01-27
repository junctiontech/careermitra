

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
							<h3 class="panel-title">Notification Form</h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
								
							</div>
						</div>
				<div class="panel-body">
							
							<form role="form" class="form-horizontal" method="post" action="<?=base_url();?>index.php/Careermitra/insert3">
					<div class="form-group">	
							<input type="hidden" name="id" value="<?=isset($updatedata[0]->Notify_id) ?$updatedata[0]->Notify_id:''?>"/>
						<label class="col-sm-2 control-label">Select option </label>
									
									<div class="col-sm-10" >
										
										
											<select class="form-control" name="Type_id">
											<Option value="">Select</option>
											
											<?php foreach($intro1 as $intro1show){?>
									
											<Option value= "<?=isset($intro1show->Type_id)?$intro1show->Type_id:''?>"<?php if(!empty($updatedata[0]->Type))
											{ if($updatedata[0]->Type==$intro1show->Type)
											{  echo"selected"; }   }?>>
											<?=isset($intro1show->Type)?$intro1show->Type:''?></option> 
											<?php }?>
										
											</select>
									</div>
					
							
							<label class="col-sm-2 control-label" style="margin-top:10px" for="field-1">Description</label>
									
								<div class="col-sm-10" style="margin-top:10px">
										<textarea class="form-control" name="Description" cols="5" id="field-5"><?=isset($updatedata[0]->Description)?$updatedata[0]->Description:''?></textarea>
								</div>
							
							<label class="col-sm-2 control-label" style="margin-top:10px" for="field-1">Link_url</label>
								<div class="col-sm-10" style="margin-top:10px">
										<input type="text" class="form-control" name="Link_url" value="<?=isset($updatedata[0]->Link_url)?$updatedata[0]->Link_url:''?>"></input>
								</div>
								
							<label class="col-sm-2 control-label" style="margin-top:10px" for="field-1" >Status</label>
								<div class="col-sm-10" style="margin-top:10px">
										<select class="form-control" name="Status">
										<option value="">Select</option>
										<option value="Active" <?php if(!empty($updatedata[0]->Status)){ if($updatedata[0]->Status=="Active"){  echo"selected"; }}?>>Active</option>
										<option value="Inactive" <?php if(!empty($updatedata[0]->Status)){ if($updatedata[0]->Status=="Inactive"){  echo"selected"; }}?>>Inactive</option>
										</select>
								</div>
							
							<label class="col-sm-2 control-label" style="margin-top:10px" for="field-1">Date</label>
								<div class="col-sm-10" style="margin-top:10px">
										<input type="date" class="form-control" name="Rq_date" value="<?=isset($updatedata[0]->Rq_date)?$updatedata[0]->Rq_date:''?>">
										
								</div>
								
							<label class="col-sm-2 control-label" style="margin-top:10px" for="field-1">Language Id</label>
									
								<div class="col-sm-10" style="margin-top:10px">
									<select class="form-control" name="Language_id">
									<Option value="">Select</option>
									
									<?php foreach($lang as $langshow){?>
									
									<Option value= "<?=isset($langshow->Language_id)?$langshow->Language_id:''?>"<?php if(!empty($updatedata[0]->Language_id))
									{ if($updatedata[0]->Language_id==$langshow->Language_id)
									{  echo"selected"; }   }?>>
									<?=isset($langshow->Language_id)?$langshow->Language_id:''?></option> 
									<?php }?>
									
									</select>
								</div>
							
								<div class="col-sm-12">
										<input type="submit" class="btn btn-default" value="submit" style="background-color:#8079C9; float:right ;margin-top:10px"></input>
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
					<h3 class="panel-title">Notification View</h3>
					
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
								<th>Option</th>
								<th>Description</th>
								<th>Link_url</th>
								<th>Status</th>
								<th>Date</th>
								
								<th>Action</th>
							</tr>
						</thead>
					
						<tfoot>
							<tr>
								<th>Option</th>
								<th>Description</th>
								<th>Link_url</th>
								<th>Status</th>
								<th>Date</th>
								
								<th>Action</th>
							</tr>
						</tfoot>
					
						<tbody>
						<?php foreach($notify as $notifyshow) {?>
						
							<tr>
								<td><?=isset ($notifyshow->Type) ?$notifyshow->Type:''?></td>
								<td><?=isset ($notifyshow->Description) ?$notifyshow->Description:''?></td>
								<td><?=isset ($notifyshow->Link_url) ?$notifyshow->Link_url:''?></td>
								<td><?=isset ($notifyshow->Status) ?$notifyshow->Status:''?></td>
								<td><?=isset ($notifyshow->Rq_date) ?$notifyshow->Rq_date:''?></td>
							
								<td><a href="<?=base_url();?>index.php/Careermitra/delete/<?=isset($notifyshow->Notify_id) ?$notifyshow->Notify_id:''?>">
								<i class= "fa-trash"></i></a>
								
								<a href="<?=base_url();?>index.php/Careermitra/index6/<?=isset($notifyshow->Notify_id)?$notifyshow->Notify_id:''?>">
								<i class="fa-edit" style="margin-left:10px"></i></a></td>
							</tr>
							
						<?php }?>
							
						</tbody>
					</table>
					
				</div>
			</div>
	</div>
</div>
</div>	

