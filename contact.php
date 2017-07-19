<?php
include 'mail.php';

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link href="css/presb.css" rel="stylesheet" type="text/css" />
		 <link href="css/" rel="stylesheet">
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		 <link href="font/css/font-awesome.css" rel="stylesheet" />
		<script type="text/javascript" src="js/jquery2.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
	
		<title>Presbyterian Weavers contact</title>
	</head>
	<body>
	<header>
		<div class="container "id="homer">
			<div class="row">
			  <div class="grid_12 rel">
				<h1>
				  <a href="#">
					<img src="images/logo.jpg" alt="Logo alt">
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
							<li ><a href="home">Home</a></li>
							<li><a href="about">About Us</a></li>
							<li><a href="services">Services</a></li>
							<li><a href="php/news">News</a></li>
							<li class="active"><a href="contact">Contacts</a></li>
						</ul>
					</div>
           
				</div>
			</div> 
				</div>
		 </div> 
			</div> 
		  </section>
	</header>  
	 <!--CONTACT SECTION -->
    <div id="contact-section">
        <div class="container" >
            <div class="row main-top-margin text-center">
                <div class="col-md-8 col-md-offset-2 " >
                    <h1>Need Help ? Contact Us !</h1>
                    <h4>
                       For information about us and our services these are our contacts. 
                        
                    </h4>
                </div>
            </div>
            <!-- ./ Main Heading-->
            <div class="row main-low-margin">
                <div class="col-md-12  col-sm-12 ">
                    <div class="col-md-6  " >
                        <h3> Our Work Location</h3>
                        <hr />
                        <p>
                        P.O Box,30874-00100<br /><br />
                            Dagoretti South,<br /><br />
                            Nairobi, Kenya.<br />  <br />                        
                        Call: +254728700535<br /><br />
                        Email: presbyterianweavers@gmail.com<br />
                            </p>
                       
                    </div>
                    <div class="col-md-6  " >
                        <h3>Drop Us a Mail  Now ! </h3>
                        <hr />
                        <?php
                            if(isset($msg)){
                              echo $msg;
                            }
                          ?>  
                        <form method="post">
                            <div class="row">
                           
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" required="required" placeholder="Name" name="name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" required="required" placeholder="Email address" name="email">
                                    </div>
                                </div>
                            </div>
                              <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" required="required" placeholder="Subject" name="subject">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control"  placeholder="Ref. (IF any)" name="ref">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <textarea name="message" id="message" required="required" class="form-control" rows="3"  placeholder="Message"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" name="btn-message">Submit Request</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
             <!-- ./ Row Content-->
             <div class="row ">
                <div class="col-md-12" >
                    <h5>
                      
                   <strong>Ephesians 3:20-21:  </strong> Now to him who by the power at work within us is able to do far more abundantly than all that we ask or think,to Him be glory in the church and in Christ Jesus to all generations,for ever and ever.Amen 
                       
                    </h5>
                </div>
            </div>
        </div>
    </div>  
    <!--END CONTACT SECTION --> 
	
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
						  <p>Designed & Developed By <a rel="nofollow" href="http://www.appslab.co.ke/"><span class="aps">Apps:Lab</span></a></p>
						</div>
					  </div>
					</div>
				  </div>
				</footer>
				<!--=========== End Footer SECTION ================-->
		
		<footer>
		  
	</body>
	
</html>