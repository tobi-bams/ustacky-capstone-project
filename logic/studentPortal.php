<?php
	require '../config/connectionDB.php';
	session_start();

	if(isset($_POST['submit'])) {

		$image = $_FILES['image']['name'];
		$imagenametemp = $_FILES['image']['tmp_name'];

		$folderName = '../uploads/';

		$imagePath = 'uploads/'.$image;

		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$dob = $_POST['dob'];
		$gender = $_POST['gender'];
		$phoneNumber = $_POST['phoneNumber'];
		$address = $_POST['address'];
		$stateOrigin = $_POST['stateOrigin'];
		$originLocalG = $_POST['originLocalG'];
		$nextOfKin = $_POST['nextOfKin'];
		$jambScore = $_POST['jambScore'];

		
		if($stateOrigin != 'none' && $originLocalG != 'none') {
			$registerStudent = "INSERT INTO `student_detail` (`image_path`, `first_name`, `last_name`, `middle_name`, `email`, `dob`, `gender`, `phone_number`, `address`, `state`, `lga`, `next_of_kin`,  `jamb_score`) VALUES ('$imagePath', '$firstname', '$lastname', '$middlename', '$email', '$dob', '$gender', '$phoneNumber', '$address', '$stateOrigin', '$originLocalG', '$nextOfKin', '$jambScore')";

			$result = mysqli_query($conn, $registerStudent);
			if($result) {
				move_uploaded_file($imagenametemp, $folderName.$image);
				$_SESSION["successful"] = "You've Successfully Registered!!... Proceed to the Dashboard by clicking on the Dashboard tab on the Navigation Bar";
			}
			else {
				$_SESSION["Oops"] = "Oops!! Something Went Wrong Please try again";
			}
		}else {
			$_SESSION["Oops"] = "Oops!! State of Origin and Local Government must be specified";
		}

		header("location: http://localhost/ustacky/student-portal.php");
	}

?>