<h1><i class="fa fa-users"></i> User Profile <small>User Profile are here</small></h1>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item" aria-current="page"><i class="fa fa-dashboard"></i>DASHBOARD</li>
		<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-user-plus"></i>User Profile</li>
	</ol>
</nav>
<hr>
<?php
	$username = $_SESSION['user_login'];
	$query = $dbconnect->query("SELECT * FROM `user` WHERE `username` = '$username'");
	$u_data = $query->fetch_assoc();
?>
<div class="col-12 table-responsive no-gutters">
	
	<table id="p-table" class=" table table-striped " style="width:100%">
		
		<tbody>
			<tr>
				<div class="profile-picture">
					<img class="img-thumbnail" src="image/<?=$u_data['photo'] ?>" alt="" style="width: 150px;margin: 30px 0px 75px 100px;">
				</div>
			</tr>
			<tr>
				<td>Name</td>
				<td><?=ucfirst($u_data['name']) ?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><?=$u_data['email'] ?></td>
			</tr>
			<tr>
				<td>User name</td>
				<td><?=$u_data['username'] ?></td>
			</tr>
			<tr>
				<td>Status</td>
				<td><?=$u_data['status'] ?></td>
			</tr>
			<tr>
				<td>Sign-up date</td>
				<td><?=$u_data['date-time'] ?></td>
			</tr>
		</tbody>
	</table>
	<div class="right">
		<a href="index.php?page=profile-edit"><button type="submit" name="update" class="btn btn-primary">Edit Profile</button></a>
	</div>
</div>