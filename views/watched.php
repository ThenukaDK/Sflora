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

      <!-- Jumbotron -->
      <div class="jumbotron">
        <h1>Watched</h1>
        <p class="lead">View your watched flowers</p>
      </div>

      <!-- Example row of columns -->
	  
      <div class="row">
		<?php
			$query = "select * from sf_watched where user_id = '$userIdInTable'";
			$result = mysql_query($query);
			while ($data = mysql_fetch_array($result)){
				$main_category = $data['mainCatogory'];
				$sub_category = $data['subCatogory'];
				$flower_color = $data['color'];
				$flower_height = $data['plantHeight'];
				$flower_extra = $data['extraDetails'];
				$flower_name = $data['Image'];
				$flower_Price = $data['price'];
				
				
				
				echo '
					<div class="placeholders" style="margin-top:40px;">
					<div class="col-xs-6 col-sm-3 placeholder">
						<a href="descriptive.php?main='.$main_category.'&sub='.$sub_category.'&color='.$flower_color.'&extra='.$flower_extra.'" >
							<img src="../img/Flowers/'.$main_category.'/'.$flower_name.'" class="img-responsive" alt="Generic placeholder thumbnail">
						</a>
						<h4>'.$sub_category.'</h4>
						<h4>'.$flower_color.'</h4>
						<ul class="list-inline">
							<li><span class="text-muted" style="color:blue;">Price &nbsp;<span class="badge">'.$flower_Price.'.00'.'</span></span></li>
						</ul>
						<a href="../sources/php/add_watch_fav.php?id=delWatch&main_category='.$main_category.'&sub_category='.$sub_category.'&flower_color='.$flower_color.'&flower_height='.$flower_height.'&flower_extra='.$flower_extra.'&flower_name='.$flower_name.'&flower_Price='.$flower_Price.'"><button class="btn"><span class="fa fa-times-circle"></span>Remove</button></a>
					</div>
					</div>
				';
			}
		?>
      </div>
	  
    </div>
