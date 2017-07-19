<?php

include_once 'db.php';
include_once 'login.php';

if(!isset($_SESSION['userSession']))
{
    header("Location: ../home");
}

if(isset($_POST['btn-delete']))
{
    $user_email = $MySQLi_CON->real_escape_string(trim($_POST['user_email']));
    $upass = $MySQLi_CON->real_escape_string(trim($_POST['password']));
    
    $query = $MySQLi_CON->query("SELECT * FROM presb_users WHERE user_email='$_SESSION[userSession]'");
    $row=$query->fetch_array();
    
    if(password_verify($upass, $row['password']))
    {
        // select image from db to delete
        $stmt_select = $MySQLi_CON->query("SELECT user_photo FROM presb_users WHERE user_email='$_SESSION[userSession]'");
    //  $stmt_select->execute(array('$_SESSION[userSession]'=>$_GET['upload_pic']));
        $imgRow=$stmt_select->fetch_array();
        unlink("user_images/".$imgRow['user_photo']);
        // it will delete an actual record from db
        $stmt_delete = $MySQLi_CON->query("DELETE FROM presb_users WHERE user_email='$_SESSION[userSession]'");
        //$stmt_delete->bindParam('$_SESSION[userSession]',$_GET['btn-delete']);
        //$stmt_delete->execute();
        session_destroy();
        unset($_SESSION['userSession']);
        header("refresh:4;../home");

        $msg6 = "<div class='alert alert-success >
                    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Account deleted Successfully!
                </div>";

    }
    else
    {
        $msg6 = "<div class='alert alert-danger >
                    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; email or password Wrong !
                </div>";
    }
    
    $MySQLi_CON->close();
    
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


<div class="signin-form">

	<div class="container">
     
        
       <form class="form-signin" method="post" id="login-form">
      
        <h2 class="title">Delete Your  Account</h2><hr />
        <p>By deleting this account you issolate yourself from the Preabyterian Weavers Terms and Conditions plus all the benefits you can receive from it.<br>
        Your Account and all your details will be lost from the database.</p>
        
        <?php
		if(isset($msg6)){
			echo $msg6;
		}
		?>
        
        <div class="form-group">
        <input type="email" class="form-control" placeholder="Email address" name="user_email" required />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" required />
        </div>
       
     	<hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-danger" name="btn-delete" id="btn-login" title="click for delete" onclick="return confirm('sure to delete your ASAWA Account ?')">
    		<span class="glyphicon glyphicon-remove" ></span> &nbsp; Delete Account
			</button> 
            <p>We're concerned with why you choose to leave. Please leave us a Message in our <a href="../contact">Contact Us </a> Page.<br>
            We regret Loosing you. </p>
            <a href="../home" class="b" style="float:right;">Go back to website</a>
            
        </div>  
        
        
      
      </form>

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