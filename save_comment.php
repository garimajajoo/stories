<?php
#when a person presses submit on edit_comment.php, this script updates the comment and saves it into the database
require "database.php";
session_start();
$id = $_POST['comment_id'];
$comment = $_POST['edited_comment'];
$stmt = $mysqli->prepare("update comments set comment = ? where comment_id = ?");
if(!$stmt){
echo "You screwed up...";
}
$stmt->bind_param('si',$comment, $id);
$stmt->execute();
echo "Your comment was updated.";
echo "<form action=postlogin.php method='POST'>
<input type = 'submit' value = 'Click here to return to the home page'/>
</form>";
$stmt->close();
?>
