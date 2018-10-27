<?php
	include("db.php");

	$email = $_REQUEST["email"];

	if ($email !== "") {
		$email_regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
		if (!preg_match($email_regex, $email)) {
			echo 0;
		} else {
		  $query = "SELECT email FROM userdetail WHERE email = '$email'";
		  $result = mysqli_query($conn, $query);
		  $num_rows = mysqli_num_rows($result);
		  echo $num_rows;
		  if ($num_rows) {
		    echo 0;
		  } else {
		    echo 1;
		  }			
		}
	}
?>