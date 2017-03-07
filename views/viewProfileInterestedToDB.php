<?php
	session_start();
	
	$dbhost = "127.0.0.1";
	$dbuser = "root";
	$dbpass = "root";
	$errMsg = "";
	
	if(isset($_POST['savebtn'])){
	
		$currentUser = $_SESSION ['userIdInTable'];
		$catag1 = $_POST['interestedCatg1'];
		$catag2 = $_POST['interestedCatg2'];
		$catag3 = $_POST['interestedCatg3'];

	
	
		$conn = mysql_connect($dbhost,$dbuser,$dbpass);
	
		if(! $conn) //if not connected
		{
			die('Could not connect to mysql'.mysql_error());
		}
	
		mysql_select_db("sflora") or die('could not connect to db'.mysql_error()); //select datbase
	
	
		$sqlQry = "update sf_user set intrstCatg1 = '$catag1', intrstCatg2 = '$catag2', intrstCatg3 = '$catag3'  
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