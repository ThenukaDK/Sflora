<?php
	session_start();
	
	mysql_connect("localhost","root","root");
	mysql_select_db('sflora') or die("Not connected to the db");
	
	@$sign_up_id = md5(uniqid());
	@$sign_up_name = $_POST['sign_up_name'];
	@$sign_up_email = $_POST['sign_up_email'];
	@$sign_up_contact = $_POST['sign_up_contact'];
	@$sign_up_nic = $_POST['sign_up_nic'];
	@$sign_up_userPass = sha1($_POST['sign_up_userPass']);
	
	//check user Name
	$checkQuerry = "select name,email from sf_user";
	$result = mysql_query($checkQuerry);
	while($data = mysql_fetch_array($result)){
	
		if(($data['name']== $sign_up_name) OR ($data['email'] == $sign_up_email)){
			$hasUser = 1;
			break;
		}
		
		else{
			$hasUser = 0;
		}
	
	}
	
	if($hasUser == 0){
		//create new user folder 
		$new_user = "../../img/userPic/".$sign_up_name;
		mkdir($new_user);
	
	
		/*Insertion querry*/
		$sql ='INSERT INTO sf_user VALUES('.'"'.$sign_up_id.'","'.$sign_up_name.'","'.$sign_up_email.'","'.$sign_up_contact.'","'.$sign_up_nic.'","'.$sign_up_userPass.'","","","","","","","","","","user")'; //query										

		$retval = mysql_query($sql); //run the querry

		if(! $retval)
		{
			die('Could not run query: '.mysql_error());
			
		}
		else
		{
			//alert
			echo "<script>";
			echo "alert('Login using your email and password...:D')";
			echo "</script>";
			
			//if data entered successfully
			echo "<script>";
			echo "location.href = '../../views/login.php';";
			echo "</script>";
			
		}
	}
	else{
		//alert
		echo "<script>";
		echo "alert('User Name or Email already exists! Try a diffrenet one')";
		echo "</script>";
		
		//redirect
		echo "<script>";
		echo "location.href = '../../index.html#sign-up';";
		echo "</script>";
	}
?>