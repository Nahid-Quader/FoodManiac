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
	            <form action="after_signin_process.php" method='post' id="form2" style="float:right">
              <button value="Back" name="5" >Back</button>
 </form>  
 <?php
include'signout_button.php'; ?>
<form action="after_signin_process.php" method='post' id="form2" style="float:right">
<button name="6" value="home">Home</button> 
</form>

<br><br><br><br><br><br>
 <?php
mysql_connect('localhost','root','');
mysql_select_db("foodmaniac");
//starting session to recieve
error_reporting(~E_ALL ^ ~E_NOTICE);
		session_start();
		$email = $_SESSION["email"];
		$ownerkey=$_SESSION["ownerkey"];
		foreach ($_POST as $key => $value)
		if($value=="Update Profile"){
		$_SESSION["reskey"]=$key;
		}
		$Reskey=$_SESSION["reskey"];
		//echo $Reskey;
		if($value=="Edit")
		{
			$resname=$_POST["resname"];
			$branch=$_POST["branch"];
			$location=$_POST["location"];
			$website=$_POST["website"];
			if($resname!=null)
			{
				$sql="UPDATE restaurant SET resname ='".$resname."' WHERE reskey = '".$Reskey."'";
				$records=mysql_query("$sql");
			}
			if($branch!=null)
			{
				$sql="UPDATE restaurant SET branch ='".$branch."' WHERE reskey = '".$Reskey."'";
				$records=mysql_query("$sql");
			}
			if($location!=null)
			{
				$sql="UPDATE restaurant SET location ='".$location."' WHERE reskey = '".$Reskey."'";
				$records=mysql_query("$sql");
			}
			if($website!=null)
			{
				$sql="UPDATE restaurant SET website ='".$website."' WHERE reskey = '".$Reskey."'";
				$records=mysql_query("$sql");
			}
		} 
		$sql2="select image from restaurant where reskey = '".$Reskey."'";
		$records2=mysql_query("$sql2");
		while ($row = mysql_fetch_array($records2)) 
				{
					$image=$row['image'];
				}
				if($image!=null)
				{
					echo '<img height="100" width="100" src="data:image;base64,'.$image.'">';
				}
		?><br><br>
		Upload a logo for your restaurant.
		<form method="post" id="form2" enctype="multipart/form-data" >
		<br/>
		<input type="file" name="image">
		<br/><br/>
		<button name="sumit" value="Upload">Upload</button>
		</form>
		<?php
		if (isset($_POST['sumit']))
	{
		if(getimagesize($_FILES['image']['tmp_name'])==FALSE)
		{
			echo "Please select an image";
		}
		else
		{
			$image=addslashes($_FILES['image']['tmp_name']);
			$name=addslashes($_FILES['image']['name']);
			$image= file_get_contents($image);
			$image=base64_encode($image);
			$sql="UPDATE restaurant SET image = '".$image."'WHERE reskey='".$Reskey."'";
			$records=mysql_query("$sql");
			if($records!=null)
			{
				echo "<br/>Image Uploaded.";
			}
			else
			{
				echo "<br/>Image Not Uploaded.";
			}
		}
	}
		$sql1="SELECT resname,branch,location,website,image FROM
			restaurant WHERE reskey='".$Reskey."'";
		$records1=mysql_query("$sql1");
		while ($row = mysql_fetch_array($records1)) 
				{

					echo "<form action=update_restaurant_profile.php method=post>";
					//echo "<tr>";
?>Restaurant Name: <?php	echo  "<input type=text name=resname value='".$row['resname']."' >"; ?><br><br><?php
?>Branch Name: <?php	echo  "<input type=text name=branch value='".$row['branch']."' >";?><br><br><?php
?>Location Name: <?php	echo  "<input type=text name=location value='".$row['location']."' >";?><br><br><?php
?>Website: <?php	echo  "<input type=text name=website value='".$row['website']."' >";?><br><br><?php
					echo  "<input type=submit name=Edit value=Edit" . ">";
					echo "</form>";
				}
				?>
				<form action="restaurant_profile.php" method='post' id="form2">
				<button value="view profile" name="15">View Profile</button>
				</form> 
<div id="footer2">
		<div>
		<h2>&copy;Prometheus</h2>
		</div>
		<div>
		<a href="https://www.facebook.com/">
		<img src="images/fb.jpg" STYLE="position:absolute; top:0px; right:25px; WIDTH:40px; HEIGHT:40px" />
		</a>
			<a href="https://twitter.com/">
		<img src="images/twit.jpg" STYLE="position:absolute; top:0px; right:75px; WIDTH:40px; HEIGHT:40px" />
		</a>
		</div>
</div>
</html>
