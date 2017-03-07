<?php
	session_start();
	
	$userNameInTable = $_SESSION ['userNameInTable'];
	$userIdInTable = $_SESSION ['userIdInTable'];
	
	$target_path = "../img/userPic/".$userNameInTable."/";
	
	if($_FILES['uploadedPic']['error']>0){
	
		echo 'Error:'. $_FILES['uploadedPic']['error']."</br>";
	
	}
	else{
		//echo "uploaded:". $_FILES['uploadedPic']['name']."</br>";
	}
	
	if(file_exists($target_path.$_FILES['uploadedPic']['name'])){
		echo $_FILES['uploadedPic']['name']. " already exists";
	}
	
	else{
		$target_path = $target_path . $_FILES['uploadedPic']['name'];
		if(move_uploaded_file($_FILES['uploadedPic']['tmp_name'], $target_path)){
			//echo "The file". $_FILES['uploadedPic']['name']." Has been uploaded";
			$filename = $_FILES['uploadedPic']['name'];
		}
		else{
			echo "Error in uploading the file";
		}
	}

	//enter photo to database
	mysql_connect("localhost","root","root");
	mysql_select_db('sflora') or die("Not connected to the db");
	
	$querry = "update sf_user set imgUrl = '$filename' where userId = '$userIdInTable' ";
	mysql_query($querry);
	
	//redirect
	echo "<script>";
	echo "location.href='viewProfile.php'";
	echo "</script>";
	
?>