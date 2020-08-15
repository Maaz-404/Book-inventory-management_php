<?php

// Create connection
include_once "db_config.php";

//Insert data in database
$title=$_POST['title'];
$author=$_POST['author'];
$category=$_POST['category'];
$descrip=$_POST['descrip'];
$price=$_POST['price'];

$sql="INSERT INTO `books` (`title`, `author`, `category`, `descrip`, `price`) VALUES ('$title', '$author', '$category', '$descrip', '$price')";

if ($conn->query($sql) === TRUE) {
    echo "data inserted";
}
else 
{
    echo "failed";
}
?>
