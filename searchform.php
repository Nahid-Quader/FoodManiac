<html>

<br>
 <form id="form2" action="foodmaniac.php" method="post">
		<h2>Search by:</h2>

		<br>
		Area Name:  <select name="areaname">
		<option value=""></option>
		 <?php 
		 error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
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
			Budget Range: From <input type="text" name="price1"> To <input type="text" name="price2"><br>
			Food Type: <select name="type">
			<option value=""></option>
			<?php
			$sql=mysql_query("select distinct food.type from food");
			while($row=mysql_fetch_array($sql)){
				echo "<option value='".$row['type']."'>" .$row['type']. "</option>" ;
			}
			?>
			</select><br>
<button name="Search" value="Search">Search</button>
	
		</form>
		</html>
		