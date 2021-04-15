<?php

	require './config/connectionDB.php';

	$studentId = $_GET['id'];

	$sql = "SELECT * FROM `student_detail` WHERE `id` = '$studentId'";

	$result = mysqli_query($conn, $sql);

	if($result && mysqli_num_rows($result) == 1) {
		$studentDetail = mysqli_fetch_assoc($result);
		$firstname = $studentDetail['first_name'];
		$middlename = $studentDetail['middle_name'];
		$lastname = $studentDetail['last_name'];
		$gender = $studentDetail['gender'];
		$jambscore = $studentDetail['jamb_score'];
		$admissionstatus = $studentDetail['addmission_status'];
		$email = $studentDetail['email'];
		$phonenumber = $studentDetail['phone_number'];
		$dob = $studentDetail['dob'];
		$state = $studentDetail['state'];
		$lga = $studentDetail['lga'];
		$address = $studentDetail['address'];
		$nextOfKin = $studentDetail['next_of_kin'];
		$imagepath = $studentDetail['image_path'];
		$id = $studentDetail['id'];
	}
	else {
		$firstname = '';
		$middlename = '';
		$lastname = '';
		$gender = '';
		$jambscore = '';
		$admissionstatus = '';
		$email = '';
		$phonenumber = '';
		$dob = '';
		$state = '';
		$lga = '';
		$address = '';
		$nextOfKin = '';
		$imagepath = '';
		$id = '';
	}
?>