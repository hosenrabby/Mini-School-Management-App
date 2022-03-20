		<h1><i class="fa fa-users"></i> All Student <small>All Student are here</small></h1>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item" aria-current="page"><i class="fa fa-dashboard"></i>DASHBOARD</li>
				<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-user-plus"></i>All Student</li>
			</ol>
		</nav>
		<hr>
		<div class="table-responsive">
			<table id="example" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>Name</th>
						<th>Roll</th>
						<th>Class</th>
						<th>Gurdian Name</th>
						<th>Gurdian Contact</th>
						<th>Photo</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$query = $dbconnect->query("SELECT * FROM student_info");
						if ($query) {
					while ($s_data = $query->fetch_assoc()) { ?>
					<tr>
						<td><?=ucfirst($s_data['name']) ?></td>
						<td><?=$s_data['roll']?></td>
						<td><?=$s_data['class']?></td>
						<td><?=$s_data['gurdian_name']?></td>
						<td><?=$s_data['gurdian_contact']?></td>
						<td><img src="../student-image/<?=$s_data['photo']?>" alt="" style="width: 80px"></td>
						<td calspan="2">
							<div class="btn-group">
								<a class="btn btn-xs btn-success" href="index.php?page=update&edit=<?=$s_data['student_id']?>">Edit</a>
								<a class="btn btn-xs btn-danger" href="delete.php?delete=<?=$s_data['student_id']?>">Delete</a>
							</div>
						</td>
					</tr>
					<?php
								}
							}
					?>
				</tbody>
				<tfoot>
				<tr>
					<th>Name</th>
					<th>Roll</th>
					<th>Class</th>
					<th>Gurdian Name</th>
					<th>Gurdian Contact</th>
					<th>Photo</th>
					<th>Actions</th>
				</tr>
				</tfoot>
			</table>
		</div>
