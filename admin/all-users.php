
		<h1><i class="fa fa-users"></i> All Users <small>All Users are here</small></h1>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item" aria-current="page"><i class="fa fa-dashboard"></i>DASHBOARD</li>
				<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-user-plus"></i>All Users</li>
			</ol>
		</nav>
		<hr>
		<div class="table-responsive">
			<table id="example" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>User Name</th>
						<th>Photo</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$query = $dbconnect->query("SELECT * FROM user");
						if ($query) {
					while ($s_data = $query->fetch_assoc()) { ?>
					<tr>
						<td><?=$s_data['name']?></td>
						<td><?=$s_data['email']?></td>
						<td><?=$s_data['username']?></td>
						<td><img src="image/<?=$s_data['photo']?>" alt="" style="width: 80px"></td>
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
					<th>Email</th>
					<th>User Name</th>
					<th>Photo</th>
				</tr>
				</tfoot>
			</table>
		</div>
