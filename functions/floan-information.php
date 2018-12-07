<?php
if(isset($_POST["btnUpdateLoan"])){
	$id = mysqli_real_escape_string($conn, $_POST["lnID"]);
	$quantity = mysqli_real_escape_string($conn, $_POST["lnQuantity"]);
	$tool = mysqli_real_escape_string($conn, $_POST["lnTool"]);
	$retDate = $_POST["lnReturnDate"];
	$retTime = $_POST["lnReturnTime"];
	$lnStatus = mysqli_real_escape_string($conn, $_POST["lnStatus"]);
	echo "<script>alert('$retDate')</script>";
	echo "<script>alert('$retTime')</script>";
	$uloan = mysqli_query($conn, "UPDATE loans SET lnReturnDate = '$retDate', lnReturnTime = '$retTime', lnStatus = '$lnStatus' WHERE lnID = '$id' ");
	
	if($lnStatus != 'Unreturned'){
		$getTlLeft = mysqli_query($conn,"SELECT tlLeft FROM tools WHERE tlID = '$tool' ");
        $fetchTlLeft = mysqli_fetch_assoc($getTlLeft);
        $tlLeft = $fetchTlLeft["tlLeft"];
        $left = $tlLeft + $quantity;
        $utool = mysqli_query($conn,"UPDATE tools SET tlLeft = '$left' WHERE tlID = '$tool'");
	}

	if($uloan){
		echo "<script>alert('Updated')</script>";
	}else{
		echo "<script>alert('Update Failed')</script>";
	}
}

?>