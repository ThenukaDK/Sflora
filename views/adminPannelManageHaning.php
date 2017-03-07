<?php
	session_start();
	
	mysql_connect("localhost","root","root");
	mysql_select_db('sflora') or die("Not connected to the db");
	
	if($_SESSION ['userIdInTable'] == ''){
		echo '<script>';
		echo 'location.href="login.php"';
		echo '</script>';
	}
	
	$userIdInTable = $_SESSION ['userIdInTable'];
	$userNameInTable = $_SESSION ['userNameInTable'];
	$userTypeInTable = $_SESSION ['userTypeInTable'];
	
	$table = $_GET['table'];
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

    <title>admin Panel-Haning-Pots-detail</title>
	
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
        <h1>Haning Pots</h1>
        <p class="lead">Add new Haning Pots or edit existing Flowers</p>
		<a href=""><button type="button" class="btn btn-default" data-ng-click="clickbtn='adminPanelAddNewFlower.php?table=<?php echo $table;?>'" ><span class="fa fa-plus"></span> Add new Haning Pots</button></a>
		<a href=""><button type="button" class="btn btn-default" data-ng-click="clickbtn=''" ><span class=""></span> Cancel</button></a>
		<br>
		<br>
		<a href="adminPanelFlowers.php"><button type="button" class="btn btn-default" data-ng-click="clickbtn=''" ><span class="fa fa-arrow-left"></span> Add another Flower</button></a>
	  </div>
    </div>
	
	<div data-ng-include="clickbtn"></div>
	
	<div class="table-responsive">
			<p class="lead">Haning Pots Flowers in database</p>
			<hr>
            <table class="table table-striped">
              <thead>
                <tr>
                 <th>Main Catagory</th>
                  <th>Sub Catagory</th>
                  <th>Price</th>
                  <th>Stock</th>
                  <th>Have Flowers</th>
				  <th>Color</th>
				  <th>Plant Height</th>
				  <th>Climatic Condition</th>
				  <th>Extra details</th>
				  <th>Image</th>
				  <th>Uplad new picture</th>
				  <th>added Date</th>
				  <th>Save</th>
				  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php
					//retrieve flower details    
					$details = "select * from sf_flowers_".$table."";
					$result = mysql_query($details);
					while ($data = mysql_fetch_array($result)){
						echo'
						<form enctype="multipart/form-data" name="addAnthurium" method="post" action="addFlowersToDb.php?table=sf_flowers_'.$table.'"> 
							<tr>
								<td><input type="text" class="" placeholder="No data" name="mainCatogory" value="'.$data['mainCatogory'].'"/></td>
								<td><input type="text" class="" placeholder="No data" name="subCatogory" value="'.$data['subCatogory'].'"/></td>
								<td><input type="text" class="" placeholder="No data" name="price" value="'.$data['price'].'"/></td>
								<td><input type="text" class="" placeholder="No data" name="stock" value="'.$data['stock'].'"/></td>
								<td><input type="text" class="" placeholder="No data" name="haveFlower" value="'.$data['haveFlower'].'"/></td>
								<td><input type="text" class="" placeholder="No data" name="color" value="'.$data['color'].'"/></td>
								<td><input type="text" class="" placeholder="No data" name="plantHeight" value="'.$data['plantHeight'].'"/></td>
								<td><input type="text" class="" placeholder="No data" name="climateCondition" value="'.$data['climateCondition'].'"/></td>
								<td><input type="text" class="" placeholder="No data" name="extraDetails" value="'.$data['extraDetails'].'"/></td>
								<td><input type="text" class="" placeholder="No data" name="Image" value="'.$data['Image'].'"/></td>
								<td><input type="file" name="uploadedPic"></input></td>
								<td><input type="text" class="" placeholder="No data" name="addedDate" value="'.$data['addedDate'].'"/></td>
								<td><button type="submit" class="btn btn-default" name="save"><span class="fa fa-floppy-o"></span> Save</button></td>
								<td><button type="submit" class="btn btn-default" name="delete"><span class="fa fa-times-circle-o"></span> Delete</button></td>
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