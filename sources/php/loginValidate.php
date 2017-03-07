<?php
	session_start();
	
	$dbhost = "127.0.0.1";
	$dbuser = "root";
	$dbpass = "root";
	$errMsg = "";
	
	$conn = mysql_connect($dbhost,$dbuser,$dbpass);
	
	if(! $conn) //if not connected
	{
		die('Could not connect to db'.mysql_error());
	}
	
	mysql_select_db("sflora"); //select database
	
	//validate
	if(isset($_POST['login_sbtn']))
	{
			$login_userEmail = $_POST['login_userEmail'];
			$login_userPass = sha1($_POST['login_userPass']);
			
			//select user query
			$sqlQuerry = " select * from sf_user where email = '$login_userEmail' and userPass = '$login_userPass' ";
			$retVal = mysql_query($sqlQuerry);
			$data = mysql_fetch_array($retVal);
			
			if(mysql_num_rows($retVal) > 0){
				
				$userIdInTable = $data['userId'];
				$userNameInTable = $data['name'];
				$userTypeInTable = $data['Type'];
				
				$_SESSION ['userIdInTable']   = $userIdInTable;
				$_SESSION ['userNameInTable'] = $userNameInTable;
				$_SESSION ['userTypeInTable'] = $userTypeInTable;
				
				
				echo '<script>';
				echo 'location.href="../../views/home.php"';
				echo '</script>';
			}	
			else{
				$errMsg = 'Error. User email or Passwrod incorrect';
			}
		
			if($errMsg != "")
			{
				echo '<script>';
				echo 'alert("Enter a valid Email or password");';
				echo 'location.href="../../views/login.php"';
				echo '</script>';
			}	
		
		
		
	}
	if(isset($_GET['id'])){
		$_SESSION ['userIdInTable'] = '';
		$_SESSION ['userNameInTable'] = '';
		$_SESSION ['userTypeInTable'] = '';
		
		echo '<script>';
		echo 'location.href="../../views/login.php"';
		echo '</script>';
	}
?>