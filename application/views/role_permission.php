<?php foreach($permissions as $per ){
$a=$per->role_id;
}
?>
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
						<h3 class="panel-title">Role permission </h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
								
							</div>
					</div>
				
				
					<div class="breadcrumb-env">
					
								<ol class="breadcrumb bc-1">
									<li>
							<a href="<?=base_url();?>index.php/Managerole/role_management"><i class="fa-home"></i>Home</a>
						</li>
							<li class="active">
						
										<strong>Manage  Role permission</strong>
								</li>
							
								</ol>
								
					</div>
					
		<div class="panel-body">
	    <!-- BEGIN Main Content -->
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                            <div class="box-title">
                                <h3><i class="icon-table"></i>Role:-  <?=$a?></h3>
                             </div>
                            <div class="box-content">
								<form action="<?=base_url();?>index.php/Managerole/update_role_permission/<?=$a;?>" method="POST">
									<table class="table table-striped table-bordered ">
										<thead>
											<tr>
												<th>Functions</th>
												<th>Read</th>
												<th>Execute</th>
											</tr>
										</thead>
										<tbody>
										<?php foreach ($functions_list as $function){ ?>
												
												
											<tr>
												<input type="hidden" readonly name="role" value="<?=$a;?>"/>
												<input type="hidden" readonly name="role_permsn" value="1" />
											<td>
													<input type="checkbox" checked id="<?=$function->function_id?>" value="<?php echo $function->function_id; ?>" name="function[]" />
													<?=$function->function_id?>
												</td>
												<td>
												 <div class="controls">
													 <label class="checkbox">
														 <input type="hidden" name="read[]"  <?php foreach($permissions as $perm){ if($function->function_id==$perm->function_id && $perm->auth_read==1){ ?> value="<?=$perm->auth_read;?>" <?php } elseif( $function->function_id==$perm->function_id && $perm->auth_read==0) { ?> value="<?=$perm->auth_read;?>" <?php } }?> /><input type="checkbox"  onclick="this.previousSibling.value=1-this.previousSibling.value" <?php foreach($permissions as $perm){ if($function->function_id==$perm->function_id){ ?><?=(!empty($perm->auth_read) && $perm->auth_read==1)?'checked':'' ?> <?php } }?> /> 
													 </label>
												 </div>
												</td>
												<td>
												 <div class="controls">
													 <label class="checkbox">
													 
														<input type="hidden"  name="execute[]"  <?php foreach($permissions as $perm){ if($function->function_id==$perm->function_id && $perm->auth_execute==1){ ?> value="<?=$perm->auth_execute?>" <?php } elseif ($function->function_id==$perm->function_id && $perm->auth_execute==0) { ?> value="<?=$perm->auth_execute?>" <?php }   } ?> /><input type="checkbox"  onclick="this.previousSibling.value=1-this.previousSibling.value"  <?php foreach($permissions as $perm){ if($function->function_id==$perm->function_id){ ?><?=(!empty($perm->auth_execute) && $perm->auth_execute==1)?'checked':'' ?>  <?php } }?> /> 
													  
													 </label>
												 </div>
												</td>
											</tr>
											
											<?php  } ?>
											 
												
										</tbody>
									</table>
									   </br>
									   <div class="form-actions">
										  <button type="submit" class="btn btn-primary">Submit</button>
										  <button type="button" class="btn">Cancel</button>
									   </div>
								</form>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
			</div>