<?php
$con = mysql_connect("localhost","root");
	$db = mysql_select_db("aiis_db");
	if (!$con) {
		echo "connection lost";
	}if (!$db) {
		echo "DB lost";
	}

	$id = $_GET['id'];
	$display = mysql_query("SELECT * FROM equipment_info WHERE EQP_ID = '$id'");
	echo "<table border=1> <tr><td>Id Number</td><td>Name</td><td>Quantity</td><td>Equipment type</td><td>Equipment Usable</td><td>Equipment Barrowed</td></tr>";
	while ($row = mysql_fetch_array($display)) {
		echo "<tr><td>". $row['EQP_ID'] . "</td><td>" . $row['EQP_NAME'] . "</td><td>" . $row['EQP_QUANTITY'] . "</td><td>" . $row['EQP_TYPE'] . 
		"</td><td>" . $row['EQP_USABLE'] . "</td><td>" . $row['EQP_BARROWED'] . "</td></tr>"; 
		$name = $row['EQP_NAME'];
		$quantity = $row['EQP_QUANTITY'];
		$type = $row['EQP_TYPE'];
		
	}echo "</table>";
	echo "ADD HISTORY ";
	$display = mysql_query("SELECT * FROM equipment_item WHERE EQP_ID = '$id'");
	echo "<table border=1> <tr><td>Id Number</td><td>Name</td><td>Brand</td><td>Quantity</td><td>Date</td></tr>";
	while ($row = mysql_fetch_array($display)) {
		echo "<tr><td>". $row['ITEM_ID'] . "</td><td>" . $row['ITEM_NAME'] . "</td><td>" . $row['ITEM_BRAND'] . "</td><td>" . $row['ITEM_QUANTITY'] . 
		"</td><td>" . $row['ITEM_DATE'] . "</td></tr>"; 
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
		}
		.error{
			color: red;
		}
	</style>
</head>
<body>

</body>
</html>