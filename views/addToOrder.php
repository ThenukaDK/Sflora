<?php
	session_start();
	
	mysql_connect("localhost","root","root");
	mysql_select_db('sflora') or die("Not connected to the db"); 
	
	if($_SESSION ['userIdInTable'] == ''){
		
		//delete temp data from sf_cart_temp
		mysql_query("delete from sf_cart_temp where user_id != ''")or die('could not run delete query'.mysql_error());
		
		echo '<script>';
		echo 'location.href="login.php"';
		echo '</script>';
	}
	
	$userIdInTable = $_SESSION ['userIdInTable'];
	$userNameInTable = $_SESSION ['userNameInTable'];
	$userTypeInTable = $_SESSION ['userTypeInTable'];
	
	
	
	$amount = $_POST['amount'];
	$main_category = $_GET['main_category'];
	$sub_category = $_GET['sub_category'];
	$color = $_GET['color'];
	$price = $_GET['price'];
	$Image = $_GET['Image'];
	$userId = $_SESSION ['userIdInTable'];
	$purchaseId = md5(uniqid());
	
	$totalPrice = $amount * $price;
		
	
	//insert into temporary table sf_order
	$querry = "insert into sf_cart_temp values
			('$userId','$purchaseId','$main_category','$sub_category','$color','$amount','$price','$totalPrice','$Image')";
	
	
	mysql_query($querry) or die('could not run the querry'.mysql_error());
	
		
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

      <br><br>
	  <div class="jumbotron cusMargin1">
        <h1>Confirm your order</h1>
        <p class="lead">Are you sure you want to place this order?</p>
		<a href="purchaseConfirm.php?value=Confirm"><button type="button" class="btn btn-default">Confirm</button></a>
		<a href="purchaseConfirm.php?value=noConfirm"><button type="button" class="btn btn-default">No</button></a>
      </div>
    </div>
	
	<div class="table-responsive">
			<p class="lead">Order Details</p>
			<hr>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Flower Main Catogory</th>
                  <th>Flower Sub Catogory</th>
                  <th>Color</th>
                  <th>Amount</th>
                  <th>Price</th>
				  <th>Total Amount</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo $main_category;?></td>
                  <td><?php echo $sub_category;?></td>
                  <td><?php echo $color;?></td>
                  <td><?php echo $amount;?></td>
                  <td><?php echo $price.'.00';?></td>
				  <td><?php echo $totalPrice.'.00';?></td>
                </tr>
              </tbody>
            </table>
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