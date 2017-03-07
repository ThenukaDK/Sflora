<?php
	session_start();
	
	$dbhost = "127.0.0.1";
	$dbuser = "root";
	$dbpass = "root";
	$errMsg = "";
	
	if(isset($_POST['savebtn'])){
	
		$currentUser = $_SESSION ['userIdInTable'];
		$changePosition = $_POST['carrierPosition'];
		$changeCompany = $_POST['carrierCompany'];
		$changeAddress = $_POST['carrierAddress'];
	
	
	
		$conn = mysql_connect($dbhost,$dbuser,$dbpass);
	
		if(! $conn) //if not connected
		{
			die('Could not connect to mysql'.mysql_error());
		}
	
		mysql_select_db("sflora") or die('could not connect to db'.mysql_error()); //select datbase
	
	
		$sqlQry = "update sf_user set jobPosition = '$changePosition', jobCompany = '$changeCompany', jobAddress = '$changeAddress'  
				   where userId = '$currentUser'";
				   
		mysql_query($sqlQry) or die('could not run the querry'.mysql_error());
	
		echo"<script>";
		echo"alert('Data entered successfully..!')";
		echo"</script>";
		
		echo "<script>";
		echo "location.href='".$_SERVER['HTTP_REFERER']."'";
		echo "</script>";
		

	}	
?>