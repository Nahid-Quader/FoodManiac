<html>
	<head>
		<title>  FoodManiac  </title>
	</head>
	<body>
<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
session_start();
if ($_POST ['10'])
	{
		include 'signout_button.php';
 		echo "welcome, ";
		echo $_SESSION['name']; ?> (Admin)<br> <?php 
		include 'Admin_signin.php';
		include 'searchform.php';
	}
elseif (!isset($_SESSION["is_signed"]))
{
	include 'index.php';
}
else
{
	$_SESSION["signout"]="yes";
	include 'index.php';
}
?>
</body>
</html>