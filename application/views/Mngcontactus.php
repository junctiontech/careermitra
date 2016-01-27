<!---------------------------------------------Main Content------------------------------
-------------------------------------------------------------------------------------------->		
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
							<h3 class="panel-title">Contact us </h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
								
							</div>
						</div>
				<div class="panel-body">
						
							<form role="form" class="validate" method="post" action="<?=base_url();?>index.php/Careermitra/insert1">
								
					<div class="form-group">
							<input type="hidden" name="id" value="<?=isset($updatedata[0]->Contactus_id)?$updatedata[0]->Contactus_id:''?>" />
							
							<label class="col-sm-2 control-label"style="margin-top:10px" for="field-1">Company name</label>
									
								<div class="col-sm-10" style="margin-top:10px">
									<input type="text" class="form-control" data-validate="required" cols="5" id="field-5" name="Company_name" value="<?=isset($updatedata[0]->Company_name)?$updatedata[0]->Company_name:''?>">
								</div>
							
							<label class="col-sm-2 control-label"style="margin-top:10px" for="field-1">Company address</label>
									
								<div class="col-sm-10" style="margin-top:10px">
										<textarea class="form-control" cols="5"data-validate="required" id="field-5" name="Company_address"><?=isset($updatedata[0]->Company_address)?$updatedata[0]->Company_address:''?></textarea>
								</div>		
							
							<label class="col-sm-2 control-label"style="margin-top:10px" for="field-1">Phone no</label>
									
								<div class="col-sm-10" style="margin-top:10px">
									<input type="number_format" class="form-control" data-validate="required,number" cols="5" id="field-5" name="Phone_no" value="<?=isset($updatedata[0]->Phone_no)?$updatedata[0]->Phone_no:''?>">
								</div>
								
							<label class="col-sm-2 control-label"style="margin-top:10px" for="field-1">Email address</label>
									
								<div class="col-sm-10" style="margin-top:10px">
									<input type="email" class="form-control" cols="5" data-validate="email" id="field-5" name="Email_address" value="<?=isset($updatedata[0]->Email_address)?$updatedata[0]->Email_address:''?>">
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
					<h3 class="panel-title">Contact us View</h3>
					
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
								<th>Company name </th>
								<th>Company address </th>
								<th>Phone no </th>
								<th>Email address </th>
								<th>Action</th>
								
							</tr>
						</thead>
					
						<tfoot>
							<tr>
								<th>Company name </th>
								<th>Company address </th>
								<th>Phone no </th>
								<th>Email address </th>
								<th>Action</th>
								
							</tr>
						</tfoot>
					
						<tbody>
						<?php foreach($contact as $contactshow){?>
							<tr>
								<td><?=isset ($contactshow->Company_name) ?$contactshow->Company_name:''?></td>
								<td><?=isset ($contactshow->Company_address ) ?$contactshow->Company_address :''?></td>
								<td><?=isset ($contactshow->Phone_no) ?$contactshow->Phone_no:''?></td>
								<td><?=isset ($contactshow->Email_address) ?$contactshow->Email_address:''?></td>								
								<td><a href="<?=base_url();?>index.php/Careermitra/delete1/<?=isset ($contactshow->Contactus_id)?$contactshow->Contactus_id:''?>">
								<i class= "fa-trash"></i></a>
								
								<a href="<?=base_url();?>index.php/Careermitra/index4/<?=isset($contactshow->Contactus_id)?$contactshow->Contactus_id:''?>">
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