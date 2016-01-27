

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
							<h3 class="panel-title">Institute Option Form</h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
								
							</div>
						</div>
				<div class="panel-body">
							
							<form role="form" class="validate" method="post" enctype="multipart/form-data" action="<?=base_url();?>index.php/Institutepg/Mnginsindex">
								
					<div class="form-group">
					<input type="hidden" name="id" value="<?=isset($updatedata[0]->Institute_id)?$updatedata[0]->Institute_id:''?>" />
					
					
							<label class="col-sm-2 control-label"style="margin-top:10px" for="field-1">Alphabet</label>
									
								<div class="col-sm-10"style="margin-top:10px">
									<input type="text" class="form-control" id="field-1" data-validate="required" name="Alphabet_id" value="<?=isset($updatedata[0]->Alphabet_id)?$updatedata[0]->Alphabet_id:''?>" >
								</div>
									
									
							<label class="col-sm-2 control-label"style="margin-top:10px" for="field-1">Institute Name</label>
									
								<div class="col-sm-10" style="margin-top:10px">
									<input type="text" class="form-control" id="field-1" data-validate="required" placeholder="Name" name="Institute_name" value="<?=isset($updatedata[0]->Institute_name)?$updatedata[0]->Institute_name:''?>">
								</div>
								
							
							<label class="col-sm-2 control-label" style="margin-top:10px" for="field-5">Image</label>
									
								<div class="col-sm-10" style="margin-top:10px">
									<input type="file" class="form-control" id="field-1" data-validate="required" name="file"><?=isset($updatedata[0]->Image)?$updatedata[0]->Image:''?>
								</div>
								
							<label class="col-sm-2 control-label" style="margin-top:10px" for="field-5">Description</label>
									
								<div class="col-sm-10" style="margin-top:10px">
										<textarea class="form-control" cols="5" id="field-5" data-validate="required" name="Description"><?=isset($updatedata[0]->Description)?$updatedata[0]->Description:''?></textarea>
								</div>
								
								
								
							<label class="col-sm-2 control-label" style="margin-top:10px"for="field-1">Group</label>
									
								<div class="col-sm-10" style="margin-top:10px">
									<input type="text" class="form-control" id="field-1" name="Group1" placeholder="Group of institutes" value="<?=isset($updatedata[0]->Group1)?$updatedata[0]->Group1:''?>">
								</div>
									
										
							<label class="col-sm-2 control-label" style="margin-top:10px"for="field-1">Official link</label>
									
								<div class="col-sm-10" style="margin-top:10px">
									<input type="text" class="form-control" id="field-1" data-validate="required" placeholder="Branch" name="Official_link" value="<?=isset($updatedata[0]->Official_link)?$updatedata[0]->Official_link:''?>">
								</div>

							
								
							<label class="col-sm-2 control-label" style="margin-top:10px" for="field-1">Contact no</label>
									
								<div class="col-sm-10"style="margin-top:10px" >
									<input type="number_format" class="form-control" data-validate="required,number" id="field-1" name="Contact_no" placeholder="phone no" value="<?=isset($updatedata[0]->Contact_no)?$updatedata[0]->Contact_no:''?>">
								</div>
									
										
							<label class="col-sm-2 control-label" style="margin-top:10px" for="field-5">Address</label>
									
								<div class="col-sm-10" style="margin-top:10px">
										<textarea class="form-control" cols="5" id="field-5" data-validate="required" name="Address"><?=isset($updatedata[0]->Address)?$updatedata[0]->Address:''?></textarea>
								</div>
		
							<label class="col-sm-2 control-label" style="margin-top:10px" for="field-5">Longitude</label>
									
								<div class="col-sm-10" style="margin-top:10px">
										<input type="Map" class="form-control" name="Longitude" id="field-1"value="<?=isset($updatedata[0]->Longitude)?$updatedata[0]->Longitude:''?>">
								</div>
								
							<label class="col-sm-2 control-label" style="margin-top:10px" for="field-5">Latitude</label>
									
								<div class="col-sm-10" style="margin-top:10px">
										<input type="Map" class="form-control" name="Latitude" id="field-1" value="<?=isset($updatedata[0]->Latitude)?$updatedata[0]->Latitude:''?>">
								</div>
								
							<label class="col-sm-2 control-label" style="margin-top:10px" for="field-1">Language Id</label>
									
								<div class="col-sm-10" style="margin-top:10px">
									<select class="form-control" data-validate="required" name="Language_id">
									
									<Option value="">Select</option>
									<?php foreach($Lang as $Langshow){?>
									
									<Option value= "<?=isset($Langshow->Language_id) ?$Langshow->Language_id:''?>"<?php if(!empty($updatedata[0]->Language_id))
									{ if($updatedata[0]->Language_id==$Langshow->Language_id)
									{  echo"selected"; }   }?>>
									<?=isset($Langshow->Language_id)?$Langshow->Language_id:''?></option> 
									<?php } ?>
									
									</select>
								</div>
								
								<div class="col-sm-12" >
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
					<h3 class="panel-title">Intitute Option View</h3>
					
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
								<th>Alphabet</th>
								<th>Institute name</th>
								<th>Image</th>
								<th>Description</th>
								<th>Group</th>
								<th>Official link</th>
								<th>Contact no</th>
								<th>Address</th>
								<th>Longitude</th>
								<th>Latitude</th>
								<th>Language_id</th>
								<th>Action</th>
							</tr>
						</thead>
					
						<tfoot>
							<tr>
								<th>Alphabet</th>
								<th>Institute name</th>
								<th>Image</th>
								<th>Description</th>
								<th>Group</th>
								<th>Official link</th>
								<th>Contact no</th>
								<th>Address</th>
								<th>Longitude</th>
								<th>Latitude</th>
								<th>Language_id</th>
								<th>Action</th>
							</tr>
						</tfoot>
					
						<tbody>
						<?php foreach ($institute as $instituteshow){?>
							<tr>
								<td><?= isset ($instituteshow->Alphabet_id) ?$instituteshow->Alphabet_id:''?></td>
								<td><?= isset ($instituteshow->Institute_name) ?$instituteshow->Institute_name:''?></td>
								<td><img src="<?=base_url();?>/uploaded_images/<?= isset ($instituteshow->Image) ?$instituteshow->Image:''?>"
												height="70px" width="70px"></td>
								<td><?= isset ($instituteshow->Description) ?$instituteshow->Description:''?></td>
								<td><?= isset ($instituteshow->Group1) ?$instituteshow->Group1:''?></td>
								<td><?= isset ($instituteshow->Official_link) ?$instituteshow->Official_link:''?></td>
								<td><?= isset ($instituteshow->Contact_no) ?$instituteshow->Contact_no:''?></td>
								<td><?= isset ($instituteshow->Address) ?$instituteshow->Address:''?></td>
								<td><?= isset ($instituteshow->Longitude) ?$instituteshow->Longitude:''?></td>
								<td><?= isset ($instituteshow->Latitude) ?$instituteshow->Latitude:''?></td>
								<td><?= isset ($instituteshow->Language_id) ?$instituteshow->Language_id:''?></td>
								
								<td><a href="<?=base_url();?>index.php/Institutepg/delete/<?=isset ($instituteshow->Institute_id) ?$instituteshow->Institute_id:''?>">
								<i class= "fa-trash"></i></a>
								
								<a href="<?=base_url();?>index.php/Institutepg/Mnginsindex/<?=isset($instituteshow->Institute_id)?$instituteshow->Institute_id:''?>">
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
