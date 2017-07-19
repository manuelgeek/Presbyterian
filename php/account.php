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
<?php
include_once("dbconfig.php");
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
	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
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
                        <a href="../presb.pdf" target="_blank"><i class="fa fa-book "></i>View CV</a>
                         
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
		
		 <div class="container-fluid">
      <div class="main-body col-md-9  row-eq-height">
       
        <div class="row">
          <div class="col-md-8">
            

          		<?php 
		@$page=  $_GET['page'];
		  if($page!="")
		  {
		  	if($page=="new_page")
			{
				include('new_page.php');
			
			}

			if($page=="profile")
			{
				include('profile.php');
			
			}
			if($page=="uploadpic")
			{
				include('uploadpic.php');
			
			}
			if($page=="updateinfo")
			{
				include('updateinfo.php');
			
			}
		  }
		  else
		  {
		  include('new_page.php');
		}
		  ?>









          </div>
          <div style="background:#F4F4F4" class="col-md-4">
            <div class="events-panel">
			 <h2>Important Notifications</h2>
              <div class="row event-item">
                <h3>Uwezo Funds</h3>
                <p>The forms are fully filled and submited. We are now awaiting approval of the funds so that our projects can start as scheduled.</p>
                <button class="hvr-bubble-right btn btn-success">Go to event</button>
                <hr>
              </div>
              <div class="row event-item">
                <h3>Youth Fest</h3>
                <p>The plan is already prepared on how to successfully conduct the 2016 Youth Fest at P.C.E.A Githima Church</p>
                <button class="hvr-bubble-right btn btn-success">Go to event</button>
                <hr>
              </div>
              <div class="row event-item">
                <h3>December Activity</h3>
                <p>Members are adviced to come up with activities which we can participate or carry out during the month of december</p>
                <button class="hvr-bubble-right btn btn-success">Go to event</button>
                <hr>
              </div>
            </div>
            <div class="fb-comments" data-href="https://presbyterianweavers.co.ke" data-width="90%" data-numposts="3"></div>
          </div>
        </div>
       
      </div>
    </div>
		
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
					<li><span class="fa fa-check"></span>Choose Passsword of Your Choice 4</li>
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
		
	</body>






</html>
		
		
		
	
	
	