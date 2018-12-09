<?php
if(isset($_POST["btnUpdateTool"])){
	$tlName = mysqli_real_escape_string($conn, $_POST["tlName"]);
	$tlVariation = mysqli_real_escape_string($conn, $_POST["tlVariation"]);
	$tlQuantity = mysqli_real_escape_string($conn, $_POST["tlQuantity"]);
	$tlAvailable = mysqli_real_escape_string($conn, $_POST["tlAvailable"]);
	$tlStore = mysqli_real_escape_string($conn, $_POST["tlStore"]);
	$updateNote = mysqli_real_escape_string($conn, $_POST["updateNote"]);
	$tlID = mysqli_real_escape_string($conn, $_POST["tlID"]);

	$utool = mysqli_query($conn, "UPDATE tools SET tlName = '{$tlName}', tlVariation = '{$tlVariation}', tlQuantity = '{$tlQuantity}', tlAvailable = '{$tlAvailable}', tlStore = '{$tlStore}' WHERE tlID = '{$tlID}' ");

	if($utool){
		//log
		$date = date("Y-m-d");
		$time = date("H:i:s");
		$message = "Tool $tlName updated with reason : ".$updateNote;
		$ilog = mysqli_query($conn,"INSERT INTO logs (logDate, logTime, logAction, logUser) VALUES ('$date', '$time', '$message', '$userID')");
		echo "<script>alert('$message')</script>";
		//header("Location: updateAdmin.php?id=$admID");
	}else{
		//log
		$date = date("Y-m-d");
		$time = date("H:i:s");
		$message = "Update tool $tlName updated failed";
		$ilog = mysqli_query($conn,"INSERT INTO logs (logDate, logTime, logAction, logUser) VALUES ('$date', '$time', '$message', '$userID')");

		echo "<script>alert('$message')</script>";
	}
}
?>