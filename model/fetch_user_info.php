<?php
require_once("../assets/connection.php"); 

if(isset($_POST["action"])){
	if($_POST["action"] == "getUserID"){
		$matricID = $_POST["matricID"];
		
		$getUser = mysqli_query($conn,"SELECT * FROM users WHERE usrMatricID LIKE '%$matricID%'");
		$fetchUser = mysqli_fetch_assoc($getUser);
		$numUser = mysqli_num_rows($getUser);

		if($numUser != 0){
			$output = 
					"
					<p><b>Matric ID : </b><span id='usrMatricID'>".$fetchUser["usrMatricID"]."</span></p>
					<p><b>Name : </b>".$fetchUser["usrName"]."</p>
					<p><b>Course : </b>".$fetchUser["usrCourse"]."(".$fetchUser["usrFac"].")</p>
					<p><b>Email : </b>".$fetchUser["usrEmail"]."</p>
					<p><b>Phone : </b>".$fetchUser["usrPhone"]."</p>
					";
		}else{
			$output = "
			<p>No User Found</p>
			<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#addUser' style='margin-bottom:10px;'>Add New User</button>
			";
		}
		
		
	}
	
	echo $output;
}

?>