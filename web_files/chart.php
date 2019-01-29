<!DOCTYPE HTML>
<html>
<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
window.onload = function () {

var dps = [];
var dps1 = [];
var dps2 = [];
var dps3 = [];
var dps4 = [];
var dps5 = [];
var dps6 = [];
var dps7 = [];
var dps8 = [];
var dps9 = [];
var chart = new CanvasJS.Chart("chartContainer", {
	exportEnabled: true,
	animationEnabled: true,
	theme: "light2",
	title :{
		text: "Sensor1 Chart"
	},
	axisY: {
		title: "sensor value",
		includeZero: false
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

var chart1 = new CanvasJS.Chart("chartContainer1", {
	exportEnabled: true,
	animationEnabled: true,
	theme: "light2",
	title :{
		text: "Sensor2 Chart"
	},
	axisY: {
		title: "sensor value",
		includeZero: false
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


var chart2 = new CanvasJS.Chart("chartContainer2", {
	exportEnabled: true,
	animationEnabled: true,
	theme: "light2",
	title :{
		text: "Sensor3 Chart"
	},
	axisY: {
		title: "sensor value",
		includeZero: false
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
		text: "Sensor3 Chart"
	},
	axisY: {
		title: "sensor value",
		includeZero: false
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
		text: "Sensor4 Chart"
	},
	axisY: {
		title: "sensor value",
		includeZero: false
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

var xVal = 0;
var yVal = 100;
var updateInterval = 1000;
var dataLength = 10; // number of dataPoints visible at any point

var updateChart = function (count) {
	count = count || 1;
	// count is number of times loop runs to generate random dataPoints.
	for (var j = 0; j < count; j=j+10) {	
		yVal = yVal + Math.round(5 + Math.random() *(-5-5));
		dps.push({
			x: xVal,
			y: yVal
		});
		dps1.push({
			x: xVal,
			y: yVal
		});
		dps2.push({
			x: xVal,
			y: yVal
		});
		dps3.push({
			x: xVal,
			y: yVal
		});
		dps4.push({
			x: xVal,
			y: yVal
		});
		dps5.push({
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
		});
		xVal=xVal+10;
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
	if (dps5.length > dataLength) {
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
	}
	chart.render();
	chart2.render();
	chart1.render();
	chart3.render();
	chart4.render();
	chart5.render();
	chart6.render();
	chart7.render();
	chart8.render();
	chart9.render();
};

updateChart(dataLength); 
setInterval(function(){ updateChart() }, updateInterval); 
}
	
</script>
</head>
<body>
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
	 
	<div id="chartContainer4" style="height: 370px; width: 80%;"></div>
	</div>

	<div class="col-md-4 col-xs-12">
	<div id="chartContainer5" style="height: 370px; width: 80%;"></div>
	</div>
</div><br><br>
<div class="row">
	<div class="col-md-4 col-xs-12">
	<div id="chartContainer6" style="height: 370px; width: 80%;"></div>
	</div>

	<div class="col-md-4 col-xs-12">
	 
	<div id="chartContainer7" style="height: 370px; width: 80%;"></div>
	</div>

	<div class="col-md-4 col-xs-12">
	<div id="chartContainer8" style="height: 370px; width: 80%;"></div>
	</div>
</div><br><br>
<div class="row">
	<div class="col-md-4 col-xs-12">
	
	</div>

	<div class="col-md-4 col-xs-12">
	 
	<div id="chartContainer9" style="height: 370px; width: 80%;"></div>
	</div>

	<div class="col-md-4 col-xs-12">
	
	</div>
</div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>