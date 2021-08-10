<?php



define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'dataAjax');

$conn = new mysqli(HOST , USER , PASS , DBNAME);

$conn -> set_charset('utf8');


if($conn -> connect_errno){
	echo $conn -> connect_error;
}

