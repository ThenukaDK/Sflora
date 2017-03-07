<?php
	
	session_start();
	
	mysql_connect("localhost","root","root") or die("Not connected");
	mysql_select_db('sflora') or die("Not connected to the db");
	
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
<html lang="en" data-ng-app="sflora">
  <head>
    

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../favicon.ico">

    <title>Home</title>

	<link rel="shortcut icon" href="favicon.png">

    <link rel="stylesheet" href="../css/bootstrap.css">
    
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/slick.css">
    <link rel="stylesheet" href="../js/rs-plugin/css/settings.css">
    <!-- Bootstrap core CSS -->
   
    <link href="../css/berry.css" rel="stylesheet">
    <link href="../css/dashboard.css" rel="stylesheet">
   <!--  <link href="../css/sidebar.css" rel="stylesheet"> -->

  </head>

  <body ng-controller="divChangeController">
    
  <div data-ng-include="'navbar.php'"></div>
   
    <div class="container-fluid">
      <div class="row">
         <div class="navbar-header" id="btn2">
          <button type="button" class="navbar-toggle btn-category" data-toggle="collapse" data-target=".sidebar-collapse" id="btn">
            Categories
          </button>
        
        </div>



        <div class="col-sm-3 col-md-2 sidebar-collapse sidebar">
          <ul class="nav nav-sidebar backcl ">
            <li><a href="" data-ng-click="template= 'newlyArrived.php';value=1"  >Newly Arrived</a></li>
			<li><a href="" data-ng-click="template= 'anthurium.php';value=1">Anthurium</a></li>
            <li><a href="" data-ng-click="template= 'orchids.php';value=1">Orchids </a></li>
            <li><a href="" data-ng-click="template= 'aglonima.php';value=1">Aglonima</a></li>
            <li><a href="" data-ng-click="template= 'farms.php';value=1">Farms</a></li>
            <li><a href="" data-ng-click="template= 'colias.php';value=1">Colias</a></li>
            <li><a href="" data-ng-click="template= 'decorative.php';value=1">Decorative Flowers</a></li>
            <li><a href="" data-ng-click="template= 'hanging.php';value=1">Hanging pot plants</a></li>
            <li><a href="" data-ng-click="template= 'water.php';value=1">Water plants</a></li>
            <li><a href="" data-ng-click="template= 'roses.php';value=1">Roses</a></li>
			<li><a href="" data-ng-click="template= 'pots.php';value=1">Flower Pots</a></li>
            <li><a href="" data-ng-click="template= 'fertilizer.php';value=1">Fertilizers</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main ">

<!-- Search Bar Code -->

<div ng-hide="value ==1">
<?php



 if(isset($_POST['typeahead']))
 {
  $search_name = $_POST['typeahead'];
  $search_name = preg_replace("#[^0-9a-z/]#i", "", $search_name);
  
    $querry = mysql_query("select * from sf_whole_table where mainCatogory LIKE '%{$search_name}%' or color LIKE '%{$search_name}%' or subCatogory LIKE '%{$search_name}%'");

  $count = mysql_num_rows($querry);
echo '<h1 class="page-header">Search Results for '.$search_name.'</h1>';
  if($count == 0)
  {
    echo '<h3>Sorry No results Found!!</h3><img src="../img/images/sadface.png"  class="img-responsive" alt="Sad Face">';
   
  }

  else
  {

    while ($data = mysql_fetch_array($querry)) 
    {
      $image_mainCategory = $data['mainCatogory'];
      $image_name = $data['Image'];
        $image_subCategory = $data['subCatogory'];
        $image_color = $data['color'];
      $image_price = $data['price'];
      $image_stock =$data['stock'];
	  $image_extra = $data['extraDetails'];
       echo '
   
  <div class="placeholders" style="margin-top:40px;" >
        <div class="col-xs-6 col-sm-3 placeholder">
        <a href="descriptive.php?main=Anthurium&sub='.$image_subCategory.'&color='.$image_color.'&extra='.$image_extra.'" >
              <img src="../img/Flowers/'.$image_mainCategory.'/'.$image_name.'"  class="img-responsive" alt="Generic placeholder thumbnail">
        </a>      
              <p>'.$image_subCategory.'</p>
              <h4>'.$image_color.' </h4>
              <span class="text-muted" style="color:blue;">In stock &nbsp;<span class="badge">'.$image_stock.'</span></span>
              <h5>Rs.'.$image_price.' each</h5>
        </div>
  </div>';

    }
  }
 }


?>
 
</div>

<!-- Newly Arrived Code -->

<?php if(!isset($_POST['sub'])){ ?>
<div ng-hide="value ==1">
    <?php

$count = 0;

 
$result = mysql_query("select * from  sf_whole_table order by addedDate DESC");


echo '<h1 class="page-header" style="color:#944D94">Newly Arrived</h1>';

while (($data = mysql_fetch_array($result)) && ($count<12)) {
  $image_name = $data['Image'];
  $image_mainCategory = $data['mainCatogory'];
  $image_subCategory = $data['subCatogory'];
  $image_color = $data['color'];
  $image_price = $data['price'];
  $image_stock =$data['stock'];
  $image_extra = $data['extraDetails'];
  echo '
   
  <div class="placeholders" style="margin-top:40px;">
        <div class="col-xs-6 col-sm-3 placeholder"> 
         <span class="label label-success bottom-right" style="background-color:#944D94;position:absolute;margin-left:20%;">New</span> 
        <a href="descriptive.php?main='.$image_mainCategory.'&sub='.$image_subCategory.'&color='.$image_color.'&extra='.$image_extra.'" >
              <img src="../img/Flowers/'.$image_mainCategory.'/'.$image_name.'"  class="img-responsive" alt="Generic placeholder thumbnail">
        </a>     
              <p style="color:#944D94;">'.$image_subCategory.'</p>
              <h4 style="color:#944D94;">'.$image_color.' </h4>
              <span ng-show='.$image_stock.'!=null class="text-muted" style="color:blue;">In stock &nbsp;<span class="badge" style="background-color: #8585E0;">'.$image_stock.'</span></span>
              <h5 style="color:#944D94;">Rs.'.$image_price.' each</h5>
        </div>
  </div>';
  $count = $count + 1;
}
?>
</div><?php } ?>

<div data-ng-include="template" ></div>
          
        </div>
      </div> 
    </div>

   <!--  <footer>
        <div class="container">

            <div class="copy text-center">
                Copyright 2014 &copy; - <a href="#">sflora.lk</a>
            </div>

        </div>
    </footer>
 -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

 <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->

	<script src="js/jquery-1.11.1.min.js"></script>
  <script src="../js/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="../js/bootstrap.js"></script>
     <script src="../js/angular.js"></script>
    <script src="../js/angular-route.js"></script>
     <script src="../sources/controllers/div-change-controller.js"></script>


  </body>
</html>
