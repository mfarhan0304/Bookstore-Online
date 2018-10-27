<?php
	if (!isset($_COOKIE["username"])) {
		header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Search Books</title>

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
    <div class='searchbook'>
    	<h1>Search Book</h1>
	</div>


	    	
	<div class ="searchform">
		<form action="Search-Result.php" method="get" onsubmit="isEmpty()">
		    <input type="text" id="keyword" name="keyword" placeholder="Input search terms...">
			<input type='submit' value='Search'>
		</form> 
  	</div>

  	<script type="text/javascript">
  		function isEmpty() {
  			searchbar = document.getElementById('keyword').value;
  			if (searchbar == '') {
  				alert("You need to input search terms");
  			} 
  		}
  	</script>
</body>
</html>
