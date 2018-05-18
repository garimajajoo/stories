<!DOCTYPE html>
<html>
<head><title>Edit your comment</title></head>
<?php
require "database.php";
session_start();
$id = $_POST['edit'];
$username = $_SESSION['username'];
$stmt = $mysqli->prepare("select comment from comments where comment_id = ?");
if(!$stmt){
echo "Query Failed";
exit;
}

$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->bind_result($comment);
$stmt->fetch();

echo sprintf("<h1>Edit your comment</h1>
<form action = 'save_comment.php' method = 'POST'>
<input type = 'hidden' value = %s name = 'comment_id' />
<textarea name = 'edited_comment' rows = '4' cols = '50'> %s
</textarea>
<br>
<input type = 'submit' name = 'update' value= 'Update'/>
</form>", $id, htmlentities($comment));
?>
</html>
