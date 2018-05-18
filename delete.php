<?php
session_start();
require 'database.php';
#this script deletes a story and every comment associated with it
#if(!hash_equals($_SESSION['token'], $_POST['token'])){
#die("Request forgery detected");
#}
$username=$_SESSION['username'];
$filename=$_POST['deletefile'];
unlink(sprintf("/home/garimajajoo1/public_html/module3/users/%s/%s.php",$username,$filename));
$stmt=$mysqli->prepare("DELETE FROM comments WHERE  story_title=?");
if(!$stmt){
echo "Query Failed";
exit;
}
$stmt->bind_param('s',$filename);
$stmt->execute();
$stmt->close();

$stmt1=$mysqli->prepare("DELETE FROM stories WHERE (title =? and username=?)");
if(!$stmt1){
echo "Query Failed";
}
$stmt1->bind_param('ss',$filename,$username);
$stmt1->execute();
$stmt1->close();
echo "File was deleted!";
echo "<form action=postlogin.php method='POST'>
<input type = 'submit' value = 'Click here to return to home page'/>
</form>";
?>
