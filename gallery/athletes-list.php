<?php 
		//### ***************************** ###//  
		require_once'../configs/config.php';
		//### get all data from the database 
		 $sql = "SELECT * FROM athletes_info ORDER BY ATHLE_EVENT_CAT ASC";
		//### execute query
		 $res = mysql_query($sql);
		 //### echo table and table-headings  
				 echo "<table class='table table-hover text-center' style='width:100%;'>
						<tr id='t-heads'> 
							<th class='text-center'>STUDENT NUMBER</th>
							<th class='text-center'>NAME</th>
							<th class='text-center'>AGE</th>
							<th class='text-center'>EVENT</th>
							<th class='text-center'>CATEGORY</th>
							<th class='text-center'>DEPARTMENT</th>
							<th class='text-center'>COURSE</th>
							<th class='text-center'>YEAR LEVEL</th>
							<th class='text-center'>MOBILE #</th>
							<th class='text-center'><span class='glyphicon glyphicon-cog'></span> </th> 
				 	 	</tr>";
			//### fetch the data from the database
			//### as array[]	 	 	
			 while ($row = mysql_fetch_array($res)) 
			 { 
		 	 	echo"	<tr>	 
			 	 			<td>".$row['ATHLE_ID']."</td>
			 	 			<td>".$row['ATHLE_FNAME'].' '.$row['ATHLE_LNAME']."</td>
			 	 			<td>".$row['ATHLE_AGE']."</td>
			 	 			<td>".$row['ATHLE_EVENT_CAT']."</td>
					 		<td>".$row['ATHLE_SEX']."</td>
			 	 			<td>".$row['ATHLE_DEPT_NAME']."</td>
			 	 			<td>".$row['ATHLE_COURSE']."</td>
			 	 			<td>".$row['ATHLE_YR_LVL']."</td>
			 	 			<td>".$row['ATHLE_CONTNUM']."</td>
			 	 			<td><a class='btn btn-primary btn-xs'style='border-radius:0px;' href='update.php?id= $row[ATHLE_ID]'> Update</a></td>  
				  	  	</tr>"; 
			}
				echo "</table>"; 	 
		?>