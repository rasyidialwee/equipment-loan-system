<?php
if(isset($_POST["btnAddTool"])){
	$tlName = mysqli_real_escape_string($conn, $_POST["tlName"]);
	$tlVariation = mysqli_real_escape_string($conn, $_POST["tlVariation"]);
	$tlQuantity = mysqli_real_escape_string($conn, $_POST["tlQuantity"]);
	$tlAvailable = $tlQuantity;
	$tlStore = mysqli_real_escape_string($conn, $_POST["tlStore"]);
	
	//check if tools exist
	$checkTool = mysqli_query($conn,"SELECT * FROM tools WHERE tlName = '$tlName' AND tlVariation = '$tlVariation' AND tlStore = '$tlStore' ");
	$checkToolResult = mysqli_num_rows($checkTool);
	
	if($checkToolResult === 1){
		echo "<script>alert('Sorry this item is already in the database. Equipment will not be added')</script>";
	}else{
		$itool = mysqli_query($conn,"INSERT INTO tools (tlName, tlVariation,tlQuantity, tlAvailable, tlStore) VALUES ('{$tlName}', '{$tlVariation}', '{$tlQuantity}', '{$tlAvailable}', '{$tlStore}') ");

		if($itool){
			//log
			$date = date("Y-m-d");
			$time = date("H:i:s");
			$message = "tool $tlName with variation $tlVariation added";
			$ilog = mysqli_query($conn,"INSERT INTO logs (logDate, logTime, logAction, logUser) VALUES ('$date', '$time', '$message', '$userID')");
			
			echo "<script>alert('$message')</script>";
		}else{
			//log
			$date = date("Y-m-d");
			$time = date("H:i:s");
			$message = "tool $tlName with variation $tlVariation failed to add";
			$ilog = mysqli_query($conn,"INSERT INTO logs (logDate, logTime, logAction, logUser) VALUES ('$date', '$time', '$message', '$userID')");
			echo "<script>alert('$message')</script>";
		}
	}
}

if(isset($_GET["delete"])){
	$id = mysqli_real_escape_string($conn, $_GET["delete"]);
	
	$dtools = mysqli_query($conn,"DELETE FROM tools WHERE tlID = '$id'");
	//log
	$date = date("Y-m-d");
	$time = date("H:i:s");
	$message = "tool $id deleted";
	$ilog = mysqli_query($conn,"INSERT INTO logs (logDate, logTime, logAction, logUser) VALUES ('$date', '$time', '$message', '$userID')");
}
?>