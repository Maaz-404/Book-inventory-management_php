<?php

// Create connection
$servername = "localhost:8889";
$username = "root";
$password = "root";
$dbname = "bi";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
	$title=$_POST['title'];
	$author=$_POST['author'];
	$price=$_POST['price'];
	$category=$_POST['category'];
	$descrip=$_POST['descrip'];
	
	$sql = "UPDATE books
	SET `author`='$author',
	`category`='$category',
	`descrip`='$descrip',
	`price`='$price' WHERE title='$title' ";
}

if ($conn->query($sql) === TRUE) {
		echo "Data Updated";
	} 
else 
{
    echo "Failed" ;
}

?>