<?php
include_once 'db.php';
include 'login.php';


if(isset($_SESSION['userSession']))
{
	header("Location: account");
}
?>
<?php

include_once'login.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link href="../css/presb.css" rel="stylesheet" type="text/css" />
		 <link href="../css/" rel="stylesheet">
		<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		 <link href="../font/css/font-awesome.css" rel="stylesheet" />
		<script type="text/javascript" src="../js/jquery2.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/main.js"></script>
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
	
		<title>Presbyterian Weavers Sign in</title>
	</head>
	<body>
	<header>
		<div class="container "id="homer">
			<div class="row">
			  <div class="grid_12 rel">
				<h1>
				  <a href="#">
					<img src="../images/logo.jpg" alt="Logo alt">
				  </a>
				</h1>
			  </div>
			</div>
		</div>
		  <section id="stuck_container">
		<section id="stuck_container">
		  <!--==============================
					  Stuck menu
		  =================================-->
			<div class="container "id="navver"">
			  <div class="row">
				<div class="col-md-12 ">
				  <!--.................Nav..............-->
	
			 <div class="navbar navbar-inverse navbar-top"  id="nav">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						
					</div>
					<div class="navbar-collapse collapse" id="aboutnav">
						<ul class="nav navbar-nav navbar-right">
							<li ><a href="../home">Home</a></li>
							<li><a href="../about">About Us</a></li>
							<li><a href="../services">Services</a></li>
							<li><a href="news">News</a></li>
							<li><a href="../contact">Contacts</a></li>
						</ul>
					</div>
           
				</div>
			</div> 
				</div>
		 </div> 
			</div> 
		  </section>
	</header>  
	
	 <!--=========== End Counter SECTION ================-->
  <div class="modal-content modal-popup">
				<a href="#" class="close-link close" data-dismiss="modal" aria-hidden="true" ><i class="fa fa-close"></i></a>
				<h3 class="white">Sign In</h3>

							<?php
							if(isset($msg1)){
								echo $msg1;
							}
							?>
				<form action="" class="popup-form" method="post">
					<input type="email" name="email" class="form-control form-white" placeholder="Email Address">
					<input type="password" name="password" class="form-control form-white" placeholder="Password">
					
					<div class="checkbox-holder">
						<div class="checkbox">
							<input type="checkbox" value="None" id="squaredOne" name="check" />
							<label for="squaredOne"><span>Remember Me</span></label><br><br>
							<label for="squaredOne"><span><a href="changepass">Forgot Password?</a></span></label>
						</div>
					</div>
					<button type="submit" name="btn-login" class="btn btn-submit">Sign In</button>
				</form>
			</div>
		<footer>
			 <div class="footer-middle">
				<div class="container">
				  <div class="row">
				  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="footer-copyright">
					  <p>&copy; Copyright 2016 <a href="index.html">Presbyterian Weavers</a></p>
					</div>
				  </div>
				  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="footer-social">              
						<a href="#"><span class="fa fa-facebook"></span></a>
						<a href="#"><span class="fa fa-twitter"></span></a>
						<a href="#"><span class="fa fa-google-plus"></span></a>
						<a href="#"><span class="fa fa-linkedin"></span></a>     
					</div>
				  </div>
				</div>
				</div>
			  </div>
			   <!-- Start Footer Bottom -->
				  <div class="footer-bottom">
					<div class="container">
					  <div class="row">
						<div class="col-md-12">
						  <p>Designed & Developed By <a rel="nofollow" href="http://www.appslab.co.ke/"><span class="aps">AppsLabb</span></a></p>
						</div>
					  </div>
					</div>
				  </div>
				</footer>
				<!--=========== End Footer SECTION ================-->
		
		<footer>
	
	
	</body>
</html>