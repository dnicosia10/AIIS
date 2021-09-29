<?php 
	$con = mysql_connect("localhost","root");
	$db = mysql_select_db("aiis_db");
	if (!$con) {
		echo "connection lost";
	}if (!$db) {
		echo "DB lost";
	}
	$sql = mysql_query("SELECT * FROM equipment_info");
	echo "<table border=1> <tr><td>Id Number</td><td>Name</td><td>Quantity</td><td>Equipment type</td><td>Equipment Usable</td><td>Equipment Barrowed</td><td class='td'>Action</td></tr>";
	while ($row = mysql_fetch_array($sql)) {
		echo "<tr><td>". $row['EQP_ID'] . "</td><td>" . $row['EQP_NAME'] . "</td><td>" . $row['EQP_QUANTITY'] . "</td><td>" . $row['EQP_TYPE'] . 
		"</td><td>" . $row['EQP_USABLE'] . "</td><td>" . $row['EQP_BARROWED'] . "</td><td><a href='SDMO_EQUIPMENTS_UPDATE_INFO.php?id=$row[EQP_ID]'>UPDATE</a>  <a href='SDMO_EQUIPMENTS_UPDATE_INFO_ALL.php?id=$row[EQP_ID]'>VIEW</a></td></tr>"; 
	}echo "</table>";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		table{
			width: 100%;
			border-style: none;
			text-align: center;
		}img{
			width: 30px;
			height: 40px;
		}.td{
			width: 30px;
		}
	</style>
</head>
<body>

</body>
</html>
