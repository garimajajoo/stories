<?php
#this file makes sure you have the correct username and password and forwards you to the home page
require 'database.php';
session_start();
$_SESSION['token']=bin2hex(openssl_random_pseudo_bytes(32));
$username =$_POST['username'];
$password=$_POST['password'];
$stmt=$mysqli->prepare("select count(*), username, password from login where username=?");

if(!$stmt){
echo "failed";
exit;
}

$stmt->bind_param('s',$username);
$stmt->execute();
$stmt->bind_result($cnt,$user_stored,$pwd_hash);
$stmt->fetch();

if($cnt==1 && password_verify($password,$pwd_hash)){
$_SESSION['username']=$user_stored;
header("Location: postlogin.php");
}
else{
echo "Incorrect username or password";
}
?>
