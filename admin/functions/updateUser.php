<?php

if($_SERVER['REQUEST_METHOD'] != "POST"){
	header("location: ../users.php");
	exit();
}

$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$priv = $_POST['priv'];
$address = $_POST['address'];



require 'connect.php';


if(!empty($password)){
	$pass = md5($_POST['password']);
	$updatePass = "UPDATE users SET password = '$pass' WHERE id = $id ";
	$querPass = $conn -> query($updatePass);
}


$update = "UPDATE users SET name = '$username' , email = '$email' , gender = '$gender' , priv = '$priv' , address = '$address' WHERE id = $id  ";


if($conn -> query($update)){
	header("location: ../users.php");
} else {
	echo $conn -> error;
}