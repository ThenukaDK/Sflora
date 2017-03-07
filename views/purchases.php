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
	
	$userId = $_SESSION ['userIdInTable'];
	
	//retrieve data from order
	$querry = "select * from sf_order where user_id= '$userId' order by orderdDate DESC";
	$result = mysql_query($querry);
	
?>

      <!-- Jumbotron -->
      <div class="jumbotron">
        <h1>Purchase History</h1>
        <p class="lead">View your purchased items watch lists and favourits</p>
      </div>

      <!-- Example row of columns -->
	  
      <div class="row">
		<?php
			while ($data = mysql_fetch_array($result)){
			
				$purchaseId = $data['purchase_id'];
				$main_category = $data['mainCatogory'];
				$sub_category = $data['subCatogory'];
				$color = $data['color'];
				$amount = $data['amount'];
				$price = $data['price'];
				$date = $data['orderdDate'];
				$Image = $data['Image'];
				$totalPrice = $data['totalPrice'];
				
				echo '
					<div class="placeholders" style="margin-top:40px;">
					<div class="col-xs-6 col-sm-3 placeholder">
						<img src="../img/Flowers/'.$main_category.'/'.$Image.'" class="img-responsive" alt="Generic placeholder thumbnail">
						<h4>'.$color.'</h4>
						<ul class="list-inline">
							<li>Ordered Date</li>
							<li>'.$date.'</li>
						</ul>	
						<ul class="list-inline">
							<li><span class="text-muted" style="color:blue;">Total Price &nbsp;<span class="badge">'.$totalPrice.'.00'.'</span></span></li>
						</ul>						
					</div>
					</div>
				';
			}
		?>
      </div>
	  
    </div>
	