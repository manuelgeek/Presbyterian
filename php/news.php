<?php
include_once 'db.php';
include 'login.php';


if(isset($_SESSION['userSession']))
{
	header("Location: account");
}



?>


<!--*************PHP PROFILE PHOTO******-->
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
	
		<title>Presbyterian Weavers news</title>
	</head>
	<body>
	<div id="fb-root"></div>
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
							<li  class="active"><a href="news">News</a></li>
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
	
		
		 <div class="container-fluid">
      <div class="main-body col-md-12 col-sm-12 row-eq-height">
       
        <div class="row">
          <div class="col-md-8 ">
            <div class="timetable">
             
              <div class="news-panel">
                <div class="panel">
                  <div class="news-heading">
                    <h2>News</h2>
                  </div>
                  <div class="panel-body">
                    <?php 
			        $query = "SELECT * FROM presb_new ORDER BY new_id DESC";       
					$records_per_page=2;
					$newquery = $paginate->paging($query,$records_per_page);
					$paginate->dataview($newquery);
					$paginate->paginglink($query,$records_per_page);		
					?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <div style="background:#F4F4F4" class="col-md-4">
            <div class="events-panel">
			 <h2>Important Notifications</h2>
              <div class="row event-item">
                <h3>Membership Cards</h3>
                <p>Members are requested to forwad their passport sized photographs and a copy of their national identification cards indorder for their details to be filled in their membership cards</p>
                <button class="hvr-bubble-right btn btn-success">Go to event</button>
                <hr>
              </div>
              <div class="row event-item">
                <h3>Health Day</h3>
                <p>There will be a day for Church School Health day and the Presbyterian Weavers are planning to participate in this event. We are urging members to come and assist in making this day a success.More details about the date,requirements and morre logistics will be available as soon as possible.</p>
                <button class="hvr-bubble-right btn btn-success">Go to event</button>
                <hr>
              </div>
              <div class="row event-item">
                <h3>Youth Fest 2016</h3>
                <p>We are part of the Youth Fest 2016 which is an annual event organised by the P.C.E.A Dagoretti Parish for the youth.</p>
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
		
		
		
	
	
	