<?php 
require_once 'db_con.php';
if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$c_password = $_POST['c_password'];
	
	$photo = explode('.',$_FILES['photo']['name']) ;
	$photo = end($photo);

	$photo_name = $username .'.'. $photo;
	
	if (isset($email)) {
		$check_mail = $dbconnect->query("SELECT * FROM user WHERE email = '$email' ");
		if (mysqli_num_rows($check_mail) == 0) {
			$check_u_name = $dbconnect->query("SELECT * FROM user WHERE username = '$username' ");
			if (mysqli_num_rows($check_u_name) == 0) {
				if (strlen($username) > 7) {
					if (strlen($password) > 7) {
						if ($password == $c_password) {
							$password = md5($password);
							$query = $dbconnect->query("INSERT INTO `user`(`name`, `email`, `username`, `password`, `photo`, `status`) VALUES ('$name' , '$email' , '$username' , '$password' ,'$photo_name' , 'no')");
							if ($query) {
								$sucess_massage = "Ragistration complete";
								move_uploaded_file($_FILES['photo']['tmp_name'], 'image/'.$photo_name);
								header('location: login.php');

							} else { $warning_massage = "Try again to ragistration";}

						} else { $pass_match = "confirm password not matched";}

					} else { $pass_l = "Password need to be more than 8 charecter";}

				} else { $username_l = "User name more than 8 charecter";}

			} else{$u_name_error = 'This user name Already exist';}

		} else{	$email_error = 'This Email id Already exist';}
	}
}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registration page</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<div class="container header">
		<div class="back_button ">
			<a href="../admin/login.php"><button type="button" class="btn btn-primary">Login</button></a>
		</div>

		<h2 class="text-center">Registration in an Admin</h2>
		<?php if (isset($sucess_massage)) : ?>
			<div class="alert alert-sucess text-center"><?=$sucess_massage ?> </div>
		<?php endif; ?>
		<?php if (isset($warning_massage)) : ?>
			<div class="alert alert-danger text-center"><?=$warning_massage ?> </div>
		<?php endif; ?>
		<div class="row">
			<div class="col-6 left">
				<img src="../images/loginlogo.png" alt="">
			</div>

			<div class="col-6 right">
				<form action="" method="POST" enctype="multipart/form-data">
				
				 <div class="form-group">
				    <label for="name">Name</label>
				    <input type="text" class="form-control" id="name" name="name" required="" 
				    value="<?php if(isset($name))echo($name) ?>">
				 </div>

				  <div class="form-group">
				  	<?php if (isset($email_error)) : ?>
						<div class="alert alert-danger text-center"><?=$email_error ?> </div>
					<?php endif; ?>

				    <label for="email">Email</label>
				    <input type="email" class="form-control" id="email" name="email" required=""
				    value="<?php if(isset($email))echo($email) ?>">
				 </div>
				 <div class="form-group">
				 	<?php if (isset($u_name_error)) : ?>
						<div class="alert alert-danger text-center"><?=$u_name_error ?> </div>
					<?php endif; ?>
					<?php if (isset($username_l)) : ?>
						<div class="alert alert-danger text-center"><?=$username_l ?> </div>
					<?php endif; ?>

				    <label for="username">User Name</label>
				    <input type="text" class="form-control" id="username" name="username" required=""
				    value="<?php if(isset($username))echo($username) ?>">
				 </div>
				 <div class="form-group">
				 	<?php if (isset($pass_l)) : ?>
						<div class="alert alert-danger text-center"><?=$pass_l ?> </div>
					<?php endif; ?>

				    <label for="password">Password</label>
				    <input type="password" class="form-control" id="password" name="password" required=""
				    value="<?php if(isset($password))echo($password) ?>">
				 </div>
				 <div class="form-group">
				 	<?php if (isset($pass_match)) : ?>
						<div class="alert alert-danger text-center"><?=$pass_match ?> </div>
					<?php endif; ?>

				    <label for="c_password">Confirm Password</label>
				    <input type="password" class="form-control" id="c_password" name="c_password" required=""
				    value="<?php if(isset($c_password))echo($c_password) ?>">
				 </div>
				 <div class="form-group">
				    <label for="photo">Photo</label>
				    <input type="file" class="form-control" id="photo" name="photo" >
				 </div>

				 <button type="submit" class="btn btn-primary" name="submit">Submit</button>
				</form>
			</div>
			</div>


	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>