<?php
if(isset($_POST["btnAddUser"])){
    $usrMatricID = mysqli_real_escape_string($conn, $_POST["usrMatricID"]);
    $usrName = mysqli_real_escape_string($conn, $_POST["usrName"]);
    $usrIC = mysqli_real_escape_string($conn, $_POST["usrIC"]);
    $usrEmail = mysqli_real_escape_string($conn, $_POST["usrEmail"]);
    $usrPhone = mysqli_real_escape_string($conn, $_POST["usrPhone"]);
    $usrFac = mysqli_real_escape_string($conn, $_POST["usrFac"]);
    $usrCourse = mysqli_real_escape_string($conn, $_POST["usrCourse"]);

    $iusr = mysqli_query($conn, "INSERT INTO users (usrMatricID, usrName, usrIC, usrEmail, usrPhone, usrFac, usrCourse) VALUES ('$usrMatricID', '$usrName', '$usrIC', '$usrEmail', '$usrPhone', '$usrFac', '$usrCourse')");

    if($iusr){
        echo "<script>alert('User Added')</script>";
    }else{
        echo "<script>alert('Add User Failed. Please Try Again')</script>";
    }
}
?>