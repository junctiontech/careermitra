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
							<h3 class="panel-title">Add role </h3>
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
						
										<strong>Add  Role</strong>
								</li>
							
								</ol>
								
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
					<div class="" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">					
					<form action="<?php echo base_url(); ?>index.php/Managerole/insert_role" method="POST" class="validate">
								
								   <div class="control-group">
                                        <div class="controls">
                                         		<input type="text" placeholder="Role Name" id="space" name="role" class="form-control" validate="required" />
                                        </div>
                                    </div>
									</br>
									<div class="control-group">
                                        <div class="controls">
                                         	<input type="text" placeholder="Role Description" name="role_description" id="role_description" required  class="form-control" />
                                        </div>
                                    </div>
									</br>
									</br>
								    <table class="table table-striped table-bordered ">
										<thead>
											<tr>
												<th>Functions</th>
												<th>Read</th>
												<th>Execute</th>
											</tr>
										</thead>
										<tbody>
											<tr>
											<?php foreach($list_function as $list){
												?>
												<input type="hidden" readonly name="edit_costing" id="edit_costing" value="1" />
												<td>
													<input type="checkbox" id="<?=$list->function_id?>" value="<?php echo $list->function_name; ?>" checked name="function[]" /><?php echo $list->function_name; ?>
												</td>
												
												<td>
												 <div class="controls">
													 <label class="checkbox">
													 	<input type="hidden" name="read[]" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
													 </label>
												 </div>
												</td>
												<td>
												 <div class="controls">
													 <label class="checkbox">
													 <input type="hidden" name="execute[]" value="0"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
														
													 </label>
												 </div>
												</td>
											</tr>
											<?php } ?>
											
										</tbody>
									</table>
								</br>
								   <div class="form-actions">
                                      <button type="submit" onclick="" class="btn btn-primary">Submit</button>
                                      <button type="button" class="btn">Cancel</button>
                                   </div>
					</form>
					</div>			
				</div>
			</div>
					
				</div>
		</div>
	</div>
</div>


