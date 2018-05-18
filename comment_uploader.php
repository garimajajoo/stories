<?php
#actually uploads comment
require "database.php";
SESSION_START();
$comment = $_POST['comment'];
if(empty($_SESSION['username'])){
echo "You must be logged in to comment";
exit;
}

$comment_username=$_SESSION['username'];
$title = $_POST['title'];
$link = $_POST['link'];
$stmt = $mysqli->prepare("select username from stories where link=?");
if(!$stmt){
echo "Query Failed:";
exit;
}


$stmt->bind_param('s',$link);
$stmt->execute();
$stmt->bind_result($story_username);
$stmt->fetch();
$s_username=$story_username;
$stmt->close();
$stmt2 = $mysqli->prepare("insert into comments (comment_username,comment,story_username,story_title) values(?,?,?,?)");
if(!$stmt2){
echo "Query Failed";
exit;
}
$stmt2 ->bind_param('ssss',$comment_username,$comment,$s_username,$title);
$stmt2->execute();
$stmt2->close();
echo "Comment Uploaded!";
echo "<form action=users/$s_username/$title method='POST'>
<input type = 'hidden' name = 'title' value =$title/>
<input type = 'submit' value = 'Click here to go back to the story'/>
</form>";
?>
