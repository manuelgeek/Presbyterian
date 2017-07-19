<?php

include_once 'db.php';
include 'login.php';

	if(!isset($_SESSION['userSession']))
{
	header("Location: ../home.html");
}

$query = "SELECT * FROM presb_users WHERE user_email='$_SESSION[userSession]'";
$account1 = mysqli_query($MySQLi_CON,$query) or die (mysqli_error());
$account = mysqli_fetch_array($account1);


if(isset($_POST['phone']))
{
	$user_name = $MySQLi_CON->real_escape_string(trim($_POST['user_name']));
	$phone_no = $MySQLi_CON->real_escape_string(trim($_POST['phone_no']));
	$id_no = $MySQLi_CON->real_escape_string(trim($_POST['id_no']));
	$gender = $MySQLi_CON->real_escape_string(trim($_POST['gender']));
	$user_skills = $MySQLi_CON->real_escape_string(trim($_POST['user_skills']));

	
	
	$query2 = $MySQLi_CON->query("SELECT  phone_no,user_name,gender,id_no, user_skills FROM presb_users WHERE user_email='$_SESSION[userSession]'");
	$row=$query2->fetch_array();

	$updateQuery1 = "UPDATE presb_users SET phone_no='$phone_no', user_name='$user_name', gender='$gender', id_no='$id_no', user_skills='$user_skills' WHERE user_email='$_SESSION[userSession]'";
		mysqli_query($MySQLi_CON,$updateQuery1);

		if($MySQLi_CON->query($updateQuery1)){
				$successMSG = "Details Added Successfully";
				header("refresh:3;account"); // redirects image view page after 5 seconds.
			}else{
				$errorMSG = "Details Failed to add";
			}



}
$MySQLi_CON->close();
?>

<!--*************PHP PROFILE PHOTO******-->
<?php

include_once 'db.php';

if ($account['user_photo']=="") {
	$msg4 = "<img src='../img/user.png' style='border-radius:6px; border:8px solid #fff; padding:0px;' height=150px />";
}//else {
	//$msg4 = "";
//}



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
		 <link rel="shortcut icon" href="../images/asawa.jpg">
	
		<title>Presbyterian Weavers account</title>
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
							<li  class="active"><a href="account">Account</a></li>
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
	<section class="wholebody">
	<div class="col-md-3  row-eq-height" id="sidedar">
		 <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <div class="config-icon hvr-outline-out"><img src="../images/settings.svg"></div>
                </button>
                <a class="navbar-brand" href="#" > PRESBYTERIAN ACCOUNT</a>
            </div>

        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side navbar-collapse" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                             <?php
							if(isset($msg4)){
								echo $msg4;
							} else {
								?>

							

							<img src="user_images/<?php echo $account['user_photo']; ?>"  style="border-radius:6px; border:8px solid #fff; padding:0px;"  height=150px />
							<?php
						}?>
                            <div class="inner-text">
                                <?php echo $account['user_name'];?>
                            <br />
                                <small>Email:  <b> <?php echo $account['user_email'];?> </b>    </small><br>
                                
                            </div>
                        </div>

                    </li>
                    <li>
                         <a href="account?page=new_page"><i class="fa fa-envelope" ></i>News Page</a>
                    </li>

                     <li>
                        <a href="account?page=profile"><i class="fa fa-user "></i>Profile</a>
                    </li>
                    <li>
                        <a  href="updateinfo" ><i class="fa fa-info "></i>Update Info</a>  <!--class="active-menu"-->
                    </li>
                    <li>
                        <a href="uploadpic" ><i class="fa fa-photo "></i>Upload Picture </a>
                         
                    </li>
                     
                    <li>
                        <a href="changepass"><i class="fa fa-lock "></i>Change Password </a>
                        
                    </li>
                     <li>
                        <a href="../asawacon.pdf"><i class="fa fa-book "></i>View CV</a>
                         
                    </li>
                     
                     
                    <li>
                        <a href="deleteac"><i class="fa fa-remove " ></i>Delete Account</a>
                    </li>
                    <li>
                        <a href="logout"><i class="fa fa-sign-out " name="logout"></i>LOG OUT </a>
                        
                    </li>
                   <li>
                        <a <?php if ($account['id_no']== 32135711 || $account['id_no']== 11223344) {
                        	echo "href='adminn'";
                        } 
                        else {
                        	echo "href='account'";
                        }

                        ?>> <i class="fa fa-lock "></i> Administrator</a>
                         
                    </li>
                   
                   
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
	</div> 

	<div class="col-md-9">	
		<div class="container">
		
					<div class="page-header">
				    	<h1 class="title">Add Your Details </h1>
				    </div>

				    <?php
					if(isset($successMSG)){
							?>
				            <div class="alert alert-success col-md-10">
				            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $successMSG; ?></strong>
				            </div>
				            <?php
					}
					?>
					
				    <?php
					if(isset($errorMSG)){
							?>
				            <div class="alert alert-danger col-md-10">
				            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errorMSG; ?></strong>
				            </div>
				            <?php
					}
					?>

	    								<div class="col-md-6 col-md-offset-3">
										<h5 class="nomn">Your details will display after refreshing page</h5>
											<p ><b>Your Name:</b>  <?php if($account['user_name']==''){echo "No Name Yet";}else{ echo $account['user_name'];}?>  </p>
											<p ><b>Current Phone Number:</b>  <?php if($account['phone_no']==''){echo "No Number";}else{ echo $account['phone_no'];}?>  </p>
											<p ><b>ID Number:</b>  <?php if($account['id_no']=='' || $account['id_no']==0){echo "No ID Number";}else{ echo $account['id_no'];}?>  </p>
											<p ><b>Gender</b>  <?php if($account['gender']==''){echo "Uknown";}else{ echo $account['gender'];}?>  </p>
											<p ><b>Personal Skills</b>  <?php if($account['user_skills']==''){echo "Not Filled";}else{ echo $account['user_skills'];}?>  </p>
									
										</div>
										<div class="modal-body">
											<form class="form-horizontal" action="#" method="post">
												<div class="form-group">
													<label class="col-md-4 col-md-offset-1"> Your Full Names:</label>
													<div class="col-md-5">
														<input type="text" class="form-control input-sm" placeholder="Full Names" name="user_name" required />
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 col-md-offset-1"> Change Phone Number:</label>
													<div class="col-md-5">
														<input type="text" class="form-control input-sm" placeholder="+254 Phone Number" name="phone_no" required />
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 col-md-offset-1"> ID Number:</label>
													<div class="col-md-5">
														<input type="text" class="form-control input-sm" placeholder="Your ID NO" name="id_no" required />
													</div>
												</div>	
												<div class="form-group">
													<label class="col-md-4 col-md-offset-1"> Gender</label>
													<div class="col-md-5 radioo">
														<ul>
															<li><input type="radio" class=" input-sm" value="MALE" name="gender" required ><span>MALE</span></li>
															<li><input type="radio" class=" input-sm" value="FEMALE" name="gender" required /><span>FEMALE </span></li>
														</ul>
													</div>
												</div>	
												<div class="form-group">
													<label class="col-md-4 col-md-offset-1"> Personal Skills</label>
													<div class="col-md-5">
														<input type="text" class="form-control input-sm" placeholder="PHP, Java, Graphics..." name="user_skills" required />
													</div>
												</div>		
													
												<div class="form-group">
													<div class="col-md-2 col-md-offset-8">
														<input type="submit" class="btn bnt-success" name="phone" value="Update Info" title="click to Update" onclick="return confirm('Make sure these info are valid!!')"/>
													</div>
												</div>	
											</form>
										</div>



				<div class="alert alert-info col-md-9">
				   <p class="nnot">We may use this to contact you directly</p>
				</div>
		</div>
    

	</div><div class="clearfix"></div>
