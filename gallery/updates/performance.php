<?php 
	$con = mysql_connect("localhost","root");
	$db = mysql_select_db("aiis_db");
	if (!$con) {
		echo "connection lost";
	}if (!$db) {
		echo "DB lost";
	}$a = "a";
	$error1 = $error2 = $error3 = $error4 = " ";
	if (isset($_POST['submit'])) { //restriction variable
	if (empty($_POST['id'])) {
		$error1 = "*";
	}else{
		$error1 = "";
	}if (empty($_POST['action'])) {
		$error2 = "*";
	}else{
		$error2 = "";
	}if (empty($_POST['events'])) {
		$error3 =  "*";
	}else{
		$error3 = "";
	}if (empty($_POST['date'])) {
		$error4 =  "*";	
	}else{
		$error4 = "";
	}
	
}
	
	if (isset($_POST['submit'])) {
		if ( (!empty($_POST['id'])) && (!empty($_POST['action'])) && (!empty($_POST['events'])) && (!empty($_POST['date'])) ) {

		$compare = mysql_query("SELECT * FROM athletes_info WHERE ATHLE_ID = '$_POST[id]' ");
		while ($row = mysql_fetch_array($compare)) {
		$a = $row['ATHLE_ID'];
		
	}

		$id = $_POST['id'];
		$action = $_POST['action'];
		$events = $_POST['events'];
		$date = $_POST['date'];

		if ($a == $id) {
			$insert = mysql_query("INSERT INTO athletes_info_performance(ATHLE_ID,PERF_ACTION,PERF_EVENTS,PERF_DATE)VALUES('$id','$action','$events','$date')");
			mysql_query($insert);
			echo "<script type='text/javascript'>alert('Successful!')</script>";

		}else	{echo "<script type='text/javascript'>alert('Athletes don't exist!')</script>";}
		
			
		
		}else{ echo "<script type='text/javascript'>alert('Fill up all!')</script>"; }
	
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Performance</title>
	<style type="text/css">
	.error{
		color:red;
	}
	input{
		text-align: center;
		
	}table{
					text-align: center;
					width: 100%;
					border-style: none;
				}
	.td{
		width: 5%;
	}
	</style>
</head>
<body>
<fieldset><legend>Fill up Performance Information</legend><form action="" method="POST">
	
	Athletes ID:<span class="error"><?php echo $error1 ?></span><input type="text" name="id"> </br>
	Action:<span class="error"><?php echo $error2 ?></span><input type="text" name="action"></br>
	Events:<span class="error"><?php echo $error3 ?></span><input type="text" name="events"></br>
	Date:<span class="error"><?php echo $error4 ?></span><input type="date" name="date"></br>
	
	
  	<input type="submit" name="submit" value="Add">
</form></fieldset>
</body>
</html>
<?php
	$display = mysql_query("SELECT * FROM athletes_info_performance ");
	echo "<table border=1>
			<td>Student Number</td>
			<td>Action</td>
			<td>Events</td>
			<td>Date</td>";
	while ($row = mysql_fetch_array($display)) {
		echo "<tr>
				<td>" . $row['ATHLE_ID'] . "</td>
				<td>" . $row['PERF_ACTION'] . "</td>
				<td>" . $row['PERF_EVENTS'] . "</td>
				<td>" . $row['PERF_DATE'] . "</td>
			 </tr>";
	}echo "</table>";
?>