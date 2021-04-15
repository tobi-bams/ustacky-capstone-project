<?php
	function checkIfDataBaseExist() {
		$servername = 'localhost';
		$username = 'root';
		$password = '';
		$dbname = 'school_portal';

		$conn = mysqli_connect($servername, $username, $password);

		if(!mysqli_select_db($conn, $dbname)) {

			$createDatabase = "CREATE DATABASE IF NOT EXISTS $dbname";
			mysqli_query($conn, $createDatabase);
		}

		mysqli_close($conn);
	}

	function checkIfTableExist() {
		$servername = 'localhost';
		$username = 'root';
		$password = 'teebams@49464340';
		$dbname = 'school_portal';
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$checkTable = "SELECT 1 FROM student_detail LIMIT 1";
		$result = mysqli_query($conn, $checkTable);
		if(!$result) {
			$createTable = "CREATE TABLE student_detail(
				id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				image_path VARCHAR(100) NOT NULL,
				first_name VARCHAR(50) NOT NULL,
				last_name VARCHAR(50) NOT NULL,
				middle_name VARCHAR(50) NOT NULL,
				email VARCHAR(80) NOT NULL,
				dob DATE NOT NULL,
				gender VARCHAR(10) NOT NULL,
				phone_number VARCHAR(11) NOT NULL,
				address TEXT NOT NULL,
				state VARCHAR(20) NOT NULL,
				lga VARCHAR(50) NOT NULL,
				next_of_kin VARCHAR(80) NOT NULL,
				jamb_score INT(11),
				addmission_status VARCHAR(12) DEFAULT 'undecided'
		)";

		mysqli_query($conn, $createTable);

		}
	}

	checkIfDataBaseExist();
	checkIfTableExist();
?>