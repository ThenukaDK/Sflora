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

    <title>Admin Panel-Flower</title>
	
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
        <h1>Flowers</h1>
        <p class="lead">Manage your flowers</p>
		<a href="adminPannelManageAnthurium.php?table=anthurium"><button type="button" class="btn btn-default" data-ng-click="clickbtn=''" ><span class=""></span>Anthurium</button></a>
		<a href="adminPannelManageOrchids.php?table=orchid"><button type="button" class="btn btn-default" data-ng-click="clickbtn=''" ><span class=""></span>Orchids</button></a>
		<a href="adminPannelManageAglonima.php?table=aglonima"><button type="button" class="btn btn-default" data-ng-click="clickbtn=''" ><span class=""></span>Aglonima</button></a>
		<a href="adminPannelManageFarms.php?table=farms"><button type="button" class="btn btn-default" data-ng-click="clickbtn=''" ><span class=""></span>Farms</button></a>
		<a href="adminPannelManageColias.php?table=colias"><button type="button" class="btn btn-default" data-ng-click="clickbtn=''" ><span class=""></span>Colias</button></a>
		<a href="adminPannelManageDecorative.php?table=decorative"><button type="button" class="btn btn-default" data-ng-click="clickbtn=''" ><span class=""></span>Decorative Flowers</button></a>
		<a href="adminPannelManageHaning.php?table=hanging"><button type="button" class="btn btn-default" data-ng-click="clickbtn=''" ><span class=""></span>Hanging Pots</button></a>
		<a href="adminPannelManageWaterPlant.php?table=water"><button type="button" class="btn btn-default" data-ng-click="clickbtn=''" ><span class=""></span>Water Plant</button></a>
		<br>
		<br>
		<a href="adminPannelManageRoses.php?table=roses"><button type="button" class="btn btn-default" data-ng-click="clickbtn=''" ><span class=""></span>Roses</button></a>
	  </div>
    </div>
	<div class="row">
	<div class="" align = "center">
		<div class="col-md-4">
			<a href="adminPanel.php"><button type="button" class="btn" data-ng-click="clickbtn=''" ><span class=""></span>Back to main panel</button></a>
			<br>
			<br>
		</div>
	</div>
	</div>
	<div data-ng-include="clickbtn"></div>
	
	<div class="row">
		<div class="" align = "center">
        <div class="col-md-4">
		  <img src="../img/images/100_1800.JPG"/ width="60%" height = "60%" class="img-thumbnail-descriptive">  
        </div>
        <div class="col-md-4">
          <img src="../img/images/100_1819.JPG"/ width="60%" height = "60%" class="img-thumbnail-descriptive"> 
		</div>
        <div class="col-md-4">
          <img src="../img/images/DSCF1747.JPG"/ width="60%" height = "60%" class="img-thumbnail-descriptive">
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