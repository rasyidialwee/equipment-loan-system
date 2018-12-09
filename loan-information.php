<?php
session_start();
require_once("assets/connection.php");
require_once("assets/session-handler.php");
require_once("functions/floan-information.php");


if(isset($_GET["id"])){
    $id = mysqli_real_escape_string($conn, $_GET["id"]);
    $getLoanInfo = mysqli_query($conn,"SELECT * FROM loans INNER JOIN users ON loans.lnMatricID=users.usrMatricID INNER JOIN tools ON loans.lnTool=tools.tlID WHERE lnID='{$id}' ");
    $fetchLoanInfo = mysqli_fetch_assoc($getLoanInfo);
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Equipment Loan System</title>
    <!-- Custom CSS -->
    <link href="assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/libs/select2/dist/css/select2.min.css">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper">
        <?php 
           require_once("templates/topbar.php");
           require_once("templates/sidebar.php") ;
        ?>
        <div class="page-wrapper">
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Equipment Loan Information</h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                <!-- Column -->
                    <div class="col-md-12">
                        <div class="card" style="height: 450px;">
                            <div class="card-body">
                                <h4 class="card-title">MatricID - <?= $fetchLoanInfo["lnMatricID"] ?></h4>
                                <div class="border-top">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="alert alert-primary" role="alert">
                                                <h4 class="card-title">User Information</h4>
                                                <p><b>Name  : </b><?= $fetchLoanInfo["usrName"] ?></p>
                                                <p><b>Course : </b><?= $fetchLoanInfo["usrCourse"] ?> (<?= $fetchLoanInfo["usrFac"] ?>)</p>
                                                <p><b>Phone Number : </b><?= $fetchLoanInfo["usrPhone"] ?></p>
                                                <p><b>Email : </b> <?= $fetchLoanInfo["usrEmail"] ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="alert alert-secondary" role="alert">
                                                <h4 class="card-title">Equipement Information</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p><b>Equipment  : </b> <?= $fetchLoanInfo["tlName"] ?> - <?= $fetchLoanInfo["tlVariation"] ?></p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><b>Quantity : </b><?= $fetchLoanInfo["lnQuantity"] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="border-top">
                                    <div class="card-body" style="padding-left: 0px; padding-right: 0px;">
                                        <h4 class="card-title">Return Information</h4>
                                        <div class="card-body" style="padding: 0px; margin: 0px;">
                                            <form class="form-horizontal" method="POST">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Date of Return :</label>
                                                            <input type="date" class="form-control" name="lnReturnDate" value="<?= date("Y-m-d") ?>" readOnly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Time of Return :</label>
                                                            <input class="form-control" type="time" name="lnReturnTime" value="<?= date("H:m:s") ?>" readOnly>
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Condition of Return :</label>
                                                            <select class="form-control" name="lnStatus">
                                                                <option value="Completed">Completed</option>
                                                                <option value="Late">Late</option>
                                                                <option value="Damaged">Equipment Damaged</option>
                                                            </select>
                                                        </div>
                                                    </div> 
                                                </div>
                                                <input type="hidden" name="lnID" value="<?= $id ?>" />
                                                <input type="hidden" name="lnTool" value="<?= $fetchLoanInfo["lnTool"] ?>" />
                                                <input type="hidden" name="lnQuantity" value="<?= $fetchLoanInfo["lnQuantity"] ?>" />
                                                <button type="submit" name="btnUpdateLoan" class="btn btn-block btn-success">SAVE</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php require_once("templates/footer.php") ?>
        </div>
    </div>
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    
</body>

</html>
</html>