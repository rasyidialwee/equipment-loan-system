<?php
require_once("../assets/connection.php"); 

if(isset($_POST["action"])){
    if($_POST["action"] == "add"){
        $matricID = mysqli_real_escape_string($conn, $_POST["matricID"]);
        $staffID = mysqli_real_escape_string($conn, $_POST["staffID"]);
        $tool = mysqli_real_escape_string($conn, $_POST["tool"]);
        $quantity = mysqli_real_escape_string($conn, $_POST["quantity"]);
        $date = date("Y-m-d");
        $time = date("H:m:s");

        $iloan = mysqli_query($conn, "INSERT INTO loans (lnMatricID, lnStaffID, lnTool, lnQuantity, lnStartDate, lnStartTime) VALUES ('{$matricID}', '{$staffID}', '{$tool}', '{$quantity}', '{$date}', '{$time}') ");

        $getTlQuantity = mysqli_query($conn,"SELECT tlAvailable FROM tools WHERE tlID = '$tool' ");
        $fetchTlQuantity = mysqli_fetch_assoc($getTlQuantity);
        $tlQuantity = $fetchTlQuantity["tlAvailable"];
        $left = $tlQuantity - $quantity;
        $utool = mysqli_query($conn,"UPDATE tools SET tlLeft = '$left' WHERE tlID = '$tool'");
    }
}

?>