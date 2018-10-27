<?php include('RegisterValidation.php') ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tayo - Register</title>
    <link rel="stylesheet" href="Styles.css">
</head>
<body>
    <div class="container register">
        <form name="registerform" method="POST" action="RegisterValidation.php" onsubmit="return validateRegister()">
            <h1>Register</h1>
            <div class="inputBox">
                <label id=formlabel>Name</label>
                <input id=formbox2 type="text" name="name" autofocus>
            </div>
            <div class="inputBox2">
                <label id=formlabel>Username</label>
                <input id=formbox3 type="text" name="username" onkeyup="checkUsername(this.value)">
                <img src="static/icons/checkmark.png" id="check-u" name="check-u" alt="c" style="display: none" />
                <img src="static/icons/crossmark.png" id="cross-u" alt="d" style="display: none" />
            </div>
            <div class="inputBox2">
                <label id=formlabel>Email</label>
                <input id=formbox3 type="text" name="email" onkeyup="checkEmail(this.value)">
                <img src="static/icons/checkmark.png" id="check-e" name="check-e" alt="c" style="display: none" />
                <img src="static/icons/crossmark.png" id="cross-e" alt="d" style="display: none" />
            </div>
            <div class="inputBox">
                <label id=formlabel>Password</label>
                <input id=formbox2 type="password" name="password">
            </div>
            <div class="inputBox">
                <label id=formlabel>Confirm Password</label>
                <input id=formbox2 type="password" name="confirmpassword">
            </div>
            <div class="inputBox">
                <label id=formlabel>Address</label>
                <textarea rows="5" name="address"></textarea>
            </div>
            <div class="inputBox">
                <label id=formlabel>Phone Number</label>
                <input id=formbox2 name="phone">
            </div>
            <a href="index.php" class="clickableText">Already have an account?<br></a>
            <input id="btn" type="submit" name="register" value="Register">
        </form>
    </div>

    <script type="text/javascript" src="register.js"></script>
</body>
</html>
