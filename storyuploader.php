<!DOCTYPE HTML>

<html>
<head><title>Upload Your Story</title></head>
<body>
<?php
session_start();
#this form just creates the form for users to type their story
?>
<form action="uploader.php" method="POST">
<label>Title<input type="text" name="title"/></label>
<br>
<br>
<label>URL<input type="url" name="url"/></label>
<br>
<br>
<label>Story<textarea name = "story" rows ="20" cols = "75"></textarea></label>
<br>
<br>
<input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>" />
<label>Submit<input type="submit" name="submit"/></label>
</form>
<form action=postlogin.php method='POST'>
<input type = 'submit' value = 'Click here to return to home page'/>
</form>
</body>
</html>
