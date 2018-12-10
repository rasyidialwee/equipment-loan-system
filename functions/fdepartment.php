<?php
if(isset($_POST["btnAddDepartment"])){
	$dprtName = mysqli_real_escape_string($conn, $_POST["dprtName"]);
	$dprtAbbr = mysqli_real_escape_string($conn, $_POST["dprtAbbr"]);


	//check if faculty existed
	$checkDB = mysqli_query($conn, "SELECT * FROM departments WHERE dprtName = '{$dprtName}' OR dprtAbbr = '{$dprtAbbr}' ");
	$checkResult = mysqli_num_rows($checkDB);

	if ($checkResult > 0) { //the department with name or abbr inserted is exist in database
		echo "<script>alert('The department with name or abbreviation you inserted in already exist. Please insert another name or abbreviate.')</script>";
	}else{ //no recorded department in the database
		//insert into database
		$idprt = mysqli_query($conn,"INSERT INTO departments (dprtName, dprtAbbr) VALUES ('{$dprtName}', '{$dprtAbbr}') ");

		//check if the insertion success
		if($idprt){
			//log
			$date = date("Y-m-d");
			$time = date("H:i:s");
			$message = "Add a department $dprtName Successful";
			$user = $userID;
			$ilog = mysqli_query($conn,"INSERT INTO logs (logDate, logTime, logAction, logUser) VALUES ('{$date}', '{$time}', '{$message}', '{$userID}')");

			echo "<script>alert('$message')</script>";
		}else{
			//log
			$date = date("Y-m-d");
			$time = date("H:i:s");
			$message = "Add a department $dprtName Failed";
			$user = $fetchAdm["admID"];
			$ilog = mysqli_query($conn,"INSERT INTO logs (logDate, logTime, logAction, logUser) VALUES ('{$date}', '{$time}', '{$message}', '{$userID}')");

			echo "<script>alert('$message')</script>";
		}
	}
}

if(isset($_GET["delete"])){

	$id = mysqli_real_escape_string($conn, $_GET["delete"]);
	
	$ddprt = mysqli_query($conn,"DELETE FROM departments WHERE dprtID = '$id'");
	//log
	$date = date("Y-m-d");
	$time = date("H:i:s");
	$message = "department with ID $id deleted";
	$ilog = mysqli_query($conn,"INSERT INTO logs (logDate, logTime, logAction, logUser) VALUES ('{$date}', '{$time}', '{$message}', '{$userID}')");
}

?>