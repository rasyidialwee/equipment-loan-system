<?php
session_start();
require_once("assets/connection.php");
require_once("assets/session-handler.php");
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
                        <h4 class="page-title">Logs</h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
					<div class="col-md-12">
						<div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Equipment List</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Date/Time</th>
                                                <th>Action</th>
                                                <th>User</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
											$getLog = mysqli_query($conn,"SELECT * FROM logs");
											while($fetchLog = mysqli_fetch_assoc($getLog)){
											?>
											<tr>
												<td align="center"><?= $fetchLog["logID"] ?></td>
												<td><?= $fetchLog["logDate"] ?> <?= $fetchLog["logTime"] ?></td>
												<td><?= $fetchLog["logAction"] ?></td>
												<td><?= $fetchLog["logUser"] ?></td>
											</tr>
											<?php
											}
											?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                               	<th>ID</th>
                                                <th>Date/Time</th>
                                                <th>Action</th>
                                                <th>User</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <button class="btn btn-success" onclick="printLog()">Print</button>
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
		
    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    
    <script>
        $('#zero_config').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            { extend: 'print', text: 'Print Log', className: 'btn btn-success' }
        ]
    } );
        /*
         $('#zero_config').DataTable();

         function printLog(){
            $('#zero_config').DataTable({
                dom: 'Bfrtip'
            });
         }
         
         $('#zero_config').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'print'
            ]
        });
        */
    </script>
</body>

</html>