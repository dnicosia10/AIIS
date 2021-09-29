<?php  
//### start connection
$conn = mysql_connect("localhost","root")or die(mysql_error());
$db = mysql_select_db("aiis_db")or die(mysql_error()); 

$sql = "SELECT * FROM sdmo_audit";
$res = mysql_query($sql);

$data = mysql_num_rows($res);
echo '<span>'.$data.'</span>'; 
 
?>
<?php mysql_close($conn); ?>