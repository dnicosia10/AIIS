<?php
	$con = mysql_connect("localhost","root");
	$db = mysql_select_db("aiis_db");
	if (!$con) {
		echo "connection lost";
	}if (!$db) {
		echo "DB lost";
	}
	echo "for calendar events</br>";
	$display = mysql_query("SELECT * FROM barrower_date WHERE BARR_DATE_WARNING = 'ON' ");
	echo "<table class='table table-hover'>
		<tr id='t-heads'> 
		<th>Title</th>
		<th>Event</th>
		<th>Date Start</th>
		<th>Date End</th>
		<th>Status</th>
		<th width='10%' class='text-center'><span class='glyphicon glyphicon-cog'></span></td>
		</tr>";
	while ($row = mysql_fetch_array($display)) {
		echo "<tr> 
		<td>" . $row['CAL_TITLE'] . "</td>
		<td>" . $row['CAL_EVENT'] . "</td>
		<td>" . $row['CAL_START'] . "</td>
		<td>" .$row['CAL_END'] . "</td>
		<td>" . $row['CAL_STATUS'] . "</td></tr>";
		
	}echo "</table>";
?>