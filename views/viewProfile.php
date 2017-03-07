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
	
	$userNameInTable = $_SESSION ['userNameInTable'];
	$userIdInTable = $_SESSION ['userIdInTable'];
	
	//retrive photo from Db
	mysql_connect("localhost","root","root");
	mysql_select_db('sflora') or die("Not connected to the db");
	
	$querry = "select * from sf_user where userId = '$userIdInTable'";
	$result = mysql_query($querry); 
	$data = mysql_fetch_array($result);
	$image_name = $data['imgUrl'];
	
?>
<!doctype html>
<html lang="en" class="no-js" data-ng-app="sfloraProfile">

<head>
    <meta charset="UTF-8">
    <title>Sandaru Flower Nursery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="shortcut icon" href="favicon.png">

    <link rel="stylesheet" href="../css/bootstrap.css">    
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/slick.css">
    <link rel="stylesheet" href="../js/rs-plugin/css/settings.css">
    <link rel="stylesheet" href="../css/berry.css">
	<link rel="stylesheet" href="../css/dashboard.css">

	<script type="text/javascript" src="../js/modernizr.custom.32033.js"></script>
	
	<!--<script LANGUAGE="JavaScript">
		function goNewWin() {
			//***Get what is below onto one line***
			window.open("login.html",'TheNewpop','toolbar=1,
			location=1,directories=1,status=1,menubar=1,
			scrollbars=1,resizable=1'); 
			//***Get what is above onto one line*** 
			self.close()
		}
	</script>--> 

</head>

<body data-ng-controller = "divChangeController">

	<div data-ng-include="'navbar.php'"></div>
	

    <div class="wrapper">
        <section id="features">
            <div class="container">
                <div class="section-heading sp-effect3">
                    <h1>Profile</h1>
                    <div class="divider"></div>
                    <p>Edit your profile Information</p>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4 scrollpoint sp-effect1">
                        <div class="media media-left feature">
                            <a class="pull-right" data-ng-click="clickbtn='viewProfilePersonal.php'"  href="">
                                <i class="fa fa-cogs fa-2x"></i>
                            </a>
                            <div class="media-body">
                                <h3 class="media-heading">Personal Details</h3>
                            </div>
                        </div>
                        <div class="media media-left feature">
                            <a class="pull-right" data-ng-click="clickbtn='viewProfileCarrier.php'"  href="">
                                <i class="fa fa-users fa-2x"></i>
                            </a>
                            <div class="media-body">
                                <h3 class="media-heading">Carrier</h3>
                            </div>
                        </div>
                        <div class="media media-left feature">
                            <a class="pull-right" data-ng-click="clickbtn='viewProfileInterested.php'"  href="">
                                <i class="fa fa-picture-o fa-2x"></i>
                            </a>
                            <div class="media-body">
                                <h3 class="media-heading">Interested Flowers</h3>
                            </div>
                        </div>
                    </div>
					
                    <div class="col-md-4 col-sm-4" >
                        <img src="../img/userPic/<?php echo $userNameInTable.'/'.$image_name?>" class="img-responsive scrollpoint sp-effect5" alt="">
						
						<form enctype="multipart/form-data" action="uploadPic.php" method="post">
						
							Select a Profile Picture<input type="file" name="uploadedPic"></input><br>
							<button type="submit" class="btn btn-default"><span class="fa fa-upload"></span> UploadFile</button>
						
						</form>

                    </div>
					
					<div data-ng-include="clickbtn"></div>
                    		
                </div>
            </div>
			
        </section>

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
	<script src="../sources/controllers/profile-form-div-change.js"></script>
	
</body>

</html>
