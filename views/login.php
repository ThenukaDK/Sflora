<?php
		
	if(isset($_GET['id']) && $_GET['id'] == "signout"){
		
		$_SESSION ['userIdInTable'] = '';
		$_SESSION ['userNameInTable'] = '';
				
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Sandaru Flower Nursery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="shortcut icon" href="favicon.png">
    

	<link rel="stylesheet" href="../css/bootstrap.css">
	
	<link rel="stylesheet" href="../css/berry.css">
	<link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/slick.css">
    
    <!--<script src="../../assets/js/ie-emulation-modes-warning.js"></script>-->
	<script type="text/javascript" src="js/modernizr.custom.32033.js"></script>
    
  </head>

  <body background="../img/berry/bk-berry.jpg">

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a  href="#">
			<img src="../img/images/s2.png">
		  </a> 
        </div>
        <div class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" role="form" method="post" action="../sources/php/loginValidate.php">
            <div class="form-group">
              <input type="email" placeholder="Email" class="form-control-md" name="login_userEmail" ng-model="email" required>
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control-md" name="login_userPass" required>
            </div>
            <button type="submit" class="btn btn-default btn-lg" name="login_sbtn">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    
      <div class="container" style="margin-top:100px;"> 
        <p class = "tp-caption large_white_bold sft">Sandaru Flower Bay</p>
        <p class = "custom-login-para-small">Sandaru Flower bay will provide you every possibility to browse through variety of flower categories
		and check newest flower arrivals, place orders or get them delivered to your house! </p>
        <a href="../index.html"><button type="button" class="btn btn-default">Home</button></a>
      </div>
    
    <div class="" align = "center">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <p class="custom-login-para-medium">Orchids</p>
		  <img src="../img/images/100_1800.JPG"/ width="60%" height = "60%" class="img-thumbnail">  
        </div>
        <div class="col-md-4">
          <p class="custom-login-para-medium">Anthurium</p>
          <img src="../img/images/100_1819.JPG"/ width="60%" height = "60%" class="img-thumbnail"> 
		</div>
        <div class="col-md-4">
          <p class="custom-login-para-medium">Fertilizer and Pots</p>
          <img src="../img/images/DSCF1747.JPG"/ width="60%" height = "60%" class="img-thumbnail">
        </div>

      </div>

      <hr  style="margin-top:100px;">
	  <p align ="center">&copy; Sandaru Flower nursery 2014</p>
		
     
    </div> <!-- /container -->


    
    
  </body>
</html>
