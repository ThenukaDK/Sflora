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

    <title>Admin Panel-Orders</title>
	
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
        <h1>Orders</h1>
        <p class="lead">Placed orders by users</p>
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
	
	<div class="table-responsive">
			<p class="lead">Placed orders</p>
			<hr>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Image</th>
				  <th>User Id</th>
                  <th>User Name</th>
				  <th>Purchase ID</th>
				  <th>Main Category</th>
				  <th>Sub Category</th>
				  <th>Color</th>
				  <th>Amount</th>
				  <th>Price</th>
				  <th>Total Price</th>
				  <th>Orderd Date</th>
                </tr>
              </thead>
              <tbody>
                <?php
					//retrieve user details
					$orderDetails = "select * from sf_order";
					$result = mysql_query($orderDetails);
					while ($data = mysql_fetch_array($result)){
					
						$usename = "select name from sf_user where userId='".$data['user_id']."'";
						$nameresult = mysql_query($usename);
						while($data2 = mysql_fetch_array($nameresult)){
							echo'
								<form name="viewProfilePersonal" method="post" action="">
									<tr>
										<td>
											
												<div class="col-sm-8 placeholder">
													<img src="../img/Flowers/'.$data['mainCatogory'].'/'.$data['Image'].'" class="img-responsive" alt="Generic placeholder thumbnail">
												
												</div>
											
										</td>
										<td>'.$data['user_id'].'</td>
										<td>'.$data2['name'].'</td>
										<td style="width:100px;">'.$data['purchase_id'].'</td>
										<td>'.$data['mainCatogory'].'</td>
										<td>'.$data['subCatogory'].'</td>
										<td>'.$data['color'].'</td>
										<td>'.$data['amount'].'</td>
										<td>'.$data['price'].'</td>
										<td>'.$data['totalPrice'].'</td>
										<td style="width:100px;">'.$data['orderdDate'].'</td>								
									</tr>
								</form>
								';
						}
					}
				?>
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