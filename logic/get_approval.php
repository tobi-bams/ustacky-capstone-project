<?php
	require "../config/connectionDB.php";

	$id = $_POST['id'];

	$approval = $_POST['approval'];

	if(isset($id) && !empty($id)) {

		$sqlstatement = "SELECT * FROM `student_detail` WHERE `id` = '$id'";

		$verifyStudent = mysqli_query($conn, $sqlstatement);

		if($verifyStudent && mysqli_num_rows($verifyStudent) == 1) {
			if($approval == 'admitted') {
				$sql = "UPDATE `student_detail` SET `addmission_status` = '$approval' WHERE `id` = '$id'";
				if(mysqli_query($conn, $sql)) {
					echo "yes";
				}
			}

			else if ($approval == 'off') {
				$sql = "UPDATE `student_detail` SET `addmission_status` = 'undecided' WHERE `id` = '$id'";
				if(mysqli_query($conn, $sql)) {
					echo "no";
				}
			}
		}


	}

	

?>