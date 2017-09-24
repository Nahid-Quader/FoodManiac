<html>

<?php
	$typename=$_POST["typename"];
	$price=$_POST["price"];
	session_start();
	$foodkey=$_SESSION["foodkey"];
	$_SESSION["updatedfoodkey"]=$foodkey;
	$ownerkey=$_SESSION["ownerkey"];
	$reskey=$_SESSION["restaurantkey"];	
	mysql_connect('localhost','root','');
	mysql_select_db("foodmaniac");
	$sql="select name from food where foodkey='".$foodkey."'";
	$records=mysql_query("$sql");
	while($data=mysql_fetch_assoc($records))
	{
		$foodname=$data['name'];
	} 
	$typename=$_POST["typename"];
	$price=$_POST["price"];
	if($typename!=null && $price!=null)
	{
		$sql1= "INSERT INTO fooddescription (foodkey,name,price)
				VALUES ('$foodkey','$typename','$price')";
				$records1=mysql_query("$sql1");
		echo "new food types are added";?><br><?php
	}
	include 'food_form.php';
	?>
	</html>