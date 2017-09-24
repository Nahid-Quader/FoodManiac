<html>

<form action="foodmaniac.php" method='post' style="float:right">
<input type="submit" value="back" name="15">
</form> 
<?php
include 'signout_button.php';
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
mysql_connect('localhost','root','');
mysql_select_db("foodmaniac");
session_start();
$userkey=$_SESSION['userkey'];
$reskey= $_SESSION['reskey'];
$_SESSION['include']=1;
//links works for only first file...
$_SESSION['updatedreskey']=$reskey;
if ($_POST ['1'])
	{ 
		$rating=$_POST["rating"];
		$sql1="select reskey from review where userkey='".$userkey."' AND reskey='".$reskey."'";
		$records1=mysql_query("$sql1");
		while ($row = mysql_fetch_array($records1)) 
			{
			  $reskey1 .= $row['reskey'] . "\n"; 
			}
			if($reskey1==null)
			{
				$sql= "INSERT INTO review (userkey,reskey,point)
				VALUES ('$userkey','$reskey','$rating')";
				$records=mysql_query("$sql");
				/* while ($row = mysql_fetch_array($records1)) 
				{
					$point .= $row['point'] . "\n"; 
				} */
				$update=$rating;
				//echo "point";
				//echo $update; ?> <br> <?php
			}
			else
			{
				$sql1="select point from review where userkey='".$userkey."' AND reskey='".$reskey."'";
				$records1=mysql_query("$sql1");
				while ($row = mysql_fetch_array($records1)) 
				{
					$point .= $row['point'] . "\n"; 
				}
				$update=$rating-$point;
				//echo "update";
				//echo $update; ?> <br> <?php
				$sql = "UPDATE review SET point='".$rating."' WHERE userkey='".$userkey."' AND reskey='".$reskey."'";
				$records=mysql_query("$sql");
			}
			$sql2="select totalpoint from restaurant where reskey='".$reskey."'";
				$records2=mysql_query("$sql2");
				while ($row = mysql_fetch_array($records2)) 
				{
					$totalpoint .= $row['totalpoint'] . "\n"; 
				}
				$totalpoint=$totalpoint+$update;
				if($totalpoint<=0)
				{
					$totalpoint=0;
				}
				//echo "totalpoint";
				//echo $totalpoint; ?> <br> <?php
				$sql3= "UPDATE restaurant SET totalpoint='".$totalpoint."' WHERE reskey='".$reskey."'";
				
				$records3=mysql_query("$sql3");
				$query="SELECT COUNT(DISTINCT userkey) FROM review WHERE reskey='".$reskey."'";
				$records4=mysql_query("$query");
				while ($row = mysql_fetch_array($records4)) 
				{
					$count .= $row['COUNT(DISTINCT userkey)'] . "\n"; 
				}
				//echo $count;
				if($count!=null)
				{
					$ratingavg=$totalpoint/$count ;
				}
				else
				{
					$ratingavg="no review";
				}
				
				$ratingavg=round($ratingavg,2);
				$query1="UPDATE restaurant SET usernumber='".$count."',rating='".$ratingavg."' WHERE reskey='".$reskey."'";
				$records5=mysql_query("$query1");
				echo "your rating has been updated!!";
				$_SESSION['include']=2;
				include 'rating_profile.php';
	}	
	?>