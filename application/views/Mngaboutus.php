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
							<h3 class="panel-title">About us </h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
								
							</div>
						</div>
				<div class="panel-body">
							
							<form role="form"   class="validate" method="post" action="<?=base_url();?>index.php/Careermitra/insert">
								
					<div class="form-group">
							<input type="hidden" name="id"  value="<?=isset($updatedata[0]->Aboutus_id)?$updatedata[0]->Aboutus_id:''?>" />
							
							<label class="col-sm-2 control-label" style="margin-top:10px"  for="field-1">Description</label>
									
								<div class="col-sm-10" style="margin-top:10px">
										<textarea class="form-control" cols="5" id="field-5" data-validate="required" data-message-required="This is custom message for required field." name="Description"><?=isset($updatedata[0]->Description)?$updatedata[0]->Description:''?></textarea>
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
					<h3 class="panel-title">About us View</h3>
					
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
								<th>Description </th>
								
								<th>Action</th>
								
							</tr>
						</thead>
					
						<tfoot>
							<tr>
								<th>Description </th>
								
								<th>Action</th>
								
							</tr>
						</tfoot>
					
						<tbody>
						<?php foreach($about as $aboutshow){?>
							<tr>
								<td><?=isset ($aboutshow->Description) ?$aboutshow->Description:''?></td>
								
									
								<td><a href="<?=base_url();?>index.php/Careermitra/delete/<?=isset ($aboutshow->Aboutus_id)?$aboutshow->Aboutus_id:''?>">
								<i class= "fa-trash"></i></a>
								
								<a href="<?=base_url();?>index.php/Careermitra/index3/<?=isset($aboutshow->Aboutus_id)?$aboutshow->Aboutus_id:''?>">
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