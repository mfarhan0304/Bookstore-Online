<?php
    if (!isset($_COOKIE["username"])) {
        header("Location: index.php");
    }
    include("db.php");
    $username = $_COOKIE["username"];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tayo - Header</title>
    <link rel="stylesheet" href="ProfileStyle.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Nunito" />
</head>
<body>
    <?php
        require("NavBar.php");

        $query = "SELECT * FROM userdetail WHERE username = '$username'";
        $result = mysqli_query($conn, $query);
        $row = $result->fetch_assoc();

        $email = $row['Email'];
        $name = $row['Name'];
        $address = $row['Address'];
        $phone = $row['Phone'];
        $photo = $row['Photo'];
    ?>
    <div id="flex-container">
        <div onclick="location.href='Search-Books.php';"><span>B</span>ROWSE</div>
        <div onclick="location.href='history.php';"><span>H</span>ISTORY</div>
        <div onclick="location.href='Profile.php';" id="active"><span>P</span>ROFILE</div>
    </div>

    <div class="home">
        <a href="EditProfile.php"><img id="editbtn" src="static/icons/edit.png" alt="edit"/></a>
        <img id="profpict" src="static/profpict/<?php echo $photo ?>" alt="Profile Picture"/>
        <div id="name"><?php echo $name ?></div>
    </div>
    <div class="info-container">
        <h1>My Profile</h1>
        <div class="info-row">
            <img src="static/icons/username.png" alt="u"/>
            <label>Username</label>
            <label>@<?php echo $username ?></label>
        </div>
        <div class="info-row">
            <img src="static/icons/email.png" alt="e"/>
            <label>Email</label>
            <label><?php echo $email ?></label>
        </div>
        <div class="info-row">
            <img src="static/icons/address.png" alt="a"/>
            <label>Address</label>
            <label><?php echo $address ?></label>
        </div>
        <div class="info-row">
            <img src="static/icons/phone.png" alt="a"/>
            <label>Phone Number</label>
            <label><?php echo $phone ?></label>
        </div>
    </div>
</body>
</html>
