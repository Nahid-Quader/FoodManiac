<?php
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
?>
	<head>
				<link rel="stylesheet" href="styles/style.css" media="all"/>

	</head>
	<body>
	
		<div class ="container">
			<div id="head_wrap">
				<div id="header">
				<a href="index.php">
				<img src="images/logo.png" style="float:left; padding:5px;"/>
				</a>
	           
 <form action="index.php" method='post' id="form2" style="float:right">
 
		<button name="1" value="Back" >Back</button>
 <!--
<input type="submit" value="back" name="1">-->
</form>  

<form action="index.php" method='post' id="form2" style="float:right">
<button name="1" value="home">Home</button> 
<!--<input type="submit" value="home" name="1">-->
</form> 

				</div>
			</div>
		</div>


<div id="div1">

		<div>
		<img src="images/one7.jpg" width="500" height="500"/>
		</div>
	<div>	
<div STYLE="position:absolute; top:200px; right:500px" align="right" background="0000000">

<?php
if($_SESSION["is_not_correct"]==true)
{
	echo "your username or password is not correct. Please try again";
}
//include 'home_button.php'; ?>
<form action="Signin.php" method="post" id="form2">
  		    Email: <input type="text" name="email" required="required"><br>
			Password: <input type="password" name="password" required="required"><br>
			<button type="submit" value="Signin">Signin</button> 
	
</form>

</div>
</div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div id="footer">
		<div>
		<h2>&copy;Prometheus</h2>
		</div>
		<div>
		<a href="https://www.facebook.com/">
		<img src="images/fb.jpg" STYLE="position:absolute; top:640px; right:25px; WIDTH:40px; HEIGHT:40px" />
		</a>
			<a href="https://twitter.com/">
		<img src="images/twit.jpg" STYLE="position:absolute; top:640px; right:75px; WIDTH:40px; HEIGHT:40px" />
		</a>
		</div>
</div>
</html>