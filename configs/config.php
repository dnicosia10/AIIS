<?php 
/* Attempt to connect to MySQL database */
$conn = mysql_connect("localhost","root");
$db = mysql_select_db("aiis_db");
// Check connection
if($conn == false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>