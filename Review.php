<?php
	if (!isset($_COOKIE["username"])) {
		header("Location: index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Review</title>

	<link rel="stylesheet" href="style.css"> 
	

	<meta charset="UTF-8"><link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Nunito" />

</head>

<body>

	<?php require("NavBar.php") ?>
	
    <div id="flex-container">
        <div onclick="location.href='Search-Books.php';"><span>B</span>ROWSE</div>
        <div onclick="location.href='history.php';" id="active"><span>H</span>ISTORY</div>
        <div onclick="location.href='Profile.php';"><span>P</span>ROFILE</div>
    </div>

	<?php
	$servername = "127.0.0.1";
	$username = "root";
	$password = "";
	$dbname = "bookstore";
	
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	$username = $_COOKIE["username"];
  	$username = "\"".$username."\"";

	$bookid = $_GET["id"];
	$history_no_order = $_GET["trans"]; 
	$sql = "SELECT * FROM bookdetail WHERE (bookdetail.bookid = $bookid)";

	$result = mysqli_query($conn,$sql);

	if ($result->num_rows > 0) { //kalo resultnya ada
	    $row = mysqli_fetch_assoc($result);
	    	echo "<div class='bookdetail'>";
				echo "<div class='booktitle'>";
					echo "<h1>" .$row['Title']. "</h1>";
					echo "<p>" . $row['Writer']. "</p>";
				echo "</div>";
				echo "<div class='bookphoto'>";
					echo "<img src=" .$row["Image"]. ">";
				echo "</div>";
			echo "</div>";

	} else {
	    echo "No result";
	}
	$conn->close()
	;
	?>


<!-- RATING -->
		<h1 class='addRating'> Add Rating </h1>
		<div class='ratingbutton'>
			<img src='starwhite.png' id = 'star5' onclick= 'saveRating(this.id)' />
			<img src='starwhite.png' id = 'star4' onclick= 'saveRating(this.id)' />
			<img src='starwhite.png' id = 'star3' onclick= 'saveRating(this.id)' />
			<img src='starwhite.png' id = 'star2' onclick= 'saveRating(this.id)' />
			<img src='starwhite.png' id = 'star1' onclick= 'saveRating(this.id)' />
		</div>


<!-- REVIEW -->
	<div class='Comment'>
		<div id='reviewbutton'>
		<h1 class='addComment'> Add Comment </h1>
			<form action="history.php" method="post" onsubmit='reviewvalidation()'>
			    <textarea type="text" id="keyword" name="comment" class="commentform" style="resize: none;"></textarea>
			    <input id = "rating" name = "rating">
				<input id = "bookid" name = "bookid">
				<input id = "history_no_order" name = "history_no_order">
				<input type='submit' value='Submit' id='submitButton' class='submitbutton'>

			</form>

		    <button id='backbutton' onclick='window.location='history.php''>Back</button>    
		</div>
	</div>


	<script type="text/javascript">
		ratevalue = 0;

		// RATING
		function saveRating(id) {
			if (id === 'star1') {
				document.getElementById('star1').src = 'staryellow.png';
				ratevalue = 1;
				if (document.getElementById('star2').src = 'staryellow.png') {
					document.getElementById('star2').src = 'starwhite.png';
					document.getElementById('star3').src = 'starwhite.png';
					document.getElementById('star4').src = 'starwhite.png';
					document.getElementById('star5').src = 'starwhite.png';
 				}
			} else
			if (id === 'star2') {
				document.getElementById('star1').src = 'staryellow.png';
				document.getElementById('star2').src = 'staryellow.png';
				ratevalue = 2;				
				if (document.getElementById('star3').src = 'staryellow.png') {
					document.getElementById('star3').src = 'starwhite.png';
					document.getElementById('star4').src = 'starwhite.png';
					document.getElementById('star5').src = 'starwhite.png';
 				}
			} else 
			if (id === 'star3') {
				document.getElementById('star1').src = 'staryellow.png';
				document.getElementById('star2').src = 'staryellow.png';
				document.getElementById('star3').src = 'staryellow.png';
				ratevalue = 3;		
				if (document.getElementById('star4').src = 'staryellow.png') {
					document.getElementById('star4').src = 'starwhite.png';
					document.getElementById('star5').src = 'starwhite.png';
 				}
			} else 
			if (id === 'star4') {
				document.getElementById('star1').src = 'staryellow.png';
				document.getElementById('star2').src = 'staryellow.png';
				document.getElementById('star3').src = 'staryellow.png';
				ratevalue = 4;
				document.getElementById('star4').src = 'staryellow.png';
				if (document.getElementById('star5').src = 'staryellow.png') {
					document.getElementById('star5').src = 'starwhite.png';
 				}
 			} else
 			if (id === 'star5') {
				document.getElementById('star1').src = 'staryellow.png';
				document.getElementById('star2').src = 'staryellow.png';
				document.getElementById('star3').src = 'staryellow.png';
				ratevalue = 5;
				document.getElementById('star4').src = 'staryellow.png';
				document.getElementById('star5').src = 'staryellow.png';
			}
		}


		// VALIDATION

		function submissionvalue() {
			document.getElementById('rating').value = ratevalue;
			document.getElementById('bookid').value = <?php echo $bookid?>;
			document.getElementById('history_no_order').value = <?php echo $history_no_order?>;
		}

		function reviewvalidation() {
			usercomment = document.getElementById('keyword').value;
			if (ratevalue == 0) {
				alert("Please rate this book.");
				
			} else 
			if (usercomment == '') {
				alert("Please fill the comment field.");
				
			} else 
			if ((ratevalue == 0) && (usercomment == '')) {
				alert("Please rate and fill the comment field for this book.");
				
			}
			submissionvalue();
			

		}

	</script>

	


</body>
</html>
