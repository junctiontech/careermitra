<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <title>CareerMitra</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url();?>/../carousel_files/bootstrap.min.css" rel="stylesheet">
<link href="<?=base_url();?>/../css/custom.css" rel="stylesheet">

   <link href="<?=base_url();?>/../css/xenon-forms.css" rel="stylesheet"> 
   <!--<link rel="stylesheet" href="<?=base_url();?>/../css/bootstrap.css">-->
    <link href="<?=base_url();?>/../css/xenon-core.css" rel="stylesheet"> 
	 <link href="<?=base_url();?>/../css/navbar.css" rel="stylesheet">
	<link href="<?=base_url();?>/../css/xenon-skins.css" rel="stylesheet">
	<link href="<?=base_url();?>/../css/xenon-components.css" rel="stylesheet">
    <link href="<?=base_url();?>/../carousel_files/ie10-viewport-bug-workaround.css" rel="stylesheet">
	<script src="<?=base_url();?>/../carousel_files/ie-emulation-modes-warning.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="<?=base_url();?>/../carousel_files/carousel.css" rel="stylesheet">
  </head>


<!-- NAVBAR
================================================== -->
 
<!--<div class="navbar-wrapper">-->
	
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?=base_url();?>index.php/Careermitra/index1" style="font-size:25px">CareerMitra</a>
     
				</div>
    
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
	   
					<li class="active"><a href="<?=base_url();?>"><i class="fa fa-home fa-x"></i></a></li>
					<li><a href="<?=base_url();?>index.php/Careerpg">Career</a></li>
					<li><a href="<?=base_url();?>index.php/Exampg">Exams</a></li>
					<li><a href="<?=base_url();?>index.php/Jobpg">Jobs</a></li>
					<li><a href="<?=base_url();?>index.php/Institutepg">Institutes</a></li>
					<!--<li><a href="<?=base_url();?>index.php/Gallerypg">Gallery</a></li>
					<!--<li class="dropdown" >
		
						<a class="dropdown-toggle" data-toggle="dropdown"id="nav1" href="#">Forum
							<span class="caret"></span></a>
							<ul class="dropdown-menu">
							<li><a href="<?=base_url();?>index.php/Askquerypg">Ask query</a></li>
							<li><a href="<?=base_url();?>index.php/Blogpg">Blog</a></li>
							<li><a href="<?=base_url();?>index.php/Mentorpg">Mentors</a></li> 
							</ul>
							</li>-->
		 
					<li class="dropdown" >
						<a class="dropdown-toggle" data-toggle="dropdown"id="nav2" href="#">Contact us
				<span class="caret"></span></a>
						<ul class="dropdown-menu">
						<li><a href="<?=base_url();?>index.php/Careermitra/index1">About us</a></li>
						<li><a href="<?=base_url();?>index.php/Careermitra/index2">Contact us</a></li>
						</ul>
					</li>
					<li><a href="<?=base_url();?>index.php/FAQpg">FAQ</a></li>
				</ul>
    
  
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown" >
	
						<?php $userdata =$this->session->userdata('user_data');
							$name=$userdata['First_name'];
							$id=$userdata['user_id'];
							if(!empty($userdata))
							{ ?>
						
					</li>
					
					<li class="dropdown user-profile">
					
						<?php foreach ($student as $studentshow){?>
						<a href="#" data-toggle="dropdown">
						
						<?php if(!empty($studentshow->Image)){?>
						<img src="<?=base_url();?>/uploaded_images/<?=isset($studentshow->Image) ?$studentshow->Image:''?>" alt="user-image" class="img-circle img-inline" height="32" width="35"  style="margin-top:3px"/>
						<?php } else {?>
						<img src="<?=base_url();?>/assets/images/user-2.png" style="height:30px; width:30px">
						<?php } ?>
							
							<span>
								<?php echo $name ?>
								<i class="fa-angle-down"></i>
							</span>
						</a>
					
				
						<ul class="dropdown-menu user-profile-menu list-unstyled">
							<li>
								<a href="<?=base_url();?>index.php/Loginpg/editprofile/<?=isset($studentshow->user_id) ?$studentshow->user_id:''?>">
									<i class="fa-edit"></i>
									Edit profile
								</a>
							</li>
							
							<li>
								<a href="<?=base_url();?>index.php/Loginpg/stpro/<?=isset($studentshow->user_id) ?$studentshow->user_id:''?>">
									<i class="fa-user"></i>
									Profile
								</a>
							</li>
							
							<li class="last">
								<a href="<?=base_url();?>index.php/Loginpg/logout">
									<i class="fa-lock"></i>
									Logout
								</a>
							</li>
						</ul>
	<?php }?>	
					</li>
					
		
		<!--<li><span class="glyphicon glyphicon-user"><?php echo $name ?></span></li>
		<li><a href="<?=base_url();?>index.php/Loginpg/logout"><i class="fa-lock">Log out</i></a></li>-->
		
		<?php  }
		
		else { ?>
		
					<a class="dropdown-toggle" data-toggle="dropdown"id="nav2" href="#" ><span class="glyphicon glyphicon-user" >Sign up
						<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?=base_url();?>index.php/Loginpg/stview"><span class="glyphicon glyphicon-user">Student</a></li>
								<li><a href="<?=base_url();?>index.php/Loginpg/mtview"><span class="glyphicon glyphicon-user">Mentor</a></li>
							</ul>
						<li><a href="<?=base_url();?>index.php/Loginpg"><span class="glyphicon glyphicon-log-in">Login</a></li>
	
						<?php }?>
				</ul>
	
			</div>
          
        </nav>

    
   <!-- </div>-->
	
	
	
 