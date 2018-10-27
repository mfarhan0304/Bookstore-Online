<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tayo - Header</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Nunito" />
</head>
<body>
    <div class="topnav">
        <div class="topnav-identity">
            <div class="appsName">
                <div id="prefix">Pro</div>-Book
            </div>
            <div class="topnav-right">
                <u>Hi, <?php echo $_COOKIE["username"]?></u>
                <a href = "LogOut.php">
                    <img class="topnav-right" src="static/icons/logOut.png" alt="out"/>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
