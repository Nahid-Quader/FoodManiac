<html>
<form action="foodmaniac.php" method='post' style="float:right">
<input type="submit" value="back" name="5">
</form> 
<?php
include'signout_button.php'; ?>
  <form action="index.php" method='post' style="float:right">
<input type="submit" value="home" name="6">
</form>  
<?php
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
	mysql_connect('localhost','root','');
	mysql_select_db("foodmaniac");
$foodkey=$_GET["foodkey"];
$sql1="select name from food where foodkey='".$foodkey."'";
$records1=mysql_query("$sql1"); 
while($data=mysql_fetch_assoc($records1))
	{
		$foodname=$data['name'];
	}
$sql2="select name from fooddescription where foodkey='".$foodkey."'";
$records2=mysql_query("$sql2"); 
while($data=mysql_fetch_assoc($records2))
		{
			$name=$data['name'];
		}
if($name!=null)
{
	$sql="select name,price from fooddescription where foodkey='".$foodkey."'";
$records=mysql_query("$sql"); 
echo "Types of food for ".$foodname."";?>
<table width="600" border="2" cellspacing="1" >
	<tr>
   <th>Food Name</th>
   <th>Price</th>
	<?php
		while($data=mysql_fetch_assoc($records))
		{
			echo "<tr>";
			echo "<td>".$data['name']."</td>";
			echo "<td>".$data['price']."</td>";
			echo "</tr>";
		}
}
else
{
	echo "no food types available for ".$foodname."";
}
 ?>
				 
</table><br>
<?php  include 'searchform.php'; ?>
</html>