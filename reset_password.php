<?php
if (isset($_GET["email"]) && isset($_GET["token"])) {
$connection= new mysqli("localhost", "root","", "demo");
    $email = $connection->real_escape_string($_GET["email"]);
    $token = $connection->real_escape_string($_GET["token"]);
    $data = $connection->query("SELECT id FROM users WHERE email='$email' AND token='$token'");
 if($data->num_rows >0){
             echo "please check your link";
             $str="0123456789qwertyuioplkjhgfdsa";
             $str = str_shuffle($str);
             $str = substr($str, 0, 15); <?php
 $password = sha1($str);
             $connection->query("UPDATE users SET password='$password', token='' WHERE email='$email'");
             echo "Your New Password is $str";
         }else{ 
 header('Location: login.php');
             exit();
         } 
 }else{
     header("Location: login.php");
     exit();
 } 