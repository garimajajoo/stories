<!DOCTYPE html>
<html>
<head>
<title>Garima</title>
</head>
<body>
<h1>Garima</h1>
<p>Hi my name is garima</p>
<?php

if(!empty('')){
echo '<a href =>click here to go to the link</a>';
}
?>

<h2>Comment Section</h2>
<form action = '/~garimajajoo1/module3/comments.php' method ='POST'>
<input type = 'submit' value = 'Click here to view all comments'>
<input type = 'hidden' name = 'title' value =Garima>
</form>
<br>
<br>
<form action = '/~garimajajoo1/module3/comment_uploader.php' method = 'POST'>
<label>Insert Comment:<br><textarea rows = '4' cols = '50' name = 'comment'></textarea> </label><br>
<input type = 'hidden' name='title' value = Garima>
<input type = 'hidden' name ='link' value = ec2-18-218-146-162.us-east-2.compute.amazonaws.com/~garimajajoo1/module3/users/garima/Garima.php>
<input type = 'submit' value = 'Submit'>
</form>

<form action='/~garimajajoo1/module3/postlogin.php' method='POST'>
<input type = 'submit' value = 'Click here to return to home page'/>
</form>

</body>
</html>