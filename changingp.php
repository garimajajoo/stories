<?php
require "database.php";
session_start();
$username=$_SESSION['username'];
$old_password=$_POST['old_password'];
$new_pwd1=$_POST['new_password1'];
$new_pwd2=$_POST['new_password2'];
if($new_pwd1!==$new_pwd2){
echo "Passwords did not match.";
echo "<form action=change_password.php method='POST'>
<input type = 'submit' value = 'Click here to return to password change page'/>
</form>";
exit;
}

$new_pwd_hash=password_hash($new_pwd1,PASSWORD_BCRYPT);

$stmt=$mysqli->prepare("Select password from login where username=?");
if(!$stmt){
echo "Query Failed";
}
$stmt->bind_param('s',$username);
$stmt->execute();
$stmt->bind_result($check_pwd);
$stmt->fetch();
if(password_verify($old_password, $check_pwd)){
$stmt->close();

$stmt2=$mysqli->prepare("Update login set password=? where username =?");

$stmt2->bind_param('ss',$new_pwd_hash,$username);
$stmt2->execute();
$stmt2->close();
echo "Success! Password has been changed";
echo "<form action=postlogin.php method='POST'>
<input type = 'submit' value = 'Click here to return to home page'/>
</form>";
}

else{
echo "Original password is wrong. Please check again.";
echo "<form action=change_password.php method='POST'>
<input type = 'submit' value = 'Click here to return to change password page'/>
</form>";
}

?>
