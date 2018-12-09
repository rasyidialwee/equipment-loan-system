<?php
session_start();
require_once("assets/connection.php");
require_once("assets/session-handler.php");
require_once("functions/fadmin.php");
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
                        <h4 class="page-title">Administrator</h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Administrator List</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Contact</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $getAdminList = mysqli_query($conn,"SELECT admID, admName, admEmail, admPhone, admDepartment FROM admins");
                                            $getAdminListResult = mysqli_num_rows($getAdminList);
                                            while($fetchAdmin = mysqli_fetch_assoc($getAdminList)){
                                            ?>
                                            <tr>
                                                <td align="center"><?= $fetchAdmin["admID"] ?></td>
                                                <td><?= $fetchAdmin["admName"] ?></td>
                                                <td>
                                                    <?= $fetchAdmin["admEmail"] ?><br>
                                                    <?= $fetchAdmin["admPhone"] ?><br>
                                                    <?= $fetchAdmin["admDepartment"] ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($fetchAdmin["admDepartment"] === "Creator" || $getAdminListResult === 1) {
                                                        if ($fetchAdmin["admID"] === $userID) {
                                                    ?>
                                                    <a href="updateAdmin.php?id=<?= $fetchAdmin['admID'] ?>" class="btn btn-block btn-success">UPDATE</a>
                                                    <?
                                                        }
                                                    ?>
                                                    <!-- hide delete button -->
                                                    <?php
                                                    }else{
                                                        if ($fetchAdmin["admID"] === $userID){
                                                    ?>
                                                    <a href="updateAdmin.php?id=<?= $fetchAdmin['admID'] ?>" class="btn btn-block btn-success">UPDATE</a>
                                                    <?php
                                                        }
                                                    ?>
                                                    <a href="?delete=<?= $fetchAdmin['admID'] ?>" class="btn btn-block btn-danger">DELETE</a>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Create Administrator</h4>
                                <form method="post">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Name :</label>
                                            <input type="text" name="admName" class="form-control" placeholder="Full Name" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Password :</label>
                                            <input type="password" name="admPwd" class="form-control" placeholder="Password" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Email :</label>
                                            <input type="email" name="admEmail" class="form-control" placeholder="Please insert valid email address" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone :</label>
                                            <input type="tel" name="admPhone" class="form-control" placeholder="+60123456789" required/>
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
                                        
                                        <button type="submit" class="btn btn-large btn-primary" name="btnAddAdmin">Create</button>
                                    </div>
                                </form>
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
    <script src="assets/libs/select2/dist/js/select2.full.min.js"></script>
        
    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        //***********************************//
        // For select 2
        $(".select2").select2();
        //***********************************//
         $('#zero_config').DataTable();
    </script>
</body>

</html>