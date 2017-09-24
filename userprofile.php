<html>
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
				<form action="usersignin.php" method='post' id="form2" style="float:right">
				<button name="15" value="back" >Back</button>

<!--<input type="submit" value="back" name="15">-->
</form> 

 <form action="usersignin.php" method='post' id="form2" style="float:right">
 <button name="10" value="home" >Home</button>
<!--<input type="submit" value="home" name="10">-->
</form>
<h2>
				<?php
include'signout_button.php'; ?>
				</div>
			</div>
		</div><?php 
mysql_connect('localhost','root','');
mysql_select_db("foodmaniac");
error_reporting(~E_ALL ^ ~E_NOTICE);
session_start();
$userkey=$_SESSION['userkey'];

$sql="SELECT fname, lname, email, bio FROM user  WHERE user.userkey=('$userkey')";
$records=mysql_query("$sql");
while ($row = mysql_fetch_array($records)) 
{
		$fname= $row['fname'];
		$lname= $row['lname'];
		$email= $row['email'];
		$bio= $row['bio'];
}
$sql="SELECT image, sex, religion, profession, birthday, phone, presentlocation, hometown, school, college, university
 FROM userprofile  WHERE userprofile.userkey=('$userkey')";
 $records=mysql_query("$sql");

 while ($row = mysql_fetch_array($records)) 
 {
	 $image=$row['image'];
	 $sex=$row['sex'];
	 $religion=$row['religion'];
	 $profession=$row['profession'];
	 $birthday=$row['birthday'];
	 $phone=$row['phone'];
	 $presentlocation=$row['presentlocation'];
	 $hometown=$row['hometown'];
	 $school=$row['school'];
	 $college=$row['college'];
	 $university=$row['university'];
	if($image!=null)
	{
		echo '<img height="200" width="200" src="data:image;base64,'.$image.'">';
	?><html><br><br></html><?php
	}
	else
	{
		?><html><br></html><?php
		?><html><br></html><?php
		?><html><br></html><?php
		?><html><br></html><?php
		?><html><br></html><?php
		?><html><br></html><?php
		echo "Update Your Profile Picture";
		?><html><br></html><?php
	}
	echo "Name: ".$fname." ".$lname;
	?><html><br><br></html><?php
	echo "Email: ".$email;
	?><html><br><br></html><?php
	if($sex!=null)
	{
		echo "Sex: ".$sex;
		?><html><br><br></html><?php
	}
	else
	{
		echo "Sex: Update Your Profile.";
		?><html><br><br></html><?php
	}
	if($religion!=null)
	{
		echo "Religion: ".$religion;
		?><html><br><br></html><?php
		}
	else
	{
		echo "Religion: Update Your Profile.";
		?><html><br><br></html><?php
	}
	if($profession!=null)
	{
		echo "Profession: ".$profession;
		?><html><br><br></html><?php
	}
	else
	{
		echo "Profession: Update Your Profile.";
		?><html><br><br></html><?php
	}
	if($birthday!=0000-00-00)
	{
		echo "Birthday: ".$birthday;
		?><html><br><br></html><?php
	}
	else
	{
		echo "Birthday: Update Your Profile.";
		?><html><br><br></html><?php
	}
	if($phone!=0)
	{
		echo "Phone: ".$phone;
		?><html><br><br></html><?php
	}
	else
	{
		echo "Phone: Update Your Profile.";
		?><html><br><br></html><?php
	}
	if($presentlocation!=null)
	{
		echo "Present Location: ".$presentlocation;
		?><html><br><br></html><?php
	}
	else
	{
		echo "Present Location: Update Your Profile.";
		?><html><br><br></html><?php
	}
	if($hometown!=null)
	{
		echo "Home Town: ".$hometown;
		?><html><br><br></html><?php
	}
	else
	{
		echo "Home Town: Update Your Profile.";
		?><html><br><br></html><?php
	}
	if($school!=null)
	{
		echo "School: ".$school;
		?><html><br><br></html><?php
	}
	else
	{
		echo "School: Update Your Profile.";
		?><html><br><br></html><?php
	}
	if($college!= null)
	{
		echo "College: ".$college;
		?><html><br><br></html><?php
	}
	else
	{
		echo "College: Update Your Profile.";
		?><html><br><br></html><?php
	}
	if($university!=null)
	{
		echo "University: ".$university;
		?><html><br><br></html><?php
	}
	else
	{
		echo "University: Update Your Profile.";
		?><html><br><br></html><?php
	}
	echo "Bio: ".$bio;
	?><html><br><br></html><?php
	?><html><br>
					
		<form action="update_user_profile.php "method="post" id="form2">
		<button value="Update" name="Update">Update</button>
		<br><br>
		</form>
		</html>
		<?php
 }
?>
<div id="footer">
		<h2>&copy;Prometheus</h2>
		<a href="https://www.facebook.com/">
		<img src="images/fb.jpg" STYLE="position:absolute; top:730px; right:25px; WIDTH:40px; HEIGHT:40px" />
		</a>
			<a href="https://twitter.com/">
		<img src="images/twit.jpg" STYLE="position:absolute; top:730px; right:75px; WIDTH:40px; HEIGHT:40px" />
		</a>
		</div>
</h2>
</html>