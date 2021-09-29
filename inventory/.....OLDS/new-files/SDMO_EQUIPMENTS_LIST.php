<?php 
$con = mysql_connect("localhost","root");
	$db = mysql_select_db("aiis_db");
	if (!$con) {
		echo "connection lost";
	}if (!$db) {
		echo "DB lost";
	}
$sql = mysql_query("SELECT * FROM equipment_info");
	echo "<table class='table table-bordered'> 
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Quantity</th>
			<th>Equipment type</th>
			<th>Equipment Usable</th>
			<th>Equipment Barrowed</th>
		</tr>";
	while ($row = mysql_fetch_array($sql)) {
		echo "<tr>
				<td>". $row['EQP_ID'] . "</td>
				<td>" . $row['EQP_NAME'] . "</td>
				<td>" . $row['EQP_QUANTITY'] . "</td>
				<td>" . $row['EQP_TYPE'] . "</td>
				<td>" . $row['EQP_USABLE'] . "</td>
				<td>" . $row['EQP_BARROWED'] . "</td>
			  </tr>"; 
	}echo "</table>";
?>
<!DOCTYPE html>
<html>
<head>
	 <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css"> 
	<title></title>
	<style type="text/css">
		table{
			width: 100%;
			border-style: none; 
		}
	</style>
</head>
<body>

</body>
</html>