<!DOCTYPE html>
<html>
<head><title>Edit your story</title></head>

<?php
#this script allows you to edit your story
session_start();
require 'database.php';
#if(!hash_equals($_SESSION['token'], $_POST['token'])){
#die("Request forgery detected");
#}

$title = $_POST['editfile'];

$username = $_SESSION['username'];

$stmt = $mysqli->prepare("select story,link from stories where (username =? AND title=?)");

if(!$stmt){
echo "Query Failed";
exit;
}
$stmt->bind_param('ss', $username, $title);
$stmt->execute();
#$result = $stmt->get_result();
$stmt->bind_result($editstory,$link);
$stmt->fetch();

echo sprintf("<h1>Edit your story</h1>
<form action='save_edits.php' method='POST'>
<input type = 'hidden' value = %s name = 'title'/> 
<input type = 'hidden' value = %s name = 'link'/>
<textarea name = 'edited_story' rows ='20' cols = '75'> %s
</textarea>
<br>
<input type='submit' name='update' value='Update'/>
</form>",htmlentities($title),htmlentities($link), htmlentities($editstory));
?>
</html>
