<?php
if (!mysql_connect("localhost","root")) {
		echo "er";
}if (!mysql_select_db("aiis_db")) {
		echo "ror!";
}
$display = mysql_query("SELECT * FROM barrower_info WHERE BARR_STATUS='ON BORROWED' ");
echo "<table class='table table-bordered'>
		<tr>
			<th>ID Number</th>
			<th>Name</th>
			<th>Date</th>
			<th class='text-center'><span class='glyphicon glyphicon-cog'></span></th>
		</tr>";

	while ($row = mysql_fetch_array($display)) {
		$name = $row['BARR_FNAME'] . " " . $row['BARR_LNAME'];
		echo "<tr>
				<td>". $row['BARR_ID'] . "</td>
				<td>" . $name . "</td>
				<td>";
		$barr_id = $row['BARR_ID'];
		$display2 = mysql_query("SELECT * FROM barrower_date WHERE BARR_ID= '$barr_id' AND BARR_DATE_STATUS ='TRUE' ");
		while ($row2 = mysql_fetch_array($display2)) {
			echo $row2['BARR_DATE'];
			echo "</br>";
		}
		echo "</td>
				<td>
					<a href='borrower/SDMO_BARROWER_LIST_UPDATE.php?id=$row[BARR_ID]' class='btn btn-primary btn-xs'>Update</a>
				</td>
			  </tr>"; 
	}echo "</table>";
?>
<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
		    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="viewport" content="width=device-width, initial-scale=1"> 
		    <title>Borrowers List Update</title> 
		    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		    <link rel="stylesheet" type="text/css" href="../css/style.css"> 
			<style type="text/css">
				table{ 
					width: 100%;
					border-style: none;
				}
				img{
					width: 40px;
					height: 30px;
				}.td{
					width: 50px;
				}
				
			</style>
			
		<body>
		</body>
		</html>