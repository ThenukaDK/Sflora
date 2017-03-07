<?php
	$dbhost = "127.0.0.1";
	$dbuser = "root";
	$dbpass = "root";
	

	$conn = mysql_connect($dbhost,$dbuser,$dbpass);
	
	if(! $conn) //if not connected
	{
		die('Could not connect to db'.mysql_error());
	}
	
	mysql_select_db("sflora"); //select datbase
	
	/*Insertion querry*/  
	$image ='select * from sf_flowers';								

	$retval = mysql_query($image); //run the querry

	if(! $retval)
	{
		die('Could not run query: '.mysql_error());
	}
	else
		echo '<img src="$retval">'; 
	
?>