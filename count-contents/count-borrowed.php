<?php
	$con = mysql_connect("localhost","root");
	$db = mysql_select_db("aiis_db");
	 

	$a= "";
	$number = mysql_query("SELECT * FROM equipment_info ");
 
	while ($row = mysql_fetch_array($number)) {
		$a = $a + $row['EQP_BARROWED'];

	}

	echo  $a; //### total borrowed equipments
?>