<?php
	if (!isset($_COOKIE["username"])) {
		header("Location: index.php");
	}

	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "bookstore";
	$dbServername = "localhost";

	$con = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}

  	$bookId = $_GET["bookid"];
  	$countOrder = $_GET["banyakorder"];
  
  	$username = $_COOKIE["username"];
  	$username = "\"".$username."\"";

  	// alert($username);
  	$sql = "INSERT INTO orders (BookID, OrdersAmount, Username, OrdersDate)
		VALUES ($bookId, $countOrder, ".$username.", now())";

	if($con->query($sql) === TRUE){
		$sql2 = "SELECT LAST_INSERT_ID()";
		$result = $con->query($sql2);
		if($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				echo $row['LAST_INSERT_ID()'];
			}
		}
	}
?>