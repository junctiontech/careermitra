
<!----------------------------------------------main content----------------------------------------------------------
--------------------------------------------------------------------------------------------------------------->
		
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
							<h3 class="panel-title">Introduction Form</h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
								
							</div>
						</div>
				<div class="panel-body">
							
							<form role="form" class="validate" method="post" action="<?=base_url();?>index.php/Careermitra/insert2">
					<div class="form-group">	
							<input type="hidden" name="id" value="<?=isset($updatedata[0]->Intro_id)?$updatedata[0]->Intro_id:''?>" />
						<label class="col-sm-2 control-label">Select option </label>
									
									<div class="col-sm-10">
										<select class="form-control" data-validate="required" name="Type_id">
											
										<Option value="">Select</option>
										<?php foreach($intro1 as $intro1show){?>
									
										<Option value= "<?=isset($intro1show->Type_id)?$intro1show->Type_id:''?>"<?php if(!empty($updatedata[0]->Type))
										{ if($updatedata[0]->Type==$intro1show->Type)
										{  echo"selected"; }   }?>>
										<?=isset($intro1show->Type)?$intro1show->Type:''?></option> 
										<?php }?>
									
										</select>
											
										</select>
									</div>
					
							
							<label class="col-sm-2 control-label" style="margin-top:10px" for="field-1">Introduction</label>
									
								<div class="col-sm-10" style="margin-top:10px">
								
										<textarea class="form-control"  data-validate="required" name="Description" cols="5" id="field-5"
										onKeyDown="limitText(this.form.Description,this.form.countdown,1000);" 
									onKeyUp="limitText(this.form.Description,this.form.countdown,1000);" ><?=isset ($updatedata[0]->Description) ?$updatedata[0]->Description:''?></textarea></br>
									<font size="1">(Maximum characters: 1000)<br>
									You have <input readonly type="text" name="countdown" size="3" value="1000"> characters left.</font></textarea>
									
									
								</div>
							<label class="col-sm-2 control-label" style="margin-top:10px"for="field-1">Language Id</label>
									
								<div class="col-sm-10" style="margin-top:10px">
									<select class="form-control" data-validate="required" name="Language_id">
									<Option value="">Select</option>
									<?php foreach($lang as $langshow){?>
									
									<Option value= "<?=isset($langshow->Language_id)?$langshow->Language_id:''?>"<?php if(!empty($updatedata[0]->Language_id))
									{ if($updatedata[0]->Language_id==$langshow->Language_id)
									{  echo"selected"; }   }?>>
									<?=isset($langshow->Language_id)?$langshow->Language_id:''?></option> 
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
					<h3 class="panel-title">Introduction View</h3>
					
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
					function limitText(limitField, limitCount, limitNum) {
							if (limitField.value.length > limitNum) {
						limitField.value = limitField.value.substring(0, limitNum);
						} else {
								limitCount.value = limitNum - limitField.value.length;
								}
							}
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
								<th>Introduction</th>
								<th>Language_id</th>
								<th>Action</th>
							</tr>
						</thead>
					
						<tfoot>
							<tr>
								<th>Option</th>
								<th>Introduction</th>
								<th>Language_id</th>
								<th>Action</th>
							</tr>
						</tfoot>
					
						<tbody>
						<?php foreach($intro as $introshow){?>
							<tr>
								<td><?=isset ($introshow->Type) ?$introshow->Type:''?></td>
								<td><?=isset ($introshow->Description) ?$introshow->Description:''?></td>
								<td><?=isset ($introshow->Language_id) ?$introshow->Language_id:''?></td>
								
								<td><a href="<?=base_url();?>index.php/Careermitra/delete2/<?=isset ($introshow->Intro_id) ?$introshow->Intro_id:''?>">
								<i class= "fa-trash"></i></a>
								
								<a href="<?=base_url();?>index.php/Careermitra/index5/<?=isset($introshow->Intro_id)?$introshow->Intro_id:''?>">
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

