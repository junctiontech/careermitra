 <!--------------------------------------------Jumbotron-----------------------------------
------------------------------------------------------->
 
<!--<div class="container">
  <div class="jumbotron"> 
	
     <h1>Profile</h1>
  </div>
  
</div>-->

<!-------------------------------------------------------------------->

<div class="container">

	<div class="breadcrumb-env">
					
		<ol class="breadcrumb bc-1" style="margin-left:20px" "margin-top:0px">
			<li><a href="<?=base_url();?>"><i class="fa-home"></i>Home</a></li>
			<li class="active"><a href="<?=base_url();?>/../index.php/Loginpg/stpro">profile</a></li>
		</ol>
								
	</div>
	
	
	<!-----------------------------body------------profile view-------------------
-------------------------------------------------------------->

<div class="col-lg-12 col-sm-12">
    <div class="card hovercard">
        <div class="card-background">
            <img class="card-bkimg" alt="" src="<?=base_url();?>img/16.jpg">
           
        </div>
		<?php foreach ($student as $studentshow){?>
        <div class="useravatar">
            <img alt="user image" src="<?=base_url();?>/uploaded_images/<?=isset($studentshow->Image) ?$studentshow->Image:''?>">
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
                        <td>Date of Birth</td>
                        <td><?=isset ($studentshow->DOB) ?$studentshow->DOB:''?></td>
                      </tr>

                     <tr>
                        <td>Contact no</td>
                        <td><?=isset ($studentshow->Contact_no) ?$studentshow->Contact_no:''?></td>
                     </tr>

					<tr>
                        <td>Email Address</td>
                        <td><?=isset ($studentshow->usermailid) ?$studentshow->usermailid:''?></td>
                     </tr>
                   
					<tr>
                        <td>Address</td>
                        <td>House no-<?=isset ($studentshow->House_no) ?$studentshow->House_no:''?></br></br>
						Street-<?=isset ($studentshow->street) ?$studentshow->street:''?></br></br>
						Line2-<?=isset ($studentshow->Line2) ?$studentshow->Line2:''?></br></br>
						City-<?=isset ($studentshow->City) ?$studentshow->City:''?></br></br>
						State-<?=isset ($studentshow->State) ?$studentshow->State:''?></br></br>
						Zip-<?=isset ($studentshow->ZIP) ?$studentshow->ZIP:''?></td>
                     </tr></tr>

					<tr><td><h4 style="color:#8079c9; margin-top:15px">Education Qualification</h4></td></tr>

						<tr>
					
                        <td>Post graduation detail</td>
                        <td>Post Graduation subject-<?=isset ($studentshow->PG_subject) ?$studentshow->PG_subject:''?></br></br>
							Post Graduation university-<?=isset ($studentshow->PG_university) ?$studentshow->PG_university:''?></td>
                     </tr>
                      <tr>
                        <td>Graduation detail</td>
                        <td>Graduation subject-<?=isset ($studentshow->G_subject) ?$studentshow->G_subject:''?></br></br>
							Graduation university-<?=isset ($studentshow->G_university) ?$studentshow->G_university:''?></td>
                      </tr>
                        <td>School detail</td>
                        <td>School subject-<?=isset ($studentshow->School_subject) ?$studentshow->School_subject:''?></br></br>
							School name-<?=isset ($studentshow->School_name) ?$studentshow->School_name:''?></td>  
                      </tr>

					<tr>
						<td>More information</td>
						<td><?=isset ($studentshow->Other) ?$studentshow->Other:''?></td>
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
