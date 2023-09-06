<?php
session_start();
if(!isset($_SESSION['email'])){
  header("Location:login.php");
}
?>
<?php $activePage = basename($_SERVER['PHP_SELF'], ".php");?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>CapitalBoon | Dashboard</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fontawesome.min.css">
	<link rel="stylesheet" href="css/all.min.css">
	<link rel="stylesheet" href="css/dataTable.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="loader-icon-head"><img class="loader-icon" src="images/icon/loading-gif.gif"/></div>
<section class="top-header topheadaer-microsite">
	<div class="box-area">
		<div class="left">
		  <a href="index.php"><img src="images/logo-text.png" ></a>
		</div>
		<div class="right">
			<div class="admin-search">
				<div class="login">
					<ul>
						<li class="noti">
							<i class="fa fa-bell" aria-hidden="true"></i>
							<span>2</span>
						</li>
						<li>
							<img src="images/icon/login.png">
						</li>
						<li><span class="admin-name">Admin</span></li>
						<li><a href="logout.php"><img src="images/icon/logout.png"> <span class="admin-name">Logout</span></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>