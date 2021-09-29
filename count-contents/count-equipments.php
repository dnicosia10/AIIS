<?php  
//### start connection
$conn = mysql_connect("localhost",'root');
$db = mysql_select_db("aiis_db");

$sql = "SELECT * FROM equipment_info";
$res = mysql_query($sql);

$data = mysql_num_rows($res);
echo '<span>'.$data.'</span>'; 

mysql_close($conn);
?>
 