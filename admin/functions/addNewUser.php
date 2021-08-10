<?php




if($_SERVER['REQUEST_METHOD'] != "POST"){
	header("location: ../users.php");
	exit();
}


$username = $_POST['username'];
$password = md5($_POST['password']);
$email = $_POST['email'];
$gender = $_POST['gender'];
$priv = $_POST['priv'];
$address = $_POST['address'];

require "connect.php";

$insertUser = "INSERT INTO users (name , password, email , gender ,priv , address) VALUES ('$username' , '$password' , '$email' , '$gender' ,'$priv' , '$address')";

$query = $conn -> query($insertUser);

if($query){

	header("location: ../users.php");

} else {

	echo $conn -> error ;

}
