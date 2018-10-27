<?php
	if (!isset($_COOKIE["username"])) {
		header("Location: index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Search Result</title>

	<link rel="stylesheet" href="style.css"> 
	
	<meta charset="UTF-8"><link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Nunito" />

</head>
<body>

	<?php require("NavBar.php") ?>
    <div id="flex-container">
        <div onclick="location.href='Search-Books.php';" id="active"><span>B</span>ROWSE</div>
        <div onclick="location.href='history.php';"><span>H</span>ISTORY</div>
        <div onclick="location.href='Profile.php';"><span>P</span>ROFILE</div>
    </div>
	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "bookstore";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}


	if (!$_GET['keyword']) {
		header("Location: Search-Books.php");
		exit;
	} else {

	$sql = "SELECT * FROM bookdetail WHERE Title LIKE '%" .$_GET['keyword']. "%'";
	$result = $conn->query($sql);

	echo "<div class= 'searchresult'>";
		echo "<div class = 'searchres'>";
		    echo "<h1>Search Result</h1>";
		echo "</div>";

    	echo "<div class = 'resultcount'>";
    		echo "<p>Found  <span>".$result->num_rows. "</span> result(s)</p>";
    	echo "</div>";
    echo "</div>";

	if ($result->num_rows > 0) { 
	    
	    while($row = $result->fetch_assoc()) {	
			$votescount = "SELECT count(ReviewID) as Votes FROM bookreview WHERE BookID =" .$row['bookid'];
			$vcountres = mysqli_query($conn, $votescount);
			$vcount = mysqli_fetch_assoc($vcountres);

			$ratingcount = "SELECT AVG(RATING) as BookRating from bookreview WHERE BookID =" .$row['bookid']. " GROUP BY BookID";
			$rcountres = mysqli_query($conn, $ratingcount);
			$rcount = mysqli_fetch_assoc($rcountres);
			$fullrating = number_format((float)$rcount['BookRating'], 1, '.', '');

	    	echo "<div class = 'bookresult'>";
		    	echo "<img src=" .$row["Image"]. ">";
		    	echo "<h1>" .$row['Title']. "</h1>";
		    	echo "<p>" .$row['Writer']. "- " .$fullrating. "/5.0 (" .$vcount['Votes']." votes) </p>";
		    	echo "<h2>" .$row['Sinopsis']. "</h2>";
	    	echo "</div>";

	    	echo "<div class = 'detail'>";
				echo "<a href = 'bookdetail.php?id=" .$row['bookid']. "'><button id='detailbutton'>Detail</button></a>";
  			echo "</div>";

	    }
	} else {
	    echo "No result";
	}

	}

	
		$conn->close()
	;
	?>

</body>
</html>