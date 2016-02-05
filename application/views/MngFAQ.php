

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
							
							<form role="form" class="form-horizontal" method="post" action="<?=base_url();?>index.php/FAQpg/insert">
					<div class="form-group">	
							<input type="hidden" name="id" value="<?=isset($updatedata[0]->Faq_id) ?$updatedata[0]->Faq_id:''?>"/>
						<label class="col-sm-2 control-label">Select option </label>
									
									<div class="col-sm-10" >
										
										
											<select class="form-control" name="Type">
											<Option value="">Select</option>
											
											<?php foreach($intro1 as $intro1show){?>
									
											<Option value= "<?=isset($intro1show->Type_id)?$intro1show->Type_id:''?>"<?php if(!empty($updatedata[0]->Type))
											{ if($updatedata[0]->Type==$intro1show->Type)
											{  echo"selected"; }   }?>>
											<?=isset($intro1show->Type)?$intro1show->Type:''?></option> 
											<?php }?>
										
											</select>
									</div>
					
							<label class="col-sm-2 control-label" style="margin-top:10px" for="field-1">Question</label>
								<div class="col-sm-10" style="margin-top:10px">
										<input type="text" class="form-control" name="Ques" value="<?=isset($updatedata[0]->Ques)?$updatedata[0]->Ques:''?>"></input>
								</div>
							
							
							
							<label class="col-sm-2 control-label" style="margin-top:10px" for="field-1">Answer</label>
									
								<div class="col-sm-10" style="margin-top:10px">
										<textarea class="form-control" name="Ans" cols="5" id="field-5"><?=isset($updatedata[0]->Ans)?$updatedata[0]->Ans:''?></textarea>
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
								<th>Type</th>
								<th>Question</th>
								<th>Answer</th>
								
								<th>Action</th>
							</tr>
						</thead>
					
						<tfoot>
							<tr>
								<th>Type</th>
								<th>Question</th>
								<th>Answer</th>
								
								<th>Action</th>
							</tr>
						</tfoot>
					
						<tbody>
						<?php foreach($notify as $notifyshow) {?>
						
							<tr>
								<td><?=isset ($notifyshow->Type) ?$notifyshow->Type:''?></td>
								<td><?=isset ($notifyshow->Ques) ?$notifyshow->Ques:''?></td>
								<td><?=isset ($notifyshow->Ans) ?$notifyshow->Ans:''?></td>
								
							
								<td><a href="<?=base_url();?>index.php/FAQpg/delete/<?=isset($notifyshow->Faq_id) ?$notifyshow->Faq_id:''?>">
								<i class= "fa-trash"></i></a>
								
								<a href="<?=base_url();?>index.php/FAQpg/index1/<?=isset($notifyshow->Faq_id)?$notifyshow->Faq_id:''?>">
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