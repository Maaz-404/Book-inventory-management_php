<?php 
//Registration form will redirect here

// Create connection
include_once "db_config.php";

$firstname 	= $_POST['firstname'];
$lastname 	= $_POST['lastname'];
$email 		= $_POST['email'];
$phonenumber = $_POST['phonenumber'];
$password    = sha1($_POST['password']);

$sql_e = "SELECT * FROM users WHERE email='$email'";
$res_e = mysqli_query($conn, $sql_e);

if(mysqli_num_rows($res_e) > 0){

    $email_error = "Sorry... Email already taken"; 	
    echo $email_error;
      }

else{
        $sql = "INSERT INTO users (firstname, lastname, email, phonenumber, password)
VALUES ('$firstname', '$lastname', '$email', '$phonenumber', '$password')";

    if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
    } 
    else
     {
  echo "Error: " . $sql . "<br>" . $conn->error;
    }

      }
$conn->close();

?>