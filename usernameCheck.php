<?php
	include("db.php");

	$username = $_REQUEST["username"];

	if ($username !== "") {
	  $query = "SELECT username FROM user WHERE username = '$username'";
	  $result = mysqli_query($conn, $query);
	  $num_rows = mysqli_num_rows($result);
	  if ($num_rows) {
	    echo 0;
	  } else {
	    echo 1;
	  }
	}
?>