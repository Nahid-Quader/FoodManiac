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
				<form action="ownerprofile.php" method='post' id="form2" style="float:right">
				<button name="5" value="back" >Back</button>

<!--<input type="submit" value="back" name="15">-->
</form> 

 <form action="after_signin_process.php" method='post' id="form2" style="float:right">
 <button name="6" value="home" >Home</button>
<!--<input type="submit" value="home" name="10">-->
</form>
				<?php
include'signout_button.php'; ?>
				</div>
			</div>
		</div>
		<h2>
 <?php
mysql_connect('localhost','root','');
mysql_select_db("foodmaniac");
error_reporting(~E_ALL ^ ~E_NOTICE);
session_start();
$ownerkey=$_SESSION['ownerkey'];
foreach ($_POST as $key => $value)

?><html><br></html><?php
echo "Please Select an Image-"
?>
<html>
	<body>
		<form method="post" enctype="multipart/form-data" id="form2" >
		<br/>
		<input type="file" name="image">
		<br/><br/>
		<button name="sumit" type="submit" value="Upload">Upload</button>

		</form>
	</body>
</html>

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
		saveimage($image, $ownerkey);
	}
}
function saveimage($image, $ownerkey)
{
	$sql="UPDATE ownerprofile SET image	= ('$image') WHERE ownerkey=('$ownerkey')";
	$result=mysql_query($sql);
	if($result)
	{
		echo "<br/>Image Uploaded.";
	}
	else
	{
		echo "<br/>Image Not Uploaded.";
	}
}

$sql="SELECT fname, lname, email, bio, website FROM owner WHERE owner.ownerkey=('$ownerkey')";
$records=mysql_query("$sql");
while ($row = mysql_fetch_array($records)) 
{
		echo "Primary Informations- ";?>
		<form action="ownerprofileop.php" method="post" id="form2">
		<?php
		echo "<tr>";
		echo "First Name: "."<td>" . "<input type=text name=fname value=" . $row['fname'] . ">";
		echo "Last Name: "."<td>" . "<input type=text name=lname value=" . $row['lname'] . ">";
		?><html><br></html><?php
		echo "Bio: "."<td>" . "<input type=text name=bio value=" . $row['bio'] . ">";
		?><html><br></html><?php
		echo "Website: "."<td>" . "<input type=text name=website value=" . $row['website'] . ">";
		?><html><br></html><?php
		echo "<td>" . "<input type=hidden name=hidden value=" . $row['fname'] . ">";?>
		<button  name="Edit" type="submit" value="Edit">Edit</button>
		<?php
		echo "</tr>";
		echo "</form>"
		?><html><br></html><?php
}
?><html><br></html><?php


		echo "Security Informations- ";?>
		<html>
		<form action="ownerpassword.php" method="post" id="form2">
		Existing Password: <input type="password" name="prepass"><br>
		New Password: <input type="password" name="newpass1" ><br>
		Retype Password: <input type="password" name="newpass2" ><br>
		<button type="submit" value="Change">Change</button>
		</form>
		<br>
		<br>
		</html><?php


$sql="SELECT image, sex, religion, profession, birthday, phone, presentlocation, hometown, school, college, university
 FROM ownerprofile  WHERE ownerprofile.ownerkey=('$ownerkey')";
 $records=mysql_query("$sql");

 while ($row = mysql_fetch_array($records)) 
 {
		echo "Basic Informations- ";
		?><html><br></html>
		<form action="owner_profile_op_extend.php" id="form2" method="post"><?php
		echo "<tr>";
		echo "Sex: ". $row['sex']." ";
		?>
		<select name="sex">
		<option value=""></option>
		<option value="Male">Male</option>
		<option value="Female">Female</option>
		</select>
		<br><?php
		echo "Religion: "."<td>" . "<input type=text name=religion value=" . $row['religion'] . ">";
		?><html><br></html><?php
		echo "Profession: "."<td>" . "<input type=text name=profession value=" . $row['profession'] . ">";
		?><html><br></html><?php
		echo "Birthday: "."<td>" . "<input type=date name=birthday value=" . $row['birthday'] . ">";
		?><html><br></html><?php
		echo "Phone: "."<td>" . "<input type=text name=phone value=" . $row['phone'] . ">";
		?><html><br></html><?php
		echo "Present location: "."<td>" . "<input type=text name=presentlocation value=" . $row['presentlocation'] . ">";
		?><html><br></html><?php
		echo "Home Town: "."<td>" . "<input type=text name=hometown value=" . $row['hometown'] . ">";
		?><html><br></html><?php
		echo "School: "."<td>" . "<input type=text name=school value=" . $row['school'] . ">";
		?><html><br></html><?php
		echo "College: "."<td>" . "<input type=text name=college value=" . $row['college'] . ">";
		?><html><br></html><?php		
		echo "University: "."<td>" . "<input type=text name=university value=" . $row['university'] . ">";
		?><html><br></html><?php
		echo "<td>" . "<input type=hidden name=hidden value=" . $row['phone'] . ">";?>
		<button name="Update" value="Update" >Update</button>
		<?php
		echo "</tr>";
		echo "</form>"
		?><html><br></html><?php
 }
?>

<div id="footer">
		<h2>&copy;Prometheus</h2>
		<a href="https://www.facebook.com/">
		<img src="images/fb.jpg" STYLE="position:absolute; top:1030px; right:25px; WIDTH:40px; HEIGHT:40px" />
		</a>
			<a href="https://twitter.com/">
		<img src="images/twit.jpg" STYLE="position:absolute; top:1030px; right:75px; WIDTH:40px; HEIGHT:40px" />
		</a>
		</div>
</h2>
</html>
