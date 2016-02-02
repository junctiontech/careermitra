
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Xenon Boostrap Admin Panel" />
	<meta name="author" content="" />
	
	<title>Admin Page</title>

	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
	<link rel="stylesheet" href="<?=base_url();?>/../assets/fonts/linecons/css/linecons.css">
	<link rel="stylesheet" href="<?=base_url();?>/../assets/fonts/fontawesome/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="<?=base_url();?>/../css/bootstrap.css">
	<link rel="stylesheet" href="<?=base_url();?>/../css/xenon-core.css">
	<link rel="stylesheet" href="<?=base_url();?>/../css/xenon-forms.css">
	<link rel="stylesheet" href="<?=base_url();?>/../css/xenon-components.css">
	<link rel="stylesheet" href="<?=base_url();?>/../css/xenon-skins.css">
	<link rel="stylesheet" href="<?=base_url();?>/../css/custom.css">

	<script src="<?=base_url(); ?>/assets/js/jquery-1.11.1.min.js"></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	
</head>

<body class="page-body">
		
	<nav class="navbar horizontal-menu navbar-fixed-top"><!-- set fixed position by adding class "navbar-fixed-top" -->
		
		<div class="navbar-inner">
		
			<!-- Navbar Brand -->
			<div class="navbar-brand">
			<a href="<?=base_url();?>index.php/CareerMitra/Adminindex"><h2 style="color:white"> CareerMitra</h2></a>
				
				
			</div>
				
			<!-- Mobile Toggles Links -->
			<div class="nav navbar-mobile">
			
				<!-- This will toggle the mobile menu and will be visible only on mobile devices -->
				<div class="mobile-menu-toggle">
					<!-- This will open the popup with user profile settings, you can use for any purpose, just be creative -->
					<a href="#" data-toggle="settings-pane" data-animate="true">
						<i class="linecons-cog"></i>
					</a>
					
					<a href="#" data-toggle="user-info-menu-horizontal">
						<i class="fa-bell-o"></i>
						<span class="badge badge-success">7</span>
					</a>
					
					<a href="#" data-toggle="mobile-menu-horizontal">
						<i class="fa-bars"></i>
					</a>
				</div>
				
			</div>
			
			<div class="navbar-mobile-clear"></div>
			
			
			
					
			
<!---------------------------------------------------------- notifications and other links
--------------------------------------------------------------------------------------------------->



		<ul class="nav nav-userinfo navbar-right">
				
				
				
				<li class="dropdown xs-left">
					
					<a href="#" data-toggle="dropdown" class="notification-icon">
						
				</li>
				
				
			
				
