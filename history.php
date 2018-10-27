<?php
	if (!isset($_COOKIE["username"])) {
		header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Tayo - Header</title>
    <link rel="stylesheet" href="style.css">
	<meta charset="UTF-8"><link rel="stylesheet" type="text/css" href="history.css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Nunito" />
</head>
<body>

	<?php require("NavBar.php") ?>
    <div id="flex-container">
        <div onclick="location.href='Search-Books.php';"><span>B</span>ROWSE</div>
        <div onclick="location.href='history.php';" id="active"><span>H</span>ISTORY</div>
        <div onclick="location.href='Profile.php';"><span>P</span>ROFILE</div>
    </div>

<!-- History header -->
<div class="history">
    <b class="history-header orange-font">
        History
    </b>
</div>

<!-- History list of item -->
    <?php
        $history_id = 0;
        
        $username = $_COOKIE["username"];
        $username = "\"".$username."\"";

		$dbServername = "localhost";
		$dbUsername = "root";
		$dbPassword = "";
		$dbName = "bookstore";
		
		$connection = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

		if (isset($_POST['comment'])) {
			//buat masukin ke database

			if (!$_POST['rating'] || !$_POST['comment']) {
				header("Location: review.php?id=".$_POST['bookid']."&trans=".$_POST['history_no_order']);
				exit;
			}

			$query = "INSERT INTO bookreview (Username, Comment, Rating, BookID) VALUES ('".$_COOKIE['username']."','" .$_POST['comment'] ."', ".$_POST['rating'].", ".$_POST['bookid'].")";

			if ($connection->query($query) === TRUE) {
		        
		    } else {
		      echo "error 1: <br>";
		        echo "Error updating record: " . $connection->error;
		        echo $query;
		    }


			$countrev = "SELECT max(ReviewID) as X FROM bookreview";
			$result = mysqli_query($connection, $countrev);
        	$row = mysqli_fetch_assoc($result);
			$query = "UPDATE orders SET ReviewID = " .$row['X']. " WHERE TransNo = " .$_POST['history_no_order'];


			if ($connection->query($query) === TRUE) {
		    } else {
		      echo "error 1: <br>";
		        echo "Error updating record: " . $connection->error;
		    }			
		}

        
        $query = "SELECT * FROM orders JOIN bookdetail ON orders.BookID = bookdetail.BookID 
				  WHERE orders.Username = ".$username." ORDER BY TransNo DESC";

        $result = mysqli_query($connection, $query);
        
        while ($row = mysqli_fetch_assoc($result)) {
            
            $book_image = $row['Image'];
            $book_title = $row['Title'];
            $history_count = $row['OrdersAmount'];
            $history_reviewed = $row['ReviewID'];
            $history_date = $row['OrdersDate'];
            $history_no_order = $row['TransNo'];
            $history_id = $row['BookID'];

            ?>

            <!-- Template for history item -->
			
			<!-- History header -->
			<div class="history">			
				<div class="history-item">
					<img src= <?= $book_image ?> alt= "image" class = "history-bookimage">
					<div class="history-book">
						<div class="orange-font history-booktitle">
							<b> <?= $book_title ?> </b>
						</div>
						<div class = "history-bookinfo">
							<p>Jumlah : <?= $history_count ?></p>
							<?php if($history_reviewed) : ?>
							<p>Anda sudah memberikan review</p>
							<?php else : ?>
							<p>Belum direview</p>
							<?php endif; ?>
						</div>
					</div>
					<div class="history-order">
						<div class="history-orderinfo">
							<b>
							<?= DateTime::createFromFormat('Y-m-d', $history_date)
								->format('d F Y')?>
							</b>
							<br>
							<b> Nomor Order : #<?= $history_no_order ?></b>
							<br>
							<?php if(!$history_reviewed) : ?>
							<a href="review.php?id=<?= $history_id ?>&trans=<?= $history_no_order ?>">
								<button class="history-review white-font">Review</button>
							</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
		    </div>
		   

            <?php }
        ?>

</body>
</html>