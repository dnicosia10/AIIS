<?php  

 include_once'../../configs/config.php';

 $status = 'ONGOING';

 $display = mysql_query("SELECT * FROM sdmo_calendar WHERE 	CAL_STATUS ='$status'");

 if($status = mysql_num_rows($display)){
 	echo $status;
 }else{
 	print("0");
 }

	 	echo "<table  class='table  table-hover text-center'>
		 <tr id='t-heads'>
		 	<th class='text-center'>ID</th>
		 	<th class='text-center'>Title</th> 
		 	<th class='text-center'>Date Start</th>
		 	<th class='text-center'>Note(s) & Memos </th>
		 	<th class='text-center'>Date End</th>
		 	<th class='text-center'>Status</th>
		 	<th class='text-center'><span class='glyphicon glyphicon-cog'></span></th>
		 </tr>	";
	 while ($row = mysql_fetch_array($display)) 
	 {
	 	echo "<tr>
			 <td class='text-center'>" . $row['CAL_NO'] . "</td>
			 <td>" . $row['CAL_TITLE'] . "</td> 
			 <td>" . $row['CAL_START'] . "</td>
			 <td>" . $row['CAL_EVENT'] . "</td>
			 <td>" .$row['CAL_END'] . "</td>
			 <td>" . $row['CAL_STATUS'] . "</td>
			 <td> <a class='btn btn-primary btn-xs' style='border-radius:0px;' href='calendar/update-task.php?a=" . $row['CAL_NO'] . "'> Update</td>
		 </tr>";
		 }
		 echo "</table>"; 
?>