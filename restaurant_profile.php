<head>
<title>  Restaurants  </title>
				<link rel="stylesheet" href="styles/style.css" media="all"/>
</head>
	<body>
			<div class ="container">
			<div id="head_wrap">
				<div id="header">
				<a href="index.php">
				<img src="images/logo.png" style="float:left; padding:5px;"/>
				</a>
	            <form action="restaurantsOp.php" method='post' id="form2" style="float:right">
              <button value="Back" name="105" >Back</button>
 </form>  
 <?php
include'signout_button.php'; ?>
<form action="after_signin_process.php" method='post' id="form2" style="float:right">
<button name="6" value="home">Home</button> 
</form>
<br><br><br><br><br><br><br>
<?php
//include 'signout_button.php';
mysql_connect('localhost','root','');
mysql_select_db("foodmaniac");
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
	session_start();
	//$_POST["rating"]=100;
	foreach ($_POST as $key => $value)
	if($value=="View Profile"){
		$_SESSION["reskey"]=$key;
		}
		$Reskey=$_SESSION["reskey"];
	$sql1="SELECT resname,branch,location,owneremail,rating,website,image FROM
			restaurant WHERE reskey='".$Reskey."'";
		$records1=mysql_query("$sql1");
		while ($row = mysql_fetch_assoc($records1)) 
		{
			$resname=$row['resname'];
			$branch=$row['branch'];
			$location=$row['location'];
			$owneremail=$row['owneremail'];
			$rating=$row['rating'];
			$website=$row['website'];
			$image=$row['image'];
			if($image!=null)
			{
				//echo "hi";
				// str_repeat('&nbsp;', 5);
				 echo "&nbsp &nbsp &nbsp &nbsp &nbsp";
				echo '<img height="100" width="100" src="data:image;base64,'.$image.'">';
				//echo '<img height="200" width="200" src="data:image;base64,'.$image.'">';
				
			}
			 echo "&nbsp &nbsp &nbsp &nbsp &nbsp";
			echo  "<h1>".$resname."</h1>"; ?><br><br> <?php
			echo "Branch :".$branch;?><br><br> <?php
			echo "Location :".$location;?><br><br> <?php
			echo "Your email address :".$owneremail;?><br><br> <?php
			echo "rating :".$rating;?><br><br> <?php
			if($website!=null)
			{
			echo "website :".$website;?><br><br> <?php
			}
			else
			{
				echo "website : no website";?><br><br> <?php
			}
		}

		?>
			<form action="update_restaurant_profile.php" method='post'>
				<input type="submit" value="update profile" name="15">
				</form> 
</html>