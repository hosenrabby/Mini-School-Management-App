<?php 
	$student_count = $dbconnect->query("SELECT * FROM student_info");
	$user_count = $dbconnect->query("SELECT * FROM user");
	$total_count = $student_count->num_rows;
	$total_user = $user_count->num_rows;
	
 ?>

<h1><i class="fa fa-dashboard"></i> Dashboard <small>Statistics Overview</small></h1>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-dashboard"></i>   DASHBOARD</li>
	</ol>
</nav>
<div class="row">
	<div class="col-4">
		<div class="card bg-transparent">
			<div class="card-body">
				<div class="row">
					<div class="col-sm-4">
						<i class="fa fa-users fa-4x"></i>
					</div>
					<div class="col-sm-8 no-gutters">
						<h2 class="card-title title-m"><?=$total_count ?></h2>
						<h6 class="card-title  ml-5">All Student</h6>
					</div>
				</div>
				<hr>
				<h6 class="card_content"><a href="index.php?page=all-student" class="card-link">View All students <i class="fa fa-arrow-circle-o-right ml-5"></i></a></h6>
			</div>
		</div> 
	</div>
	<div class="col-4">
		<div class="card bg-transparent">
			<div class="card-body">
				<div class="row">
					<div class="col-sm-4">
						<i class="fa fa-user fa-4x"></i>
					</div>
					<div class="col-sm-8 no-gutters">
						<h2 class="card-title title-m"><?=$total_user ?></h2>
						<h6 class="card-title  ml-5">All users</h6>
					</div>
				</div>
				<hr>
				<h6 class="card_content"><a href="index.php?page=all-users" class="card-link">View All Users <i class="fa fa-arrow-circle-o-right ml-5"></i></a></h6>
			</div>
		</div>
	</div>
</div>
<hr/>
<h3>New Students</h3>
<div class="table-responsive">
	<table id="example" class="table table-striped table-bordered" style="width:100%">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Roll</th>
				<th>Class</th>
				<th>Gurdian Name</th>
				<th>Gurdian Contact</th>
				<th>Photo</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$query = $dbconnect->query("SELECT * FROM student_info");
				if ($query) {
			while ($s_data = $query->fetch_assoc()) { ?>
			<tr>
				<td><?=$s_data['student_id']?></td>
				<td><?=$s_data['name']?></td>
				<td><?=$s_data['roll']?></td>
				<td><?=$s_data['class']?></td>
				<td><?=$s_data['gurdian_name']?></td>
				<td><?=$s_data['gurdian_contact']?></td>
				<td><img src="../student-image/<?=$s_data['photo']?>" alt="" style="width: 80px"></td>
			</tr>
			<?php
						}
					}
			?>
		</tbody>
		<tfoot>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Roll</th>
			<th>Class</th>
			<th>Gurdian Name</th>
			<th>Gurdian Contact</th>
			<th>Photo</th>
		</tr>
		</tfoot>
	</table>
</div>
</div>