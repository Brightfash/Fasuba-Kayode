<?php
session_start();
if(empty($_SESSION['email'])){
    header("location: login.php");
}else {?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>User Login</title>
</head>
<body>
<div class="container">
    <h4 class="text-center">
<?php
if($_SESSION["email"]) {
?>
Welcome <?php echo $_SESSION["email"]; ?>. Click here to <a href="logout.php" tite="Logout">Logout.</h4>
<?php
}else echo "<h1>Please login first .</h1>";
?>

</body>
</html>
<?php } ?>