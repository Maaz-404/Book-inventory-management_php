<?php
// Initialize the session
session_start();

?>

<!DOCTYPE html lang='en'>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Inventory Management System</title>

    <!--Get Bootstrap-->
    <!-- Latest compiled and minified CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!--Get Bootstrap-->
    <style>
      th, td, p, input {
          font:14px Verdana;
      }
      table, th, td 
      {
          border: solid 1px #DDD;
          border-collapse: collapse;
          padding: 2px 3px;
          text-align: center;
      }
      th {
          font-weight:bold;
      }
  </style>


    <!-- JS, Popper.js, and jQuery-->
        <script src="https://code.jquery.com/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

        
    <!--Bootstrap table -->
        <script src="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
    
    <!-- JS, Popper.js, and jQuery-->


</head>



<body>


<?php
if($_SESSION["email"]) {
?>
Welcome <?php echo $_SESSION["email"]; ?>. Click here to <a href="index.php" tite="Logout">Logout.
<?php
}else echo "<h1>Please login first .</h1>";
?>

   
                <!--    TODO    -->
            <!--Write table input to json using fetch(http) / file-system -->
            <!--Implement Filters-->
<!--Place input inside a modal which only opens when user clicks anywhere on table-->
<!--Copy this template, _Connect HTML to PHP/Python (with/without json) & _Store data in MySQL *-->
<!--Retrieve data from MySQL to HTML *--> 
<!--Create a journal > ledger application-->


    <!--Header start-->
    <div class="container-fluid">
            <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">Book Inventory Management</h1>
                        <p class="lead "></p>
                    </div>
                </div>
    </div>
    <!--Header end-->


    <!--Grid-->
    <div class="container-fluid">
        <!-- Control the column width, and how they should appear on different devices -->
        <div class="row">
                <!--Grid 1-->
                <div class="col-sm-6">
            
                    <!--title-->
                    <div class="input-group mb-3" >
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Book Title</span>
                            </div>
                                <input id="title" type="text"  name="title" class="form-control" placeholder="Ex. Operating Systems" aria-label="Color" aria-describedby="basic-addon1" required>
                    </div>

                     <!--Author-->
                     <div class="input-group mb-3" >
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Book Author</span>
                        </div>
                            <input id="author" type="text" class="form-control" name="author" placeholder="Ex. Tasleem Mustafa" aria-label="Color" aria-describedby="basic-addon1" required>
                </div>
                    
                    <!--Category-->
                    <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <label class="input-group-text" for="inputGroupSelect01">Category</label>
                            </div>
                            <select id="category" class="custom-select" id="inputGroupSelect01"  name="category" required >
                              <option selected>General</option>
                              <option value="Information Technology(IT)">Info. Tech</option>
                              <option value="Computer Science(CS)">Computer Science</option>
                              
                            </select>
                    </div>
                    
                    <!--Description-->
                    <div class="input-group" >
                        <div class="input-group-prepend">
                            <span class="input-group-text">Description</span>
                        </div>
                        <textarea id="description" name="descrip" class="form-control" aria-label="Description" required></textarea>
                    </div><br>

                    <!--Price in Rs-->
                    <div class="input-group mb-3" >
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Price</span>
                            </div>
                                <input id="price" type="number" name="price" class="form-control" placeholder="Price in RS" aria-label="price" aria-describedby="basic-addon1" required>
                    </div>
                   
     <!--insert,delete,update-->
    <button type="submit" id="ajax_insert" value="Submit" class="btn btn-success" onclick="addHtmlTableRow()">Insert</button>
    <button type="submit" id="ajax_delete"  class="btn btn-danger" onclick= "removeSelectedRow()" >Delete</button>
    <button type="submit" id="ajax_update" value="Submit" class="btn btn-warning"  onclick="editHtmlTbleSelectedRow()">Update</button>
    <br><br><br>

</div>

<!-- Table -->
<div class="row">
    <div class="col-md-auto">
        <table class="table table-hover table-bordered" id="table">
            <thead .thead-dark>
                <tr>
                    <th data-field="title">Title</th>
                    <th data-field="author">Author</th>
                    <th data-field="price">Price</th>
                    <th data-field="category">Category</th>
                    <th data-field="description">Description</th>
                    
                </tr>
            </thead>
    <tbody id="tody">
      
    </tbody>   
        </table>
    </div>
</div>

</div>
<!--Grid ends-->

</body>
</html>


<!--javascript starts here-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>

//Read data from database / Create bootstrap table from json @ read_test.php * todo


//Read data from database at an interval of 0.9seconds
$(document).ready(function(){
 setInterval(readaj, 900);
});

function readaj(){
$.ajax({
		url: "crud/read.php",
		type: "POST",
		cache: false,
		success: function(data){

            $('#tody').html(data); 
                           
		}
    });
}

//Ajax database Insertion
$(document).ready(function(){
            $("#ajax_insert").click(function(){


                var title=$("#title").val();
                var author=$("#author").val();
                var price=$("#price").val();
                var category=$("#category").val();
                var descrip=$("#description").val();

                if (title  == "" || author  == "" || price == "" || category == "" || descrip == ""){

                    Swal.fire({
								'title': 'Errors',
								'text': 'Please fill out all required fields before submitting.',
								'type': 'error'
								})
                }
else{
                $.ajax({
                    url:'crud/insert.php',
                    method:'POST',
                    data:{
                        title:title,
                        author:author,
                        price:price,
                        category:category,
                        descrip:descrip
                       
                        
                    },
                   success:function(data){
                    Swal.fire({
								'title': 'Successful',
								'text': data,
								'type': 'success'
								})
                            },
                    error: function(data){
					 Swal.fire({
								'title': 'Errors',
								'text': 'There were errors while saving the data.',
								'type': 'error'
								})
                   }
                });
}//else condition for ajax request ends here

            });
        });

