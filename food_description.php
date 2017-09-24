<html>
<form action="food_form.php" method='post' style="float:right">
<input type="submit" value="back" name="5">
</form> 
<?php
include'signout_button.php'; ?>
  <form action="after_signin_process.php" method='post' style="float:right">
<input type="submit" value="home" name="6">
</form>  <?php
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
	mysql_connect('localhost','root','');
	mysql_select_db("foodmaniac");
	session_start();	
	$fkey=$_POST["add"];
	$_SESSION["foodkey"]=$fkey;
	if($fkey)
	{
		$fkey=$_SESSION["updatedfoodkey"];
	}
	 $foodkey=$_GET["key"];
	// echo $foodkey;
	$sql1="select name from food where foodkey='".$fkey."'";
	$records1=mysql_query("$sql1");
	while($data=mysql_fetch_assoc($records1))
		{
			$foodname=$data['name'];
		} 
	if( $foodkey!=null)
	{		
		$sql="select name,price from fooddescription where foodkey='".$foodkey."'";
		$records=mysql_query("$sql");
		if (mysql_num_rows($records) === 0)  
		{ 
			echo "no foods has been added";?><br><br><?php
			//include 'food_form.php';
		}
		else
		{?>
			<table width="600" border="2" cellspacing="1" >
					<tr>
					   <th>Food Name</th>
					   <th>Price</th>
	<?php	}
		while($data=mysql_fetch_assoc($records))
		{
				$name=$data['name'];
				$price=$data['price']; 
			   if($name!=null or $price!=null)
			   {
			  
					echo "<tr>";
					echo "<td>".$data['name']."</td>";
					echo "<td>".$data['price']."</td>";
					echo "</tr>";
				}
				 ?>
				
	<?php }
	} ?>
</table><br>
<?php
		
		if( $foodkey==null)
		{?>
		Add new food type for <?php echo $foodname; ?>:
		<form action="add_description.php" method="post">
  		    Food Name: <input type="text" name="typename"required="required"><br>
			Price: <input type="text" name="price"required="required"><br>
			<input type="submit" value="Add">	
		</form>
		<?php } ?>
</html>
   