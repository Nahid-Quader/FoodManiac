<html>
<html>
		<head>
			<title>FoodManiac</title>
				<link rel="stylesheet" href="styles/style.css" media="all"/>
		</head>
	<body>
		<div class ="container">
			<div id="head_wrap">
				<div id="header">
				<a href="index.php">
				<img src="images/logo.png" style="float:left; padding:5px;"/>
				</a>
		<?php include 'signout_button.php'; ?>


				</div>
				
				</div>
				</div>
</html>
<br><br><br><br><br><br><br>
<br>
<h2 align="center">Welcome</h2>

<br><br>
<br>

<div align="center">
<?php
//include 'signout_button.php';
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
session_start();
$userkey=$_SESSION['userkey'];
//include 'signout_button.php';
$sql1="SELECT image FROM
			userprofile WHERE userkey='".$userkey."'";
		$records1=mysql_query("$sql1");
		while ($row = mysql_fetch_assoc($records1)) 
		{
			
			$image=$row['image'];
			
		}
		if($image!=null)
		{
			echo '<img height="100" width="100" src="data:image;base64,'.$image.'">';
		}
		?><br><?php
	echo "welcome, ";
	echo $_SESSION['name']; ?> (user)<br> <?php
include 'search_others.php';
?><br><?php
?>
<form action="userprofile.php "method="post" id="form2">
<button name="<?php echo $userkey ; ?>" value="Profile" >Profile</button>
<br>
</form>
<?php
include 'searchform.php';
?>
<div id="footer">
		<h2>&copy;Prometheus</h2>
		<a href="https://www.facebook.com/">
		<img src="images/fb.jpg" STYLE="position:absolute; top:750px; right:0px; WIDTH:40px; HEIGHT:40px" />
		</a>
			<a href="https://twitter.com/">
		<img src="images/twit.jpg" STYLE="position:absolute; top:750px; right:35px; WIDTH:40px; HEIGHT:40px" />
		</a>
		</div>
</div>
		<html>
