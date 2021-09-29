<?php  
//### start connection 
include_once'configs/config.php';

$sql = "SELECT * FROM athletes_info";
$res = mysql_query($sql);

$data = mysql_num_rows($res);
echo '<span>'.$data.'</span>'; 
 
?>
<?php mysql_close($conn); ?>