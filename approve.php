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
				
<!--<input type="submit" value="back" name="15">-->
</form> 

 <form action="home.php" method='post' id="form2" style="float:right">
 <button name="10" value="home" >Home</button>
<!--<input type="submit" value="home" name="10">-->
</form>
				<?php
include'signout_button.php'; ?>
				</div>
			</div>
		</div>
 
<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
//include 'signout_button.php';
mysql_connect('localhost','root','');
mysql_select_db("foodmaniac");
$zero="0";
$sql="Select requestkey from request where approve='".$zero."'";
$records=mysql_query("$sql");
$ID=array();
$count=0;
while ($row = mysql_fetch_array($records)) 
	{
		$count=$count+1;
		$ID[$count] .= $row['requestkey'] . "\n"; 
	}
	$approve = $_POST['Approve'];
	$deny= $_POST['Deny'];
	if(empty($approve) && empty($deny))
	{
		echo "You didn't select any option.";
	}
	else
	{
		$a = count($approve);
		$d=count($deny);
		for($i=0; $i < $a; $i++)
		{
		  $sql = "UPDATE request SET approve='1' WHERE requestkey='".$approve[$i]."'";
			$records=mysql_query("$sql");
		}
		for($i=0; $i < $d; $i++)
		{
		  $sql = "UPDATE request SET Approve='2' WHERE requestkey='".$deny[$i]."'";
			$records=mysql_query("$sql");
		}
  }
echo "restaurants are updated!!!"; 
include 'insert_approved_element.php';
?>
</html>
