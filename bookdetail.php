<?php
    if (!isset($_COOKIE["username"])) {
        header("Location: index.php");
    }
	require("NavBar.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Tayo - Header</title>
    <link rel="stylesheet" href="style.css">
	<meta charset="UTF-8"><link rel="stylesheet" type="text/css" href="bookdetail.css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Nunito" />
</head>
<body>
    <div id="flex-container">
        <div onclick="location.href='Search-Books.php';" id="active"><span>B</span>ROWSE</div>
        <div onclick="location.href='history.php';"><span>H</span>ISTORY</div>
        <div onclick="location.href='Profile.php';"><span>P</span>ROFILE</div>
    </div>

<?php
	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "bookstore";

	$username = $_COOKIE["username"];
	$username = "\"".$username."\"";


	$connection = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

	$bookid = $_GET['id'];
	// Querying data from history table
	$query = "SELECT * FROM bookdetail WHERE bookdetail.bookid = $bookid";

	$result = mysqli_query($connection, $query);
	//confirm($result);
	$row = mysqli_fetch_assoc($result);

	$book_id = $row['bookid'];
	$book_image = $row['Image'];
	$book_title = $row['Title'];
	$book_writer = $row['Writer'];
	$book_sinopsis = $row['Sinopsis'];

	// Querying average rating
	$ratingcount = "SELECT AVG(RATING) as BookRating from bookreview WHERE BookID =" .$row['bookid']. " GROUP BY BookID";

	$rcountres = mysqli_query($connection, $ratingcount);
	$rcount = mysqli_fetch_assoc($rcountres);
	$fullrating = number_format((float)$rcount['BookRating'], 1, '.', '');

?>

	<div class = "detailfull" >
		<div class="detail-booktitle ">
			<div class = "detail-book" >
				<div class = "orange-font book-title" >
					<b> <?= $book_title ?> </b>
				</div>
				<b> <?= $book_writer ?> </b>

				<div class = "detail-booktext">
					<p> <?= $book_sinopsis ?> </p>
				</div>
			</div>
			<div class = "detail-bookrating">
				<img src= <?= $book_image ?> alt= "image" class = "detail-imagerating">

				<div class = "detail-ratingstar">
					<?php
					// switch ($fullrating) {
					// 	case 0:
					// 		echo "<img src = 'static/star/star0.jpg' class = 'detail-ratingstarimage'>" ;
					// 		break;

					// 	case 0.5:
					// 		echo "<img src = 'static/star/star0.5.jpg' class = 'detail-ratingstarimage'>" ;
					// 		break;
					// 	case 1.0:
					// 		echo "<img src = 'static/star/star1.jpg' class = 'detail-ratingstarimage'>" ;
					// 		break;

					// 	case 1.5:
					// 		echo "<img src = 'static/star/star1.5.jpg' class = 'detail-ratingstarimage'>" ;
					// 		break;

					// 	case 2.0:
					// 		echo "<img src = 'static/star/star2.jpg' class = 'detail-ratingstarimage'>" ;
					// 		break;

					// 	case 2.5:
					// 		echo "<img src = 'static/star/star2.5.jpg' class = 'detail-ratingstarimage'>" ;
					// 		break;

					// 	case 3.0:
					// 		echo "<img src = 'static/star/star3.jpg' class = 'detail-ratingstarimage'>" ;
					// 		break;

					// 	case 3.5:
					// 		echo "<img src = 'static/star/star3.5.jpg' class = 'detail-ratingstarimage'>" ;
					// 		break;

					// 	case 4.0:
					// 		echo "<img src = 'static/star/star4.jpg' class = 'detail-ratingstarimage'>" ;
					// 		break;

					// 	case 4.5:
					// 		echo "<img src = 'static/star/star4.5.jpg' class = 'detail-ratingstarimage'>" ;
					// 		break;

					// 	case 5.0:
					// 		echo "<img src = 'static/star/star5.jpg' class = 'detail-ratingstarimage'>" ;
					// 		break;

					// 	default:
					// 		echo "Rating tidak valid";
					// 		break;
					// }

					if(($fullrating >= 0) and ($fullrating < 0.5 )){
						echo "<img src = 'static/star/star0.jpg' class = 'detail-ratingstarimage'>" ;
					}

					else if(($fullrating >= 0.5) and ($fullrating < 1.0 )){
						echo "<img src = 'static/star/star0.5.jpg' class = 'detail-ratingstarimage'>" ;
					}

					else if(($fullrating >= 1.0) and ($fullrating < 1.5 )){
						echo "<img src = 'static/star/star1.jpg' class = 'detail-ratingstarimage'>" ;
					}

					else if(($fullrating >= 1.5) and ($fullrating < 2.0 )){
						echo "<img src = 'static/star/star0.5.jpg' class = 'detail-ratingstarimage'>" ;
					}
					else if(($fullrating >= 2.0) and ($fullrating < 2.5 )){
						echo "<img src = 'static/star/star2.jpg' class = 'detail-ratingstarimage'>" ;
					}

					else if(($fullrating >= 2.5) and ($fullrating < 3.0 )){
						echo "<img src = 'static/star/star2.5.jpg' class = 'detail-ratingstarimage'>" ;
					}
					else if(($fullrating >= 3.0) and ($fullrating < 3.5 )){
						echo "<img src = 'static/star/star3.jpg' class = 'detail-ratingstarimage'>" ;
					}

					else if(($fullrating >= 3.5) and ($fullrating < 4.0 )){
						echo "<img src = 'static/star/star3.5.jpg' class = 'detail-ratingstarimage'>" ;
					}
					else if(($fullrating >= 4.0) and ($fullrating < 4.5 )){
						echo "<img src = 'static/star/star4.jpg' class = 'detail-ratingstarimage'>" ;
					}
					else if(($fullrating >= 4.5) and ($fullrating < 5.0 )){
						echo "<img src = 'static/star/star4.5.jpg' class = 'detail-ratingstarimage'>" ;
					}
					else if($fullrating = 5.0) {
						echo "<img src = 'static/star/star5.jpg' class = 'detail-ratingstarimage'>" ;
					}
					else
					{
						echo "Rating berada di luar range";
					}



					?>

				</div>
				<div class = "detail-ratingnumber">
					<!-- rata-rata rating -->
					<h1> <?= $fullrating ?> / 5.0 </h1>
				</div>
			</div>
		</div>

		<div class = "detail-order" >
			<h1 class = "bluedark-font"> Order </h1>
			<div class = "detail-ordernumber">
				<p> Jumlah: </p>
				<select class="select" id="orderJml<?= $book_id ?>">
					<option value=1 selected="selected">1</option>
		            <option value=2>2</option>
	    	        <option value=3>3</option>
	        	    <option value=4>4</option>
	           		<option value=5>5</option>
				</select>
			</div>
				<button class = "detail-orderbutton white-font" onclick= "doOrder(<?= $book_id?>)">
				Order
				</button>
				 <script>
				function CustomAlert (){
					this.render = function(text){
						var winW = window.innerWidth;
						var winH = window.innerHeight;
						var dialogoverlay = document.getElementById('dialogoverlay');
						var dialogbox = document.getElementById('dialogbox');
						dialogoverlay.style.display = "block";
						dialogoverlay.style.height = winH + "px";
						dialogbox.style.left = (winW/2) - (550*.5) + "px";
						dialogbox.style.top = 110 + "px";
						dialogbox.style.display = "block";
						document.getElementById('dialogboxhead').innerHTML = "<span id= 'closeButton' onclick = 'Alert.ok()'> X </span> ";
						document.getElementById('dialogboxbody').innerHTML = "<img src='checklist.png' id = 'checklistimage'>" + " <t id = 'dialogboxbodytext'> <b> Pemesanan Berhasil! </b> <br> Nomor Transaksi: " + text + "</t>";

					}
					this.ok = function (){
						document.getElementById('dialogbox').style.display = "none";
						// document.getElementById('dialogoverlay').style.backgroundColor = "transparent";
						document.getElementById('dialogoverlay').style.display = "none";
					}
				}
				var Alert = new CustomAlert();

	            function doOrder(num){
	                banyakorder = document.getElementById("orderJml"+num).value
	                var url_string = window.location.href;
	                var url = new URL(url_string);
	                var bookid = url.searchParams.get("bookid");

	                if (window.XMLHttpRequest) {
	                // code for IE7+, Firefox, Chrome, Opera, Safari
	                    xmlhttp=new XMLHttpRequest();
	                } else { // code for IE6, IE5
	                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	                }
	                xmlhttp.onreadystatechange=function() {
	                    if (this.readyState==4 && this.status==200) {
	                        alert("buku id " + num + " sebanyak " + banyakorder);
	                        Alert.render(this.responseText);
                         	// document.getElementById("dialogoverlay").style.visibility = "visible";
                        }
                    }
	                xmlhttp.open("GET", "bookdetailorder.php?banyakorder=" + banyakorder + "&bookid=" + num, false);
	                //bikin php baru jalanin sql insert

	                xmlhttp.send();
	                }
	            </script>
			</div>
			<div class = "detail-reviews">
				<h1 class = "bluedark-font"> Reviews </h1>

    <!-- ambil data review -->
	   	<?php
	   	$query = "SELECT bookreview.Username, Comment, Rating, Photo  FROM bookreview JOIN userdetail ON bookreview.Username = userdetail.Username WHERE BookID = $bookid";
		$result = mysqli_query($connection, $query);

	   	
	    if($result->num_rows > 0 ) {
		    while ($row = mysqli_fetch_assoc($result)){
				//Fetch all field
		        $book_username = $row['Username'];
		        $book_comment = $row['Comment'];
		        $book_rating = $row['Rating'];
		        $profpict = $row['Photo'];
		        // Querying photo image
				// $queryprofile = "SELECT Username, Photo FROM userdetail WHERE Username =' .$username.' ";
			?>
				<div class = "detail-review">
					<div class = "detail-imagereview">
						<img src="static/profpict/<?= $profpict ?> " id = "userimagereview">
					</div>
					<div class = "detail-textreview">
						<div class = "detail-usernamereview">
							<b> @<?= $book_username ?> </b>
						</div>
						<div class = "detail-commentreview">
							<td> <?= $book_comment ?> </td>
						</div>
					</div>
					<div class = "detail-ratingreview">
						<img src="staryellow.png" alt="star" class="star" />
						<h1> <?= $book_rating ?>.0 / 5.0 </h1>
					</div>
				</div>
				<br>
			<?php  }
		}
		else
		{ ?>
			<div class = "detail-review">
				<div class = "detail-textreview">
					<b> Buku ini belum mendapat review </b>
				</div>
			</div>

		<?php
		}

			?>
		</div>
	</div>

    <div id = "dialogoverlay" >

    </div>
    <div id = "dialogbox" >
    	<div>
    		<div id = "dialogboxhead">
    		</div>
    		<div id = "dialogboxbody">
    			<div id = "dialogboxbodychecklist">

    			</div>
    			<div id = "dialogboxbodytext">

				</div>

	        </div>
    	</div>
    </div>
</body>
</html>
