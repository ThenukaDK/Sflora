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

    <title>Admin Panel-Messages</title>
	
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
        <h1>Messages</h1>
        <p class="lead">View messages from users and reply for them</p>
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
                  <th>Message Id</th>
				  <th>User Name</th>
                  <th>Subject</th>
				  <th>Message</th>
				  <th>Date/Time</th>
				  <th>Reply</th>
				  <th>send reply</th>
                </tr>
              </thead>
              <tbody>
                <?php
					//retrieve user details
					$messagesDetails = "select * from sf_messages";
					$result = mysql_query($messagesDetails);
					while ($data = mysql_fetch_array($result)){

							echo'
								<form name="viewMessages" method="post" action="../sources/php/message-sent-page.php?messageId='.$data['messageId'].'&userNameInTable='.$data['userName'].'&userId='.$data['userId'].'">
									<tr>
										<td>'.$data['messageId'].'</td>
										<td>'.$data['userName'].'</td>
										<td>'.$data['subject'].'</td>
										<td><textarea readonly row="2" class="form-control col-lg-12">'.$data['message'].'</textarea></td>
										<td>'.$data['dateTime'].'</td>
										<td><textarea row="2" class="form-control col-lg-12" name="reply">'.$data['reply'].'</textarea></td>
										<td><button type="submit" class="btn btn-default" name="adminReply"><span class="fa fa-send"></span> Send Reply</button></td>
							
									</tr>
								</form>
								';
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