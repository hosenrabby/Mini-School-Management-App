<?php
	// require_once 'db_con.php';
	if (isset($_POST['addStudent'])) {
		$name = $_POST['name'];
		$roll = $_POST['roll'];
		$class = $_POST['class'];
		$g_name = $_POST['g_name'];
		$g_contact = $_POST['g_contact'];
		$address = $_POST['address'];
		$photo = $_FILES['photo']['name'];
		
		$photo = explode('.', $_FILES['photo']['name']);
		$photo = end($photo);
		$photo_name = $roll .'.'. $photo;

	if (isset($roll)) {
	$check_roll = $dbconnect->query("SELECT * FROM student_info WHERE roll = '$roll' ");
	if ($check_roll->num_rows == 0) {
	// if (mysqli_num_rows($check_roll) == 0) {
	$check_g_contact = $dbconnect->query("SELECT * FROM student_info WHERE gurdian_contact = '$g_contact' ");
	if ($check_g_contact->num_rows == 0) {
	 // if (mysqli_num_rows($check_g_contact) == 0) {
	   $query = $dbconnect->query("INSERT INTO `student_info`(`name`, `roll`, `class`, `gurdian_name`, `gurdian_contact`, `address`, `photo`) VALUES ('$name' ,'$roll' ,'$class' ,'$g_name' ,'$g_contact' ,'$address' ,'$photo_name')");
	    if ($query) {
	    $success = "Student Data added on Database.";
	    move_uploaded_file($_FILES['photo']['tmp_name'], '../student-image/'.$photo_name);
	    } 
	    else { $warning = "Data not inserted"; }

	    } else { $g_contact_error = "This gurdian contact is already exiest"; }
	    
	  } else { $roll_error = "This Roll number is already exiest"; }
	} 
	}
	
	?>
			<h1><i class="fa fa-user"></i> Add Student <small>Add New Student</small></h1>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item" aria-current="page"><i class="fa fa-dashboard"></i>DASHBOARD</li>
					<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-user-plus"></i>Add Student</li>
				</ol>
			</nav>
			<hr>
			<div class="right">
				<div class="form-group">
					<?php if (isset($roll_error)) :?>
						<div class="alert alert-danger text-center"><?=$roll_error ?></div>
					<?php endif ; ?>
					<?php if (isset($g_contact_error)) :?>
						<div class="alert alert-danger text-center"><?=$g_contact_error ?></div>
					<?php endif ; ?>
					<?php if (isset($success)) :?>
						<div class="alert alert-success text-center"><?=$success ?></div>
					<?php endif ; ?>
					<?php if (isset($warning)) :?>
						<div class="alert alert-danger text-center"><?=$warning ?></div>
					<?php endif ; ?>
					<form method="post" enctype="multipart/form-data">
						  <div class="form-row">
							    <div class="form-group col-md-4">
								      <label for="studen_name">Student Name</label>
								      <input type="text" class="form-control" id="studen_name" name="name" placeholder="Student Name">
							    </div>
							    <div class="form-group col-md-4">
								      <label for="student_roll">Student Roll</label>
								      <input type="number" class="form-control" id="student_roll" name="roll" placeholder="Student Roll" pattern="[0-9]{6,}" required="">
							    </div>
							    <div class="form-group col-md-4">
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
						  </div>
						  <div class="form-group">
							    <label for="gurdian_name">Gurdian Nmae</label>
							    <input type="text" class="form-control" id="gurdian_name" name="g_name" placeholder="Gurdian Name" required="">
						  </div>
						  <div class="form-group">
							    <label for="gurdian_c">Gurdian Contact No</label>
							    <input type="text" class="form-control" id="gurdian_c" name="g_contact" placeholder="01#########" pattern="{11,}" required="">
						  </div>
						  <div class="form-row">
							    <div class="form-group col-md-6">
								      <label for="inputCity">Address</label>
								      <input type="text" class="form-control" id="address" name="address" placeholder="Present Address">
							    </div>
							    <div class="form-group col-md-6">
								      <label for="s_photo">Photo</label>
								      <input type="file" class="form-control" id="s_photo" name="photo" placeholder="Add Pasport size Photo" required="">
							    </div>
							    <button type="submit" name="addStudent" class="btn btn-primary">Add Student</button>
						</div>
						  
						  
					</form>
				</div>
			</div>
		