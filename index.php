<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>School Managment</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="css/style.css">
		
	</head>
	<body>
		<div class="container header">
			<h2 class="text-center">School Managment System</h2>
			<div class="row">
				<!--=========== left section ============-->
				<div class="col-4 left">
					<h4 class="text-center mb-5">Login or Registration to Managment</h4>
					
					<a href="admin/login.php" class="login_b"><button type="button" class="btn btn-primary">Log in</button></a>
					<a href="admin/registration.php" class="reg_b"><button type="button" class="btn btn-primary">Registration</button></a>
				</div>
				<!-- =========== right section ============ -->
				<div class="col-8 right">
					<h2 class="text-center mb-5">Any Student Information</h2>
					
					<form action="" method="POST" enctype="multipart/from-data">
						<div class="form-group">
							<label for="inputClass">Class</label>
							<select id="inputClass" name="class" class="form-control" required="">
								<option selected>Choose...</option>
								<option value="1st">1st</option>
								<option value="2nd">2nd</option>
								<option value="3rd">3rd</option>
								<option value="4th">4th</option>
								<option value="5th">5th</option>
							</select>
						</div>
						<div class="form-group">
							<label for="roll">Roll</label>
							<input type="number" class="form-control" name="roll" required>
						</div>
						
						<button type="submit" class="btn btn-primary" name="s_info">Show info</button>
					</form>
					<?php if (isset($_POST['s_info'])) {
						require_once './admin/db_con.php';
						$class = $_POST['class'];
						$roll = $_POST['roll'];
						$s_data = $dbconnect->query("SELECT * FROM `student_info` WHERE `class` = '$class' AND `roll`= '$roll'");
					if ($s_data->num_rows == 1) {
						$result = $s_data->fetch_assoc();
					?>
					<div class="row" style="margin-top: 80px;">
						
						<div class=" table-responsive no-gutters">
							<table class="table table-striped">
								<tbody>
									<tr>
										
										<div class="profile-picture">
											<img class="img-thumbnail" src="./student-image/<?=$result['photo'] ?>" alt="" style="width: 150px;margin: 30px 0px 75px 100px;">
										</div>
										
									</tr>
									<tr>
										<td>Name</td>
										<td><?=ucfirst($result['name']) ?></td>
									</tr>
									<tr>
										<td>Roll</td>
										<td><?=$result['roll']?></td>
									</tr>
									<tr>
										<td>Class</td>
										<td><?=$result['class']?></td>
									</tr>
									<tr>
										<td>Gurdian Name</td>
										<td><?=$result['gurdian_name']?></td>
									</tr>
									<tr>
										<td>Gurdian Contact</td>
										<td><?=$result['gurdian_contact']?></td>
									</tr>
									<tr>
										<td>Address</td>
										<td><?=$result['address']?></td>
									</tr>
								</tbody>
							</table>
							
						</div>
						
					</div>
					<?php
					
					} else {
						$error_msg = "Student Data Not Found ...";
					}
					}
					?>
					<?php if (isset($error_msg)) :?>
					<div class="alert alert-danger text-center" style="margin-top: 80px;"><?=$error_msg ?></div>
					<?php endif ; ?>
				</div>
			</div>
		</div>
		<script src="js/jquery-3.4.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>