<html>
<head>
		<title>  foodmaniac  </title>
		<link rel="stylesheet" href="styles/style.css" media="all"/>
</head>
	
<?php
//error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
//include'signout_button.php';
	mysql_connect('localhost','root','');
	mysql_select_db("foodmaniac");
	
		$fname= $_POST["fname"];
		$lname= $_POST["lname"];
		$pass= $_POST["password"];
		$email= $_POST["email"];
		$bio=$_POST["bio"];
		$error=0;
		if($email==null or $pass==null or $fname==null or $lname==null)
		{
			echo "You might not fulfil all the fields.please try again to sign up ";
			include 'u_form.php';
            		
		}
		else
		{
			$sql2="select email from user" ;
			$record1=mysql_query("$sql2");
			while($row = mysql_fetch_array($record1, MYSQL_ASSOC)){
				$a=$row['email'];
				if($email==$a){
					$error++;
				}
			}
			if($error==0){
			$sql1 = "INSERT INTO user(userkey,fname,lname,email,password,bio)
			VALUES ('', '$fname', '$lname','$email','$pass','$bio')";
			$records=mysql_query("$sql1");
			//echo" you have signed up successfully"; 
		
			?>
			 <div class ="container">
			<div id="head_wrap">
				<div id="header">
				<a href="index.php">
				<img src="images/logo.png" style="float:left; padding:5px;"/>
				</a>
	           <?php include'home_button.php'; ?>
			   <form action="signin_form.php" id="form2" method='post' style="float:right">
			 <button name="1" value="signin">Signin</button>
			  </form>
				</div>
			</div>
		</div> 
			

			<?php 
			   echo" you have signed up successfully";
			//<input type="submit" value="signin" name="1"><br><br>		
			} 
		else
		{ ?>
				<div class ="container">
			<div id="head_wrap">
				<div id="header">
				<a href="index.php">
				<img src="images/logo.png" style="float:left; padding:5px;"/>
				</a>
	           <?php include'home_button.php'; 
			   //include'signout_button.php'; 
			   ?>
				</div>
			</div>
		</div>
			
			
	<?php echo "Email already exists. Try with new one!" ; ?><br> <?php
			include 'u_form.php';} ?>
		    <br>
<?php	}
		include 'searchform.php';		
			
	?>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	</div>
		<div id="footer">
		<h2>&copy;Prometheus</h2>
		<a href="https://www.facebook.com/">
		<img src="images/fb.jpg" STYLE="position:absolute; top:730px; right:25px; WIDTH:40px; HEIGHT:40px" />
		</a>
			<a href="https://twitter.com/">
		<img src="images/twit.jpg" STYLE="position:absolute; top:730px; right:75px; WIDTH:40px; HEIGHT:40px" />
		</a>
		</div>
		</body>
</html>