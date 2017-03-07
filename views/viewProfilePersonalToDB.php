<?php
	session_start();
	
	$dbhost = "127.0.0.1";
	$dbuser = "root";
	$dbpass = "root";
	$errMsg = "";
	
	if(isset($_POST['savebtn'])){
	
		$currentUser = $_SESSION ['userIdInTable'];
		$changeName = $_POST['personalName'];
		$changeEmail = $_POST['personalEmail'];
		$changeContact = $_POST['personalContact'];
		$changeAddress = $_POST['personalAddress'];
		$changeNIC = $_POST['personalNIC'];
	
	
		$conn = mysql_connect($dbhost,$dbuser,$dbpass);
	
		if(! $conn) //if not connected
		{
			die('Could not connect to mysql'.mysql_error());
		}
	
		mysql_select_db("sflora") or die('could not connect to db'.mysql_error()); //select datbase
	
	
		$sqlQry = "update sf_user set name = '$changeName', email = '$changeEmail', contact = '$changeContact',  
				   address = '$changeAddress', nic = '$changeNIC' where userId = '$currentUser'";
		mysql_query($sqlQry) or die('could not run the querry'.mysql_error());
		
		//updating session name
		$sessionNameqry = "select name from sf_user where userId = '$currentUser'";
		$retVal = mysql_query($sessionNameqry);
		$data = mysql_fetch_array($retVal);	
		$nameInForm = $data['name'];
		$_SESSION ['userNameInTable'] = $nameInForm;
		
		echo"<script>";
		echo"alert('Data entered successfully..!')";
		echo"</script>";
		
		echo "<script>";
		echo "location.href='".$_SERVER['HTTP_REFERER']."'";
		echo "</script>";
		
		
	}	
?>