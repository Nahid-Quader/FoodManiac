<html>  
<html>
		<head>
			
				<link rel="stylesheet" href="styles/style.css" media="all"/>
		</head>
	  

<?php

	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
	session_start();
	if($_SESSION['is_user']==true)
	{ ?><body>
		<div class ="container">
			<div id="head_wrap">
				<div id="header">
				<a href="index.php">
				<img src="images/logo.png" style="float:left; padding:5px;"/>
				</a>
				<form action="usersignin.php" id="form2" method='post' style="float:right">
	         <button name="5" value="back" >Back</button>
		</form> 
		<?php
		include'signout_button.php'; ?>
		  <form action="usersignin.php" id="form2" method='post' style="float:right">
		<button value="home" name="6">Home</button>
		</form>
				</div>
			</div>
		</div>
<?php
	}
	elseif($_SESSION['is_owner']==true)
	{ ?>
	<body>
		<div class ="container">
			<div id="head_wrap">
				<div id="header">
				<a href="index.php">
				<img src="images/logo.png" style="float:left; padding:5px;"/>
				</a>
					<form action="after_signin_process.php" id="form2" method='post' style="float:right">
		<button value="back" name="5">Back</button>
		</form> 
		<?php
		include'signout_button.php'; ?>
		  <form action="after_signin_process.php" id="form2" method='post' style="float:right">
		<button value="home" name="6">Home</button>
		</form> 
				</div>
			</div>
		</div>
	 <?php	
	}
	mysql_connect('localhost','root','');
	mysql_select_db("foodmaniac");
	$data= $_POST["name"];
	
	if($data==null)
	{
		echo "Please enter other's name...";
	}
	else
	{
		$sql1="select fname, lname, ownerkey,email from owner where fname=('$data') or lname=('$data')";
		$sql2="select fname, lname, userkey,email from user where fname=('$data') or lname=('$data')";
	}
	
		
	$records1=mysql_query("$sql1");
	$records2=mysql_query("$sql2");
	?>
	<head>
	   <title>Find Others</title>
	</head>
	<body>
	<table width="300" border="1" cellspacing="1" >
	<tr>
		<th>Name</th>
		<th>Profile Type</th>

	<?php
		$table1='ownerprofile';
		$table2='userprofile';
		$type1='owner';
		$type2='user';
		$tablekey1='ownerkey';
		$tablekey2='userkey';
		
		while($row=mysql_fetch_assoc($records1))
		{
		//echo $row['fname'];
		echo "<tr>";
		echo "<td><a href=\"veiw_profile.php?table=".$table1."&type=".$type1."&tablekey=".$tablekey1."&tablekey=".$tablekey1."&key=".$row['ownerkey']."\">".$row['fname']."&nbsp".$row['lname']."</a></td>";
		echo "<td>".'Owner'."</td>";
		echo "</tr>";
		}
		while($row=mysql_fetch_assoc($records2))
		{
		//echo $row['fname'];
		echo "<tr>";
		echo "<td><a href=\"veiw_profile.php?table=".$table2."&type=".$type2."&tablekey=".$tablekey2."&key=".$row['userkey']."\">".$row['fname']."&nbsp".$row['lname']."</a></td>";
		echo "<td>".'User'."</td>";
		echo "</tr>";
		}
	
	?>
	</table>
	<div id="footer2">
		<h2>&copy;Prometheus</h2>
		<a href="https://www.facebook.com/">
		<img src="images/fb.jpg" STYLE="position:absolute; top:0px; right:25px; WIDTH:40px; HEIGHT:40px" />
		</a>
			<a href="https://twitter.com/">
		<img src="images/twit.jpg" STYLE="position:absolute; top:0px; right:75px; WIDTH:40px; HEIGHT:40px" />
		</a>
		</div>
	</body>
	</html>