<!--.....................FOOTER START>>>>>>>>>>>>>>>>>-->
	</section>
		<section>
			<div class="container" id="register">
			  <div class="row">
				<div class="col-lg-3 col-md-3 col-sm-3">
				  <div class="single-footer-widget">
					<div class="section-heading">
					<h2 class="reg">Register</h2>
					<div class="line"></div>
				  </div>           
				  <p>In order for the Presbyterian Weavers members to access their accounts for the first time,follow the following simple steps. In case of any problems,our support team is always ready to help</p>
				  </div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3">
				  <div class="single-footer-widget">
					<div class="section-heading">
					<h2 class="reg">How to Register</h2>
					<div class="line"></div>
				  </div>
				  <ul class="footer-service">
					<li><span class="fa fa-check"></span>Enter your Email address</li>
					<li><span class="fa fa-check"></span>Enter default passwords</li>
					<li><span class="fa fa-check"></span>Go to Change Password</li>
					<li><span class="fa fa-check"></span>Choose Passsword of Your Choice </li>
					<li><span class="fa fa-check"></span>Enjoy our services</li>
				  </ul>
				  </div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3">
				  <div class="single-footer-widget">
					<div class="section-heading">
					<h2 class="reg">Tags</h2>
					<div class="line"></div>
				  </div>
					<ul class="tag-nav">
					  <li><a href="home">Our Page</a></li>
					  <li><a href="php/logpage">Login</a></li>
					  <li><a href="about">Presbyterian Weavers</a></li>
					  <li><a href="https://www.facebook.com/Presbyterian-Weavers-of-Kenya-377229792412452/?hc_ref=SEARCH" target="_blank">FB</a></li>
					  <li><a href="presb.pdf" target="_blank">Constitution </a></li>
					  <li><a href="contact">Contact</a></li>
					</ul>
				  </div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3">
				  <div class="single-footer-widget">
					<div class="section-heading">
					<h2 class="reg">Contact Info</h2>
					<div class="line"></div>
				  </div>
				  <p>For more information about us you can get in touch with us.</p>
				  <address class="contact-info">
					<p><span class="fa fa-home"></span>P.O Box, 
					30784-00100, Nairobi</p>
					<p><span class="fa fa-phone"></span>+254728700535,+254716590576</p>
					<p><span class="fa fa-envelope"></span>info@presbyterianweavers.co.ke</p>
				  </address>
				  </div>
				</div>
			 </div>
			</div>
		</section>	
			
<footer>
			 <div class="footer-middle">
				<div class="container">
				  <div class="row">
				  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="footer-copyright">
					  <p>&copy; Copyright 2016 <a href="home">Presbyterian Weavers</a></p>
					</div>
				  </div>
				  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="footer-social">              
						<a href="#"><span class="fa fa-facebook"></span></a>
						<a href="#"><span class="fa fa-twitter"></span></a>
						<a href="#"><span class="fa fa-google-plus"></span></a>
						<a href=""><span class="fa fa-linkedin"></span></a> 
						<!--<a href=""><span class="fa fa-instagram"></span></a>-->						
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
		
	</body>






</html>
