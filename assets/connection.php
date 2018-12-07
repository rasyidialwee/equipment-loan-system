<?php

$host = "localhost";
$username = "root";
$pwd = "";
$db = "fyp";
/*
$host = "mysql.hostinger.my";
$username = "u847727884_loans";
$pwd = "#loans#";
$db = "u847727884_loans";
*/
$conn = mysqli_connect($host, $username, $pwd, $db);
date_default_timezone_set("Asia/Kuala_Lumpur"); 

if(!$conn){
	echo "<script>alert('Error connecting to database')</script>";
}
?>