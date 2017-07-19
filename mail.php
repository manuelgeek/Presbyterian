<?php
										
										if(isset($_POST["btn-message"])){

										if($_POST["name"]==""||$_POST["email"]==""||$_POST["subject"]==""||$_POST["ref"]==""||$_POST["message"]==""){
										echo "Fill All Fields...";
										}else                /* send the submitted data */
											{
											$name=$_REQUEST['name'];
											$email=$_REQUEST['email'];
											$ref=$_REQUEST['ref'];
											$subject1=$_REQUEST['subject'];
											$message=$_REQUEST['message'];
											if (($name=="")||($email=="")||($subject1=="")||($ref=="")||($message==""))
												{

												$msg = "<div class='alert alert-danger ccol-md-10 col-sm-10'>
												<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Please Fill All The Fields !
												</div>";

												}
											else{        
												$from="From: $name<$email>\r\nReturn-path: $email";
												$subject="$subject1 \r\n Presbyterian Contact Mail";
												//$recipient = "info@venturezhub.com";

												if(mail("info@venturezhub.com", $ref, $subject, $message, $from)){

														$msg = "<div class='alert alert-success col-md-10 col-sm-10'>
														<span class='fa fa-inbox'></span> &nbsp; Email Sent successfully. Thank You !
														</div>";
															}
													else{
														$msg = "<div class='alert alert-success col-md-10 col-sm-10'>
															<span class='fa fa-inbox'></span> &nbsp; Email Failed to send, try again !
															</div>";
													}

												}
											}   
											}	


								  ?>