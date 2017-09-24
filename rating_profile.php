<html>
<?php
session_start();	
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
if($_SESSION['include']==2)
{ ?>
<form action="foodmaniac.php" method='post' style="float:right">
<input type="submit" value="back" name="15">
</form> 
<form action="usersignin.php" method='post' style="float:right">
<input type="submit" value="home" name="10">
</form> 
<?php
include 'signout_button.php';
}
mysql_connect('localhost','root','');
mysql_select_db("foodmaniac");
 $res=$_GET["res"];
$_SESSION["res"]=$res;
//echo  "<center><h1>".$res."</h1></center>"; 
//echo "your rating for ".$res;
//rating();
$reskey=$_GET["reskey"]; 
if($reskey==null)
{
	$reskey=$_SESSION['updatedreskey'];
}
else
{
	?>
<form action="foodmaniac.php" method='post' style="float:right">
<input type="submit" value="back" name="15">
</form> 
<form action="usersignin.php" method='post' style="float:right">
<input type="submit" value="home" name="10">
</form> 
<?php
include 'signout_button.php';
}
$_SESSION["reskey"]=$reskey;
 $sql1="SELECT resname,branch,location,owneremail,rating,website,image FROM
			restaurant WHERE reskey='".$reskey."'";
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
			echo  "<h1>".$resname."</h1>";?><br><br> <?php
			//rating($resname);
			echo "your rating for ".$resname;?>
			<form action="rating.php" method="post" >
			  <input type="radio" name="rating" value="1" checked>one
			  <br>
			  <input type="radio" name="rating" value="2">two<br>
			  <input type="radio" name="rating" value="3">three<br>
			  <input type="radio" name="rating" value="4">four<br>
			  <input type="radio" name="rating" value="5">five<br>
			  <input type="submit" name="1" value="rate">
			</form> <?php
			echo "Branch :".$branch;?><br><br> <?php
			echo "Location :".$location;?><br><br> <?php
			echo "Your email address :".$owneremail;?><br><br> <?php
			echo "rating :".$rating;?><br><br> <?php
			if($website!=null)
			{
			echo "website :".$website;?><br><br> <?php
			}
		}
		/* public function rating($resname)
		{
			echo "your rating for ".$resname;?>
			<form action="rating.php" method="post" >
			  <input type="radio" name="rating" value="1" checked>one
			  <br>
			  <input type="radio" name="rating" value="2">two<br>
			  <input type="radio" name="rating" value="3">three<br>
			  <input type="radio" name="rating" value="4">four<br>
			  <input type="radio" name="rating" value="5">five<br>
			  <input type="submit" name="1" value="rate">
			</form>
			<br> */
		 //} ?>
<center>Food list of <?php echo $resname; ?></center><?php
mysql_connect('localhost','root','');
mysql_select_db("foodmaniac");
$sql="SELECT name, type,price FROM food  WHERE reskey='".$reskey."'";
			$records=mysql_query("$sql");
	?>
<center><table border=1 style="float:center"></center>
			<tr>
			<th>Food Name</th>
			<th>Food Type</th>
			<th>Price</th>
			</tr> <?php
			while ($row = mysql_fetch_array($records)) 
				{
					echo "<tr>";
					echo "<td>".$row['name']."</td>";
					echo "<td>".$row['type']."</td>";
					echo "<td>".$row['price']."</td>";
					echo "</tr>";
				} ?>
				</table>
	</html>

