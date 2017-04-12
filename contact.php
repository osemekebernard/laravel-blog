<?php

include_once 'connect.php';

 if ( isset($_POST['send']) ) {
 	$name = $DBcon->real_escape_string($_POST['name']);
 	$subject = $DBcon->real_escape_string($_POST['subject']);
 	$email = $DBcon->real_escape_string($_POST['email']);
 	$message = $DBcon->real_escape_string($_POST['message']);

 	$query = "INSERT INTO contact (name, email, subject, message, time_sent) VALUES ('$name', '$email', '$subject', '$message', now())";

 	if ($DBcon->query($query)) {
 		$flagMessage = "<div class='alert alert-success alert-dismissible' role='alert'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
     Sent successfully.
     </div>";
     header("refresh: 1; url=contact.php");
    
 	} else {
 		$flagMessage = "<div class='alert alert-danger alert-dismissible' role='alert'>
	 				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
	 	 				.
	 	 </div>";
 	}

 }

$DBcon->close();

 ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>David's Work - Contact us</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">

		<link rel="stylesheet" href="../assets/css/custom.css" media="screen">
	</head>
	<body style="background-color: #fff; margin-top: 35px;">
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<a type="a" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a  style="margin-left: 50px;"class="navbar-brand" href="#">David</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="index.html" title="click to go to home">Home</a></li>
						<li><a href="about.html" title="click to go to about page"> About </a></li>
				<li><a href="contact.php" title="click to contact us">Contact</a></li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <h1 class="page-header">Contact Us
                     <!--<small>We want to serve you better.</small>-->
                 </h1>
                 <ol class="breadcrumb">
                     <li><a href="home.html">Home</a>
                     </li>
                     <li class="active">Contact</li>
                 </ol>
             </div>
         </div>

         <div class="row">
             <!-- Map Column -->
             <div class="col-md-8">
                 <!-- Embedded Google Map API for VVU department-->
								 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3969.3937937833066!2d-0.12601018539681338!3d5.799926795797168!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdf79911fcb95e9%3A0x90b9eab93cb1596e!2svvu+IT%26CS+department!5e0!3m2!1sen!2sgh!4v1478415172083" width="100%" height="400px" margin-height="0" margin-width="0" frameborder="0" style="border:0" allowfullscreen></iframe>

             </div>
             <!-- Contact Details Column -->
             <div class="col-md-4">
                 <h3>Contact Details</h3>
                 <p>
                     Valley View University<br>Accra, Ghana<br>
                 </p>
                 <p><i class="fa fa-phone"></i>
                     <abbr title="Phone">P</abbr>: (+233) 50-835-19-65 </p>
                 <p><i class="fa fa-envelope-o"></i>
                     <abbr title="Email">E</abbr>: <a href="mailto:dbernard@st.vvu.edu.gh">dbernard@st.vvu.edu.gh</a>
                 </p>
                 <p><i class="fa fa-clock-o"></i>
                     <abbr title="Hours">H</abbr>: Monday - Sunday: 8:00 AM to 5:00 PM</p>
             </div>
         </div>
         <!-- Contact Form -->
         <div class="row">
             <div class="col-md-8">
                 <h3>Send us a Message</h3>

                 <!--Handles the contact form in the page-->

                 <form id="contactForm" action ="<?php $_SERVER['PHP_SELF']; ?>" method ="post">
                     <div class="control-group form-group">
											 <?php
											 	if (isset($flagMessage)) {
											 		echo $flagMessage;
											 	}
											  ?>
                         <div class="controls">
                             <label>Full Name:</label>
                             <input placeholder="Full name" type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name." name = "name">
                             <small class="help-block" style="color:red;">This field is required</small>
                         </div>
                     </div>
                     <div class="control-group form-group">
                         <div class="controls">
                             <label>Email Address:</label>
                             <input placeholder="Email" type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address." name = 'email'>
                            <small class="help-block" style="color:red;">This field is required</small>
                         </div>
                     </div>
                     <div class="control-group form-group">
                         <div class="controls">
                           <label>Subject</label>
                             <input placeholder="Message Subject" type="text" class="form-control" id="subject" required data-validation-required-message="Please enter the subject" name ="subject">
                             <small class="help-block" style="color:red;">This field is required</small>
                         </div>
                     </div>
                     <div class="control-group form-group">
                         <div class="controls">
                             <label>Message:</label>
                             <textarea placeholder="Type your message here" rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="200" style="resize:none" name ="message"></textarea>
                             <small class="help-block" style="color:red;">This field is required</small>
                         </div>
                     </div>
                     
                     <div id="success"></div>
                     <!-- For success/fail messages -->
                     <button type="submit" class="btn btn-primary" name ="send">Send Message</button>
                 </form>
             </div>
         </div>

         <center style="margin-top: 50px;">
         <footer>
             <p style="color: brown;">Made by David Bernard. &copy; 2017</p>
         </footer>
         </center>

				<script type="text/javascript" src="../assets/js/jquery-3.1.0.min.js"></script>
				<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>