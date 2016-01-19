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
    <link href="<?=base_url();?>/../css/xenon-core.css" rel="stylesheet"> 
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
 
<div class="navbar-wrapper">
  <div class="container">

        <nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
	<a class="navbar-brand" href="<?=base_url();?>index.php/Aboutuspg" style="font-size:25px">CareerMitra</a>
     
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
            <li><a href="<?=base_url();?>index.php/Aboutuspg">About us</a></li>
            <li><a href="<?=base_url();?>index.php/Contactuspg">Contact us</a></li>
             
          </ul>
     </li>
        
      </ul>
    
  
	<ul class="nav navbar-nav navbar-right">
	<li class="dropdown" >
	
	<?php $userdata =$this->session->userdata('user_data');
		$name=$userdata['First_name'];
	      if(!empty($userdata))
		  { ?>
	  
		<li><span class="glyphicon glyphicon-user"><?php echo $name ?></span></li>
		<li><a href="<?=base_url();?>index.php/Loginpg/logout"><i class="fa-lock">Log out</i></a></li>
		
		<?php  }
		else { ?>
		
		  <a class="dropdown-toggle" data-toggle="dropdown"id="nav2" href="#" ><span class="glyphicon glyphicon-user" >Sign up
          <span class="caret"></span></a>
				<ul class="dropdown-menu">
	<li><a href="<?=base_url();?>index.php/Studentpg"><span class="glyphicon glyphicon-user">Student</a></li>
	<li><a href="<?=base_url();?>index.php/Mentorpg"><span class="glyphicon glyphicon-user">Mentor</a></li>
	</ul></li>
	<li><a href="<?=base_url();?>index.php/Loginpg"><span class="glyphicon glyphicon-log-in">Login</a></li>
	
		<?php }?>
	</ul>
	
	</div>
          
        </nav>

    </div>
    </div>
	</div>
	</div>
	
	
 