//Ajax Data deletion
$(document).ready(function(){
            $("#ajax_delete").click(function(){

                var title=$("#title").val();
                var author=$("#author").val();
                var price=$("#price").val();
                var category=$("#category").val();
                var descrip=$("#description").val();

                if (title  == "" || author  == "" || price == "" || category == "" || descrip == ""){

Swal.fire({
            'title': 'Errors',
            'text': 'Please select data from Table to Delete.',
            'type': 'error'
            })
}

else{

                $.ajax({
                    url:'crud/delete.php',
                    method:'POST',
                    data:{
                        title:title,

                    },
                    success:function(data){
                    Swal.fire({
								'title': 'Successful',
								'text': data,
								'type': 'success'
								})
                            },
                    error: function(data){
					 Swal.fire({
								'title': 'Errors',
								'text': 'There were errors while deleting the data.',
								'type': 'error'
								})
                   }
                });
}//else condition for ajax request ends here
            });
        });

        
//AJax data update
$(document).ready(function(){
            $("#ajax_update").click(function(){
                var title=$("#title").val();
                var author=$("#author").val();
                var price=$("#price").val();
                var category=$("#category").val();
                var descrip=$("#description").val();
            
                if (title  == "" || author  == "" || price == "" || category == "" || descrip == ""){

                    Swal.fire({
                                'title': 'Errors',
                                'text': 'Please fill out all required fields before submitting.',
                                'type': 'error'
                                })
                    }
else{
                $.ajax({
                    url:'crud/update.php',
                    method:'POST',
                    data:{
                        title:title,
                        author:author,
                        price:price,
                        category:category,
                        descrip:descrip
                        
                        
                    },
                    success:function(data){
                    Swal.fire({
								'title': 'Successful',
								'text': data,
								'type': 'success'
								})
                            },
                    error: function(data){
					 Swal.fire({
								'title': 'Errors',
								'text': 'There were errors while updating the data.',
								'type': 'error'
								})
                   }
                });
}//else condition for ajax request ends here
            });
        });


//Starts here
//crud functions
  var rIndex,

// get the table by id
  table = document.getElementById("table");
    
  // display selected row data into input text
  function selectedRowToInput()
  {
      
      for(var i = 0; i < table.rows.length; i++)
      {
          table.rows[i].onclick = function()
          {
            // get the seected row index
            rIndex = this.rowIndex;

            document.getElementById("title").value = this.cells[0].innerHTML;
            document.getElementById("author").value = this.cells[1].innerHTML;
            document.getElementById("price").value = this.cells[2].innerHTML;
            document.getElementById("category").value = this.cells[3].innerHTML;
            document.getElementById("description").value = this.cells[4].innerHTML;
       
          };
      }
  }


  // add Row
function addHtmlTableRow()
  {  

// call the function to set the event to the new row
    selectedRowToInput();

// Create new Html rows according to table length variable
    var newRow = table.insertRow(table.length),


// Get Input values from user in form & store them in variables for later use
    title = document.getElementById("title").value;
    author = document.getElementById("author").value;
    price  = document.getElementById("price").value;
    category = document.getElementById("category").value,
    description = document.getElementById("description").value;

// Input Validation  
    if (title  !== "" && author  !== "" && price !== "" && category !== "" && descrip !== ""){

// Add cells to that row
      cell0 = newRow.insertCell(0),
      cell1 = newRow.insertCell(1),
      cell2 = newRow.insertCell(2),
      cell3 = newRow.insertCell(3),
      cell4 = newRow.insertCell(4),
   
// Assign values to cells by using variables whose values come from input form above
        cell0.innerHTML = title;
        cell1.innerHTML = author;
        cell2.innerHTML = price;
        cell3.innerHTML = category;
        cell4.innerHTML = description;

    }

else{
        
    }
}

  //Edit selected row  
function editHtmlTbleSelectedRow()
  {
      var title = document.getElementById("title").value;
          author = document.getElementById("author").value;
          category = document.getElementById("category").value;
          price  = document.getElementById("price").value;
          description = document.getElementById("description").value;

    if (title  !== "" && author  !== "" && price !== "" && category !== "" && descrip !== ""){
      table.rows[rIndex].cells[0].innerHTML = title; 
      table.rows[rIndex].cells[1].innerHTML = author;
      table.rows[rIndex].cells[2].innerHTML = price;
      table.rows[rIndex].cells[3].innerHTML = category;
      table.rows[rIndex].cells[4].innerHTML = description;
    }
    else{
        
    }
}
  
    //Remove selected row
function removeSelectedRow()
  {
      table.deleteRow(rIndex);
      // clear input text
          document.getElementById("title").value;
          document.getElementById("author").value;
          document.getElementById("price").value;
          document.getElementById("category").value;    
          document.getElementById("description").value;

  }
  
</script>

</body>

</html>