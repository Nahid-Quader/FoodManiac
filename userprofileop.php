<html>
<head>
	   <title>Food Maniac</title>
	   <link rel="stylesheet" href="styles/style.css" type="text/css" media="screen ,projection" />

	</head>
	<body>
	<div class ="container">
			<div id="head_wrap">
				<div id="header">
				<a href="index.php">
				<img src="images/logo.png" style="float:left; padding:5px;"/>
				</a>
				
				</div>
			</div>
		</div>


<?php
mysql_connect('localhost','root','');
mysql_select_db("foodmaniac");
error_reporting(~E_ALL ^ ~E_NOTICE);
session_start();
$userkey=$_SESSION['userkey'];
foreach ($_POST as $key => $value)

if($value=="Edit" && $key=="Edit")
{
	$preValue=$_POST["hidden"];
	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	$bio=$_POST["bio"];

	$sql="UPDATE `foodmaniac`.`user` SET `fname` = '".$fname."', `lname` = '".$lname."', `bio` = '".$bio."'
	WHERE `user`.`userkey` = '".$userkey."';";
	$records=mysql_query("$sql");
	echo "<br/>Profile Updated."; 
	?><html><br></html>
	<html><br></html>
	<form action="update_user_profile.php" method="post" id="form2">
 <button name="GoBack" value="GoBack">GoBack</button>

</form>
	<?php
}
?>
<div id="footer3">
		<h2>&copy;Prometheus</h2>
		<a href="https://www.facebook.com/">
		<img src="images/fb.jpg" STYLE="position:absolute; top:0px; right:0px; WIDTH:40px; HEIGHT:40px" />
		</a>
			<a href="https://twitter.com/">
		<img src="images/twit.jpg" STYLE="position:absolute; top:0px; right:35px; WIDTH:40px; HEIGHT:40px" />
		</a>
		</div>

	
	</body>
	</html>
</html