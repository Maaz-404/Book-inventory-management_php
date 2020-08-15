<?php

// Create connection
include_once "db_config.php";

//Delete from database
$title=$_POST['title'];

	$sql = "DELETE FROM books WHERE title='$title'";
	if ($conn->query($sql) === TRUE) {
		echo "Data Deleted";
	}
	else 
	{
		echo "failed";
	}
	mysqli_close($conn);
?>
