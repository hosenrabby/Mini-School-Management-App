<?php 
 require_once 'db_con.php';
 session_start();
	if (isset($_SESSION['user_login'])) {
		header("location:index.php");
	}

 if (isset($_POST['login'])) {
 	 $username = $_POST['username'];
	 $password = $_POST['password'];

	 $checkUname = $dbconnect->query("SELECT * FROM `user` WHERE `username` = '$username'");
	 if (mysqli_num_rows($checkUname) > 0) {
	 	$pass_check = $checkUname->fetch_assoc();
	 	if ($pass_check["password"] == md5($password)) {
	 		if ($pass_check["status"] == "yes") {
	 			$_SESSION['user_login'] = $username;

	 			header("location: index.php");
	 		} else {
	 			$status_error = "Your status is currently not activet";
	 		}
	 	} else{ 
	 		$pass_error = "This Password not matched";}
	 }else{
	 	$uname_error = "This Username not matched"; }
		
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Log in page</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<div class="container header">
		<div class="back_button ">
			<a href="../index.php"><button type="button" class="btn btn-primary">Back</button></a>
		</div>

		<h2 class="text-center">Log in Admin</h2>
		<div class="row">
			<div class="col-6 left">
				<img src="../images/loginlogo.png" alt="">
			</div>

			<div class="col-6 right login_right ">
				<form action="login.php" method="POST">
				<?php if (isset($uname_error)) : ?>
					<div class="alart alert-danger text-center"><?= $uname_error ?></div>
				<?php endif; ?>

				<?php if (isset($pass_error)) : ?>
					<div class="alart alert-danger text-center"><?= $pass_error ?></div>
				<?php endif; ?>

				<?php if (isset($status_error)) : ?>
					<div class="alart alert-danger text-center"><?= $status_error ?></div>
				<?php endif; ?>
				 <div class="form-group">
				    <label for="username">Enter User Name</label>
				    <input type="text" class="form-control" name="username" value="<?php if(isset($username))echo $username?>">
				    <small id="emailHelp" class="form-text text-muted">Enter Your Valid User Name .</small>
				 </div>
				 <div class="form-group">
				    <label for="password">Enter Password</label>
				    <input type="password" class="form-control" name="password" value="<?php if(isset($password))echo $password?>">
				 </div>

				 <button type="Login" class="btn btn-primary" name="login">Login</button>
				</form>
			</div>
			</div>


	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>