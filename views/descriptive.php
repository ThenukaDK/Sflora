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
	
	
	$main_category=$_GET['main'];
	$sub_category=$_GET['sub'];
	$color_category=$_GET['color'];
	$extraDetails=$_GET['extra'];
	
	//connect to database
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "root";
	
	$conn = mysql_connect($dbhost,$dbuser,$dbpass);
	
	if(! $conn) //if not connected
	{
		die('Could not connect to db'.mysql_error());
	}
	
	mysql_select_db("sflora"); //select database
	
	$sqlqry = "select * from  sf_whole_table where mainCatogory	= '$main_category' 
												&& subCatogory = '$sub_category' && color = '$color_category'
												&& extraDetails	= '$extraDetails' ";
												   
	$retVal = mysql_query($sqlqry);
	$data = mysql_fetch_array($retVal);
	
	//retrive data
	$flower_Price = $data['price'];
	$flower_subCatogory = $data['subCatogory'];
	$flower_haveFlower = $data['haveFlower'];
		if($flower_haveFlower == 1){
			$hveornot = "Yes";
		}
		else{
			$hveornot = "No";
		}
	$flower_color = $data['color'];
	$flower_height = $data['plantHeight'];
	$flower_climate = $data['climateCondition'];
	$flower_extra = $data['extraDetails'];
	$flower_name = $data['Image'];
	
	$favourite_query = "select * from sf_favourites where user_id='$userIdInTable' and mainCatogory = '$main_category' and subCatogory= '$sub_category'
						and color = '$flower_color' and plantHeight='$flower_height' and extraDetails='$flower_extra'";
	
	$getRow = mysql_query($favourite_query);
	if(mysql_num_rows($getRow)==1){
		$iconColorFav = 'red';
	}
	else{
		$iconColorFav = '';
	}
	$watch_query = "select * from sf_watched where user_id='$userIdInTable' and mainCatogory = '$main_category' and subCatogory= '$sub_category'
						and color = '$flower_color' and plantHeight='$flower_height' and extraDetails='$flower_extra'";
	
	$getRow = mysql_query($watch_query);
	if(mysql_num_rows($getRow)==1){
		$iconColorWatch = 'red';
	}
	else{
		$iconColorWatch = '';
	}
	
	
?>

<!DOCTYPE html>
<html lang="en" data-ng-app="sflora">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../favicon.ico">

    <title>Descriptive</title>
<link rel="shortcut icon" href="favicon.png">

    <link rel="stylesheet" href="../css/bootstrap.css">
    
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/slick.css">
    <link rel="stylesheet" href="../js/rs-plugin/css/settings.css">

