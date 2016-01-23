<div class="container">

	<div class="breadcrumb-env">
					
		<ol class="breadcrumb bc-1" style="margin-left:20px" "margin-top:0px">
			<li><a href="<?=base_url();?>"><i class="fa-home"></i>Home</a></li>
			<li class="active"><a href="<?=base_url();?>/../index.php/Loginpg/stpro">profile</a></li>
		</ol>
								
	</div>
	
	
	
	<!-----------------------------body--------------profile view--
-------------------------------------------------------------->

<div class="col-lg-12 col-sm-12">
    <div class="card hovercard">
        <div class="card-background">
            <img class="card-bkimg" alt="" src="<?=base_url();?>img/16.jpg">
           
        </div>
		<?php foreach ($student as $studentshow){?>
        <div class="useravatar">
            <?php if(!empty($studentshow->Image)){?>
        <img src="<?=base_url();?>/uploaded_images/<?=isset($studentshow->Image) ?$studentshow->Image:''?>" class="avatar img-circle img-thumbnail" style="height:200px; width:200px">
         <?php } else {?>
		 <img src="<?=base_url();?>/assets/images/user-2.png" style="height:200px; width:200px">
		<?php } ?>
        </div>
        <div class="card-info"> <span class="card-title">
				<h3 style="margin-top:10px"><?=isset ($studentshow->First_name) ?$studentshow->First_name:''?>
					<?=isset ($studentshow->Last_name) ?$studentshow->Last_name:''?></h3>
					<?=isset ($studentshow->role_id) ?$studentshow->role_id:''?>
				</span>

        </div>
		<?php }?>
    </div>
   <!-- <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <div class="hidden-xs">Stars</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                <div class="hidden-xs">Favorites</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Following</div>
            </button>
        </div>
    </div>-->


 <div class="col-lg-12 col-sm-12">
   
   
          <div class="panel panel-info" style="margin-top:20px">
            <div class="panel-heading">
              <h1 class="panel-title" style="margin-top:10px">Profile</h1>
            </div>
            <div class="panel-body">
              <div class="row">
               
                
                <div class=" col-md-12 col-lg-12 "> 
                  <table class="table table-user-information">
                    <tbody>

			<?php foreach ($student as $studentshow){?>
					<tr><td>
						<h4 style="color:#8079c9;margin-top:15px">Personal information</h4>
						<td></tr>
					<tr>
                        <td>Gender</td>
                        <td><?=isset ($studentshow->Gender) ?$studentshow->Gender:''?></td>
                     </tr>

                     
                     <tr>
                        <td>Contact no</td>
                        <td><?=isset ($studentshow->Contact_no) ?$studentshow->Contact_no:''?></td>
                     </tr>

					<tr>
                        <td>Email Address</td>
                        <td><?=isset ($studentshow->usermailid) ?$studentshow->usermailid:''?></td>
                     </tr>
                   

					<tr><td><h4 style="color:#8079c9; margin-top:15px"> Qualification</h4></td></tr>

					<tr>
					
                        <td>Education detail</td>
                        <td><?=isset ($studentshow->Qualification) ?$studentshow->Qualification:''?></td>
							
                     </tr>
                      <tr>
                        <td>Current job</td>
                        <td><?=isset ($studentshow->Current_job) ?$studentshow->Current_job:''?></td>
                      </tr>
                        <td>More Detail</td>
                        <td><?=isset ($studentshow->More_info) ?$studentshow->More_info:''?></td>  
                      </tr>

					
				<?php }?>
                    
                    </tbody>
                  </table>
                  
                 
                </div>
          
            </div>
                 <div class="panel-footer">
                        
                            <a href="edit.html" data-original-title="Edit my profile" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Delete my account" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                    </div>
            
          </div>
        </div>
     



<!------------------------------------------------------------------------------------------------------->
