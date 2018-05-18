<!DOCTYPE html><html><head><title>new</title></head><body><h1>new</h1><p> me girl</p>
<?php
?>


<h2>Comment Section</h2>
<form action = '/~garimajajoo1/module3/comments.php' method ='POST'>
<input type = 'submit' value = 'Click here to view all comments'>
<input type = 'hidden' name = 'title' value =new>
</form>
<br>
<br>
<form action = '/~garimajajoo1/module3/comment_uploader.php' method = 'POST'>
<label>Insert Comment:<br><textarea rows = '4' cols = '50' name = 'comment'></textarea> </label><br>
<input type = 'hidden' name='title' value = new>
<input type = 'hidden' name ='link' value = ec2-18-218-146-162.us-east-2.compute.amazonaws.com/~garimajajoo1/module3/users/garima/new.php>
<input type = 'submit' value = 'Submit'>

</form>

<form action=/~garimajajoo1/module3/postlogin.php method='POST'>
<input type = 'submit' value = 'Click here to return to home page'/>
</form>

</body></html>