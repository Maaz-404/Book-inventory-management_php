<?php

// Create connection
include_once "db_config.php";

//Query to retrieve data
$sql = "SELECT * FROM books";
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