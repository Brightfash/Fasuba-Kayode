<?php
session_start();

if (!isset($_SESSION["email"]) && !isset($_SESSION["loggedIn"])){
	header("Location: dashboard.php");
	exit();
}

if (isset($_POST['login'])){
	$connection= new mysqli("localhost", "root","", "demo");

	$email = $connection->real_escape_string($_POST["email"]);
	$password = sha1($connection->real_escape_string($_POST["password"]));
	$data= $connection->query("SELECT firstname FROM users WHERE email='$email' AND password='$password'");
	
	if ($data->num_rows > 0){
		$_SESSION["email"] = $email;
		$_SESSION["loggedIn"] = 1;

		
		header('Location: dashboard.php');
		exit();
	}else{
		echo "incorrect";
	}


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Using PHP and Mysql</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" href="css/bootstrap.min.css">
<!--===============================================================================================-->

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

	<link rel="stylesheet" type="text/css" href="http://developerguidance.com/contacts/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	
	<div class="container">
<h1 class="text-center">Login </h1>
    <form action="login.php" method="post" class="mt-4">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" required>
  </div>
 
  <button type="submit" name="login" class="btn btn-primary">Submit</button>
</form>
<p>Don't have an account ? <a href="register.php">Create account </a></p>
</div>
</body>
</html>