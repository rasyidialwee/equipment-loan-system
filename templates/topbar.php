<?php
if(isset($_GET["logout"])){
	session_unset();
	session_destroy();
	//log
	$date = date("Y-m-d");
	$time = date("H:i:s");
	$message = "logged out";
	$ilog = mysqli_query($conn,"INSERT INTO logs (logDate, logTime, logAction, logUser) VALUES ('$date', '$time', '$message', '$userID')");
	header("Location:login.php");
}
?>
<header class="topbar" data-navbarbg="skin5">
	<nav class="navbar top-navbar navbar-expand-md navbar-dark">
		<div class="navbar-header" data-logobg="skin5">
			<!-- This is for the sidebar toggle which is visible on mobile only -->
			<a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
			<!-- ============================================================== -->
			<!-- Logo -->
			<!-- ============================================================== -->
			<a class="navbar-brand" href="index.php">
				<b class="logo-icon p-l-10">
					<img src="assets/images/logo-icon.png" alt="homepage" class="light-logo" />
				</b>
				<span class="logo-text">
					 <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" />
				</span>
			</a>
			<a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
		</div>
		<div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
			<ul class="navbar-nav float-left mr-auto">
				<li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
			</ul>
			<ul class="navbar-nav float-right">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"> <b><?= $userName ?></b></a>
					<div class="dropdown-menu dropdown-menu-right user-dd animated">
						<a class="dropdown-item" href="sendEmail.php"><i class="fas fa-envelope m-r-5 m-l-5"></i> Sent Notification</a>
						<a class="dropdown-item" href="?logout"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
					</div>
				</li>
				<!-- ============================================================== -->
				<!-- User profile and search -->
				<!-- ============================================================== -->
			</ul>
		</div>
	</nav>
</header>