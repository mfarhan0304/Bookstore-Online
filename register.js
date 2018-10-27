function checkUsername(username) {
    if (username) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == 1) {
                    document.getElementById("check-u").style.display = "";
                    document.getElementById("cross-u").style.display = "none";
                } else {
                    document.getElementById("check-u").style.display = "none";
                    document.getElementById("cross-u").style.display = "";
                }
            }
    }
    xhr.open("GET", "usernameCheck.php?username="+username, true);
    xhr.send();                
    }
}

function checkEmail(email) {
    if (email) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == 1) {
                    document.getElementById("check-e").style.display = "";
                    document.getElementById("cross-e").style.display = "none";
                } else {
                    document.getElementById("check-e").style.display = "none";
                    document.getElementById("cross-e").style.display = "";
                }
            }
        }
        xhr.open("GET", "emailCheck.php?email="+email, true);
        xhr.send();
    }
}

function validateRegister() {
	var form = document.forms["registerform"];
	var name, username, email, password, confirmpassword, address, phone;

	name = form["name"].value;
	username = form["username"].value;
	email = form["email"].value;
	password = form["password"].value;
	confirmpassword = form["confirmpassword"].value;
	address = form["address"].value;
	phone = form["phone"].value;

    if ((name.length > 20) || (!name)) {
        alert("Name must between 1 to 20 characters");
        return false;
    }

    if (!username) {
    	alert("Username must not be empty");
        return false;
    } else if (form["check-u"].style.display != "") {
    	alert("Username already taken");
    	return false;
    }

    if (!email) {
    	alert("Email must not be empty");
        return false;
    } else if (form["check-e"].style.display != "") {
    	alert("Email already taken");
    	return false;
    }

    if (!password) {
    	alert("Password must not be empty");
        return false;
    }

    if (password !== confirmpassword) {
    	alert("The password not match");
        return false;
    }

    if (!address) {
        alert("Address must not be empty");
        return false;
    }

    if (!phone.match('^[0-9]{8,12}$')) {
        alert("Invalid phone number");
        return false;
    }

    return true;
}