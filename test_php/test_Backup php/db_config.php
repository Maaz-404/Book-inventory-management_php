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

?>