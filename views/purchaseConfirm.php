<?php
	session_start();
	$userId = $_SESSION ['userIdInTable'];
	
	mysql_connect("localhost","root","root");
	mysql_select_db('sflora') or die("Not connected to the db");
	
	
	//retrive from temporary table sf_cart_temp
	$retquerry = "select * from sf_cart_temp";
	$result = mysql_query($retquerry);
	
	if($_GET['value']== 'Confirm'){
	
		while($data = mysql_fetch_array($result)){
		
			$purchaseId = $data['purchase_id'];
			$main_category = $data['mainCatogory'];
			$sub_category = $data['subCatogory'];
			$color = $data['color'];
			$amount = $data['amount'];
			$price = $data['price'];
			$Image = $data['Image'];
			$totalPrice = $data['totalPrice'];
			
			$orderedDate = date("y-m-d"); 
			
			//reduce stock
			if($main_category == 'Fertilizer'){
				$getamount = "select stock from sf_fertilizer where mainCatogory='$main_category' and subCatogory='$sub_category' and color='$color'";
				$retval = mysql_query($getamount);
				$data2 = mysql_fetch_array($retval);
				$newAmount = $data2['stock'] - $amount;
				
				$reducequery = "update sf_fertilizer set stock =".$newAmount." where mainCatogory='$main_category' and subCatogory='$sub_category' and color='$color'";
				mysql_query($reducequery) or die('Could not run reduce query'.mysql_error());
			}
			if($main_category != "Fertilizer" and $main_category != "Pots"){
				$getamount = "select stock from sf_flowers_".strtolower($main_category)." where mainCatogory='$main_category' and subCatogory='$sub_category' and color='$color'";
				$retval = mysql_query($getamount);
				$data2 = mysql_fetch_array($retval);
				$newAmount = $data2['stock'] - $amount;

				$reducequery = "update sf_flowers_".strtolower($main_category)." set stock =".$newAmount." where mainCatogory='$main_category' and subCatogory='$sub_category' and color='$color'";
				mysql_query($reducequery) or die('Could not run reduce query'.mysql_error());
			}
			if($main_category == 'Pots'){
				/*$getamount = "select stock from sf_pots where mainCatogory='$main_category' and subCatogory='$sub_category' and color='$color'";
				$result = mysql_query($getamount);
				$data = mysql_fetch_array($result);
				$amount = $data['stock'] - $amount;
				
				$reducequery = "update sf_pots set stock =".$amount." where mainCatogory='$main_category' and subCatogory='$sub_category' and color='$color'";
				mysql_query($reducequery) or die('Could not run reduce query'.mysql_error());
				
				echo "<script>";
				echo "location.href='home.php'";
				echo "</script>";*/
				
			}
	
			//exchange permanent order to sf_order	
			$insertQuery = "insert into sf_order values
					('$userId','$purchaseId','$main_category','$sub_category','$color','$amount','$price','$totalPrice','$orderedDate','$Image')";
			mysql_query($insertQuery) or die('could not run insert query'.mysql_error());
	
			//delete temp data from sf_cart_temp
			mysql_query("delete from sf_cart_temp where purchase_id = '$purchaseId'")or die('could not run delete query'.mysql_error());
			
			
		}
	}
	if($_GET['value']== 'noConfirm'){
		while($data = mysql_fetch_array($result)){
		
			$purchaseId = $data['purchase_id'];
			//delete temp data from sf_cart_temp
			mysql_query("delete from sf_cart_temp where purchase_id = '$purchaseId'")or die('could not run delete querry'.mysql_error());
		}	
	}
	
	if($_GET['value']== 'addMore'){
		
		echo "<script>";
		echo "location.href='home.php'";
		echo "</script>";
	
	}
		
	echo "<script>";
	echo "location.href='home.php'";
	echo "</script>";
?>


