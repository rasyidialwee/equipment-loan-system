<?php
session_start();
require_once("assets/connection.php");
require_once("assets/session-handler.php");
require_once("functions/fuser.php");
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
                        <h4 class="page-title">Users</h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Users</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Matric ID</th>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                <th>Faculty</th>
                                                <th>Course Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $getUserList = mysqli_query($conn,"SELECT * FROM users");
                                            while($fetchUserList = mysqli_fetch_assoc($getUserList)){
                                            ?>
                                            <tr>
                                                <td align="center"><?= $fetchUserList["usrMatricID"] ?></td>
                                                <td><?= $fetchUserList["usrName"] ?> <br> <?= $fetchUserList["usrIC"] ?></td>
                                                <td><?= $fetchUserList["usrEmail"] ?></td>
                                                <td><?= $fetchUserList["usrPhone"] ?></td>
                                                <td><?= $fetchUserList["usrFac"] ?></td>
                                                <td><?= $fetchUserList["usrCourse"] ?></td>
                                                <td><a href="?delete=<?=$fetchUserList["usrID"]?>"><button class="btn btn-danger">DELETE</button></a></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Matric ID</th>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                <th>Faculty</th>
                                                <th>Course Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Create User</h4>
                                <form method="POST">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>Matric ID :</label>
                                            <input class="form-control" type="text" name="usrMatricID" placeholder="Matric ID" required />
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Name :</label>
                                            <input class="form-control" type="text" name="usrName" placeholder="Full Name" required />
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>IC :</label>
                                            <input class="form-control" type="text" name="usrIC" placeholder="IC number without '-'" required />
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Email :</label>
                                            <input class="form-control" type="email" name="usrEmail" placeholder="Email" required />
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Phone Number :</label>
                                            <input class="form-control" type="tel" name="usrPhone" placeholder="0123456789" required />
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Faculty :</label>
                                            <select class="select2 form-control custom-select" name="usrFac" style="width: 100%; height:36px;">
                                                <option value="FST">Faculty of Science and Technology</option>
                                                <option value="FPQS">Faculty of Quranic and Sunnah Studies</option>
                                                <option value="FKP">Faculty of Leadership and Management</option>
                                                <option value="FSU">Faculty of Syariah and Law</option>
                                                <option value="FEM">Faculty of Economics and Muamalat</option>
                                                <option value="FMED">Faculty of Medicine and Health Sciences</option>
                                                <option value="FDEN">Faculty of Dentistry</option>
                                                <option value="FPBU">Faculty of Major Languages Studies</option>
                                                <option value="FKAB">Faculty of Engineering and Built Environment</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Course :</label>
                                            <input class="form-control" type="text" name="usrCourse" placeholder="Course Name" required />
                                        </div>    
                                    </div>
                                    
                                    <button type="submit" class="btn btn-success" name="btnAddUser">Add User</button>
                                </form>
                            </div>
                        </div>
                    </div>
            <footer class="footer text-center">
                All Rights Reserved by Skyrem Brilliant Services. Designed and Developed by <a href="https://wrappixel.com">Rasyidi Alwee</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
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
    <!--This page JavaScript -->
    <!-- <script src="dist/js/pages/dashboards/dashboard1.js"></script> -->
    <script src="assets/libs/select2/dist/js/select2.full.min.js"></script>
        
    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        //***********************************//
        // For select 2
        //***********************************//
         $('#zero_config').DataTable();
    </script>
</body>

</html>