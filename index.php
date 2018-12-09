<?php
session_start();
require_once("assets/connection.php");
require_once("assets/session-handler.php");
require_once("functions/findex.php");
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
           <?php 
           require_once("templates/topbar.php");
           require_once("templates/sidebar.php") ;
           ?>
        <div class="page-wrapper">
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                <!-- Column -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Pinjaman</h4>
                                  	<div class="col-sm-12">
                                      <form class="form-horizontal">
                                    	<input type="text" name="lnMatricID" id="matricID" class="form-control"  placeholder="Matric ID" style="margin: 5px;" autofocus/>
									</div>
                                <div class="border-top">
                                    <div class="card-body" style="padding-left: 0px; padding-bottom: 0px;">
                                        <h4 class="card-title">User Information</h4>
										<div id="user-info"></div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body" style="padding-left: 0px; padding-right: 0px;">
                                        <h4 class="card-title">Equipment</h4>
                                        <div class="card-body" style="padding: 0px; margin: 0px;">
                                            
                                                <div class="form-group row">
                                                    <div class="col-sm-12" style="padding: inherit">
                                                        <select name="lnTool" class="select2 form-control custom-select" id="selectTool" style="width: 100%; height:36px;">
                                                            <option>Select</option>
                                                            <?php
                                                                $getToolList = mysqli_query($conn,"SELECT tlID, tlName, tlVariation, tlQuantity, tlAvailable FROM tools");
                                                                while ($fetchToolList = mysqli_fetch_assoc($getToolList)) {
                                                            ?>
                                                                <option value="<?= $fetchToolList["tlID"] ?>" data-max="<?= $fetchToolList["tlAvailable"] ?>"><?= $fetchToolList["tlName"] ?> - <?= $fetchToolList["tlVariation"] ?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <br></br>
                                                    <div class="col-sm-12" style="padding: inherit">
                                                        <input type="number" class="form-control" id="tlQuantity" placeholder="Quantity" name="lnQuantity">
                                                    </div>
                                                </div>
                                                <p>Start Time : <?= date("Y-m-d"); date("H:m:s"); ?></p>
                                                <input type="hidden" name="lnStaffID" id="lnStaffID" value="<?= $userID ?>">
                                                <button class="btn btn-block btn-success" id="btnAddLoan" name="btnAddLoan">Save</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="addUser" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add New User</h4>
                                </div>
                                <div class="modal-body">
                                    <form method="POST">
                                        <input class="form-control" type="text" name="usrMatricID" placeholder="Matric ID" required />
                                        <input class="form-control" type="text" name="usrName" placeholder="Full Name" required />
                                        <input class="form-control" type="text" name="usrIC" placeholder="IC number without '-'" required />
                                        <input class="form-control" type="email" name="usrEmail" placeholder="Email" required />
                                        <input class="form-control" type="tel" name="usrPhone" placeholder="0123456789" required />
                                        <select name="usrFac" class="select2 form-control custom-select" style="width: 100%; height:36px;">
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
                                        <input class="form-control" type="text" name="usrCourse" placeholder="Course Name" required />
                                        <button type="submit" class="btn btn-success" name="btnAddUser">Add User</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- modal end -->
                    <div class="col-md-4">
                        <div class="card" style="height: 450px;">
                            <div class="card-body">
                                <h4 class="card-title">Pulangan</h4>
                                <div id="viewLoans"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Item Available</h4>
                                <div class="row">
                                    <div class="col-md-12" style="margin: 0px; padding: 0px;">
                                        <div id="viewTools"></div>
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
    <!--This page JavaScript -->
    <!-- <script src="dist/js/pages/dashboards/dashboard1.js"></script> -->
    <script src="assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script>
        //show the tools
        fetch_tool();
        fetch_loan();

        //this is the code for select tools
        $(".select2").select2();
        
        //the function for search matric ID
		$("#matricID").keyup(function(e){
			var matricID = $("#matricID").val();
			var action ="getUserID";
			
			$.ajax({
				url:"model/fetch_user_info.php",
				data:{ matricID:matricID, action:action},
				method:"POST",
				success:function(data){
					$("#user-info").html(data);
				}
			});
        });
        
        //the function to set max value
        $("#selectTool").change(function(e){
            var max = $(this).find(":selected").data('max');
            $("#tlQuantity").attr({'max' : max});
        });

        //the function to for btnAddLoan
        $("#btnAddLoan").click(function (e) {
            e.preventDefault();
            var matricID = $("#usrMatricID").text();
            var staffID = $("#lnStaffID").val();
            var tool = $("#selectTool").val();
            var quantity = $("#tlQuantity").val();
            var action = "add";
            
            $.ajax({
                url:"model/action.php",
                data:{ matricID:matricID, staffID:staffID, tool:tool, quantity:quantity, action:action},
                method:"POST",
                success:function(data){
                    fetch_loan();
                }
            });
        })
        //the function to fetch the loan table
        function fetch_loan(){
            $.ajax({
                url:"model/fetch_loan.php",
                method:"POST",
                success:function (data) {
                    $('#viewLoans').html(data);
                }
            });
        }

        //the function to fetch the tool
        function fetch_tool(){
            $.ajax({
                url:"model/fetch_tool.php",
                method:"POST",
                success:function (data) {
                    $('#viewTools').html(data);
                }
            });
        }
    </script>
</body>

</html>