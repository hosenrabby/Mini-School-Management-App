<?php 
$dbconnect = new mysqli('localhost','root','','mini_smp');

if ($dbconnect->connect_error) {
	die('Database connection proplem');
	exit();
}

 ?>