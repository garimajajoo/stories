<?php
#when a person uses edit.php and clicks submit this script actually saves the changes to the database
require 'database.php';
session_start();
$story = $_POST['edited_story'];
$title = $_POST['title'];
$link = $_POST['link'];
$username=$_SESSION['username'];
$stmt =$mysqli->prepare("update stories set story=? where (username=? and title=?)");
if(!$stmt){
echo "Query Failed";
exit;
}
$stmt->bind_param('sss',$story,$username,$title);
$stmt->execute();
$stmt->close();
$stmt1=$mysqli->prepare("select id from stories where (username=? and title =?)");
if(!$stmt1){
echo "Query Failed";
exit;
}
$stmt1->bind_param('ss',$username,$title);
$stmt1->execute();
$stmt1->bind_result($id);
$stmt1->fetch();
$story_id=$id;
$stmt1->close();
$myFile=sprintf("/home/garimajajoo1/public_html/module3/users/%s/%s.php",$username,$title);
$fh=fopen($myFile,'w');
$stringData="<!DOCTYPE html><html><head><title>$title</title></head><body><h1>$title</h1><p>$story</p>
<?php
?>


<h2>Comment Section</h2>
<form action = '/~garimajajoo1/module3/comments.php' method ='POST'>
<input type = 'submit' value = 'Click here to view all comments'>
<input type = 'hidden' name = 'title' value =$title>
</form>
<br>
<br>
<form action = '/~garimajajoo1/module3/comment_uploader.php' method = 'POST'>
<label>Insert Comment:<br><textarea rows = '4' cols = '50' name = 'comment'></textarea> </label><br>
<input type = 'hidden' name='title' value = $title>
<input type = 'hidden' name ='link' value = $link>
<input type = 'submit' value = 'Submit'>

</form>

<form action=/~garimajajoo1/module3/postlogin.php method='POST'>
<input type = 'submit' value = 'Click here to return to home page'/>
</form>

</body></html>";

fwrite($fh,$stringData);
fclose($fh);
echo "Your Story was Updated!"


?>
