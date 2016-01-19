<div class="main-content">
		
	<div class="row">
		<div class="col-sm-12">
			
		<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Manage user role </h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
								<a href="<?=base_url();?>index.php/Managerole/manage_users">
					<button class="btn btn-theme btn-info btn-icon btn-sm"><i class="fa-plus"></i><span>Add Users</span></button>
					</a>
							</div>
					</div>



			<div class="panel-body">
				<?php  if($this->session->flashdata('message')) { ?>
				<div class="row-fluid">
					<div class="alert alert-success">
						<strong><?=$this->session->flashdata('message')?></strong> 
					</div>
				</div>
				<?php } ?>
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
				<div class="" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">					
					<table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>User id</th>
								<th>Name</th>
								<th>Role</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>User id</th>
								<th>Name</th>
								<th>Role</th>
								<th>Action</th>
							</tr>
						</tfoot>
						
						<tbody>
							<?php  foreach ($su_verify_list as $list){ ?>
								<tr>
								<form method="post" action="<?=base_url();?>index.php/Managerole/edit_role_assign/<?=$list->user_id;?>">
								<input type="hidden" name="id" value="<?=$list->user_id;?>"/>
									<td><?=isset($list->user_id)?$list->user_id:''?></td>
									<td><?=isset($list->First_name)?$list->First_name:''?></td>
									<td>
										<select name="role_id" class="form-control selectboxit">
											
											<optgroup label="Role">
												<?php  foreach($role_list as $lists){ ?>
											<option value="<?=$lists->role_id?>"<?=(!empty($list->role_id) && $list->role_id==$lists->role_id)?'selected':'' ?> ><?=$lists->role_id; ?></option>
												<?php } ?>
											</optgroup>
											
										</select>
									</td>
									
									<td>
									<button class="btn btn-small show-tooltip" type="submit" value="submit"  title="edit" ><i class="fa fa-check"></i> Assign</button>
										<a class="btn btn-small btn-danger show-tooltip" title="Delete" onClick="return confirm('Are you sure to delete this user? This will delete all the related records on this user as well.')" href="<?=base_url()?>index.php/Managerole/delete_user/<?=$list->user_id?>"><i class="fa fa-times"></i> Delete</a>
										<a class="btn btn-small btn-primary show-tooltip"  title="Block/Unblock" href="<?=base_url()?>index.php/Managerole/blocked_user/<?=$list->user_id?>"><i class="fa fa-ban"></i> Block</a>
									</td>
									</form>
									</tr>
								
							<?php }?>
						</tbody>
					</table>	
						
						
						
						
					
				</div>
			</div>
		</div>			
			</div>
		</div>
	</div>
</div>
