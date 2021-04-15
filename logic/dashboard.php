<?php
	session_start();
	require 'config/connectionDB.php';

	$selectAllStudent = "SELECT * FROM `student_detail`";

	$allStudent = mysqli_query($conn, $selectAllStudent);

	$sn = 0;

?>