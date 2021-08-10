<?php
echo "<pre>";

$username = $_POST['username'];
$password = md5($_POST['password']);

require 'connect.php';

$check = "SELECT * FROM users WHERE name = '$username' AND password = '$password'";

$query = $conn -> query($check);

$user = $query -> fetch_assoc();

if($query -> num_rows > 0 ){

	session_start();
	$_SESSION['login_user'] = $user['id'];
	header("location: ../cards.php");

} else {

	header("location: ../login.php");
}