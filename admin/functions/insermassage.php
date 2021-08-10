<?php
$name = $_POST['Name'];
$phone = $_POST['Phone'];
$email = $_POST['Email'];
$message = $_POST['Message'];
require 'connect.php';

$insertMessage = "INSERT INTO message (name , phone , email , message) VALUES ('$name' , '$phone' , '$email' , '$message')";
$query = $conn-> query($insertMessage);

if($query) {

	echo '<div class="alert alert-success">Message inserted Successfully</div>';

} else {
	echo $conn -> error;
}