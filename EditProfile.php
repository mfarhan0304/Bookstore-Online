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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Nunito" />
    <script type="text/javascript"></script>
</head>
<body>
    <?php
        require('NavBar.php');

        $query = "SELECT * FROM userdetail WHERE username = '$username'";
        $result = mysqli_query($conn, $query);
        $row = $result->fetch_assoc();

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
    <form action="validateUpdate.php" method="POST" name="updateProfile" class="info-container" enctype="multipart/form-data" onsubmit="return validateUpdate()">
        <h1>Edit Profile</h1>
        <div class="twocol with-pict">
            <img src="static/profpict/<?php echo $photo ?>" alt="profpict"/>
            <div>
                <label>Update Profile Picture</label>
                <br>
                    <div class="nested-two-row">
                        <textarea id="pict" readonly><?php if ($photo !== NULL) echo $photo; else "" ?></textarea>
                        <input type="file" id="newphoto" name="newphoto" style="display: none;">
                        <button id="btnbrowse" type="button" name="btnbrowse" onclick="document.getElementById('newphoto').click();">Browse ...</button>
                    </div>
            </div>
        </div>
        <div class="twocol">
            <label>Name</label>
            <textarea name="newname"><?php echo $name ?></textarea>
        </div>
        <div class="twocol">
            <label>Address</label>
            <textarea rows="5" name="newaddress"><?php echo $address; ?></textarea>
        </div>
        <div class="twocol">
            <label>Phone Number</label>
            <textarea name="newphone"><?php echo $phone ?></textarea>
        </div>
        <a href="Profile.php"><button id="btnback" type="button">Back</button></a>
        <input id="btnsave" type="submit" value="Save" name="save">
    </form>

    <script>
    function validateUpdate() {
        var form = document.forms["updateProfile"];

        newname = form["newname"].value;
        newaddress = form["newaddress"].value;
        newphone = form["newphone"].value;

        if ((newname.length > 20) || (!newname)) {
            alert("Name must between 1 to 20 characters");
            return false;
        }

        if (!newaddress) {
            alert("Address must not be empty");
            return false;
        }

        if (!newphone.match('^[0-9]{8,12}$')) {
            alert("Invalid phone number");
            return false;
        }

        return true;
    }
    </script>
</body>
</html>
