
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
							<h3 class="panel-title">Subject </h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
								
							</div>
						</div>
				<div class="panel-body">
							
							<form role="form" class="validate" method="post" action="<?=base_url();?>index.php/Exampg/insert4">
								
					<div class="form-group">
							<input type="hidden" name="id" value="<?=isset($updatedata[0]->Subject_id)?$updatedata[0]->Subject_id:''?>" />
							
							<label class="col-sm-2 control-label"style="margin-top:10px" for="field-1">Subject</label>
									
								<div class="col-sm-10"style="margin-top:10px">
									<input type="text" class="form-control" data-validate="required" name="Subject" value="<?=isset($updatedata[0]->Subject)?$updatedata[0]->Subject:''?>"id="field-1" placeholder="Name">
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
					<h3 class="panel-title">Subject View</h3>
					
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
								<th>Subject </th>
								
								<th>Action</th>
								
							</tr>
						</thead>
					
						<tfoot>
							<tr>
								<th>Subject </th>
								
								<th>Action</th>
								
							</tr>
						</tfoot>
					
						<tbody>
						<?php foreach($sub as $subshow){?>
							<tr>
								<td><?=isset ($subshow->Subject) ?$subshow->Subject:''?></td>
								
									
								<td><a href="<?=base_url();?>index.php/Exampg/delete4/<?=isset ($subshow->Subject_id)?$subshow->Subject_id:''?>">
								<i class= "fa-trash"></i></a>
								
								<a href="<?=base_url();?>index.php/Exampg/index4/<?=isset($subshow->Subject_id)?$subshow->Subject_id:''?>">
								<i class="fa-edit" style="margin-left:10px";></i></a></td>
							</tr>
						<?php }?>
							
						</tbody>
					</table>
					
				</div>
			
	</div>
</div>
</div>	