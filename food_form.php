<html>
<form action="after_signin_process.php" method='post' style="float:right">
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
	$ownerkey=$_SESSION["ownerkey"];
	$reskey=$_SESSION["restaurantkey"];
    $sql="select name, price,type,foodkey from food where ownerkey='".$ownerkey."' AND reskey='".$reskey."'";
	$records=mysql_query("$sql"); 
	 if($records!=null)
	 {
		 echo "Your Foodlist:";?><br>
		<table width="600" border="2" cellspacing="1" >
		<tr>
		   <th>Food Name</th>
		   <th>Price</th>
		   <th>Type</th> <?php
		while($data=mysql_fetch_assoc($records))
		{
			echo "<tr>";
			echo "<td><a href=\"food_description.php?key=".$data['foodkey']."&name=".$data['name']."\">".$data['name']."</a></td>";
			//echo "<td>".$data['name']."</td>";
			echo "<td>".$data['price']."</td>";
			echo "<td>".$data['type']."</td>";
			echo "</tr>";
		} 
	 }
	 else
	 {
		 echo "you have no food to enter its description. Sorry";
	 }?>
	</table><br>
		<form action="food_description.php" method="post">
			Add new food type for:  <select name="add">
			<option value=""></option>
			 <?php 
			$sql = mysql_query("select name,foodkey from food where ownerkey='".$ownerkey."' AND reskey='".$reskey."'");
			while ($row = mysql_fetch_array($sql))
			{
			echo "<option value='".$row['foodkey']."'>" . $row['name'] . "</option>";
			} ?>
			</select><br>
			<input type="submit" value="Add">	
		</form>		
</html>		















