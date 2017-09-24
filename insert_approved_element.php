<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
mysql_connect('localhost','root','');
mysql_select_db("foodmaniac");
	$sql="SELECT requestkey,resname,branch,location,ownerkey,owneremail from request where approve='1'";
	$records=mysql_query("$sql");
	$i=0;
	while($row = mysql_fetch_array($records, MYSQL_ASSOC))
	{
		 $x=$row['requestkey'];
		$y=$row['resname'];
		$z=$row['branch'];
		$k=$row['location'];
		$l=$row['ownerkey'];
		$m=$row['owneremail'];
		  $sql1= "INSERT INTO restaurant ( reskey,resname,branch,location,requestkey,ownerkey,owneremail)
				VALUES ('','$y','$z','$k','$x','$l','$m')";
				$records1=mysql_query("$sql1");
				$sql2="UPDATE request SET approve='3' ";
				$records2=mysql_query("$sql2");
	}
	
	?>