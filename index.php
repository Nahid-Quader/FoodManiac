<html>
<?php 
mysql_connect('localhost','root','');
mysql_select_db("foodmaniac");
session_start();
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
$_SESSION['is_signed']==false; ?>
<h2>
	<head>
		<title>  FoodManiac  </title>
		<link rel="stylesheet" href="styles/style.css" media="all"/>
	</head>
	<body>
	<body>
		<div class ="container">
			<div id="head_wrap">
				<div id="header">
				<a href="index.php">
				<img src="images/logo.png" style="float:left; padding:5px;"/>
				</a>
				<? 
				if($_SESSION["signout"]=="yes")
				{
					include 'signout_button.php';
				}?>
				<form action="signup_process.php" method='post' id="form1">
				<button name="Signup">Signup</button>
				</form>
			<div align="right">
				<form action="signin_form.php" method='post' id="form2">
				<button name="1" value="Signin" >Signin</button>
		<!--		<input type="submit" value="Signup" />
				<input type="submit" value="Signin" name="1"><br><br><br>-->
				</form>
			</div>
				</div>
			</div>
		</div>
	
	<div id="content" >
		<div>
			<img src="images/one3.jpg" width="700" height="500" style="float:left" />
<!--
		<img src="images/one3.jpg" style="float:left"/>-->
		</div>
		
		<div align="right" id="form2" >

	
		 <h1>Search by</h1>
		<br><br>

        <form action="foodmaniac.php" method="post">
		
		Area Name:  <select name="areaname">
		<option value=""></option>
		 <?php 
		 mysql_connect('localhost','root','');
		mysql_select_db("foodmaniac");
		$sql = mysql_query("SELECT distinct branch FROM restaurant");
		while ($row = mysql_fetch_array($sql))
		{
		echo "<option value='".$row['branch']."'>" . $row['branch'] . "</option>";
		}		?>
	    </select><br> 
		Food: <select name="foodname">
		<option value=""></option>
		<?php
		$sql=mysql_query("select distinct name from food");
		while($row=mysql_fetch_array($sql)){
			echo "<option value='".$row['name']."'>" . $row['name']. "</option>" ;
		}
		?>
			</select><br>
			
			Restaurant Name: <select name="rname">
			<option value=""></option>
			<?php
			$sql=mysql_query("select distinct resname from restaurant");
			while($row=mysql_fetch_array($sql))
			{
				//$x=$row['resname'];
				echo "<option value='".$row['resname']."'>" .$row['resname']. "</option>" ;
			}
			?>
			</select><br>
			Budget Range: From <input type="text" name="price1"> To<input type="text" name="price2"><br>
			Food Type: <select name="type">
			<option value=""></option>
			<?php
			$sql=mysql_query("select distinct food.type from food");
			while($row=mysql_fetch_array($sql)){
				echo "<option value='".$row['type']."'>" .$row['type']. "</option>" ;
			}
			?>
			</select><br>
			<button name="Search">Search</button>
				
		</form>
		</div>
		
		
		</div>
		<br><br><br><br><br><br><br><br>
		<div id="footer">
		<h2>&copy;Prometheus</h2>
		<a href="https://www.facebook.com/">
		<img src="images/fb.jpg" STYLE="position:absolute; top:940px; right:25px; WIDTH:40px; HEIGHT:40px" />
		</a>
			<a href="https://twitter.com/">
		<img src="images/twit.jpg" STYLE="position:absolute; top:940px; right:75px; WIDTH:40px; HEIGHT:40px" />
		</a>
		</div>
	</body>
	</h2>
</html> 
