<?php
    include("db.php");

    if (isset($_COOKIE["username"])) {
        header("Location: Search-Books.php");
    }

    $message = '';


    if (isset($_POST["login"])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username) || empty($password)) {
            $message = "<div class='alert alert-danger'>Both fields are required</div>";
        } else {
            $query = "SELECT * FROM user WHERE username = '$username' and password = '$password'";

            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                $row = $result->fetch_assoc();
                setcookie("username", $row["Username"], time()+3600);
                header("Location: Search-Books.php");
            } else {
                $message = "<div class='alert alert-danger'>Wrong password or username</div>";
            }
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tayo - Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <form method="post">
            <h1>Login</h1>
            <span><?php echo $message; ?></span>
            <div class="inputBox">
                <label id=formlabel>Username</label>
                <input id=formbox type="text" name="username" required="" autofocus>
            </div>
            <div class="inputBox">
                <label id=formlabel>Password</label>
                <input id=formbox type="password" name="password" required="">
            </div>
            <a href="Register.php" class="clickableText">Don't have an account?</a>
            <input id="btn" type="submit" name="login" value="Login">
        </form>
    </div>
</body>
</html>
