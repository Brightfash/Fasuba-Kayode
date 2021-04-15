<?php
session_start();
if (!isset($_SESSION["email"]) && !isset($_SESSION["loggedIn"])){
	header("Location: dashboard.php");
	exit();
}
if (isset($_POST["register"])) {
        $connection = new mysqli("localhost", "root", "", "demo");

		$firstname = $connection->real_escape_string($_POST["firstname"]);  		
		$lastname = $connection->real_escape_string($_POST["lastname"]);  				
		$email = $connection->real_escape_string($_POST["email"]);  
		$password = sha1($connection->real_escape_string($_POST["password"])); 
			
		$data = $connection->query("INSERT INTO users (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$password')");

    	if ($data === false)
        	echo "Connection error!";
    	else
           $_SESSION['email'] = $email;
           $_SESSION["loggedIn"] = 1;
           header('Location: dashboard.php');
           exit();
	}	    
    ?>         
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registration</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" href="css/bootstrap.min.css">
<!--===============================================================================================-->

<!--===============================================================================================-->

<!--===============================================================================================-->
</head>
<body>
	
	
	<div class="container">
    <h1 class="text-center">Create account</h1>

    <form action="register.php" method="post" class="mt-4">
    <div class="form-group">
    <label for="exampleInputEmail1">Firstname</label>
    <input type="text" class="form-control" name="firstname"   placeholder="Enter firstname" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Lastname</label>
    <input type="text" class="form-control" name="lastname" placeholder="Enter lastname" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
  </div>
 
  <button type="submit" name="register" class="btn btn-primary">Submit</button>
</form>
<p>Already have an account ? <a href="login.php">Login </a></p>

</div>
</body>
</html>