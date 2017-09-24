<head>
<title>  Restaurants  </title>
				<link rel="stylesheet" href="styles/style.css" media="all"/>
</head>
	<body>
			<div class ="container">
			<div id="head_wrap">
				<div id="header">
				<a href="index.php">
				<img src="images/logo.png" style="float:left; padding:5px;"/>
				</a>
	            <form action="restaurantsOp.php" method='post' id="form2" style="float:right">
 <button value="My restaurant" name="3" >My restaurant</button>
 </form>  
<form action="after_signin_process.php" method='post' id="form2" style="float:right">
<button name="6" value="home">Home</button> 
</form>
<?php
include'signout_button.php'; ?> 
				</div>
			</div>
		</div>
<?php
mysql_connect('localhost','root','');
mysql_select_db("foodmaniac");
//starting session to recieve
error_reporting(~E_ALL ^ ~E_NOTICE);
		session_start();
		$email = $_SESSION["email"];//
		$ownerkey=$_SESSION["ownerkey"];
		foreach ($_POST as $key => $value)
		if($value=="Update Restaurant"){
		$_SESSION["reskey"]=$key;
		}
		$updateResKey=$_SESSION["reskey"];
		if($value=="ADD Food")
		{ ?><html>
			<form action="myRestaurant.php "method="post" id="form2">
			Food Name: <input type="text" name="foodname" required="required" >*<br>
			Price : <input type="text" name="price" required="required" >*<br>
			Food Type: <input type="text" name="type" required="required" >*<br>
			<input type="submit" value="ADD" name="ADD"><br>
		 </html><?php
		}
		if($value=="FoodList")
		{
					$sql="SELECT name, type,price FROM food  WHERE reskey=('$updateResKey')";
			$records=mysql_query("$sql");
			$j=0;
			echo "<table width=600 border=2 cellspacing=1
			<tr>
			<th>Food Name</th>
			<th>Food Type</th>
			<th>Price</th>
			</tr>";
			while ($row = mysql_fetch_array($records)) 
				{
					echo "<form action=myRestaurant.php method=post>";
					echo "<tr>";
					echo "<td>" . "<input type=text name=foodname value='".$row['name']."'>";
					echo "<td>" . "<input type=text name=type value='".$row['type']."'>";
					echo "<td>" . "<input type=text name=price value='".$row['price']."'>";
					echo "<td>" . "<input type=hidden name=hidden value='".$row['name']."'>";
					echo "<td>" . "<input type=submit name=Edit value=Edit" . ">";
					echo "<td>" . "<input type=submit name=Delete value=Delete" . ">";
					echo "</tr>";
					echo "</form>";
				}
				echo "</table>";
		}
		
		if($value=="ADD"){
			$food= $_POST["foodname"];
			$price= $_POST["price"];
			$type= $_POST["type"];
			
			if($food==null or $price==null or $type==null)
		{
			echo "You might not fulfil all the fields.please try again. ";
			include 'myRestaurant.php';
            		
		}
		else
		{
			$sql1 = "INSERT INTO food (foodkey,name,type,price,ownerkey,reskey,owneremail)
				VALUES ('', '$food', '$type','$price','$ownerkey','$updateResKey','$email')";
				$records=mysql_query("$sql1");
			echo "Food information added Successfully.";
		}
			
		}
		
		if($value=="Delete"){
			$food=$_POST["hidden"];
			$sql1 = "DELETE FROM food WHERE name = ('$food') AND reskey = ('$updateResKey')";
				$records=mysql_query("$sql1");
			echo "Food information deleted Successfully.";
		}
			
		
		
		if($value=="Edit"){
			$prefood=$_POST["hidden"];
			$food= $_POST["foodname"];
			$type= $_POST["type"];
			$price= $_POST["price"];
			
			
			if($prefood==null or $food==null or $price==null or $type==null)
		{
			echo "You might not fulfil all the fields.please try again. ";
			include 'myRestaurant.php';
            		
		}
		else
		{	
			$sql1 = "UPDATE food SET name ='".$food."', type ='".$type."', price='".$price."'
			WHERE name = '".$prefood."' AND '".$updateResKey."'";
				$records=mysql_query("$sql1");
			
			echo "Food information updated Successfully.";
		}
			
		}
		
		$myResName[]=null;
		$myResBra[]= null;
		$myResLoc[]=null;
         
		$sql="SELECT resname, branch, location, rating from restaurant where reskey='".$updateResKey."'";
			$records=mysql_query("$sql");
		$i=0;	
			while ($row = mysql_fetch_array($records)) 
				{
					$myResName[$i] .= $row['resname'] . "\n";
					$myResBra[$i] .= $row['branch'] . "\n";
					$myResLoc[$i] .= $row['location'] . "\n";
					$myResRate[$i] .= $row['rating'] . "\n";
							?><html><br></html><?php
							echo "Restaurant Name- " . $myResName[$i];
							?><html><br></html><?php
							echo "Branch- ". $myResBra[$i];
							?><html><br></html><?php
							echo "Location- ".$myResLoc[$i];
							?><html><br></html><?php
							echo "Rating- ".$myResRate[$i];
							?><html><br>
					<?php $i=$i+1; ?>	
							<form action="myRestaurant.php "method="post">
								<input type="submit" value="ADD Food" name="ADD Food">
								<input type="submit" value="FoodList" name="FoodList">
								</html><?php
							
				}
					
?>
	<div id="footer2">
		<div>
		<h2>&copy;Prometheus</h2>
		</div>
		<div>
		<a href="https://www.facebook.com/">
		<img src="images/fb.jpg" STYLE="position:absolute; top:0px; right:25px; WIDTH:40px; HEIGHT:40px" />
		</a>
			<a href="https://twitter.com/">
		<img src="images/twit.jpg" STYLE="position:absolute; top:0px; right:75px; WIDTH:40px; HEIGHT:40px" />
		</a>
		</div>
</div>
</html>