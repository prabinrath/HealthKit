<?php
session_start();
include 'dbconnect.php';
$device = $_SESSION['device_id'];
$doctor = $_SESSION['name'];
$doc_id = $_SESSION['doc_id'];

$query1 ="SELECT * FROM Patient WHERE device_id='$device' ";
$query1_run=mysqli_query($con,$query1);
$query_row=mysqli_fetch_array($query1_run);
$_SESSION['pname'] = $query_row['patient_name'];
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
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jQuery library -->
        <script src="bootstrap/js/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
		
		
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
            <script type="text/javascript">
            var ws;
            var d=0;
            var d1=0,d2=0,d3=0,d4=0,d5=0; 
			window.onload = function () {
			
			var dev= $('#chartid').val();
			 ws = new WebSocket("ws://10.42.0.1:25852/");
			
			setInterval(function(){
               ws.send(dev);
            },500);
			
			ws.onmessage = function(e) {
	   			d=e.data;
	   			pd = d.split("$");
	    			d1= pd[0];
	    			d2 =pd[1];
	    			d3= pd[2];
	    			d4 =pd[3];
	    			d5 =pd[4]
	    			d1 = parseFloat(d1);
	    			d2 = parseFloat(d2);
	    			d3 = parseFloat(d3);
	    			d4 = parseFloat(d4);
	    			d5 = parseFloat(d5);
	   console.log(d1+" "+d2+" "+d3+" "+d4+" "+d5);
    				};
      
			var dps = [];
			var dps1 = [];
			var dps2 = [];
			var dps3 = [];
			var dps4 = [];
			/*var dps5 = [];
			var dps6 = [];
			var dps7 = [];
			var dps8 = [];
			var dps9 = [];*/
			var chart = new CanvasJS.Chart("chartContainer", {
				exportEnabled: true,
				animationEnabled: true,
				theme: "light2",
				title :{
					text: "Temperature"
				},
				axisY: {
				minimum:-100,
	         maximum:100,
					title: "Temperature",
					includeZero: false
				},
            axisX: {
            		minimum:0,
	    				maximum:800,
					title: "Time",
					//includeZero: false
				},
				data: [{
					type: "line",
					//markerSize: 0,
					markerType: "square",
					//xValueFormatString: "DD MMM, YYYY",
					color: "#F08080",
					lineDashType: "dash",
					dataPoints: dps 
				}]
			});

			var chart1 = new CanvasJS.Chart("chartContainer1", {
				exportEnabled: true,
				animationEnabled: true,
				theme: "light2",
				title :{
					text: "Heart Rate"
				},
				axisY: {
				minimum:-100,
	    maximum:100,
					title: "Heart Rate",
					includeZero: false
				},
				axisX: {
				minimum:0,
	    maximum:800,
					title: "Time",
					//includeZero: false
				},
				data: [{
					type: "line",
					//markerSize: 0,
					markerType: "square",
					//xValueFormatString: "DD MMM, YYYY",
					color: "#F08080",
					lineDashType: "dash",
					dataPoints: dps1 
				}]
			});


			var chart2 = new CanvasJS.Chart("chartContainer2", {
				exportEnabled: true,
				animationEnabled: true,
				theme: "light2",
				title :{
					text: "Blood Pressure"
				},
				axisY: {
				minimum:-100,
	    maximum:100,
					title: "Blood Pressure",
					includeZero: false
				},
				axisX: {
				minimum:0,
	    maximum:800,
					title: "Time",
					//includeZero: false
				},

   			data: [{
					type: "line",
					//markerSize: 0,
					markerType: "square",
					//xValueFormatString: "DD MMM, YYYY",
					color: "#F08080",
					lineDashType: "dash",
					dataPoints: dps2 
				}]
			});

			var chart3 = new CanvasJS.Chart("chartContainer3", {
				exportEnabled: true,
				animationEnabled: true,
				theme: "light2",
				title :{
					text: "Glucose"
				},
				axisY: {
				   minimum:-100,
	    			maximum:100,
					title: "Glucose",
					includeZero: false
				},
				axisX: {
					minimum:0,
	    			maximum:800,
					title: "Time",
					//includeZero: false
				},
				data: [{
					type: "line",
					//markerSize: 0,
					markerType: "square",
					//xValueFormatString: "DD MMM, YYYY",
					color: "#F08080",
					lineDashType: "dash",
					dataPoints: dps3 
				}]
			});

			var chart4 = new CanvasJS.Chart("chartContainer4", {
				exportEnabled: true,
				animationEnabled: true,
				theme: "light2",
				title :{
					text: "Oxygen"
				},
				axisY: {
					minimum:-100,
	    			maximum:100,
					title: "Oxygen",
					includeZero: false
				},
				axisX: {
					minimum:0,
	    			maximum:800,
					title: "Time",
					//includeZero: false
				},
				data: [{
					type: "line",
					//markerSize: 0,
					markerType: "square",
					//xValueFormatString: "DD MMM, YYYY",
					color: "#F08080",
					lineDashType: "dash",
					dataPoints: dps4 
				}]
			});
		/*
			var chart5 = new CanvasJS.Chart("chartContainer5", {
				exportEnabled: true,
				animationEnabled: true,
				theme: "light2",
				title :{
					text: "Sensor5 Chart"
				},
				axisY: {
					title: "sensor value",
					includeZero: false
				},
				axisX: {
					title: "Time",
					//includeZero: false
				},
				data: [{
					type: "line",
					//markerSize: 0,
					markerType: "square",
					//xValueFormatString: "DD MMM, YYYY",
					color: "#F08080",
					lineDashType: "dash",
					dataPoints: dps5 
				}]
			});

			var chart6 = new CanvasJS.Chart("chartContainer6", {
				exportEnabled: true,
				animationEnabled: true,
				theme: "light2",
				title :{
					text: "Sensor6 Chart"
				},
				axisY: {
					title: "sensor value",
					includeZero: false
				},
				axisX: {
					title: "Time",
					//includeZero: false
				},
				data: [{
					type: "line",
					//markerSize: 0,
					markerType: "square",
					//xValueFormatString: "DD MMM, YYYY",
					color: "#F08080",
					lineDashType: "dash",
					dataPoints: dps6 
				}]
			});

			var chart7 = new CanvasJS.Chart("chartContainer7", {
				exportEnabled: true,
				animationEnabled: true,
				theme: "light2",
				title :{
					text: "Sensor7 Chart"
				},
				axisY: {
					title: "sensor value",
					includeZero: false
				},
				axisX: {
					title: "Time",
					//includeZero: false
				},
				data: [{
					type: "line",
					//markerSize: 0,
					markerType: "square",
					//xValueFormatString: "DD MMM, YYYY",
					color: "#F08080",
					lineDashType: "dash",
					dataPoints: dps7 
				}]
			});

			var chart8 = new CanvasJS.Chart("chartContainer8", {
				exportEnabled: true,
				animationEnabled: true,
				theme: "light2",
				title :{
					text: "Sensor8 Chart"
				},
				axisY: {
					title: "sensor value",
					includeZero: false
				},
  				axisX: {
					title: "Time",
					//includeZero: false
				},
				data: [{
					type: "line",
					//markerSize: 0,
					markerType: "square",
					//xValueFormatString: "DD MMM, YYYY",
					color: "#F08080",
					lineDashType: "dash",
					dataPoints: dps8 
				}]
			});

			var chart9 = new CanvasJS.Chart("chartContainer9", {
				exportEnabled: true,
				animationEnabled: true,
				theme: "light2",
				title :{
					text: "Sensor9 Chart"
				},
				axisY: {
					title: "sensor value",
					includeZero: false
				},
				axisX: {
					title: "Time",
					//includeZero: false
				},
				data: [{
					type: "line",
					//markerSize: 0,
					markerType: "square",
					//xValueFormatString: "DD MMM, YYYY",
					color: "#F08080",
					lineDashType: "dash",
					dataPoints: dps9 
				}]
			});
				*/
			var xVal = 0;
			var updateInterval = 500;
			var dataLength = 800; // number of dataPoints visible at any point

			var updateChart = function (count) {
				count = count || 1;
				// count is number of times loop runs to generate random dataPoints.
				for (var j = 0; j < count; j=j+10) {	
					
					dps.push({
						x: xVal,
						y: d1
					});
					dps1.push({
						x: xVal,
						y: d2
					});
					dps2.push({
						x: xVal,
						y: d3
					});
					dps3.push({
						x: xVal,
						y: d4
					});
					dps4.push({
						x: xVal,
						y: d5
					});
					/*dps5.push({
						x: xVal,
						y: yVal
					});
					dps6.push({
						x: xVal,
						y: yVal
					});
					dps7.push({
						x: xVal,
						y: yVal
					});
					dps8.push({
						x: xVal,
						y: yVal
					});
					dps9.push({
						x: xVal,
						y: yVal
					});*/
					xVal=xVal+1;
				}
				if (dps.length > dataLength) {
					dps.shift();
				}
				if (dps1.length > dataLength) {
					dps1.shift();
				}
				if (dps2.length > dataLength) {
					dps2.shift();
				}
				if (dps3.length > dataLength) {
					dps3.shift();
				}
				if (dps4.length > dataLength) {
					dps4.shift();
				}
				/*if (dps5.length > dataLength) {
					dps5.shift();
				}
				if (dps6.length > dataLength) {
					dps6.shift();
				}
				if (dps7.length > dataLength) {
					dps7.shift();
				}
				if (dps8.length > dataLength) {
					dps8.shift();
				}
				if (dps9.length > dataLength) {
					dps9.shift();
				}*/
				chart.render();
				chart2.render();
				chart1.render();
				chart3.render();
				chart4.render();
				/*chart5.render();
				chart6.render();
				chart7.render();
				chart8.render();
				chart9.render();*/
			};

		updateChart(dataLength); 
		setInterval(function(){ updateChart() }, updateInterval); 
		}
	
		</script>


		</head>
		<body>	
        <header id="header">
	  		<input type="hidden" id="chartid" value="<?php echo $device;?>">
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
          <section class="appointment-area">			
				<div class="container">
                    <br>
					<div class="row justify-content-between  appointment-wrap">
                       <div class="col-lg-4 col-md-4 "></div>
					   <div class="col-md-4 col-xs-12">
						     <center><h3 class="pb-20 text-center mb-30" style="color:brown;">Patient Details</h3></center>
                       </div>	
                        <div class="col-lg-4 col-md-4 "></div>
                     </div>
					<div class="row justify-content-between ">
                       <div class="col-lg-4 col-md-4 "></div>
					   <div class="col-md-4 col-xs-12">
                       		     <h4 class="pb-20 text-center mb-30" style="float:left;">Device id: &nbsp; <?php echo $query_row[0];?></h4>
                       </div>
 							<div class="col-lg-4 col-md-4 "></div>
					</div>
					<div class="row justify-content-between ">
						<div class="col-lg-4 col-md-4 "></div>
					    <div class="col-md-4 col-xs-12">
						     <h4 class="pb-20 text-center mb-30" style="float:left;">Patient Name: &nbsp; <?php echo $query_row['patient_name'];?></h4>
                       </div>
						<div class="col-lg-4 col-md-4 "></div>
					</div>
					<div class="row justify-content-between ">
						<div class="col-lg-4 col-md-4 "></div>
					   <div class="col-md-4 col-xs-12">
						     <h4 class="pb-20 text-center mb-30" style="float:left;">Age:  &nbsp; <?php echo $query_row['age'];?></h4>
                       </div>
					   <div class="col-lg-4 col-md-4 "></div>
					</div>
					<div class="row justify-content-between ">
						<div class="col-lg-4 col-md-4 "></div>
					   <div class="col-md-4 col-xs-12">
						     <h4 class="pb-20 text-center mb-30" style="float:left;">Gender: &nbsp; <?php echo $query_row['gender'];?></h4>
                       </div>
					   <div class="col-lg-4 col-md-4 "></div>
                    </div>
					<div class="row justify-content-between ">
						<div class="col-lg-4 col-md-4 "></div>
					   <div class="col-md-4 col-xs-12">
						     <h4 class="pb-20 text-center mb-30" style="float:left;">Address: &nbsp; <?php echo $query_row['address'];?></h4>
                       </div>
						<div class="col-lg-4 col-md-4 "></div>
 					</div>
					<div class="row justify-content-between ">
						<div class="col-lg-4 col-md-4 "></div>
					   <div class="col-md-4 col-xs-12">
						     <h4 class="pb-20 text-center mb-30" style="float:left;">Time of Allotment: &nbsp; <?php echo $query_row['timeofallocation'];?></h4>
                       </div>
						<div class="col-lg-4 col-md-4 "></div>
					</div>          
		        </div>
               <br>
		    </section>
		    <!-- End brands Area -->
				
				<div class="row">
						<div class="col-md-4">
								<center><button style="height:50px; font-size:15px; float:right;" id="back" class="primary-btn text-uppercase" >Back</button></center><br><br>
						</div>
						<div class="col-md-4">
								<center><button style="height:50px; font-size:15px; float:left;" id="<?php echo $query_row['device_id'];?>" class="primary-btn text-uppercase" onclick="onclickfun(this)" >Provide Prescription</button></center><br><br>
						</div>
						<div class="col-md-4">
									
						</div>
				</div>
				<br><br><br>
							 <div class="row">
					<div class="col-md-4 col-xs-12">
					<div id="chartContainer" style="height: 370px; width: 80%;"></div>
					</div>

					<div class="col-md-4 col-xs-12">
					 
					<div id="chartContainer1" style="height: 370px; width: 80%;"></div>
					</div>

					<div class="col-md-4 col-xs-12">
					<div id="chartContainer2" style="height: 370px; width: 80%;"></div>
					</div>
				</div><br><br>
				<div class="row">
					<div class="col-md-4 col-xs-12">
					<div id="chartContainer3" style="height: 370px; width: 80%;"></div>
					</div>

					<div class="col-md-4 col-xs-12">
					 
					<div id="chartContainer5" style="height: 370px; width: 80%;"></div>
					</div>

					<div class="col-md-4 col-xs-12">
					<div id="chartContainer4" style="height: 370px; width: 80%;"></div>
					</div>
				</div><br><br>
				<!--<div class="row">
					<div class="col-md-4 col-xs-12">
					<div id="chartContainer6" style="height: 370px; width: 80%;"></div>
					</div>

					<div class="col-md-4 col-xs-12">
					 
					<div id="chartContainer7" style="height: 370px; width: 80%;"></div>
					</div>

					<div class="col-md-4 col-xs-12">
					<div id="chartContainer8" style="height: 370px; width: 80%;"></div>
					</div>
				</div>-->
				<div class="row">
					<div class="col-md-4 col-xs-12">
	
					</div>

					<div class="col-md-4 col-xs-12">
					 
					<div id="chartContainer9" style="height: 370px; width: 80%;"></div>
					</div>

					<div class="col-md-4 col-xs-12">
	
					</div>
				</div>
<br><br>
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
								<h3>7978067849</h3>
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
                   setInterval(function(){
                	window.location="prescription.php";
            },1000);
            }
            
             $(document).ready(function(){
         $("#back").click(function(){
        //fbq('track', 'CompleteRegistration');
          	window.location="doctors.php";
        
        });

       });
            
            
	               
        </script>
        <script src="js/canvas.js"></script>
		</body>
	</html>
