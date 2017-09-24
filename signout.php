<html>
<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
session_start();
if (!isset($_SESSION["is_signed"]))
{
	echo "you are not signed in";
	include 'index.php';
}
else
{
session_destroy();
  header("Cache-Control: no-cache, must-revalidate"); 
  header("Pragma: no-cache"); 
   header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
header("location: index.php");
} ?>


</html>