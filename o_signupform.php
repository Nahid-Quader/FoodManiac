
		<html>
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
	           <?php include'home_button.php'; ?>
				</div>
			</div>
		</div>

		<div>
		<div>
		<img src="images/one4.jpg" width="500" height="500"/>
		</div>
		<div STYLE="position:absolute; top:200px; right:500px" background="0000000"> 
	 <form id="form2" action="ownersignup.php" method="post">
			<strong> First Name:</strong> <input type="text" name="fname" required="required">*<br>
			<strong>Last Name:</strong> <input type="text" name="lname"required="required">*<br>
			<strong>Password:</strong> <input type="text" name="password"required="required">*<br>
			<strong>Email:</strong> <input type="text" name="email"required="required">*<br>
			<strong>Bio:</strong><br>
			<textarea name="bio" rows="10" cols="40">
				</textarea><br>
				<button name="Signup">Signup</button>
         <!--			<input type="submit" value="Signup">-->
			
		</form>
</div>
</div>


		<div id="footer">
		<div>
		<h2>&copy;Prometheus</h2>
		</div>
		<div>
		<a href="https://www.facebook.com/">
		<img src="images/fb.jpg" STYLE="position:absolute; top:630px; right:25px; WIDTH:40px; HEIGHT:40px" />
		</a>
			<a href="https://twitter.com/">
		<img src="images/twit.jpg" STYLE="position:absolute; top:630px; right:75px; WIDTH:40px; HEIGHT:40px" />
		</a>
		</div>
</div>
		</html>
		
		<!--
<form action="ownersignup.php" method="post">
  		    First Name: <input type="text" name="fname" required="required">*<br>
			Last Name: <input type="text" name="lname"required="required">*<br>
			Password: <input type="text" name="password"required="required">*<br>
			Email: <input type="text" name="email"required="required">*<br>
			Bio:<br>
			<textarea name="bio" rows="10" cols="40">
				</textarea><br>
		    Website Link: <input type="text" name="website"><br>
		
			<input type="submit" value="Signup">
		</form>-->
		</html>