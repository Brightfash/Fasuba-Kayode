<?php
 if (isset($_POST["forgotpass"])){
 $connection= new mysqli("localhost", "root","", "demo");
 $email = $connection->real_escape_string($_POST["email"]);
 
 $data = $connection->query("SELECT id FROM users WHERE email='$email'");
 
 if ($data->num_rows > 0){
 $str= "0123456789qwertyyuiokkgffasdasdsvcvd";
 $str = str_shuffle($str);
 $str = substr($str, 0, 9);
 $url = "localhost/tut/resetpassword.php?token=$str&email=$email";
 
 mail($email, "Reset Password", "To Reset the Password, Please Visit: $url", "From: support@domain.com\r\n");
 
 $connection->query("UPDATE user SET token='$str' WHERE email='$email'");
 
 }else{
 
 }
 }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>Forgot Password Using PHP and Mysql</title>
<meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================--> 
 <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
<link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
 
 
<div class="container">
<h1 class="text-center">Forget password </h1>
    <form action="forget_password.php" method="post" class="mt-4">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>

  <input type="submit" class="btn btn-success" name="forgotpass" value="Request Password" class="login100-form-btn">
</form>
</div>
</body>
</html>