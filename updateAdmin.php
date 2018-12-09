<?php
session_start();
require_once("assets/connection.php");
require_once("assets/session-handler.php");
require_once("functions/fupdateAdmin.php");

if(isset($_GET["id"])){
    $id = mysqli_real_escape_string($conn, $_GET["id"]);
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
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/libs/select2/dist/css/select2.min.css">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper">
        <?php require_once("templates/topbar.php") ?>
        <?php require_once("templates/sidebar.php") ?>
        <div class="page-wrapper">
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Update Admin <?= $fetchUserInfo["admName"] ?></h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Name :</label>
                                    <input type="text" name="admName" value="<?= $fetchUserInfo["admName"] ?>" class="form-control" required/>
                                </div>
                                <div class="form-group">
                                    <label>Email :</label>
                                    <input type="email" name="admEmail" value="<?= $fetchUserInfo["admEmail"] ?>" class="form-control" required/>
                                </div>
                                <div class="form-group">
                                    <label>Phone :</label>
                                    <input type="tel" name="admPhone" value="<?= $fetchUserInfo["admPhone"] ?>" class="form-control" required/>
                                </div>
                                <div class="form-group">
                                    <label>Department :</label>

                                    <select name="admDepartment" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                        <option>Select</option>
                                        <?php
                                            $getDepartmentList = mysqli_query($conn,"SELECT * FROM departments");
                                            while ($fetchDepartmentList = mysqli_fetch_assoc($getDepartmentList)) {
                                        ?>
                                            <option value="<?= $fetchDepartmentList["dprtAbbr"] ?>" ><?= $fetchDepartmentList["dprtName"] ?> (<?= $fetchDepartmentList["dprtAbbr"] ?>)</option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <input type="hidden" name="admID" value="<?= $id ?>">
                                <button type="submit" class="btn btn-large btn-primary" style="margin-left: 10px;" name="btnUpdateAdmin">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php require_once("templates/footer.php") ?>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
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
    <script src="assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script>
        //***********************************//
        // For select 2
        $(".select2").select2();
    </script>
</body>

</html>