<?php
	session_start();
	
	mysql_connect("localhost","root","root");
	mysql_select_db('sflora') or die("Not connected to the db");
	
	$userId = $_GET['id'];
	$userType = $_POST['Type'];
	
	if(isset($_POST['save'])){
		
		//save user type in DB
		$querry = "update sf_user set Type= '$userType' where userId = '$userId'";
		mysql_query($querry);
		
		echo "<script>";
		echo "location.href ='adminPanelUsers.php'";
		echo "</script>";
		
	}
	
	if(isset($_POST['delete'])){		
			
		//save user type in DB
		$querry = "delete from sf_user where userId = '$userId'";
		mysql_query($querry);
			
		echo "<script>";
		echo "location.href ='adminPanelUsers.php'";
		echo "</script>";
	}
	
	if(isset($_POST['savebtn'])){
		
		$id = md5(uniqid());
		$name = $_POST['personalName'];
		$email = $_POST['personalEmail'];
		$contact = $_POST['personalContact'];
		$address = $_POST['personalAddress'];
		$nic = $_POST['personalNIC'];
		$pass = sha1($_POST['password']);
		$Type = $_POST['Type'];
			
		//save user detail in DB
		$querry = "insert into sf_user values('$id','$name','$email','$contact','$nic','$pass','','$address','','','','','','','','$Type')";
		mysql_query($querry);
		
		//create new user folder 
		$new_user = "../../img/userPic/".$name;
		mkdir($new_user);
			
		echo "<script>";
		echo "location.href ='adminPanelUsers.php'";
		echo "</script>";
	}
	
?>