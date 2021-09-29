<?php 
	$id = $_GET['view'];
	$sql = mysql_query("SELECT * FROM athletes_info WHERE ATHLE_ID = '$id'");

	while ($row =mysql_fetch_array($sql)) {
		 echo $row[''];
	}
?>