<?php

include_once 'db.php';
include 'login.php';

if(!isset($_SESSION['userSession']))
{
	header("Location: logpage");
}


$query = "SELECT * FROM presb_users WHERE user_email='$_SESSION[userSession]'";
$account1 = mysqli_query($MySQLi_CON,$query) or die (mysqli_error());
$account = mysqli_fetch_array($account1);

//if ($account['id_no']!= 11223344 || $account['id_no']!= 33445566) {
//	header("Location: ../home");
//}



if(isset($_POST['btn-adduser']))
{
	
	$email = $MySQLi_CON->real_escape_string(trim($_POST['email']));
	
	$upass = $MySQLi_CON->real_escape_string(trim($_POST['password']));
	
	
	$new_password = password_hash($upass, PASSWORD_DEFAULT);

$check_email = $MySQLi_CON->query("SELECT user_email FROM presb_users WHERE user_email='$email' ");
	$count=$check_email->num_rows;
	
	if($count==0){
		
		
		$query2 = "INSERT INTO presb_users(user_email, password) VALUES('$email', '$new_password') ";
		
		if($MySQLi_CON->query($query2))
		{
			$msg = "<div class='alert alert-success col-md-7 col-sm-7'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered the user!
					</div>";
					
		}
		else
		{
			$msg = "<div class='alert alert-danger col-md-7 col-sm-7'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
					</div>";
		}
	}
	else{
		
		
		$msg = "<div class='alert alert-danger col-md-7 col-sm-7'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry email already taken !
				</div>";
			
	}
$MySQLi_CON->close();
}
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
<?php
if(isset($_POST['btn-delete1']))
{
	$delete = $MySQLi_CON->real_escape_string(trim($_POST['delete']));
	// select image from db to delete
		$stmt_select = $MySQLi_CON->query("SELECT new_photo FROM presb_new WHERE new_title='$delete'");
	//	$stmt_select->execute(array('$_SESSION[userSession]'=>$_GET['upload_pic']));
		$imgRow=$stmt_select->fetch_array();
		unlink("new_images/".$imgRow['new_photo']); 
	$stmt_delete = $MySQLi_CON->query("DELETE FROM presb_new WHERE new_title='$delete'");

	$msg9 = "<div class='alert alert-success col-md-9'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp;  News <b>Deleted</b> added successfully !
					</div>";
}
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
                        <a <?php if ($account['id_no']== 33445566 || $account['id_no']== 11223344) {
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

			<div class="col-md-9 container">
 						<div class="login-form col-md-12 col-sm-12 ">
						 <!-- <h2 class="signup">New to ASAWA? Sign Up</h2>-->
						 <h2 class="title"> Add User</h2>



						  <?php
							if(isset($msg)){
								echo $msg;
							}
							else{
								?>
					            <!--<div class='alert alert-info col-md-7 col-sm-7'>
									<span class='glyphicon glyphicon-asterisk'></span> &nbsp; all the fields are mandatory !
								</div>-->
					            <?php
							}
							?>


						  <form action="" method="post" id="register-form">
							
							<div class="form-group col-md-7 col-sm-7">
							  <input type="email" name="email" class="form-control login-field" value="" placeholder="Enter your email" id="login-email" required />
						
							</div>

							<div class="form-group col-md-7 col-sm-7">
							  <input type="password" name="password" id="password" class="form-control login-field" value="12345678" placeholder="Password" id="login-pass" required />
							<div class="form-group col-md-7 col-sm-7">
							</div>
							  <input name="btn-adduser" class="btn btn-primary btn-block" onclick="return validate();" value="Sign Up" type="submit"/>
							
							</div>
						</form>   
						 
<!--......................AAd NEWS---------------------->

<?php
     error_reporting( ~E_NOTICE ); // avoid notice

include_once 'db.php';

if(isset($_POST['btn-update2']))
{
	$new_tittle = $MySQLi_CON->real_escape_string(trim($_POST['tittle']));
	$new_body = $MySQLi_CON->real_escape_string(trim($_POST['body']));
	$new_footer = $MySQLi_CON->real_escape_string(trim($_POST['footer']));

	$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		
		
		 if(empty($imgFile)){
			$errMSG = "Please Select Image File.";
		}
		
		 else{
			$upload_dir = 'new_images/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$userpic = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 10000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}
		}
		
		

		
			// if no error occured, continue ....
		if(!isset($errMSG))
		{



	$query = "INSERT INTO presb_new(new_title, new_body, new_footer, new_photo) VALUES('$new_tittle','$new_body','$new_footer','$userpic')";

		
		if($MySQLi_CON->query($query))
		{
			$msg8 = "<div class='alert alert-success '>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Presbyterian  News Update added successfully !
					</div>";
		}
		else
		{
			$msg8 = "<div class='alert alert-danger '>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while error while adding !
					</div>";
		}

	}
	}


?><br>
				<div class="col-md-12">
				<h2 class="title"> Update News</h2>
					<form action="" method="post" enctype="multipart/form-data">
						<?php
							if(isset($errMSG)){
									?>
						            <div class="alert alert-danger">
						            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
						            </div>
						            <?php
							}?>
													<?php
														if(isset($msg8)){
															echo $msg8;
														}
													?>	
							<div class="form-group col-md-3 col-sm-3">
							  <input type="text" name="tittle" class="form-control login-field" value="" placeholder="Title of Post" id="login-name" required />
							  <label class="login-field-icon fui-user" for="login-name">Tittle of Post 1</label>
							</div>

							<div class="form-group col-md-6 col-sm-6">
							  <textarea type="text" name="body" class="form-control login-field" value="" placeholder="Message Here..." id="login-pass" required > </textarea>
							  <label class="login-field-icon fui-lock" for="login-pass">Message here.... </label>
							</div>
							<div class="form-group col-md-6 col-sm-6">
							  <input type="text" name="footer" class="form-control login-field" value="" placeholder="Posted By:" id="login-pass" required />
							  <label class="login-field-icon fui-lock" for="login-pass">Posted By</label>
							</div>
							<div class="form-group col-md-6 col-sm-6">
							<label class="control-label">Profile Img.</label>
       						 <input class="input-group" type="file" name="user_image" accept="image/*" />
       						 </div>
							<div class="form-group col-md-4 col-sm-4 col-md-offset-4 col-sm-offset-4">
							<input class="btn btn-primary  btn-block" value="Update News" name="btn-update2" type="submit"/><br>
							
							</div>
						</form>
					</div>
							
					</div>
				</div><hr>
									<div class="container">

													<?php
														if(isset($msg9)){
															echo $msg9;
														}
													?>	
											<form class="form-horizontal" action="#" method="post">
												<div class="form-group col-md-9">
													<label class="col-md-4 col-md-offset-1 title"> Delete News Post:</label>

																	
													<div class="col-md-5">
														<input type="text" class="form-control input-sm " placeholder="Enter News Tittle" name="delete" required />
													</div>
													<br>
													
												</div>	
													<div class="col-md-5">
													<input type="submit" class="btn btn-danger  btn-block col-md-2 col-md-offset-5" name="btn-delete1" value="Delete News" />
													</div>
												
											</form>
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
					<li><span class="fa fa-check"></span>Enter default password</li>
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
					 <li><a href="../home">Our Page</a></li>
					  <li><a href="logpage">Login</a></li>
					  <li><a href="../about">Presbyterian Weavers</a></li>
					  <li><a href="https://www.facebook.com/Presbyterian-Weavers-of-Kenya-377229792412452/?hc_ref=SEARCH" target="_blank">FB</a></li>
					  <li><a href="../presb.pdf" target="_blank">Constitution </a></li>
					  <li><a href="../contact">Contact</a></li>
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
