<html>
	<head>
		<title>  foodmaniac  </title>
		<link rel="stylesheet" href="styles/style.css" media="all"/>

	</head>
	 <body>
	
		<div class ="container">
			<div id="head_wrap">
				<div id="header">
				<a href="index.php">
				<img src="images/logo.png" style="float:left; padding:5px;"/>
				</a>
	           <?php include'home_button.php'; ?>
				</div>
			</div>
		</div> 
<?php

session_start();
$_SESSION["is_not_correct"]=false;
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
if($_POST['1'])
{
	include 'signin_form.php';
}
else
{
	?><h2>
	Signup As
	<html>
	<form id="form2" action="u_signupform.php" method='post'>
	<button type="submit" value="User Signup">User Signup</button>
	<form id="form2" action="o_signupform.php" method='post'>
	<button type="submit" value="Owner Signup">Owner Signup</button>
	<br><br><br>
	</html>
	<?php
	include 'searchform.php';
}
?>
</h2>
</body>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<div id="footer">
		<div>
		<h2>&copy;Prometheus</h2>
		</div>
		<div>
		<a href="https://www.facebook.com/">
		<img src="images/fb.jpg" STYLE="position:absolute; top:900px; right:25px; WIDTH:40px; HEIGHT:40px" />
		</a>
			<a href="https://twitter.com/">
		<img src="images/twit.jpg" STYLE="position:absolute; top:900px; right:75px; WIDTH:40px; HEIGHT:40px" />
		</a>
		</div>
</div> 
</html>