<?php
#creates a new username and password after a person registers and saves them to the mysql database
require 'database.php';
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
$stmt1=$mysqli->prepare("select count(*) from login where username =?");
if(!$stmt1){
echo "Query Failed";
echo "<form action=register_page.html method='POST'>
<input type = 'submit' value = 'Click here to return to registration page'/>
</form>";
exit;
}
$stmt1->bind_param('s',$username);
$stmt1->execute();
$stmt1->bind_result($count);
$stmt1->fetch();
$stmt1->close();
if($count==1){
echo "Username exists please pick another username";
echo "<form action=register_page.html method='POST'>
<input type = 'submit' value = 'Click here to return to registration page'/>
</form>";
exit;
}

$stmt=$mysqli->prepare("INSERT INTO login (username,password) values (?,?)");
if(!$stmt){
echo "failed";
echo "<form action=register_page.html method='POST'>
<input type = 'submit' value = 'Click here to return to registration page'/>
</form>";
exit;
}

else{
$pwd_hash=password_hash($password, PASSWORD_BCRYPT);
$stmt->bind_param('ss',$username,$pwd_hash);
$stmt->execute();
mkdir(sprintf("/home/garimajajoo1/public_html/module3/users/%s",$username),0777);
$stmt->close();
echo "User created.";
echo "<form action=login.php method='POST'>
<input type = 'submit' value = 'Click here to go to login page'/>
</form>";
}
?>
