<?php

// Create connection
include_once "db_config.php";

//Set email to sign in value

//Query to retrieve data
$sql = "SELECT title,author,price,category,descrip FROM books where user_token='rootsite123@yahoo.com'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
?>	
		<tr>
            
			<td><?=$row['title'];?></td> 
			  
			
            <td><?=$row['author'];?></td>    
            
            
            <td><?=$row['price'];?></td>
            
			
            <td><?=$row['category'];?></td>
           
			
            <td><?=$row['descrip'];?></td>

        </tr>
           
<?php	
	}
	}
	else {
		
	}
    mysqli_close($conn);
      
?> 