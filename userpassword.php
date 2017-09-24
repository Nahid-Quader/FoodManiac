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

$preValue=$_POST["prepass"];
$newValue1=$_POST["newpass1"];
$newValue2=$_POST["newpass2"];

$sql="SELECT password FROM user  WHERE user.userkey=('$userkey')";
$records=mysql_query("$sql");
while ($row = mysql_fetch_array($records))
{
	if($preValue==$row['password'] )
{
	if($newValue1==$newValue2)
	{
		$sqlpass="UPDATE `foodmaniac`.`user` SET `password` = '".$newValue2."'
		WHERE `user`.`userkey` = '".$userkey."' AND `user`.`password` ='".$row['password']."'";
		$pass=mysql_query("$sqlpass");
		echo "Password updated successfully.";
	}
	else
	{
		echo "New Password do not match. Try Again...";
	}
}
else
{
	echo "Password does not match. Try Again...";
}
}
	?><html><br></html>
	<form action="update_user_profile.php" method="post" id="form2">
 <button name="GoBack" value="GoBack">GoBack</button>

</form>
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
</html>