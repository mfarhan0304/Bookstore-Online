<?php
	include("db.php");

	if (isset($_POST['save'])) {
		$name = $_POST['newname'];
		$address = $_POST["newaddress"];
		$phone = $_POST["newphone"];

        $target_dir = "static/profpict/";
        $photo = basename($_FILES["newphoto"]["name"]);
        $target_file = $target_dir . $photo;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["newphoto"]["tmp_name"], $target_file);

        $query;

        if ($photo) {
			$query = "UPDATE userdetail SET name = '$name', address = '$address', phone = '$phone', photo = '$photo' WHERE username = '".$_COOKIE['username']."'";
        } else {
        	$query = "UPDATE userdetail SET name = '$name', address = '$address', phone = '$phone' WHERE username = '".$_COOKIE['username']."'";
        }
	    
	    mysqli_query($conn, $query);
	    header("Location: Profile.php");		
	}
?>