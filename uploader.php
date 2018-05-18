<!DOCTYPE html>
<html>
<head><title></title></head>

<?php
#this script saves the story into the database as well as creates a new php file in the users folder (each username has its own directory in the users folder). Now each story has its own unique url and phpfile
require 'database.php';
session_start();
if(!hash_equals($_SESSION['token'], $_POST['token'])){
die("Request forgery detected");
}
$title=$_POST['title'];
$story=$_POST['story'];
$username=$_SESSION['username'];

$stmt1=$mysqli->prepare("select id from stories where (username=? and title=?)");
if(!$stmt1){
echo "Query Failed";
}
$stmt1->bind_param('ss',$username,$title);
$stmt1->execute();
$stmt1->bind_result($id);
$stmt1->fetch();
$story_id=$id;
$stmt1->close();


$link=sprintf("ec2-18-218-146-162.us-east-2.compute.amazonaws.com/~garimajajoo1/module3/users/%s/%s.php",$_SESSION['username'],$title);
$url=$_POST['url'];



$stmt=$mysqli->prepare("INSERT INTO stories (username,title,link,story,url) values (?,?,?,?,?)");
if(!$stmt){
echo "Upload Failed";
exit;
}

else{
$stmt->bind_param('sssss',$username,$title,$link,$story,$url);
$stmt->execute();
$stmt->close();

$myFile = sprintf("/home/garimajajoo1/public_html/module3/users/%s/%s.php",$username,$title);
$fh=fopen($myFile,'w');
$stringData=
"<!DOCTYPE html>
<html>
<head>
<title>$title</title>
</head>
<body>
<h1>$title</h1>
<p>$story</p>
<?php

if(!empty('$url')){
echo '<a href =$url>click here to go to the link</a>';
}
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

<form action='/~garimajajoo1/module3/postlogin.php' method='POST'>
<input type = 'submit' value = 'Click here to return to home page'/>
</form>

</body>
</html>";
fwrite($fh,$stringData);
fclose($fh);
$newlink=sprintf("/~garimajajoo1/module3/users/%s/%s.php",$username,$title);
#echo $story_id;
#echo sprintf("there are %d", $story_id);
header("Location: $newlink");
}
?>
</html>
