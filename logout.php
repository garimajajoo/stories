<?php
#destroys session and logs out user
session_start();
session_destroy();
header("Location: login.php");
?>