<!--------------Userprofile---------------------------------------------------------------------------------------------->	
	
	
	
	<?php $userdata =$this->session->userdata('user_data');
	
	      $name= $userdata['First_name'];
	?>
				<li class="dropdown user-profile">
					<a href="#" data-toggle="dropdown">
						<img src="<?=base_url();?>/../assets/images/user-1.png" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
						<span>
							<?php echo $name;?>
	
	
							<i class="fa-angle-down"></i>
						</span>
					</a>
					
					<ul class="dropdown-menu user-profile-menu list-unstyled">
						
						<li class="last">
							<a href="<?=base_url();?>index.php/Loginpg/logout">
								<i class="fa-lock"></i>
								Logout
							</a>
						</li>
					</ul>
				</li>
				
		</div>
		
	</nav>
	
	<!-------------------------------------------------------Sidebar menu--------------------------------
	------------------------------------------------------------------------------------------------------------->
	
	<div class="page-container">
	
		<div class="sidebar-menu toggle-others fixed">
			
			<div class="sidebar-menu-inner">	
						
				
						
				<ul id="main-menu" class="main-menu">
				
					
					<li>
						<a href="<?=base_url();?>index.php/Careerpg/Mngcaindex">
							<i class="fa-cog"></i>
							<span class="title">Manage Career</span>
						</a>
						</li>
					
					<li>
						<a href="javascript">
							<i class="fa-book" ></i>
							<span class="title">Manage Exam</span>
						</a>
					<ul>
					
						<li>
						<a href="<?=base_url();?>index.php/Exampg/Mngexindex">Exam Type</a>
						</li>
						
						<li>
						<a href="<?=base_url();?>index.php/Exampg/Mngexindex1">Exam </a>
						</li>
						
						<li>
						<a href="<?=base_url();?>index.php/Exampg/Mngexindex2">Exam Detail</a> 
						</li>
						
					</ul>
					</li>
					
					<li>
						<a href="Javascript">
						<i class="fa-star"></i>
							<span class="title">Manage Jobs</span>
						</a>
					<ul>
						<li>
						<a href="<?=base_url();?>index.php/Jobpg/Mngjbindex">Job type</a>
						</li>
						
						
					</ul>
					</li>
					<li>
							<a href="Javascript">
							<i class="fa-institution"></i>
							<span class="title">Manage Institute</span>
						</a>
					<ul>
						<li>
							<a href="<?=base_url();?>index.php/Institutepg/Mnginsindex">Institute  type</a>
						</li>
						<!--<li>
						<a href="Javascript">Register Institute</a>
						</li>-->
						
					</ul>
					</li>
				<!--	<li>
						<a href="Javascript">
							<i class="fa-picture-o"></i>
							<span class="title">Manage Gallery</span>
						</a>
					<ul>
						<li>
						<a href="<?=base_url();?>index.php/Managegallery1">Add Pictures</a>
						</li>
						<li>
						<a href="<?=base_url();?>index.php/Managegallery2">View Pictures</a>
						</li>
						
					</ul>
						
					</li>-->
					<li>
						<a href="<?=base_url();?>index.php/Careermitra/index5">
							<i class="fa-cog"></i>
							<span class="title">Manage Introduction</span>
						</a>
					
						
					</li>
					<li>
						<a href="<?=base_url();?>index.php/Careermitra/index6">
							<i class="fa-star"></i>
							<span class="title">Manage Notification</span>
						</a>
						
					</li>
					
					<li>
						<a href="<?=base_url();?>index.php/Institutepg/Degindex">
							<i class="fa-star"></i>
							<span class="title">Manage Degree</span>
						</a>
						
					</li>
					
					<li>
						<a href="<?=base_url();?>index.php/Institutepg/Maindex">
							<i class="fa-star"></i>
							<span class="title">Manage Mapping</span>
						</a>
						
					</li>
					<li>
						<a href="<?=base_url();?>index.php/Institutepg/Maindex1">
							<i class="fa-star"></i>
							<span class="title">Manage Mapping1</span>
						</a>
						
					</li>
					<li>
						<a href="<?=base_url();?>index.php/Exampg/index4">
							<i class="fa-cog"></i>
							<span class="title">Manage Subject</span>
						</a>
						
					</li>
					<li>
						<a href="<?=base_url();?>index.php/Loginpg/mentoractive">
							<i class="fa-cog"></i>
							<span class="title">Manage Mentor</span>
						</a>
					
						
					</li>
					<!--<li>
						<a href="<?=base_url();?>index.php/Managearticle">
							<i class="fa-book"></i>
							<span class="title">Manage Article</span>
						</a>
					</li>-->
					<li>
						<a href="<?=base_url();?>index.php/Exampg/index3">
							<i class="fa-book"></i>
							<span class="title">Manage Papers</span>
						</a>
					</li>
						
					<li>
						<a href="<?=base_url();?>index.php/Managerole/manage_users">
							<i class="fa-user"></i>
							<span class="title">Manage User</span>
						</a>
					</li>
					<li>
						<a href="<?=base_url();?>index.php/Managerole/role_management">
							<i class="fa-user"></i>
							<span class="title">Manage Role</span>
						</a>
					</li>
						
					<li>
							<a href="javascript">
								<i class="fa-star"></i>
								<span class="title">Manage Webinfo</span>
							</a>
						<ul>	
							<li><a href="<?=base_url();?>index.php/Careermitra/index3">About Us</a>
							</li>
						
							<li><a href="<?=base_url();?>index.php/Careermitra/index4">Contact Us</a>
							</li>
						</ul>	
					</li>	
				</ul>
							
						
					
				
							
						
			</div>
			
		</div>


