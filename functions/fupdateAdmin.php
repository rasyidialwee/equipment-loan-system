<?php
if(isset($_POST["btnUpdateAdmin"])){
	$admName = mysqli_real_escape_string($conn, $_POST["admName"]);
	$admEmail = mysqli_real_escape_string($conn, $_POST["admEmail"]);
	$admPhone = mysqli_real_escape_string($conn, $_POST["admPhone"]);
	$admDepartment = mysqli_real_escape_string($conn, $_POST["admDepartment"]);
	$admID = mysqli_real_escape_string($conn, $_POST["admID"]);
	echo "<script>alert('$admDepartment')</script>";
	echo "<script>alert('$admID')</script>";

	if ($admDepartment === "Select") {
		$uadm = mysqli_query($conn, "UPDATE admins SET admName = '{$admName}', admEmail = '{$admEmail}', admPhone = '{$admPhone}' WHERE admID = '{$admID}' ");
	}else{
		$uadm = mysqli_query($conn, "UPDATE admins SET admName = '{$admName}', admEmail = '{$admEmail}', admPhone = '{$admPhone}', admDepartment = '{$admDepartment}' WHERE admID = '{$admID}' ");
	}

	if($uadm){
		//log
		$date = date("Y-m-d");
		$time = date("H:i:s");
		$message = "Admin $admName updated success";
		$ilog = mysqli_query($conn,"INSERT INTO logs (logDate, logTime, logAction, logUser) VALUES ('$date', '$time', '$message', '$userID')");

		header("Location: updateAdmin.php?id=$admID");
	}else{
		//log
		$date = date("Y-m-d");
		$time = date("H:i:s");
		$message = "Admin $admName updated failed";
		$ilog = mysqli_query($conn,"INSERT INTO logs (logDate, logTime, logAction, logUser) VALUES ('$date', '$time', '$message', '$userID')");

		echo "<script>alert('$message')</script>";
	}
}
?>