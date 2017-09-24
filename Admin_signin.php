<html>
<?php 

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
mysql_connect('localhost','root','');
mysql_select_db("foodmaniac");
session_start();
echo "Welcome,";
				echo$_SESSION['name'];?>(admin)<br>
				<?php
$OwnerKey=0;
$keyarray=array();
$sql="SELECT requestkey,resname,branch,location,ownerkey,owneremail from request where approve='0'";
$records=mysql_query("$sql");
$sql2="SELECT ownerkey from request where approve='0'";
$records=mysql_query("$sql");
$records2=mysql_query("$sql2");
while ($row = mysql_fetch_array($records2)) 
	{
	  $OwnerKey .= $row['ownerkey'] . "\n"; 
	}
	if($OwnerKey!=NULL)
	{	?>
<table width="600" border="2" cellspacing="1">
<tr>
<th>id</th>
<th>ResTaurant</th>
<th>Branch</th>
<th>Location</th>
<th>OwnerKey</th>
<th>OwnerEmail</th> 
<th>Approval</th>
<th>Ignore</th>
<th></th>
<tr>
<h4>You have some request to approve</h4>
<?php }
	else
	{
		echo "No request"; ?><br><br> <?php
	}
 
 echo '<form action="approve.php" method="post">';
/*  if($OwnerKey!=NULL)
	 { ?>	 
			<input type="submit" name="submit" value="Submit" /> 
			<br>
	 <?php }  */
$i=0; 
$a="approved";
	while($row=mysql_fetch_assoc($records))
	{

		echo "<tr>";
		echo "<td>".$row['requestkey']."</td>";
		echo "<td>".$row['resname']."</td>";
		echo "<td>".$row['branch']."</td>";
		echo "<td>".$row['location']."</td>";
		echo "<td>".$row['ownerkey']."</td>";
		echo "<td>".$row['owneremail']."</td>";
		$keyarray[$i]= $row['ownerkey'];
		$i=$row['requestkey'];
		echo  "<td>" . " <input type='checkbox' value='$i' name='Approve[]'>".  "</td>";
		echo  "<td>" . " <input type='checkbox' value='$i' name='Deny[]'>".  "</td>";  		
		echo "</tr>";
			
	 } 
	 if($OwnerKey!=NULL )
	 { ?>
		<table width="6">
		<tr>
		<th></th>
		<tr>
    <?php 
	echo "<tr>";
	echo "<td>"." <input type='submit' name='submit' value='Submit'>"."</td>";
	echo "</tr>";
	 } 
	// include 'searchform.php';
?>
</html>