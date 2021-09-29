<?php   
//### start connection
$conn = mysql_connect("localhost",'root');
$db = mysql_select_db("aiis_db");


$sql = "SELECT * FROM sdmo_calendar";
$res = mysql_query($sql);

$data = mysql_num_rows($res);
echo '<span>'.$data.'</span>'; 
 
?>
<?php mysql_close($conn); ?>