<?php
	session_start();
	require '../config/connectionDB.php';

	$admissionStatus = $_POST['admissionStatus'];
	$sn = 0;

	if($admissionStatus == 'none') {
		$sqlSearch = "SELECT * FROM `student_detail` ";
	}else {
		$sqlSearch = "SELECT * FROM `student_detail` WHERE `addmission_status` = '$admissionStatus'";
	}


	$searchResult = mysqli_query($conn, $sqlSearch);


	if($searchResult && mysqli_num_rows($searchResult) > 0) {
		while($row = mysqli_fetch_assoc($searchResult)) {
			$sn = $sn + 1;
			$studentId = $row['id'];
			echo "<tbody>";
			echo "<tr>";
			echo "<td>" . $sn . "</td>";
			echo "<td>" .$row['first_name'] . " " .$row['middle_name'] ." ". $row['last_name'] ."</td>";
			echo "<td>" . $row['gender'] ."</td>";
			echo "<td>" . $row['jamb_score'] ."</td>";
			echo "<td>" . $row['addmission_status'] ."</td>";
			echo "<td><a href = 'view-student-details.php?id=$studentId'>Detail</a></td>";
			echo "</tr>";
			echo "</tbody>";
		};

	}else {
		echo "No Record found";
	}

?>