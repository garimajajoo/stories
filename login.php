<!DOCTYPE html>
<html>
<head> <title>Users Login</title></head>
<body>

<form name = "input" action = "user.php" method="POST">
<label for="userinput">Username:</label>
<input type="text" name="username" id="userinput"/>
<label for ="passinput">Password:</label>
<input type="password" name="password" id="passinput"/>
<input type = "submit" value="Submit" />
<br>
</form>

<form name = "input" action = "register_page.html" method="POST">
<label for ="newuser">Don't have an account? Click here to register</label>
<input type = "submit" id="newuser" value="Register" />
</form>

<?php
require "database.php";
$stmt = $mysqli->prepare("select title, username from stories");
$stmt->execute();
$stmt->bind_result($stories, $users);
echo "<br>";
while($stmt->fetch()){
$link = sprintf("http://ec2-18-218-146-162.us-east-2.compute.amazonaws.com/~garimajajoo1/module3/users/%s/%s.php", $users, $stories);
echo sprintf('<form action =%s method ="POST">
<label for ="view"> %s by %s </label>
<input type = "submit" id = "view" name = "view" value = "View"/> </form>', $link, $stories,$users); 
} 
?>

</body>
</html>    
