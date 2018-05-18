<?php
#deletes comment
session_start();
require "database.php";
$username=$_SESSION['username'];
$id=$_POST['delete'];
$stmt=$mysqli->prepare("DELETE FROM comments WHERE comment_id=?");
$stmt->bind_param('i',$id);
$stmt->execute();
echo "Comment was deleted!";
echo "<form action=postlogin.php method='POST'>
<input type = 'submit' value = 'Click here to return to the home page'/>
</form>";
?>

