<!DOCTYPE html>
<html>
<body>

<?php
$servername = "localhost:8889";
$username = "root";
$password = "root";
$dbname = "inventory";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT firstname, lastname, email, phonenumber, password FROM users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo  " - Name: " . $row["firstname"]. " " . $row["lastname"]. "  " . $row["email"]. " " . $row["phonenumber"]. " " . $row["password"]. " <br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>

</body>
</html>