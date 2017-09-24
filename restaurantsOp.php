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
	    
 <form action="after_signin_process.php" method='post' style="float:right" id="form2">
<button value="Back" name="5">Back</button>

 
</form> <?php
include'signout_button.php'; ?>
 <form action="after_signin_process.php" method='post' style="float:right" id="form2">
 <button value="Home" name="10">Home</button>

</form> 

				</div>
			</div>
		</div>



<?php
/* if ($_POST ['15'])
	{
	include 'signout_button.php';
	include 'home_button.php';
	} */
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
 
mysql_connect('localhost','root','');
mysql_select_db("foodmaniac");
		session_start();
		$email = $_SESSION["email"];
		$ownerkey=$_SESSION["ownerkey"];
error_reporting(E_ALL ^ E_NOTICE);

if ($_POST ['2'])
{
  include 'addrequest_form.php';
}
else if($_POST ['3'] or $_POST ['105'])
{
    	
		$sql="SELECT resname, branch, location,reskey from restaurant where ownerkey='".$ownerkey."'";
			$records=mysql_query("$sql");
			$i=0;
			while ($row = mysql_fetch_array($records)) 
				{
					$myResName [$i].= $row['resname'] . "\n";
					$myResBra [$i].= $row['branch'] . "\n";
					$myResLoc [$i].= $row['location'] . "\n";
					$myResRate[$i] .= $row['rating'] . "\n";
				    $myReskey[$i] .= $row['reskey'] . "\n";
							echo "Restaurant Name- " . $myResName[$i];
							?><html><br></html><?php
							echo "Branch- ". $myResBra[$i];
							?><html><br></html><?php
							echo "Location- ".$myResLoc[$i];
							?><html><br></html><?php
							echo "Rating- ".$myResRate[$i]; 
							?><html><br>
					
								<form id="form2" action="myRestaurant.php "method="post">
								<button type="submit" name="<?php echo $myReskey[$i] ; ?>" value="Update Restaurant" >Update Restaurant</button>
								
								</form>
								<form action="update_restaurant_profile.php "method="post" id="form2">
								<button type="submit" name="<?php echo $myReskey[$i] ; ?>" value="Update Profile" >Update Profile</button>
								
								</form>
								<form id="form2" action="restaurant_profile.php "method="post" id="form2" >
								<button type="submit" name="<?php echo $myReskey[$i] ; ?>" value="View Profile" >View Profile</button>
								
								</form>
								</html>
								<?php
					$i=$i+1;
				}
				if($records==null)
				{
					echo "You have no restaurant";
				}
}
//include 'searchform.php';
?><div id="footer4">
		<h2>&copy;Prometheus</h2>
		<a href="https://www.facebook.com/">
		<img src="images/fb.jpg" STYLE="position:absolute; top:0px; right:0px; WIDTH:40px; HEIGHT:40px" />
		</a>
			<a href="https://twitter.com/">
		<img src="images/twit.jpg" STYLE="position:absolute; top:0px; right:35px; WIDTH:40px; HEIGHT:40px" />
		</a>
		</div>

	
	</body>
	</html>