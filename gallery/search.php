<?php 
require_once'../configs/config.php';

$name = $_POST['name'];

$sql =   "SELECT * FROM athletes_info WHERE ATHLE_FNAME  LIKE '%$name%' OR ATHLE_LNAME  LIKE '%$name%'  " ;
$res  = mysql_query($sql); 
$array = array();
 while ($row = mysql_fetch_array($res)) 
 { 	 
 
          echo  "<a id='search-term' href='athletes-info.php?view=$row[ATHLE_ID]'>".$row['ATHLE_FNAME'].'  '.$row['ATHLE_LNAME']."</a><br>";
     
 }

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<style type="text/css"> 
	#search-term{
		font-size: 1.2em;
	}	 

</style>
</body>
</html>
 

 		