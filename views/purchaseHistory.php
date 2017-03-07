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
	
	$userId = $_SESSION ['userIdInTable'];
	
	//retrieve data from order
	$querry = "select * from sf_order where user_id= '$userId' order by orderdDate DESC";
	$result = mysql_query($querry);
	
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

    <title>Purchased History</title>
	
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

      <div class="masthead">
        <ul class="nav nav-justified">
          <li><a href="" data-ng-click="clickbtn='purchases.php'; value = 1">Purchased</a></li>
          <li><a href="" data-ng-click="clickbtn='watched.php'; value = 1">Watched</a></li>
          <li><a href="" data-ng-click="clickbtn='favourites.php'; value = 1">Favourites</a></li>
        </ul>
      </div>
		
	  <div data-ng-include="clickbtn"></div>	
      <!-- Jumbotron -->
	  <div ng-hide="value ==1">
      <div class="jumbotron">
        <h1>Purchase History</h1>
        <p class="lead">View your purchased items watch lists and favourits</p>
      </div>

      <!-- Example row of columns -->
	  
      <div class="row">
		<?php
			while ($data = mysql_fetch_array($result)){
			
				$purchaseId = $data['purchase_id'];
				$main_category = $data['mainCatogory'];
				$sub_category = $data['subCatogory'];
				$color = $data['color'];
				$amount = $data['amount'];
				$price = $data['price'];
				$date = $data['orderdDate'];
				$Image = $data['Image'];
				$totalPrice = $data['totalPrice'];
				
				echo '
					<div class="placeholders" style="margin-top:40px;">
					<div class="col-xs-6 col-sm-3 placeholder">
						<img src="../img/Flowers/'.$main_category.'/'.$Image.'" class="img-responsive" alt="Generic placeholder thumbnail">
						<h4>'.$color.'</h4>
						<ul class="list-inline">
							<li>Ordered Date</li>
							<li>'.$date.'</li>
						</ul>	
						<ul class="list-inline">
							<li><span class="text-muted" style="color:blue;">Total Price &nbsp;<span class="badge">'.$totalPrice.'.00'.'</span></span></li>
						</ul>						
					</div>
					</div>
				';
			}
		?>
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
