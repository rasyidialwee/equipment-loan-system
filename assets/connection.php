<?php
$host = "localhost";
$username = "root";
$pwd = "";
$db = "fyp";

$conn = mysqli_connect($host, $username, $pwd, $db);
date_default_timezone_set("Asia/Kuala_Lumpur"); 

if(!$conn){
	echo "<script>alert('Error connecting to database')</script>";
}
?>