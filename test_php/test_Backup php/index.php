<!DOCTYPE html>
<html>
<head>
	<title>Login to User Panel</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>


<body>

<div>

	<form >
		<div class="container">
			
			<div class="row">
				<div class="col-sm-3">
					<h1>Login</h1>
					<p>Sign in to user panel & start playing with your products</p>
					<hr class="mb-3">
					
					<label for="email"><b>Email Address</b></label>
					<input class="form-control" id="email"  type="email" name="email" required>



					<label for="password"><b>Password</b></label>
					<input class="form-control" id="password"  type="password" name="password" required>
					<hr class="mb-3">
					<input class="btn btn-primary" type="submit" id="login" name="create" value="Sign in">
				</div>
			</div>
		</div>
	</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">


//Redirect Function after login
function redirect(){

	window.location.assign('user_panel.php');
}

	$(function(){
		$('#login').click(function(e){

			var valid = this.form.checkValidity();

			if(valid){

			var email 		= $('#email').val();

			var password 	= $('#password').val(); 

			
				e.preventDefault();	

				$.ajax({
					type: 'POST',
					url: 'crud/log_process.php',
				//	url: 'crud/read.php',
					data: {email: email,password: password},
					success: function(data){
						
						Swal.fire({
								'title': '',
								'text': data,
								'type': 'success'
								})

					//Redirect to user panel
					setTimeout(redirect, 2000)

					},
					error: function(data){
						Swal.fire({
								'title': 'Errors',
								'text': data,
								'type': 'error'
								})
					}
				});

				$.ajax({
					type: 'POST',
					url: 'crud/read.php',
				//	url: 'crud/read.php',
					data: {email: email}
					

				});

				$.ajax({
					type: 'POST',
					url: 'crud/insert.php',
				//	url: 'crud/read.php',
					data: {email: email}

				});
				
			}
			
			else{
				Swal.fire({
								'title': 'Errors',
								'text': 'Please fill out all fields',
								'type': 'error'
								})
			}

		});		
		
	});
	
</script>
</body>
</html>