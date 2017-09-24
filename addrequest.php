<html>
 <form action="after_signin_process.php" method='post' style="float:right">
<input type="submit" value="back" name="5">
</form> 
<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
include'signout_button.php';?>
  <form action="after_signin_process.php" method='post' style="float:right">
<input type="submit" value="home" name="6">
</form>  <?php
mysql_connect('localhost','root','');
mysql_select_db("foodmaniac");
//starting session to recieve
		session_start();
		$email = $_SESSION["email"];//this variable can be use as our email....
		$ID= null;
        $res= $_POST["restaurant"];
		$bra= $_POST["branch"];
		$loc= $_POST["location"];

		if($res==null or $bra==null or $loc==null)
		{
			echo "You might not fulfil all the fields.please try again ";
			include 'addrequest_form.php';
            		
		}
		else
		{
			
			$sql="SELECT ownerkey from owner where email='".$email."'";
			$records=mysql_query("$sql");
			while ($row = mysql_fetch_array($records)) 
				{
					$ID .= $row['ownerkey'] . "\n"; 
				}
			
			$sql = "INSERT INTO request( resname, branch, location, ownerkey, owneremail,approve)
				VALUES ('$res', '$bra','$loc',' $ID ','$email','0')";
				$records=mysql_query("$sql");
			echo "your request have been sent successfully";
					   include 'after_signin_process.php';
		}

?>
</html>