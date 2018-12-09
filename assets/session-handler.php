<?php

$userID = $_SESSION["userID"];
$getUserInfo = mysqli_query($conn,"SELECT admName,admEmail, admPhone, admDepartment FROM admins WHERE admID = '{$userID}' ");
$fetchUserInfo = mysqli_fetch_assoc($getUserInfo);
$userName = $fetchUserInfo["admName"];

if(!isset($_SESSION["userID"])){
	header("Location: login.php");
}
?>