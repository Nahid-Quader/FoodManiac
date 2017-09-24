<head>
				<link rel="stylesheet" href="styles/style.css" media="all"/>

	</head>

<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
 //include'signout_button.php';
//include'home_button.php';	 
mysql_connect('localhost','root','');
mysql_select_db("foodmaniac");
$email= $_POST["email"];
$pass= $_POST["password"];
$approved=0;
$success=0;
$ID = "";

/* setting up session variable,starting session */
    session_start();
	$_SESSION["email"] = "$email"; //setting variable to pass
	$_SESSION['is_signed'] =false;
error_reporting(E_ALL ^ E_NOTICE);
if($email==null or $pass==null)
{
check();
}
else
{
	$approved=1;
}
function check()
{
		echo "You might not fulfil all the fields.please try again to sign in ";
        include 'signin_process.php';		
	
}
function unsuccessful()
{
	if($success==0)
	{
		//echo "your username or password is not correct. Please try again";	
	$_SESSION["is_not_correct"]=true;
	}
	include 'signin_process.php';
}
if($approved==1)
{	
	$sql="SELECT ownerkey,fname from owner where Email='".$email."' 
	AND password='".$pass."'";
	$records=mysql_query("$sql");
	while ($row = mysql_fetch_array($records)) 
	{
	  $ID .= $row['ownerkey'] . "\n";
	   $Fname .= $row['fname'] . "\n"; 
	}
	if($ID==NULL)
	{
		$sql1="SELECT userkey,fname from user where Email='".$email."' 
		AND password='".$pass."'";
		$records1=mysql_query("$sql1");
		while ($row = mysql_fetch_array($records1)) 
		{
		  $ID .= $row['userkey'] . "\n";
		   $Fname .= $row['fname'] . "\n"; 
		}
		if($ID==NULL)
		{
			$sql1="SELECT name from admin where email='".$email."' 
			AND password='".$pass."'";
			$records1=mysql_query("$sql1");
			while ($row = mysql_fetch_array($records1)) 
			{
			  $name .= $row['name'] . "\n"; 
			}
			if($name==null)
			{
				unsuccessful();
			}
			else
			{
				 include'signout_button.php';
				$_SESSION['is_signed'] =true;
				$_SESSION['is_admin']=true;
				$_SESSION['name']=$name;
				
				include 'Admin_signin.php';
				
			}
			 /* include 'after_signin_process.php'; */
		}
		else
		{
			$_SESSION['is_signed'] =true;
			$_SESSION['is_user']=true;
			$_SESSION['name']=$Fname;
			?> 
		
		<div align="center"> 
		<?php
			$_SESSION['userkey']=$ID;
			include 'usersignin.php';
		}?>
		</div>
		
		<?php 

	}
	else
	{
		$_SESSION['is_signed'] =true;
		$_SESSION['is_owner']=true;
		$_SESSION["ownerkey"] = "$ID";
		$_SESSION["ownername"] = "$Fname";
	 	?> <div align="center">
		<?php   
		 //include 'signout_button.php'; 
		 include 'after_signin_process.php'; 
	}
} ?>

</div>