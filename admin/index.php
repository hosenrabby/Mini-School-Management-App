<?php
	require_once 'db_con.php';
	session_start();
	if (!isset($_SESSION['user_login'])) {
		header("location:login.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>User Dashbord</title>
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="../css/style.css">
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
						<a class="navbar-brand" href="#">SMS</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav ml-auto">
								<li class="nav-item active">
									<a class="nav-link" href="#">welcome<span class="sr-only">(current)</span></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#"><i class="fa fa-bell-o" aria-hidden="true"></i>Notify</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="registration.php"><i class="fa fa-user" aria-hidden="true"></i>Add user</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="index.php?page=profile"><i class="fa fa-user" aria-hidden="true"></i>Profile</a>
								</li>
								<li class="nav-item active">
									<a class="nav-link" href="logout.php"><i class="fa fa-power-off" aria-hidden="true"></i>Sign Out</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-3">
						<ul class="list-group left_menu">
							<li class="list-group-item" aria-current="true"><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i>  Dshbord</a></li>
							<li class="list-group-item"><a href="index.php?page=add-student"><i class="fa fa-user"></i> Add student</a></li>
							<li class="list-group-item"><a href="index.php?page=all-student"><i class="fa fa-users"></i> All Student</a></li>
							<li class="list-group-item"><a href="index.php?page=all-users"><i class="fa fa-users"></i> All Users</a></li>
						</ul>
					</div>
					<div class="col-9">
						<div class="content">
							<?php
								
								if (isset($_GET['page'])) {
									$page = $_GET['page'].'.php';
								}
									else  {
										$page = "dashboard.php";
									}
								if (file_exists($page)) {
									require_once $page;
								}
									else {
										require_once "404.php";
										
									}
							?>
						</div>
					</div>
				</div>
				<div class="container-fluid">
					<div class="footer-area">
						<p class="text-center">Copy &copy Right 2021 All Rigts Reserved &copyTahmidTuhin</p>
					</div>
				</div>
				<script src="../js/jquery-3.5.1.js"></script>
				<script src="../js/jquery.dataTables.min.js"></script>
				<script src="../js/dataTables.bootstrap4.min.js"></script>
				<script src="../js/bootstrap.min.js"></script>
				<script src="../js/main.js"></script>
			</body>
		</html>