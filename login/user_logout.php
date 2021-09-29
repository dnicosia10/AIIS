<?php
session_start();
session_destroy();
//echo 'You have successfully logged out!';
//echo '<br><a href = "index.php">Go to Login</a>';
$desc = "The admin Log-OUT";
$act = "LOG";
$audit = mysql_query("INSERT INTO sdmo_audit(AUDIT_DESC,AUDIT_ACTION,AUDIT_DATE)VALUES('$desc','$act',now())");
  header('Location: ../index.php');
?>
