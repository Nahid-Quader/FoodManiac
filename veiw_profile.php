<html>  
<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
mysql_connect('localhost','root','');
mysql_select_db("foodmaniac");
$table=$_GET["table"];
$type=$_GET["type"];
$tablekey=$_GET["tablekey"];
$key=$_GET["key"];
	if($type=="owner")
	{ 
		/* echo "<form action=after_signin_process.php method=post>";
		echo "<tr>";
		echo "<td>" . "<input type=submit name=GoBack value=GoBack" . ">";
		echo "</tr>";
		echo "</form>"; */ ?>
		<form action="after_signin_process.php" method='post' style="float:right">
		<input type="submit" value="back" name="5">
		</form> 
		<?php
		include'signout_button.php'; ?>
		  <form action="after_signin_process.php" method='post' style="float:right">
		<input type="submit" value="home" name="6">
		</form> <?php
		
	}
	else if($type=="user")
	{
		/* echo "<form action=usersignin.php method=post>";
		echo "<tr>";
		echo "<td>" . "<input type=submit name=GoBack value=GoBack" . ">";
		echo "</tr>";
		echo "</form>"; */?>
		<form action="usersignin.php" method='post' style="float:right">
		<input type="submit" value="back" name="5">
		</form> 
		<?php
		include'signout_button.php'; ?>
		  <form action="usersignin.php" method='post' style="float:right">
		<input type="submit" value="home" name="6">
		</form> <?php
	} 

$sql1="SELECT fname, lname, email, bio FROM ".$type."  WHERE ".$tablekey."=('$key')";
$records1=mysql_query("$sql1");
while ($row = mysql_fetch_array($records1)) 
{
		$fname= $row['fname'];
		$lname= $row['lname'];
		$email= $row['email'];
		$bio= $row['bio'];
}

$sql2="SELECT image, sex, religion, profession, birthday, phone, presentlocation, hometown, school, college, university
 FROM ".$table."  WHERE ".$tablekey."=('$key')";
 $records2=mysql_query("$sql2");

 while ($row = mysql_fetch_array($records2)) 
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
 }
 
	if($image!=null)
	{
		echo '<img height="200" width="200" src="data:image;base64,'.$image.'">';
	?><html><br></html><?php
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
	?><html><br></html><?php
	echo "Email: ".$email;
	?><html><br></html><?php
	if($sex!=null)
	{
		echo "Sex: ".$sex;
		?><html><br></html><?php
	}
	
	if($religion!=null)
	{
		echo "Religion: ".$religion;
		?><html><br></html><?php
		}
	
	if($profession!=null)
	{
		echo "Profession: ".$profession;
		?><html><br></html><?php
	}
	else
	{
		echo "Profession: Update Your Profile.";
		?><html><br></html><?php
	}
	if($birthday!=0000-00-00)
	{
		echo "Birthday: ".$birthday;
		?><html><br></html><?php
	}
	
	if($phone!=0)
	{
		echo "Phone: ".$phone;
		?><html><br></html><?php
	}
	
	if($presentlocation!=null)
	{
		echo "Present Location: ".$presentlocation;
		?><html><br></html><?php
	}

	if($hometown!=null)
	{
		echo "Home Town: ".$hometown;
		?><html><br></html><?php
	}

	if($school!=null)
	{
		echo "School: ".$school;
		?><html><br></html><?php
	}

	if($college!= null)
	{
		echo "College: ".$college;
		?><html><br></html><?php
	}

	if($university!=null)
	{
		echo "University: ".$university;
		?><html><br></html><?php
	}
	echo "Bio: ".$bio;
	?>
 
</html>

