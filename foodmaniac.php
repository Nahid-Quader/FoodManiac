	<html> <?php
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
	session_start();
	$counter=0;
    if($_SESSION['is_signed']==true)
	{
		if($_SESSION['is_user']==true)
		{ ?>
			<form action="usersignin.php" method='post' id="form2" style="float:right">
					<button name="15" value="Back" >Back</button>
			<!--<input type="submit" value="back" name="15">-->
			</form> 
			<form action="usersignin.php" method='post' id="form2" style="float:right">
								<button name="10" value="Home" >Home</button>
			<!--<input type="submit" value="home" name="10">-->
			</form> 
<?php	}
		elseif($_SESSION['is_owner']==true)
		{
		?> <form action="after_signin_process.php" method='post' id="form2" style="float:right">
								<button name="15" value="Back" >Back</button>
			</form> 
			<form action="after_signin_process.php" method='post' id="form2" style="float:right">
			<button name="10" value="Home" >Home</button>
			</form> 
 
<?php	}
		elseif($_SESSION['is_admin']==true)
		{ ?>
		<form action="Admin_signin.php" method='post' id="form2" style="float:right">
								<button name="15" value="Back" >Back</button>
			</form> 
			<form action="Admin_signin.php" method='post' id="form2" style="float:right">
			<button name="10" value="Home" >Home</button>
			</form>
<?php	}
		include 'signout_button.php';
	}
	else
	{ ?><form action="index.php" method='post' id="form2" style="float:right">
		<button name="15" value="Back" >Back</button>
		</form> 
		<form action="index.php" id="form2" method='post' style="float:right">
		<button name="10" value="Home" >Home</button>
		</form>
<?php }
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
	mysql_connect('localhost','root','');
	mysql_select_db("foodmaniac");
	$data1= $_POST["areaname"];
	$data2= $_POST["foodname"];
	$data3= $_POST["rname"];
	$data4= $_POST["price"];
	$data5= $_POST["type"];
	
	if($data1==null && $data2==null && $data3==null && $data4==null && $data5==null)
	{
	$sql="select food.name,food.type,food.foodkey, food.price, restaurant.resname,restaurant.reskey,restaurant.rating,restaurant.usernumber,restaurant.location from food 
	INNER JOIN restaurant ON food.reskey=restaurant.reskey";
	}
	 else if($data1!=null && $data2!=null && $data3!=null && $data4!=null && $data5!=null)
	{
	$sql="select food.name, food.type,food.foodkey, food.price, restaurant.resname,restaurant.reskey,restaurant.rating,restaurant.usernumber, restaurant.location from food 
	INNER JOIN restaurant ON food.reskey=restaurant.reskey
	 where food.name='".$data2."' AND food.type='".$data5."' AND food.price<='".$data4."' 
	 AND restaurant.resname='".$data3."' AND restaurant.branch='".$data1."'";
	}
	 else if ($data1==null && $data2!=null && $data3!=null && $data4!=null && $data5!=null)
	{
	 $sql="select food.name, food.type,food.foodkey, food.price, restaurant.resname,restaurant.reskey,restaurant.rating,restaurant.usernumber, restaurant.location from food 
	 INNER JOIN restaurant ON food.reskey=restaurant.reskey where 
	 food.name='".$data2."' AND restaurant.resname='".$data3."' 
	 AND food.type='".$data5."' AND food.price<='".$data4."'";  
	}
	 else if($data1!=null && $data2==null && $data3!=null && $data4!=null && $data5!=null)
	 {
	 $sql="select food.name, food.type,food.foodkey, food.price, restaurant.resname,restaurant.reskey,restaurant.rating,restaurant.usernumber, restaurant.location from food 
	INNER JOIN  restaurant ON food.reskey=restaurant.reskey 
	where restaurant.branch='".$data1."' AND restaurant.resname='".$data3."' 
	AND food.price<='".$data4."' AND food.type='".$data5."'";
	}
	else if($data1!=null&& $data2!=null && $data3==null && $data4!=null && $data5!=null)
	{
	 $sql="select food.name, food.type,food.foodkey, food.price, restaurant.resname,restaurant.reskey,restaurant.rating,restaurant.usernumber, restaurant.location from food 
	INNER JOIN restaurant ON food.reskey=restaurant.reskey 
	where restaurant.branch='".$data1."' AND food.name='".$data2."' 
	AND food.price<='".$data4."' AND food.type='".$data5."'";
	}
	 else if($data1!=null&& $data2!=null && $data3!=null && $data5!=null)
	{
	 $sql="select food.name, food.type,food.foodkey, food.price, restaurant.resname,restaurant.reskey,restaurant.rating,restaurant.usernumber, restaurant.location from food 
	INNER JOIN restaurant ON food.reskey=restaurant.reskey 
	where restaurant.branch='".$data1."' AND food.name='".$data2."' 
	AND restaurant.resname='".$data3."' AND food.type='".$data5."'";
	}
	else if($data1!=null&& $data2!=null && $data3!=null && $data4!=null && $data5==null)
	{
	 $sql="select food.name, food.type,food.foodkey,food.price, restaurant.resname,restaurant.reskey,restaurant.rating,restaurant.usernumber,restaurant.location from food 
	INNER JOIN restaurant ON food.reskey=restaurant.reskey 
	where restaurant.branch='".$data1."' AND food.name='".$data2."'
	 AND restaurant.resname='".$data3."' AND food.price<='".$data4."'";

	}
	else if ($data3!=null && $data4!=null && $data5!=null)
	{
	 $sql="select food.name, food.type,food.foodkey, food.price, restaurant.resname,restaurant.reskey,restaurant.rating,restaurant.usernumber, restaurant.location from food 
	INNER JOIN restaurant ON food.reskey=restaurant.reskey 
	where food.type='".$data5."' AND restaurant.resname='".$data3."' AND food.price<='".$data4."'";
	}
	else if ($data2!=null && $data4!=null && $data5!=null)
	{
	 $sql="select food.name, food.type,food.foodkey, food.price, restaurant.resname,restaurant.reskey,restaurant.rating,restaurant.usernumber, restaurant.location from food 
	INNER JOIN restaurant ON food.reskey=restaurant.reskey 
	where food.name='".$data2."' AND food.price<='".$data4."' AND food.type='".$data5."'";
	}
	else if ($data2!=null && $data3!=null && $data5!=null)
	{
	 $sql="select food.name, food.type,food.foodkey, food.price, restaurant.resname,restaurant.reskey,restaurant.rating,restaurant.usernumber,restaurant.location from food 
	INNER JOIN restaurant ON food.reskey=restaurant.reskey 
	where food.name='".$data2."' AND restaurant.resname='".$data3."' AND food.type='".$data5."'";
	}
	else if ($data2!=null && $data3!=null && $data4!=null)
	{
	 $sql="select food.name, food.type,food.foodkey, food.price, restaurant.resname,restaurant.reskey,restaurant.rating,restaurant.usernumber, restaurant.location from food 
	INNER JOIN restaurant ON food.reskey=restaurant.reskey 
	where food.name='".$data2."' AND restaurant.resname='".$data3."' AND food.price<='".$data4."'";
	}
	else if ($data1!=null && $data4!=null && $data5!=null)
	{
	 $sql="select food.name, food.type,food.foodkey, food.price, restaurant.resname,restaurant.reskey,restaurant.rating,restaurant.usernumber, restaurant.location from food 
	INNER JOIN restaurant ON food.reskey=restaurant.reskey 
	where restaurant.branch='".$data1."' AND food.price<='".$data4."' AND food.type='".$data5."'";
	}
	else if ($data1!=null && $data3!=null && $data5!=null)
	{
	 $sql="select food.name, food.type,food.foodkey, food.price, restaurant.resname,restaurant.reskey,restaurant.rating,restaurant.usernumber, restaurant.location from food 
	INNER JOIN restaurant ON food.reskey=restaurant.reskey 
	where restaurant.branch='".$data1."' AND restaurant.resname='".$data3."' AND food.type='".$data5."'";
	}
	else if ($data1!=null && $data3!=null && $data4!=null)
	{
	 $sql="select food.name, food.type,food.foodkey, food.price, restaurant.resname,restaurant.reskey,restaurant.rating,restaurant.usernumber,restaurant.location from food 
	INNER JOIN restaurant ON food.reskey=restaurant.reskey 
	where restaurant.branch='".$data1."' AND restaurant.resname='".$data3."' AND food.price<='".$data4."'";
	}
	else if ($data1!=null && $data2!=null && $data5!=null)
	{
	 $sql="select food.name, food.type,food.foodkey, food.price, restaurant.resname,restaurant.reskey,restaurant.rating, restaurant.usernumber,restaurant.location from food 
	INNER JOIN restaurant ON food.reskey=restaurant.reskey 
	where restaurant.branch='".$data1."' AND food.name='".$data2."' AND food.type='".$data5."'";
	}
	else if ($data1!=null && $data2!=null && $data4!=null)
	{
	 $sql="select food.name, food.type,food.foodkey, food.price, restaurant.resname,restaurant.reskey,restaurant.rating,restaurant.usernumber, restaurant.location from food 
	INNER JOIN restaurant ON food.reskey=restaurant.reskey 
	where restaurant.branch='".$data1."' AND food.name='".$data2."' AND food.price<='".$data4."'";
	}
	else if ($data1!=null && $data2!=null && $data3!=null)
	{
	 $sql="select food.name, food.type,food.foodkey, food.price, restaurant.resname,restaurant.reskey,restaurant.rating,restaurant.usernumber, restaurant.location from food 
	INNER JOIN restaurant ON food.reskey=restaurant.reskey 
	where restaurant.branch='".$data1."' AND food.name='".$data2."' AND restaurant.resname='".$data3."'";
	}
	else if($data1!=null && $data2!=null)
	{
		$sql="select food.name, food.type,food.foodkey, food.price, restaurant.resname,restaurant.reskey,restaurant.rating,restaurant.usernumber, restaurant.location from food 
	INNER JOIN restaurant ON food.reskey=restaurant.reskey 
	where restaurant.branch='".$data1."' AND food.name='".$data2."'";
	}
	else if($data1!=null && $data3!=null)
	{
		$counter=1;
		$sql="select restaurant.resname,restaurant.reskey,restaurant.rating,restaurant.usernumber, restaurant.location from  restaurant
	where restaurant.branch='".$data1."' AND restaurant.resname='".$data3."'";
	}
	else if($data1!=null && $data4!=null)
	{
		$sql="select food.name, food.type,food.foodkey, food.price, restaurant.resname,restaurant.reskey,restaurant.rating,restaurant.usernumber,restaurant.location from food 
	INNER JOIN restaurant ON food.reskey=restaurant.reskey 
	where restaurant.branch='".$data1."' AND food.price<='".$data4."'";
	}
	else if($data1!=null && $data5!=null)
	{
		$sql="select food.name, food.type,food.foodkey, food.price, restaurant.resname,restaurant.reskey,restaurant.rating,restaurant.usernumber,restaurant.location from food 
	INNER JOIN restaurant ON food.reskey=restaurant.reskey 
	where restaurant.branch='".$data1."' AND food.type='".$data5."'";
	}
	else if($data2!=null && $data3!=null)
	{
		$sql="select food.name, food.type,food.foodkey, food.price, restaurant.resname,restaurant.reskey,restaurant.rating,restaurant.usernumber,restaurant.location from food 
	INNER JOIN restaurant ON food.reskey=restaurant.reskey 
	where food.name='".$data2."' AND restaurant.resname='".$data3."'";
	}
	else if($data2!=null && $data4!=null)
	{
		$sql="select food.name, food.type,food.foodkey, food.price, restaurant.resname,restaurant.reskey,restaurant.rating,restaurant.usernumber,restaurant.location from food 
	INNER JOIN restaurant ON food.reskey=restaurant.reskey 
	where food.name='".$data2."' AND food.price<='".$data4."'";
	}
	else if($data2!=null && $data5!=null)
	{
		$sql="select food.name, food.type,food.foodkey, food.price, restaurant.resname,restaurant.reskey,restaurant.rating,restaurant.usernumber, restaurant.location from food 
	INNER JOIN restaurant ON food.reskey=restaurant.reskey 
	where food.name='".$data2."' AND food.type='".$data5."'";
	}
	else if($data3!=null && $data4!=null)
	{
		$sql="select food.name, food.type,food.foodkey, food.price, restaurant.resname,restaurant.reskey,restaurant.rating, restaurant.usernumber,restaurant.location from food 
	INNER JOIN restaurant ON food.reskey=restaurant.reskey 
	where restaurant.resname='".$data3."' AND food.price<='".$data4."'";
	}
	else if($data3!=null && $data5!=null)
	{
		$sql="select food.name, food.type,food.foodkey, food.price, restaurant.resname,restaurant.reskey,restaurant.rating,restaurant.usernumber, restaurant.location from food 
	INNER JOIN restaurant ON food.reskey=restaurant.reskey 
	where restaurant.resname='".$data3."' AND food.type='".$data5."'";
	}
	else if($data4!=null && $data5!=null)
	{
		$sql="select food.name, food.type,food.foodkey, food.price, restaurant.resname,restaurant.reskey,restaurant.rating,restaurant.usernumber, restaurant.location from food 
	INNER JOIN restaurant ON food.reskey=restaurant.reskey 
	where food.price<='".$data4."' AND food.type='".$data5."'";
	}
	else if($data1!=null)
	{
		$counter=1;
		$sql="select restaurant.resname,restaurant.reskey,restaurant.rating,restaurant.usernumber,restaurant.location from  restaurant
	where restaurant.branch='".$data1."'";
	}
	else if($data2!=null)
	{
		$sql="select food.name, food.type,food.foodkey, food.price, restaurant.resname,restaurant.reskey,restaurant.rating,restaurant.usernumber,restaurant.location from food 
	INNER JOIN restaurant ON food.reskey=restaurant.reskey 
	where food.name='".$data2."'";
	}
	else if($data3!=null)
	{
		$counter=1;
		$sql="select restaurant.resname,restaurant.reskey,restaurant.rating, restaurant.usernumber,restaurant.location from  restaurant
	where restaurant.resname='".$data3."'";
	}
	
	else if($data4!=null)
	{
		$sql="select food.name, food.type,food.foodkey, food.price, restaurant.resname,restaurant.reskey,restaurant.rating, restaurant.usernumber,restaurant.location from food 
	INNER JOIN restaurant ON food.reskey=restaurant.reskey 
	where food.price<='".$data4."'";
	}
	
	else if($data5!=null)
	{
		$sql="select food.name, food.type,food.foodkey, food.price, restaurant.resname,restaurant.reskey,restaurant.rating, restaurant.usernumber,restaurant.location from food 
	INNER JOIN restaurant ON food.reskey=restaurant.reskey 
	where food.type='".$data5."'";
	}
	
	$records=mysql_query("$sql");
	?>
		<head>
	   <title>Food Maniac</title>
	   <link rel="stylesheet" href="styles/style.css" type="text/css" media="screen ,projection" />

	</head>
	<body>
	<div class ="container">
			<div id="head_wrap">
				<div id="header">
				<a href="index.php">
				<img src="images/logo.png" style="float:left; padding:5px;"/>
				</a>
				
				</div>
			</div>
		</div>
		<div align="center">	<?php
	/* ?>
	<table width="600" border="2" cellspacing="1" >
	<tr>
		<th>Food Name</th>
	   <th>Restaurant Name</th>
	   <th>Location</th>
	   <th>Price </th>
	   <th>Type</th>
	   <th>Rating</th>
	<?php */
	if($counter==1)
	{
		?>
	<table width="600" border="2" cellspacing="1" >
	<tr>
	   <th>Restaurant Name</th>
	   <th>Location</th>
	   <th>Rating</th>
	   <th>Rated By</th>
	<?php
	
		while($data=mysql_fetch_assoc($records))
	{
		if($data['rating']==null)
		{
			$data['rating']="no review";
		}
		echo "<tr>";
		//echo "<td>".$data['name']."</td>";
		if($_SESSION['is_user']==true)
		{
			echo "<td><a href=\"rating_profile.php?res=".$data['resname']."&reskey=".$data['reskey']."\">".$data['resname']."</a></td>";
		}
		else
		{
			echo "<td>".$data['resname']."</td>";
		}
		echo "<td>".$data['location']."</td>";
		echo "<td>".$data['rating']."</td>";
		echo "<td>".$data['usernumber']."</td>";
		echo "</tr>";
	} ?>
	</table> <?php
		
	}
	else
	{
		?>
	<table width="600" border="2" cellspacing="1" >
	<tr>
		<th>Food Name</th>
	   <th>Restaurant Name</th>
	   <th>Location</th>
	   <th>Price </th>
	   <th>Type</th>
	   <th>Rating</th>
	   <th>Rated By</th>
	   
	   
	<?php
		
			while($data=mysql_fetch_assoc($records))
	{
		if($data['rating']==null)
		{
			$data['rating']="no review";
		}
		echo "<tr>";
		echo "<td><a href=\"view_description.php?res=".$data['name']."&foodkey=".$data['foodkey']."\">".$data['name']."</a></td>";
		if($_SESSION['is_user']==true)
		{
			echo "<td><a href=\"rating_profile.php?res=".$data['resname']."&reskey=".$data['reskey']."\">".$data['resname']."</a></td>";
		}
		else
		{
			echo "<td>".$data['resname']."</td>";
		}
		echo "<td>".$data['location']."</td>";
		echo "<td>".$data['price']."</td>";
		echo "<td>".$data['type']."</td>";
		echo "<td>".$data['rating']."</td>";
		echo "<td>".$data['usernumber']."</td>";
		echo "</tr>";
	} ?>
	</table> <?php
	}
	?></table>
	</div>
		<div id="footer3">
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