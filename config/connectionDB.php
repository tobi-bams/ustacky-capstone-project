<?php
	$servername = 'localhost';
	$username = 'root';
	$password = 'teebams@49464340';
	$dbname = 'school_portal';

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if(!$conn) {
		die("Connection Fail: ".mysqli_connect_error());
	}
?>