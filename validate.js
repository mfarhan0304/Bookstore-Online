    function validateUpdate() {
        alert("ASDFASDFSAF");
        var name, address, phone, error;
        return false;

        newname = document.getElementById("newname").value;
        newaddress = document.getElementById("newaddress").value;
        newphone = document.getElementById("newphone").value;

        if (newphone) {
            alert("ASDFASDF")
            error = "Phone must not be empty";
            return false;
        }

        if (empty(newaddress)) {
            error = "Address must not be empty";
            return false;
        }

        if ((newname.length > 20) || (empty(newname)) {
            error = "Name must between 1 to 20 characters";
            return false;
        }

        if (empty(error)) {
            $query = "UPDATE userdetail SET name = newname, address = newaddress, phone = newphone WHERE username = '$username'";
            mysqli_query($conn, $query);
        } else {
            document.getElementById("error").innerHTML = error;
        }
    }