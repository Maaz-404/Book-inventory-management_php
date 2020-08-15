<?php 
//Registration form will redirect here

// Create connection
include_once "db_config.php";

$email 	= $_POST['email'];
$password    = sha1($_POST['password']);

//$sql="INSERT INTO `books` (`user_token`) VALUES ('$email')";
$sql_e = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$res_e = mysqli_query($conn, $sql_e);

if(mysqli_num_rows($res_e) > 0) {

echo  'Redirecting to user panel';
exit();;
   
      }

else{

    $email_error = "Sorry... Invalid Credentials"; 	
    echo $email_error;
    
      }

$conn->close();

?>