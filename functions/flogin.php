<?php
if(isset($_POST["btnLogin"])){
	$admEmail = mysqli_real_escape_string($conn, $_POST["admEmail"]);
	$admPwd = mysqli_real_escape_string($conn, $_POST["admPwd"]);
	
	//check if user exist
	$checkAdm = mysqli_query($conn,"SELECT * FROM admins WHERE admEmail = '$admEmail'");
	$fetchAdm = mysqli_fetch_assoc($checkAdm);
	$checkAdmResult = mysqli_num_rows($checkAdm);
	
	if($checkAdmResult === 1){
		//dehash password
		$dehashPwd = password_verify($admPwd, $fetchAdm["admPwd"]);
		
		if($dehashPwd){
			@$_SESSION["userID"] = $fetchAdm["admID"];
			//log
			$date = date("Y-m-d");
			$time = date("H:i:s");
			$message = "Log in success";
			$user = $fetchAdm["admID"];
			$ilog = mysqli_query($conn,"INSERT INTO logs (logDate, logTime, logAction, logUser) VALUES ('$date', '$time', '$message', '$user')");
			
			header("Location: index.php");
		}else{
			//log
			$date = date("Y-m-d");
			$time = date("H:i:s");
			$message = "Log in failed";
			$user = $fetchAdm["admID"];
			$ilog = mysqli_query($conn,"INSERT INTO logs (logDate, logTime, logAction, logUser) VALUES ('$date', '$time', '$message', '$user')");
			echo"<script>alert('Email and Password Not Match')</script>";
		}
	}
}
?>