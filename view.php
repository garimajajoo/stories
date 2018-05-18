<?php
#displays all of the stories you've created and gives you the option of editing or deleting a file
session_start();
require 'database.php';
$stmt = $mysqli->prepare("select title, id from stories where username = ?");
if(!$stmt){
echo("Query Prep Failed");
exit;
}

$stmt->bind_param('s', $_SESSION['username']);
$stmt->execute();
$stmt->bind_result($title,$id);

echo"<u1>\n";
while($stmt->fetch()){
$newlink=sprintf("http://ec2-18-218-146-162.us-east-2.compute.amazonaws.com/~garimajajoo1/module3/users/%s/%s.php",$_SESSION['username'],$title);
echo sprintf('<form action=%s method="post">
<input type="hidden" value=%s name ="viewfile"/>
<label for ="view_file"> %s </label>
<br>
<input id=view_file type="submit" name="see" value="View"/>
</form>',htmlentities($newlink),htmlentities($title),htmlentities($title)).
sprintf('<form action=delete.php method="post">
<input type="hidden" value=%s name ="deletefile"/>
<input id=delete_file type="submit" name="del" value="Delete"/>
</form>',htmlentities($title),htmlentities($title)).
sprintf('<form action=edit.php method="post">
<input type="hidden" value=%s name ="editfile"/>
<input id=edit_file type="submit" name="edit" value="Edit"/>
</form>',htmlentities($title),htmlentities($title));	
}

echo "You have no more stories";

echo "<form action=postlogin.php method='POST'>
<input type = 'submit' value = 'Click here to return to home page'/>
</form>";

echo "</ul>\n";
$stmt->close();
?>
