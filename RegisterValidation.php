<?php
include("db.php");

$errors = array();

if (isset($_POST['register'])) {
  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmpassword = $_POST['confirmpassword'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];

  $query = "INSERT INTO userdetail (username, email, name, address, phone, photo) 
			  VALUES('$username', '$email', '$name', '$address', '$phone', 'NULL')";
  mysqli_query($conn, $query);

  $query = "INSERT INTO user (username, password) 
    VALUES('$username', '$password')";
  mysqli_query($conn, $query);

  header('location: index.php');
}