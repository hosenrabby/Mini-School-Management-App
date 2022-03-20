<?php
	require_once 'db_con.php';
	
		if (isset($_GET['delete'])) {
			$id = $_GET['delete'];
			// $data_dlt = $dbconnect->query("SELECT * FROM `student_info` WHERE id = '$id' ");
			// $result = $data_dlt->fetch_assoc();
			// unlink("student-image/".$result['photo']);
			$data_dlt = $dbconnect->query("DELETE FROM `student_info` WHERE student_id = '$id' ");
			header('Location: index.php?page=all-student');
		}
		
	
?>