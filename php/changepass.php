<?php

include_once 'db.php';
include_once 'login.php';

//if(isset($_SESSION['userSession']))
//{
	//header("Location: ../home");
//}

if(isset($_POST['btn-reset']))
{
	$user_email = $MySQLi_CON->real_escape_string(trim($_POST['user_email']));
	$id_no = $MySQLi_CON->real_escape_string(trim($_POST['id_no']));
	$upass = $MySQLi_CON->real_escape_string(trim($_POST['password']));
	$password_again = $MySQLi_CON->real_escape_string(trim($_POST['password_again']));

	$new_password = password_hash($upass, PASSWORD_DEFAULT);
	
	$query = $MySQLi_CON->query("SELECT user_name, user_email,id_no, password FROM presb_users WHERE user_email='$user_email' AND id_no='$id_no'");
	$row=$query->fetch_array();

	if($upass!=$password_again){
      	$msg3 = "<div class='alert alert-danger col-sm-12 col-md-12''>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Passwords Do Not Match . Try Again !
					</div>";
       }else{
	if ($row['user_email']==$user_email) {
		$updateQuery1 = "UPDATE presb_users SET password='$new_password' WHERE user_email='$user_email'";
		mysqli_query($MySQLi_CON,$updateQuery1);

			if(isset($_SESSION['userSession']))
				{
				//session_start();
				session_destroy();
				unset($_SESSION['userSession']);
				//header("Location: ../home");
				exit();
			}

		$msg3 = "<div class='alert alert-success col-md-12 col-sm-12'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Password successfully Changed !<br>
						<a href='logpage' >Log In to account </a>
					</div>";

	}else {
		$msg3 = "<div class='alert alert-danger col-sm-12 col-md-12'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Email or ID NO does not Match existing Acount details!! <br>
					<p> <a href='../contact'>Contact Admin</a></p>
				</div>";
	}

}
}

	$MySQLi_CON->close();

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
	
		<title>Presbyterian Weavers Reset Passord</title>
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


<div class="col-md-12">
<div class="container" id="change">
	<div class="row">


		<div class="login-form col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
						  <h2 class=" title">Reset your password</h2>

						 <?php
							if(isset($msg3)){
								echo $msg3;
							}
							?>
						
						  <form action="" method="post">

							<div class="form-group col-md-12 col-sm-12">
							<label class="login-field-icon fui-user" for="login-email">Enter Your Email here</label>
							  <input type="email" name="user_email" class="form-control login-field" value="" placeholder="Enter your email" id="login-email" required />
							  
							</div>

							<div class="form-group col-md-12 col-sm-12">
							<label class="login-field-icon fui-user" for="login-email">Enter Your ID No here</label>
							  <input type="number" name="id_no" class="form-control login-field" value="" placeholder="Enter your I.D number" id="login-email" required />
							  
							</div>
							

							<div class="form-group col-md-12 col-sm-12">
							<label class="login-field-icon fui-lock" for="login-pass"> Enter Your New Password</label>
							  <input type="password" name="password" class="form-control login-field" value="" placeholder="Password" id="login-pass" required />
							   <span class="help-block" id="error"></span>

							</div>
							<div class="form-group col-md-12 col-sm-12">
							 <label class="login-field-icon fui-lock" for="login-pass">Confirm your new password</label>
							  <input type="password" name="password_again" class="form-control login-field" value="" placeholder="Confirm Password" id="login-pass" required />
							 
							</div>
							<div class="form-group col-md-12 col-sm-12">
							<input name="btn-reset" class="btn btn-primary btn-lg btn-block" value="Reset Password" type="submit"/><br>
							 <span class="help-block" id="error"></span>

							</div>
						</form>
				
			 </div>


	</div>
</div>

</div><div class="clearfix"></div>


<footer>
			 <div class="footer-middle">
				<div class="container">
				  <div class="row">
				  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="footer-copyright">
					  <p>&copy; Copyright 2016 <a href="../home">Presbyterian Weavers</a></p>
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
						  <p>Designed & Developed By <a rel="nofollow" href="http://www.appslab.co.ke/"><span class="aps">AppsLab</span></a></p>
						</div>
					  </div>
					</div>
				  </div>
				</footer>
				<!--=========== End Footer SECTION ================-->
		
		<footer>
	
	
	</body>
</html>