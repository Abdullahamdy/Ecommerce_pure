<?php
echo "<pre>";


$name = $_POST['name'];
$price = $_POST['price'];
$sale = $_POST['sale'];
$category = $_POST['category'];


// print_r($_FILES);


$imgName = $_FILES['img']['name'];
$tmpName = $_FILES['img']['tmp_name'];


if($_FILES['img']['error'] == 0){

	$extensions = ['png','gif','jpg','jpeg'];
	// $newArr = explode('.', $imgName);
	// $ext = end($newArr);
	$ext = pathinfo($imgName , PATHINFO_EXTENSION);

	if(in_array($ext, $extensions)){

		if($_FILES['img']['size'] < 2000000){

			$newName = md5(uniqid()).'.'.$ext ;

			move_uploaded_file($tmpName, "../images/$newName");

		} else {

			echo "wrong file size";
		}

	} else {

		echo "bad file extension";
	}


} else {

	echo "you must upload a file";
}





require 'connect.php';
$insertPro = "INSERT INTO products (name , price , sale , cat_id , img) VALUES ('$name' , '$price' , '$sale' , '$category' , '$newName')";

$query = $conn -> query($insertPro);

if($query){
	header("location: ../products.php");
}
else {
	echo $conn -> error ;
}