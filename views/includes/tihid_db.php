<?php 
$dbhost = "127.0.0.1";
$dbuser = "root";
$dbpass = "root";
$database = "sflora";

$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $database) or die(mysqli_error());
?>