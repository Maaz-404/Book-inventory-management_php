<?php
session_start();
$message="";
if(count($_POST)>0) {
 // Create connection
$servername = "localhost:8889";
$username = "root";
$password = "root";
$dbname = "bi";
$conn = mysqli_connect($servername, $username, $password, $dbname);

$email 	= $_POST['email'];
$password    = sha1($_POST['password']);

$result = mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND password='$password'";
$row  = mysqli_fetch_array($result);
if(is_array($row)) {
$_SESSION["id"] = $row['id'];
$_SESSION["email"] = $row['email'];
} else {
$message = "Invalid email or Password!";
}
}
if(isset($_SESSION["id"])) {
header("Location: user_panel.php");
}
?>
<html>
<head>
<title>User Login</title>
</head>
<body>
<form name="frmUser" method="post" action="" align="center">
<div class="message"><?php if($message!="") { echo $message; } ?></div>
<h3 align ="center">Enter Login Details</h3>
 Username:<br>
 <input type="text" name="user_name">
 <br>
 Password:<br>
<input type="password" name="password">
<br><br>
<input type="submit" name="submit" value="Submit">
<input type="reset">
</form>
</body>
</html>