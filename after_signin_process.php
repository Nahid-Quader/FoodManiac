
<html>
<head>
	   <title>Food Maniac</title>
	   <link rel="stylesheet" href="styles/style.css" type="text/css" media="screen ,projection" />
	
	</head>
	<body>
	
<div align="center">
		<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
session_start();
$ownerkey=$_SESSION["ownerkey"];
    if($_POST['5'] or $_POST['6'])
	{ ?>
		
		<div class ="container">
			<div id="head_wrap">
				<div id="header">
				<a href="index.php">
				<img src="images/logo.png" style="float:left; padding:5px;"/>
				</a>
				 <form id="form2" action="after_signin_process.php" method='post' style="float:right">
				 <button name="5" type="submit" value="home" >Home</button>
				<?php include 'signout_button.php';?>
				</form>
				</div>
			</div>
		</div>
	 <?php
	}
	 else
	{ ?>
			<div class ="container">
			<div id="head_wrap">
				<div id="header">
				<a href="index.php">
				<img src="images/logo.png" style="float:left; padding:5px;"/>
				</a>
				<div align="right">
				<?php include 'signout_button.php';?>
				</div>
				</div>
			</div>
		</div>
<?php	} 
	$sql1="SELECT image FROM
			ownerprofile WHERE ownerkey='".$ownerkey."'";
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
$Fname=$_SESSION["ownername"];
echo "Welcome,";
echo"$Fname";?>(Owner)<br>
	<?php include 'search_others.php'; ?>
	<form action="restaurantsOp.php "method="post" id="form2">
	<button value="Add Restaurant" name="2">Add Restaurant</button> 
	<button value="My restaurant" name="3" >My restaurant</button> 
	<br><br><br>
	</form>
	<form action="ownerprofile.php "method="post" id="form2" >
	<button name="<?php echo $ownerkey ; ?>" value="Profile">Profile</button>
	<br><br>
	</form>	<?php
	include 'searchform.php'; ?>
	
<div id="footer4">
		<h2>&copy;Prometheus</h2>
		<a href="https://www.facebook.com/">
		<img src="images/fb.jpg" STYLE="position:absolute; top:0px; right:0px; WIDTH:40px; HEIGHT:40px" />
		</a>
			<a href="https://twitter.com/">
		<img src="images/twit.jpg" STYLE="position:absolute; top:0px; right:35px; WIDTH:40px; HEIGHT:40px" />
		</a>
		</div>
</div>
	
	</body>
	</html>