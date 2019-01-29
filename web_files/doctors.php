<?php
session_start();
include 'dbconnect.php';

$doctor = $_SESSION['name'];

$query1 ="SELECT * FROM Patient ";
$query1_run=mysqli_query($con,$query1);


?>
	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Healthcare</title>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="./sweetalert/sweetalert.min.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/jquery-ui.css">				
			<link rel="stylesheet" href="css/nice-select.css">							
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">			
			<link rel="stylesheet" href="css/jquery-ui.css">			
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body>	
        <header id="header">
	  		
		    <div class="container main-menu">
		    	<div class="row align-items-center justify-content-between d-flex">
			      <div id="logo">
			        <a href="doctors.php"><img src="img/logo.png" alt="" title="" /></a>
			      </div>
			      <nav id="nav-menu-container">
			        <ul class="nav-menu">
			          <li><a href="edit.php">Edit Profile</a></li>
			         
			          <li><a href="logout.php">Log Out</a></li>
			        </ul>
			      </nav><!-- #nav-menu-container -->		    		
		    	</div>
		    </div>
		  </header><!-- #header -->
 
			          
			 			  
			<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Hello</h1><h2 class="text-white"> <?php echo $doctor;?>
							</h2>	
							
						</div>	
					</div>
				</div>
			</section>
		    <!-- End team Area -->				

			<!-- Start feedback Area -->
			
			<!-- End feedback Area -->			    			
				    			
		    <!-- Start brands Area -->
		    <section class="brands-area">
		        <div class="container">
		            <div class="brand-wrap section-gap">
                        <?php while($query_row=mysqli_fetch_array($query1_run)) {?>
		                <div class="row ">
		                    <div class="col-md-4 col-xs-12">
		                        <h3 style="color:green;" id="p1">Device id:   <?php echo  $query_row['device_id'];?></h3><br>
                                <h4 style="color:black;" >Patient Name: <?php echo  $query_row['patient_name'];   ?></h4>
								<h4 style="color:black;" >Patient Disease: <?php echo  $query_row['disease'];   ?></h4><br>
                                 <div style="float: right;"><button id="<?php echo $query_row['device_id'];?>" class="primary-btn text-uppercase" onclick="onclickfun(this)" >Details</button></div>
                                  <?php $query_row=mysqli_fetch_array($query1_run);?>
		                    </div>
							<div class="col-md-4 col-xs-12">
		                        <h3 style="color:green;">Device id:   <?php echo  $query_row['device_id'];?></h3><br>
                                <h4 style="color:black;" >Patient Name: <?php echo  $query_row['patient_name'];   ?></h4>
								<h4 style="color:black;" >Patient Disease: <?php echo  $query_row['disease'];   ?></h4><br>
                                 <div style="float: right;"><button id="<?php echo $query_row['device_id'];?>" class="primary-btn text-uppercase" onclick="onclickfun(this)" >Details</button></div>
                                  <?php $query_row=mysqli_fetch_array($query1_run);?>
		                    </div>
							<div class="col-md-4 col-xs-12">
		                        <h3 style="color:green;">Device id:   <?php echo  $query_row['device_id'];?></h3><br>
                                <h4 style="color:black;" >Patient Name: <?php echo  $query_row['patient_name'];   ?></h4>
								<h4 style="color:black;" >Patient Disease: <?php echo  $query_row['disease'];   ?></h4><br>
                                 <div style="float: right;"><button id="<?php echo $query_row['device_id'];?>" class="primary-btn text-uppercase" onclick="onclickfun(this)" >Details</button></div>                                  
							</div>
						</div><br><br><?php } ?>
		                 
		                
		            </div>
		        </div>
		    </section>
		    <!-- End brands Area -->

			<!-- start footer Area -->		
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-2  col-md-6">
							<div class="single-footer-widget">
								
							</div>
						</div>
						<div class="col-lg-4  col-md-6">
							<div class="single-footer-widget mail-chimp">
								<h6 class="mb-20">Contact Us</h6>
								<p>
									NIT Rourkela
								</p>
								<h3>8280030272</h3>
								<h3>7609904323</h3>
							</div>
						</div>							
						<div class="col-lg-6  col-md-12">
							<div class="single-footer-widget newsletter">
								<h6>Newsletter</h6>
								<p>You can trust us. we only send promo offers, not a single spam.</p>
								<div id="mc_embed_signup">
									<form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">

										<div class="form-group row" style="width: 100%">
											<div class="col-lg-8 col-md-12">
												<input name="EMAIL" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '" required="" type="email">
											</div> 
										
											<div class="col-lg-4 col-md-12">
												<!--<button class="nw-btn primary-btn circle">Subscribe<span class="lnr lnr-arrow-right"></span></button>-->
											</div> 
										</div>		
										<div class="info"></div>
									</form>
								</div>		
							</div>
						</div>					
					</div>

					<div class="row footer-bottom d-flex justify-content-between">
						<p class="col-lg-8 col-sm-12 footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | ANLab
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
						<div class="col-lg-4 col-sm-12 footer-social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>					
					</div>
				</div>
			</footer>
			<!-- End footer Area -->


			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="js/popper.min.js"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
 			<script src="js/jquery-ui.js"></script>					
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>	
    		<script src="js/jquery.tabs.min.js"></script>						
			<script src="js/jquery.nice-select.min.js"></script>	
			<script src="js/owl.carousel.min.js"></script>									
			<script src="js/mail-script.js"></script>	
			<script src="js/main.js"></script>	
            <script type="text/javascript" src="./sweetalert/sweetalert.min.js" type="text/javascript"></script>
            <script type="text/javascript">
           
	        function onclickfun(btn)
            {
                   var devid= btn.id;
                    var user_data= "&device_id="+devid;
                    //console.log(user_data);
                   $.ajax({
                        url: 'patient_session.php',
                        data:user_data,
                        type: 'post',
                        success: function(response) {
									console.log(response);
                                         if (response == 'success')
                             {
                                setTimeout(function() {
                                swal({
                                    title: "Success!",
                                    text: "showing details",
                                    type: "info"
                             }, function() {
                  window.location = "single_patient.php";
                  });
           }, 1000);
          }
                else
                       {
                                setTimeout(function() {
                                swal({
                                    title: "Warning!",
                                    text: "something went wrong!",
                                    type: "info"
                             }, function() {
                  window.location = "doctors.php";
                  });
           }, 1000);
          }
        }
				});

            }
          
        </script>
		</body>
	</html>
