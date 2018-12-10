<?php
if(isset($_POST["btnAddUser"])){
    $usrMatricID = mysqli_real_escape_string($conn, $_POST["usrMatricID"]);
    $usrName = mysqli_real_escape_string($conn, $_POST["usrName"]);
    $usrIC = mysqli_real_escape_string($conn, $_POST["usrIC"]);
    $usrEmail = mysqli_real_escape_string($conn, $_POST["usrEmail"]);
    $usrPhone = mysqli_real_escape_string($conn, $_POST["usrPhone"]);
    $usrFac = mysqli_real_escape_string($conn, $_POST["usrFac"]);
    $usrCourse = mysqli_real_escape_string($conn, $_POST["usrCourse"]);

    $iusr = mysqli_query($conn, "INSERT INTO users (usrMatricID, usrName, usrIC, usrEmail, usrPhone, usrFac, usrCourse) VALUES ('{$usrMatricID}', '{$usrName}', '{$usrIC}', '{$usrEmail}', '{$usrPhone}', '{$usrFac}', '{$usrCourse}')");

    if($iusr){
        //log
        $date = date("Y-m-d");
        $time = date("H:i:s");
        $message = "Add user $usrName Successful";
        $user = $userID;
        $ilog = mysqli_query($conn,"INSERT INTO logs (logDate, logTime, logAction, logUser) VALUES ('{$date}', '{$time}', '{$message}', '{$userID}')");

        echo "<script>alert('$message')</script>";
    }else{
        //log
        $date = date("Y-m-d");
        $time = date("H:i:s");
        $message = "Add user $usrName Failed";
        $user = $userID;
        $ilog = mysqli_query($conn,"INSERT INTO logs (logDate, logTime, logAction, logUser) VALUES ('{$date}', '{$time}', '{$message}', '{$userID}')");

        echo "<script>alert('$message')</script>";
    }
}

if(isset($_GET["email"])){
    $status = mysqli_real_escape_string($conn, $_GET["email"]);

    if($status === 'true'){
        echo "<script>alert('Email Sent Successful')</script>";
    }else{
        echo "<script>alert('Email could not be sent. Please contact developer.')</script>";
    }
}
?>