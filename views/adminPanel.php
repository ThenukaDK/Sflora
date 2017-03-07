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

    <title>Admin Panel-Main</title>
	
    <link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/animate.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/slick.css">
	<link rel="stylesheet" href="../js/rs-plugin/css/settings.css">
    <link rel="stylesheet" href="../css/berry.css">
    <link rel="stylesheet" href="../css/dashboard.css">
	<link rel="stylesheet" href="justified-nav.css">

    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

  </head>

  <body data-ng-controller = "divChangeController">
  
	<div data-ng-include="'navbar.php'"></div>

    <div class="container cusMargin1">

      <br><br>
	  <div class="jumbotron">
        <h1>Admin Pannel</h1>
        <p class="lead">Select manage catagory</p>
	  </div>
    </div>
	<div data-ng-include="clickbtn"></div>
	
	
	<div class="row">
		<div class="" align = "center">
        <div class="col-xs-2 col-sm-3">
			<div>
				<a href="adminPanelFlowers.php"><button type="button" class="btn btn-default" data-ng-click="clickbtn=''" ><span class=""></span>Flowers</button></a>
				<p><img src="../img/berry/flower-us-new.png" class="img-thumbnail-userPanel"> </p>
			</div>			 
		</div>
        <div class="col-xs-2 col-sm-3">
			<div>
				<a href="adminPanelUsers.php"><button type="button" class="btn btn-default" data-ng-click="clickbtn=''" ><span class=""></span>Users</button></a>	
				<p><img src="../img/berry/user-us2-new.png" class="img-thumbnail-userPanel"></p>
			</div>			  		
		</div>
		<div class="col-xs-2 col-sm-3">
			<div>
				<a href="adminPanelViewOrders.php"><button type="button" class="btn btn-default" data-ng-click="clickbtn=''" ><span class=""></span>Orders</button></a>	      
				<p><img src="../img/berry/shopping-us-new.png" class="img-thumbnail-userPanel"></p>
			</div>			  				
		</div>
		<div class="col-xs-2 col-sm-3">
			<div>
				<a href="adminPanelViewMessages.php"><button type="button" class="btn btn-default" data-ng-click="clickbtn=''" ><span class=""></span>Messages</button></a>	      
				<p><img src="../img/berry/messges-us-new.png" class="img-thumbnail-userPanel"></p>
			</div>			 				
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


