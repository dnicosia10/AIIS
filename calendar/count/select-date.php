
<?php   
 	 $con = mysql_connect("localhost","root");
	$db = mysql_select_db("aiis_db");
	if (!$con) {
		echo "connection lost";
	}if (!$db) {
		echo "DB lost";
	} 
	
	if(isset($_POST['submit']))
	{ 	
		$date = $_POST['date']; 
		$sql = "SELECT * FROM sdmo_calendar WHERE CAL_START = '$date'";
		$res = mysql_query($sql);

		if($date!=0){
		echo "<table class='table table-hover'>
			<tr id='t-head'>
				<th>ID</th>
				<th>Title</th>
				<th>Event</th>
				<th>Location</th>
				<th>Date</th>  
			</tr>";
		while ($row = mysql_fetch_array($res)) {
			echo "<tr>
				<td>" . $row['CAL_NO'] . "</td>
				<td>" . $row['CAL_TITLE'] . "</td>
				<td>" . $row['CAL_EVENT'] . "</td>
				<td>" . $row['CAL_EVENT_LOCATION'] . "</td>
				<td>" . $row['CAL_START'] . "</td> 
				 </tr>";
		}
		echo "</table>";
		}
		else{
		 return false;
		}
	}
	elseif(!isset($_POST['submit'])){

		$sql = "SELECT * FROM sdmo_calendar ORDER BY CAL_START LIMIT 7";
		$res = mysql_query($sql); 
		echo "<table class='table table-hover' >
			<tr id='t-head'>
				<th>ID</th>
				<th>Title</th>
				<th>Event</th>
				<th>Location</th>
				<th>Date</th>  
			</tr>";
		while ($row = mysql_fetch_array($res)) {
			echo "<tr>
				<td>" . $row['CAL_NO'] . "</td>
				<td>" . $row['CAL_TITLE'] . "</td>
				<td>" . $row['CAL_EVENT'] . "</td>
				<td>" . $row['CAL_EVENT_LOCATION'] . "</td>
				<td>" . $row['CAL_START'] . "</td> 
				 </tr>";
		}
		echo "</table>";
	}
	
?>
<style type="text/css">
	#t-head{
		background: linear-gradient(to bottom, #99ffff, #e6ffff);
		color: #999;
		font-size: 0.9em;
	} 
</style>
 