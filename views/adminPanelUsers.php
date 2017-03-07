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

    <title>Admin Panel-User</title>
	
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
        <h1>Users</h1>
        <p class="lead">Add new users Or Edit privileges of existing Users</p>
		<a href=""><button type="button" class="btn btn-default" data-ng-click="clickbtn='adminPanelAddUser.php'" ><span class="fa fa-plus"></span> Add new user</button></a>
		<a href=""><button type="button" class="btn btn-default" data-ng-click="clickbtn=''" ><span class=""></span> Cancel</button></a>
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
			<p class="lead">Registerd Useres</p>
			<hr>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>User Id</th>
                  <th>User Name</th>
                  <th>Email</th>
                  <th>Contact</th>
                  <th>Nic</th>
				  <th>Address</th>
				  <th>User Pass</th>
				  <th>Image</th>
				  <th>Job Position</th>
				  <th>Job Company</th>
				  <th>Job address</th>
				  <th>Type</th>
				  <th>Edit</th>
				  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php
					//retrieve user details
					$userdetails = "select * from sf_user";
					$result = mysql_query($userdetails);
					while ($data = mysql_fetch_array($result)){
						echo'
						<form name="viewProfilePersonal" method="post" action="adminPanelEditUser.php?id='.$data['userId'].'">
							<tr>
								<td>'.$data['userId'].'</td>
								<td>'.$data['name'].'</td>
								<td>'.$data['email'].'</td>
								<td>'.$data['contact'].'</td>
								<td>'.$data['nic'].'</td>
								<td>'.$data['address'].'</td>
								<td>'.$data['userPass'].'</td>
								<td>'.$data['imgUrl'].'</td>
								<td>'.$data['jobPosition'].'</td>
								<td>'.$data['jobCompany'].'</td>
								<td>'.$data['jobAddress'].'</td>
								<td><input type="text" class="form-control-md" placeholder="Full Name" name="Type" value="'.$data['Type'].'"/></td>
								<td><button type="submit" class="btn btn-default" name="save"><span class="fa fa-floppy-o"></span> Save</button></td>
								<td><button type="submit" class="btn btn-default" name="delete" onclick="myfunc()"><span class="fa fa-times-circle-o"></span> Delete</button></td>
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