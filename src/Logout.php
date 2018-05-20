<?php require_once('Include/Functions.php'); ?>
<?php require_once('Include/Sessions.php'); ?>
<?php
 $_SESSION["User_id"]=null;
 session_destroy();
 Redirect_to("Login.php");
?>