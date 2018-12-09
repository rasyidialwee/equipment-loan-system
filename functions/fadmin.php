<?php
if(isset($_POST["btnAddAdmin"])){
	$admName = mysqli_real_escape_string($conn, $_POST["admName"]);
	$admPwd = mysqli_real_escape_string($conn, $_POST["admPwd"]);
	$admEmail = mysqli_real_escape_string($conn, $_POST["admEmail"]);
	$admPhone = mysqli_real_escape_string($conn, $_POST["admPhone"]);
	$admDepartment = mysqli_real_escape_string($conn, $_POST["admDepartment"]);

	//check if admin exist
	$checkAdmin = mysqli_query($conn, "SELECT admEmail FROM admins WHERE admEmail = '{$admEmail}' ");
	$checkAdminResult = mysqli_num_rows($checkAdmin);

	if($checkAdminResult === 1){//check if admin with user is existed
		echo "<script>alert('Sorry admin with this email is already existed. Please use another email')</script>";
	}else{
		$hashPwd = password_hash($admPwd, PASSWORD_BCRYPT);
		$iadm = mysqli_query($conn, "INSERT INTO admins (admName, admPwd, admEmail, admPhone, admDepartment) VALUES ('{$admName}', '{$hashPwd}', '{$admEmail}', '{$admPhone}', '{$admDepartment}') ");

		if($iadm){
			//log
			$date = date("Y-m-d");
			$time = date("H:i:s");
			$message = "created admin $admName with email $admEmail";
			$ilog = mysqli_query($conn,"INSERT INTO logs (logDate, logTime, logAction, logUser) VALUES ('{$date}', '{$time}', '{$message}', '{$userID}')");

			echo "<script>alert('Admin create success')</script>";
		}else{
			//log
			$date = date("Y-m-d");
			$time = date("H:i:s");
			$message = "fail to create admin $admName with email $admEmail";
			$ilog = mysqli_query($conn,"INSERT INTO logs (logDate, logTime, logAction, logUser) VALUES ('{$date}', '{$time}', '{$message}', '{$userID}')");

			echo "<script>alert('Admin create failed')</script>";
		}
	}
}

if(isset($_GET["delete"])){
	$id = mysqli_real_escape_string($conn, $_GET["delete"]);
	
	$dtools = mysqli_query($conn,"DELETE FROM admins WHERE admID = '$id'");
	//log
	$date = date("Y-m-d");
	$time = date("H:i:s");
	$message = "admin with $id deleted";
	$ilog = mysqli_query($conn,"INSERT INTO logs (logDate, logTime, logAction, logUser) VALUES ('{$date}', '{$time}', '{$message}', '{$userID}')");
}
?>