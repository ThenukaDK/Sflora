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
	
	//add to favourites
	if($_GET['id'] == "fav"){
		$main_category = $_GET['main_category'];
		$sub_category = $_GET['sub_category'];
		$flower_color = $_GET['flower_color'];
		$flower_height = $_GET['flower_height'];
		$flower_extra = $_GET['flower_extra'];
		$flower_name = $_GET['flower_name'];
		$flower_Price = $_GET['flower_Price'];
		
		$favQuery = "insert into sf_favourites values('$userIdInTable','$main_category','$sub_category','$flower_color',
													  '$flower_height','$flower_extra','$flower_name','$flower_Price')";
		mysql_query($favQuery);
		
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	
	}
	
	//add to watch list
	if($_GET['id'] == "watch"){
		$main_category = $_GET['main_category'];
		$sub_category = $_GET['sub_category'];
		$flower_color = $_GET['flower_color'];
		$flower_height = $_GET['flower_height'];
		$flower_extra = $_GET['flower_extra'];
		$flower_name = $_GET['flower_name'];
		$flower_Price = $_GET['flower_Price'];
		
		$favQuery = "insert into sf_watched values('$userIdInTable','$main_category','$sub_category','$flower_color',
													  '$flower_height','$flower_extra','$flower_name','$flower_Price')";
		mysql_query($favQuery);
		
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	
	}
	
	//delete favourites
	if($_GET['id'] == "delfav"){
		$main_category = $_GET['main_category'];
		$sub_category = $_GET['sub_category'];
		$flower_color = $_GET['flower_color'];
		$flower_height = $_GET['flower_height'];
		$flower_extra = $_GET['flower_extra'];
		$flower_name = $_GET['flower_name'];
		$flower_Price = $_GET['flower_Price'];
		
		$favDelQuery = "delete from sf_favourites where user_id='$userIdInTable' and mainCatogory='$main_category' and subCatogory='$sub_category' and 
						color='$flower_color' and plantHeight='$flower_height' and extraDetails='$flower_extra'";
		mysql_query($favDelQuery) or die('Delete fails'.mysql_error());
		
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
	
	//delete watch list
	if($_GET['id'] == "delWatch"){
		$main_category = $_GET['main_category'];
		$sub_category = $_GET['sub_category'];
		$flower_color = $_GET['flower_color'];
		$flower_height = $_GET['flower_height'];
		$flower_extra = $_GET['flower_extra'];
		$flower_name = $_GET['flower_name'];
		$flower_Price = $_GET['flower_Price'];
		
		$favDelQuery = "delete from sf_watched where user_id='$userIdInTable' and mainCatogory='$main_category' and subCatogory='$sub_category' and 
						color='$flower_color' and plantHeight='$flower_height' and extraDetails='$flower_extra'";
		mysql_query($favDelQuery) or die('Delete fails'.mysql_error());
		
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
	
?>