<!DOCTYPE html>
<html>
<head><title>Your Home Page</title></head>
<body>
<form action="view.php" method="POST">
<input type="submit" value="View Your Stories"/>
</form>
<form action="storyuploader.php" method="POST">
<input type="submit" value="Create New Story"/>
</form>
<form action="settings.php" method="POST">
<input type="submit" value="Account Settings"/>
</form>

<form action="logout.php" method="POST">
<input type="submit" value="Logout"/>
</form>
<br><br><br>
<h1>Stories</h1>
<?php
#this file allows you to see all of your files, upload a story,access account settings, logout, and view all stories produced by any user
session_start();
require "database.php";
if(empty($_SESSION['username'])){
header("Location: login.php");
}
$stmt = $mysqli->prepare("select title, username,id  from stories");
$stmt->execute();
$stmt->bind_result($stories, $users, $id);
while($stmt->fetch()){
$link = sprintf("http://ec2-18-218-146-162.us-east-2.compute.amazonaws.com/~garimajajoo1/module3/users/%s/%s.php", $users, $stories);
echo sprintf('<form action =%s method ="POST">
<label for ="view"> %s by %s </label>
<input type = "submit" name = "view" value = "View"/> </form>', $link, $stories,$users);
}

?>
</html>
