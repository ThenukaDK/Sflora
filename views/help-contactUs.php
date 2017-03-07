<?php
	session_start();
	
	if($_SESSION ['userIdInTable'] == ''){
		echo '<script>';
		echo 'location.href="login.php"';
		echo '</script>';
	}
	
	$userIdInTable = $_SESSION ['userIdInTable'];
	$userNameInTable = $_SESSION ['userNameInTable'];
	$userTypeInTable = $_SESSION ['userTypeInTable'];
	
	mysql_connect("localhost","root","root");
	mysql_select_db('sflora') or die("Not connected to the db");
		
?>
<!DOCTYPE html>
<html lang="en" data-ng-app="sfloraPurchaseHistory">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../favicon.ico">

    <title>About-us</title>
	
    <link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/animate.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/slick.css">
	<link rel="stylesheet" href="../js/rs-plugin/css/settings.css">
    <link rel="stylesheet" href="../css/berry.css">
    <link rel="stylesheet" href="../css/dashboard.css">
	<link rel="stylesheet" href="justified-nav.css">

    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
	
	<!--Start of map conector-->
		<style>
      #map-canvas {
        height: 430px;
		width:430px;
    
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script>
function initialize() {
  var mapOptions = {
    zoom: 15,
    center: new google.maps.LatLng(8.324708, 80.360731),
    mapTypeControl: true,
    mapTypeControlOptions: {
        style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
        position: google.maps.ControlPosition.BOTTOM_CENTER
    },
    panControl: true,
    panControlOptions: {
        position: google.maps.ControlPosition.TOP_RIGHT
    },
    zoomControl: true,
    zoomControlOptions: {
        style: google.maps.ZoomControlStyle.LARGE,
        position: google.maps.ControlPosition.LEFT_CENTER
    },
    scaleControl: true,
    streetViewControl: true,
    streetViewControlOptions: {
        position: google.maps.ControlPosition.LEFT_TOP
    }
  }
  var map = new google.maps.Map(document.getElementById('map-canvas'),
                                mapOptions);
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
	
	<!--End of map conector-->

  </head>

  <body data-ng-controller = "divChangeController">
  
	<div data-ng-include="'navbar.php'"></div>

    <div class="container cusMargin1">

      <div class="masthead">
        <br>
		<br>
      </div>

      <!-- Jumbotron -->
      <div class="jumbotron">
        <h1>Contact</h1>
        <p class="lead">Feel free to contact us at any time through followings or leave a message</p>
      </div>

      <!-- Example row of columns -->
	  
      <div class="row">
		<div class="col-xs-6 col-sm-5"> 
			<img src="../img/berry/owner.JPG" class="descriptive-Img img-thumbnail-descriptive">
		</div>
		<div class="col-md-5 cusMargin2">
			<h3>Owner   <pre>Kumuduni Kahawandala</pre></h3>
			<h3>Address <pre>No 214/3 
Sangamiththa Rd
Pandulagama
Anuradhapura</pre></h3>
			<h3>Contact No <pre>071 4428921
071 2340187</pre></h3>
			<h3>Send a Mail<pre><a href="mailto:sfloranursery@gmail.com" target="_top">thenukaa@gmail.com</a></pre><h3>
			<h3>
				<pre>
					<div class="socialCus">
Follow us on twitter	<a href="https://twitter.com/SfloraNursery" target="_blank" class="scrollpoint sp-effect3"><button class=" btn btn-default"><i class="fa fa-twitter fa-lg"></i></Button></a>
Follow us on g+	        <a href="https://plus.google.com/u/0/103388501136576601180/posts" target="_blank" class="scrollpoint sp-effect3"><button class=" btn btn-default"><i class="fa fa-google-plus fa-lg"></i></Button></a>
Follow us on facebook	<a href="https://www.facebook.com/profile.php?id=100008581950261" target="_blank" class="scrollpoint sp-effect3"><button class=" btn btn-default"><i class="fa fa-facebook fa-lg"></i></Button></a>
					</div>
				</pre>
			</h3>
			<h3>Get directions <pre style="margin-bottom:0px; padding:10px;">
				<div class="" id="map-canvas"></div>
			</pre></h3>
		</div>
	  </div>
    </div>

	<script src="../js/jquery-1.11.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/slick.min.js"></script>
    <script src="../js/placeholdem.min.js"></script>
    <script src="../js/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
    <script src="../js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script src="../js/waypoints.min.js"></script>
    <script src="../js/scripts.js"></script>
	
	<script src="../js/angular.js"></script>
    <script src="../js/angular.route.js"></script>
	<script src="../sources/controllers/purchaseHistoryAddNavbar.js"></script>
    
  </body>
</html>