<link href="../css/style.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap core CSS -->
   
    <link href="../css/berry.css" rel="stylesheet">
    <link href="../css/dashboard.css" rel="stylesheet">
   <!--  <link href="../css/sidebar.css" rel="stylesheet"> -->
	
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
  </head>

  <body data-ng-controller = "divChangeController" style="overflow-x:hidden;">
  
	<div data-ng-include="'navbar.php'"></div>
 
    <div class="container-fluid">
      <div class="row">
        
		<!--side bar suggestions-->
        <div class="navbar-header" id="btn2">
			<button type="button" class="navbar-toggle btn-category" data-toggle="collapse" data-target=".sidebar-collapse" id="btn">
				Suggestions
			</button>
			
			<!-- content -->
			<div class="col-md-2 col-sm-1 sidebar">
				<div class="nav nav-sidebar backcl ">
		

				</div>
			</div>
		
        </div>

        
		
		
		
		<!--start of rest of body-->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			
			<section>
			<form name = "getDetail" method="post" action="addToOrder.php?main_category=<?php echo $main_category;?>&sub_category=<?php echo $sub_category;?>&color=<?php echo $flower_color;?>&price=<?php echo $flower_Price;?>&Image=<?php echo $flower_name;?>">
        <div class="container">
			
            <div class="row cusMargin1">
                <div class="col-lg-12">
                    
                        <div class="row">
							<div class="col-xs-6 col-sm-5">
							<?php
								echo '<img src="../img/Flowers/'.$main_category.'/'.$flower_name.'"  class="descriptive-Img img-thumbnail-descriptive" alt="Generic placeholder thumbnail">';								
							?>
							</div>

                            <div class="col-md-5 cusMargin2">
								<h3 class="text-muted"><?php echo $sub_category.' '; echo $color_category;  ?></h3>
								<hr>
								<div class =" container col-md-10">
								<h4>
									<ul class="list-inline">
										<li>Price&nbsp; Rs:</li>
										<li class="vcenter"><text class="form-control form-control-md" style="width:80px"><?php echo $flower_Price.'.00'; ?></text></li>
									</ul> 
									
									<form name="onlyAddtoCart" method="post" action="addToCart.php">
									<ul class="list-inline">
										<li>Amount &nbsp;&nbsp; </li>
										<li class="vcenter"><input type ="text" class="form-control form-control-md" style="width:82px" name="amount" ng-model="amountmdl"/></li>
									</ul>
									
									<ul class="list-inline">
										<li><a href="addToOrder.php"><button type="submit" class="btn btn-default btn-md" name="placeOrder"><i class="fa fa-tag"></i> Place order</button></a></li> 
										<li><a href="addToCart.php?main_category=<?php echo $main_category;?>&sub_category=<?php echo $sub_category;?>&color=<?php echo $flower_color;?>&Image=<?php echo $flower_name;?>&price=<?php echo $flower_Price;?>&amount={{amountmdl}}"><button type="button" class="btn btn-default btn-md" name="placeInCart"><i class="fa fa-shopping-cart"></i> Add to Cart</button></a></li>
									</ul>
									<ul class="list-inline">
										<li><a href="../sources/php/add_watch_fav.php?id=fav&main_category=<?php echo $main_category;?>&sub_category=<?php echo $sub_category;?>&flower_color=<?php echo $flower_color;?>&flower_height=<?php echo $flower_height;?>&flower_extra=<?php echo $flower_extra;?>&flower_name=<?php echo $flower_name;?>&flower_Price=<?php echo $flower_Price;?>"><button type="button" class="btn btn-default btn-md" name="prefer"><i class="fa fa-heart" style="color:<?php echo $iconColorFav;?>;"></i></button></a></li> 
										<li><a href="../sources/php/add_watch_fav.php?id=watch&main_category=<?php echo $main_category;?>&sub_category=<?php echo $sub_category;?>&flower_color=<?php echo $flower_color;?>&flower_height=<?php echo $flower_height;?>&flower_extra=<?php echo $flower_extra;?>&flower_name=<?php echo $flower_name;?>&flower_Price=<?php echo $flower_Price;?>"><button type="button" class="btn btn-default btn-md" name="watch"><i class="fa fa-eye" style="color:<?php echo $iconColorWatch;?>;"></i></button></a></li>
									</ul>
									</form>
								</h4>
								</div>	
                            </div>
							<div class="col-md-5 cusMargin2">
								<h3 class="text-muted ">Info</h3>
								<hr>
								<div class =" container col-md-10">
									<ul class="list-inline">
										<li><h4>Dilivery</h4></li> 
										<li><h5>depends on your location</h5></li>
									</ul>
									<ul class="list-inline">
										<li><h4>Payment</h4></li> 
										<li><h5>At delevery position</h5></li>
									</ul> 
								</div>
							</div>
                            
                            
                        </div>
                    
                </div>
            </div>
        </div>
		</form>
    </section>
	
	<section>
		<div class="container">
			<div class="raw">
				<h3 class="text-muted ">Description</h3>
				<hr>
				<div class="container col-md-10">
					<div class="raw">
						<?php 
							if($main_category == 'Pots'){
								$value=1;
							}
							else if($main_category == 'Fertilizer'){
								$value=2;
							}
							else{
								$value=0;
							}
						?>
						<ul class="list-inline" ng-show="<?php echo $value; ?>==1">
							<li><h4>Made of</h4></li> 
							<li><h5><?php echo $flower_subCatogory; ?></h5></li>
						</ul>
						<ul class="list-inline" ng-show="<?php echo $value; ?>==0">
							<li><h4>Name</h4></li> 
							<li><h5><?php echo $flower_subCatogory; ?></h5></li>
						</ul>
						<ul class="list-inline" ng-show="<?php echo $value; ?>==2">
							<li><h4>Type</h4></li> 
							<li><h5><?php echo $flower_subCatogory; ?></h5></li>
						</ul>
						<ul class="list-inline" ng-show="<?php echo $value; ?>==0">
							<li><h4>Have flowers</h4></li> 
							<li><h5><?php echo $hveornot;?></h5></li>
						</ul>
						<ul class="list-inline" ng-show="<?php echo $value; ?>==1 || <?php echo $value; ?>==0">
							<li><h4>Color</h4></li> 
							<li><h5><?php echo $flower_color;?></h5></li>
						</ul>
						<ul class="list-inline" ng-show="<?php echo $value; ?>==2">
							<li><h4>Included</h4></li> 
							<li><h5><?php echo $flower_color;?></h5></li>
						</ul>
						<ul class="list-inline" ng-show="<?php echo $value; ?>==1">
							<li><h4>Height</h4></li> 
							<li><h5><?php echo $flower_height.' inches'?></h5></li>
						</ul>
						<ul class="list-inline" ng-show="<?php echo $value; ?>==0">
							<li><h4>Height of plant </h4></li>
							<li><h5><?php echo $flower_height.' inches'?></h5></li>
						</ul>
						<ul class="list-inline" ng-show="<?php echo $value; ?>==0">
							<li><h4>Climatic conditions</h4></li> 
							<li><h5><?php echo $flower_climate ?></h5></li>
						</ul>
						<ul class="list-inline" ng-show="<?php echo $value; ?>==1">
							<li><h4>Diameter</h4></li> 
							<li><h5><?php echo $flower_extra.' inches'?></h5></li>
						</ul>
						<ul class="list-inline" ng-show="<?php echo $value; ?>==0">
							<li><h4>Extra Details </h4></li>
							<li><h5><?php echo $flower_extra?></h5></li>
						</ul>
						<ul class="list-inline" ng-show="<?php echo $value; ?>==2">
							<li><h4>Weight </h4></li>
							<li><h5><?php echo $flower_extra?></h5></li>
						</ul>
						
						
					</div>
				</div>
			</div>
		</div>
	</section>
		</div>
      </div>
    </div>
	
	
	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/jquery.min.js"></script>	
    <script src="../js/bootstrap.js"></script>
	<script src="../js/angular.js"></script>
    <script src="../js/angular.route.js"></script>


<script src="../js/bootstrap-transition.js"></script> 
<script src="../js/bootstrap-carousel.js"></script>
<script src="../js/script.js"></script>
	<script src="../sources/controllers/div-change-controller.js"></script>

  </body>
</html>
