<?php
	$user_session = $_SESSION['user_login'];
	$query = $dbconnect->query("SELECT * FROM `user` WHERE `username` = '$user_session'");
	$u_data = $query->fetch_assoc();

// if (isset($_GET['edit'])) {
// 		$id = $_GET['edit'];
// 		$u_data = $dbconnect->query("SELECT * FROM `user` WHERE `id` = '$id' ");
// 		$result = $u_data->fetch_assoc();
// 		}

	if (isset($_POST['p_update'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$u_name = $_POST['username'];
		$pass = $_POST['n_password'];
		
		$photo = explode('.',$_FILES['photo']['name']) ;
		$photo = end($photo);
		$photo_name = $u_name .'.'. $photo;

		if (strlen($pass) > 7) {
			$pass = md5($pass);
			$data_upd = $dbconnect->query("UPDATE user SET  name= '$name', email= '$email', username= '$u_name', password= '$pass', photo='$photo_name' WHERE username= '$user_session' ");
					if ($data_upd) {
						$sucess_massage = "Ragistration complete";
						move_uploaded_file($_FILES['photo']['tmp_name'], 'image/'.$photo_name);
						header('Location: index.php?page=profile');
					} else{ $massage = "Data not Update."; }

		} else { $pass_l = "password need to be insert more than 8 charecters";}
	}
?>
<h1><i class="fa fa-users"></i> User Profile <small>User Profile are here</small></h1>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item" aria-current="page"><i class="fa fa-dashboard"></i>DASHBOARD</li>
		<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-user-plus"></i>User Profile</li>
	</ol>
</nav>
<hr>
<div class="col-8 table-responsive no-gutters">
	<table id="example" class=" table table-striped " style="width:100%">
		<?php if (isset($massage)) : ?>
			<div class="alert alert-danger text-center"><?=$massage ?> </div>
		<?php endif; ?>
		<?php if (isset($sucess_massage)) : ?>
			<div class="alert alert-success text-center"><?=$sucess_massage ?> </div>
		<?php endif; ?>
		<?php if (isset($pass_l)) : ?>
			<div class="alert alert-danger text-center"><?=$pass_l ?> </div>
		<?php endif; ?>
		<tbody>
			<form  method="POST" enctype="multipart/form-data">
				<tr>
					
					<div class="profile-picture">
						<img class="img-thumbnail" src="image/<?=$u_data['photo'] ?>" alt="" style="width: 150px;margin: 30px 0px 75px 100px;">
						
						<input type="file" class="form-control" id="u_photo" name="photo" value="<?=$u_data['photo'] ?>" required="">
						
					</div>
				</tr>
				<br>
				<tr>
					<div class="col-auto">
						<div class="input-group mb-2">
							<div class="input-group-prepend">
								<div class="input-group-text">NAME</div>
							</div>
							<input type="text" class="form-control" name="name" value="<?=ucfirst($u_data['name']) ?>">
						</div>
					</div>
				</tr>
				<tr>
					<div class="col-auto">
						<div class="input-group mb-2">
							<div class="input-group-prepend">
								<div class="input-group-text">EMAIL</div>
							</div>
							<input type="text" class="form-control" name="email" value="<?=$u_data['email'] ?>">
						</div>
					</div>
				</tr>
				<tr>
					<div class="col-auto">
						<div class="input-group mb-2">
							<div class="input-group-prepend">
								<div class="input-group-text">USERNAME</div>
							</div>
							<input type="text" class="form-control" name="username" value="<?=$u_data['username'] ?>">
						</div>
					</div>
					<div class="col-auto">
						<div class="input-group mb-2">
							<div class="input-group-prepend">
								<div class="input-group-text">OLD or NEW PASSWORD</div>
							</div>
							<input type="text" class="form-control" name="n_password" required="">
						</div>
					</div>
				</tr>
				<div class="right">
					<button type="submit" name="p_update" class="btn btn-primary">Update Profile</button>
				</div>
			</form>
		</tbody>
		
	</table>
	
</div>