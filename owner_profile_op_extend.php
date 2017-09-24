<?php
mysql_connect('localhost','root','');
mysql_select_db("foodmaniac");
error_reporting(~E_ALL ^ ~E_NOTICE);
session_start();
$ownerkey=$_SESSION['ownerkey'];
foreach ($_POST as $key => $value)

if($value=="Update" && $key=="Update")
{
	 $sex=$_POST['sex'];
	 $religion=$_POST['religion'];
	 $profession=$_POST['profession'];
	 $birthday=$_POST['birthday'];
	 $phone=$_POST['phone'];
	 $presentlocation=$_POST['presentlocation'];
	 $hometown=$_POST['hometown'];
	 $school=$_POST['school'];
	 $college=$_POST['college'];
	 $university=$_POST['university'];
	 
	 $sql="UPDATE `foodmaniac`.`ownerprofile` SET `sex` = '".$sex."', `religion` = '".$religion."',
	 `profession` = '".$profession."', `birthday` = '".$birthday."', `phone` = '".$phone."',
	 `presentlocation` = '".$presentlocation."', `hometown` = '".$hometown."', 
	 `school` = '".$school."', `college` = '".$college."', 
	 `university` = '".$university."' WHERE `ownerprofile`.`ownerkey` = '".$ownerkey."'";
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
	 <?php 
	 echo "<br/>Profile Updated."; 
	?><html><br></html><form action="update_owner_profile.php" method="post" id="form2">
 <button name="GoBack" value="GoBack">GoBack</button>

</form>
	<?php
}

?><div id="footer3">
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