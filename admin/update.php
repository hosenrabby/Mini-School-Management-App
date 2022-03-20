<?php
			if (isset($_GET['edit'])) {
					$id = $_GET['edit'];
					$s_data = $dbconnect->query("SELECT * FROM `student_info` WHERE student_id = '$id' ");
					if ($s_data->num_rows > 0) {
					$result = $s_data->fetch_assoc();


				if (isset($_POST['addStudent'])) {
					$name = $_POST['name'];
					$roll = $_POST['roll'];
					$class = $_POST['class'];
					$g_name = $_POST['g_name'];
					$g_contact = $_POST['g_contact'];
					$address = $_POST['address'];
					$data_upd = $dbconnect->query("UPDATE student_info SET name= '$name', roll= '$roll', class= '$class', gurdian_name= '$g_name', gurdian_contact='$g_contact', address= '$address'  WHERE student_id ='$id' ");
					// echo $data_upd;
					// die();
					if ($data_upd) {
						header('Location: index.php?page=all-student');
					} else{ $massage = "Data not Update."; }
				}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Update</title>
		</head>
		<body>
			<h1><i class="fa fa-user"></i> Update Student <small>Update Student here</small></h1>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item" aria-current="page"><i class="fa fa-dashboard"></i>DASHBOARD</li>
					<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-user-plus"></i>All Student</li>
					<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-user-plus"></i>Update Student</li>
				</ol>
			</nav>
			<hr>
			<div class="right">
				<?php 
					
					
				 ?>
				<div class="form-group">
					<form method="post" enctype="multipart/form-data">
						<?php if (isset($massage)) :?>
						<div class="alert alert-danger text-center"><?=$massage ?></div>
						<?php endif ; ?>
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="studen_name">Student Name</label>
								<input type="text" class="form-control" id="studen_name" name="name" placeholder="Student Name" value="<?=$result['name']?>">
							</div>
							<div class="form-group col-md-4">
								<label for="student_roll">Student Roll</label>
								<input type="number" class="form-control" id="student_roll" name="roll" placeholder="Student Roll" pattern="[0-9]{6,}" value="<?=$result['roll']?>" required="">
							</div>
							<div class="form-group col-md-4">
								<label for="inputClass">Class</label>
								<select id="inputClass" name="class" class="form-control" required="">
									<option selected>Choose...</option>
									<option value="1st" <?php echo $result['class']=='1st' ? 'selected=""':"" ?>>1st</option>
									<option value="2nd" <?php echo $result['class']=='2nd' ? 'selected=""':"" ?>>2nd</option>
									<option value="3rd" <?php echo $result['class']=='3rd' ? 'selected=""':"" ?>>3rd</option>
									<option value="4th" <?php echo $result['class']=='4th' ? 'selected=""':"" ?>>4th</option>
									<option value="5th" <?php echo $result['class']=='5th' ? 'selected=""':"" ?>>5th</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="gurdian_name">Gurdian Nmae</label>
							<input type="text" class="form-control" id="gurdian_name" name="g_name" placeholder="Gurdian Name" value="<?=$result['gurdian_name']?>" required="">
						</div>
						<div class="form-group">
							<label for="gurdian_c">Gurdian Contact No</label>
							<input type="text" class="form-control" id="gurdian_c" name="g_contact" placeholder="01#########" pattern="{11,}" value="<?=$result['gurdian_contact']?>" required="">
						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
								<label for="inputCity">Address</label>
								<input type="text" class="form-control" id="address" name="address" placeholder="Present Address" value="<?=$result['address']?>">
							</div>
							<button type="submit" name="addStudent" class="btn btn-primary">Update Student</button>
						</div>
					</form>
				</div>
				<?php 
					}
				}
			?>
			</div>
		</body>
	</html>