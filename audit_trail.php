<?php
	 $con = mysql_connect("localhost","root");
	$db = mysql_select_db("aiis_db");
	if (!$con) {
		echo "connection lost";
	}if (!$db) {
		echo "DB lost";
	} 
	$sql = mysql_query("SELECT * FROM sdmo_audit");
		echo "<table class='table table-hover'>
			<tr id='t-head'>
				<th>No</th>
				<th>Description</th>
				<th>Action</th>
				<th>Date</th>  
			</tr>";
		while ($row = mysql_fetch_array($sql)) {
			echo "<tr>
				<td>" . $row['AUDIT_NO'] . "</td>
				<td>" . $row['AUDIT_DESC'] . "</td>
				<td>" . $row['AUDIT_ACTION'] . "</td>
				<td>" . $row['AUDIT_DATE'] . "</td>
				 </tr>";
		}
		echo "</table>";
?>
<!DOCTYPE html>
		<html>
		<head>
			<title>barrower list</title>
			<style type="text/css">
				table{
					text-align: center;
					width: 100%;
					border-style: none;
				}
				img{
					width: 40px;
					height: 30px;
				}.td{
					width: 50px;
				}
				
			</style>
		</head>
		<body>
		</body>
		</html>