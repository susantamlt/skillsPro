<?php include 'top.php'; 
error_reporting(E_ALL);	
 ob_start();
 session_start();
 $_SESSION=array();
  session_destroy();
  header("location:".WEBDIR.ROOT."partners/sign-in.php");
  exit;
  

?>