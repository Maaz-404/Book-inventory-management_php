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


// Code of Conversion
$query = "SELECT * FROM books;";
$result = mysqli_query($conn , $query);

if ($result) {
  

    // Conversion of result object into JSON format
    $rows = array();
    while($temp = mysqli_fetch_assoc($result)) {
        $rows[] = $temp;
    }

    echo json_encode($rows);

}

 else {
 
}
    
?> 