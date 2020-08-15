<?php 
  $db = mysqli_connect('localhost', 'root', '', 'email_taken');
  $username = "";
  $email = "";
  if (isset($_POST['register'])) {
  	$username = $_POST['username'];
  	$email = $_POST['email'];
  	$password = $_POST['password'];
 
  	$sql_e = "SELECT * FROM users WHERE email='$email'";
  	$res_e = mysqli_query($db, $sql_e);

    if(mysqli_num_rows($res_e) > 0){
  	  $email_error = "Sorry... email already taken"; 	
  	}else{
           $query = "INSERT INTO users (email, password) 
      	    	  VALUES ( '$email', '".md5($password)."')";
           $results = mysqli_query($db, $query);
           echo 'Saved!';
           exit();
  	}
  }
?>


$sql=mysql_query("SELECT FROM users (username, password, email) WHERE username=$fusername");
 if(mysql_num_rows($sql)>=1)
   {
    echo"name already exists";
   }
 else
    {
   //insert query goes here
    }