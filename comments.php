<?php
#this script shows all the comments for a particular story
require "database.php";
session_start();
$title=$_POST['title'];
$stmt=$mysqli->prepare('select comment_id, comment, comment_username from comments where story_title=?');
if(!$stmt){
echo "Query Failed";
exit;
}
$stmt->bind_param('s',$title);
$stmt->execute();
$stmt->bind_result($comment_id,$comment,$comment_username);

while($stmt->fetch()){
printf("Username: %s",htmlspecialchars($comment_username));
echo "<br>";
printf("Comment: %s",htmlspecialchars($comment));
if(empty($_SESSION)){
echo "<br>";
}
if($_SESSION['username']===$comment_username){
echo "<br>";
echo sprintf('<form action = "edit_comment.php" method="POST">
<input type = "hidden" name="edit" value="%s" />
<input type = "submit" value="Edit"/> </form>',$comment_id);

echo sprintf('<form action = "delete_comment.php" method="POST">
<input type = "hidden" name = "delete" value="%s" />
<input type = "submit" value="Delete"/> </form>',$comment_id);


}
echo "<br> <br>";
}

echo "You have no more comments";
echo "<form action=postlogin.php method='POST'>
<input type = 'submit' value = 'Click here to return to home page'/>
</form>";
$stmt->close();
?>
