<?php
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "bookstore";

	$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

	if (!$conn) {
		die("Database connection failed: ".mysqli_connect_error());
	}
?>
