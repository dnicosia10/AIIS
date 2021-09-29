<?php 
	
	$con = mysql_connect("localhost","root");
	$db = mysql_select_db("aiis_db");
	if (!$con) {
		echo "connection lost";
	}if (!$db) {
		echo "DB lost";
	}
	$string = "";
	echo "<script type='text/javascript'>alert('Hello Admin You're now in Update!)</script>";
	$error1 = $error2 = $error3 = $error4 = $error5 = " ";
	if (isset($_POST['submit'])) { //restriction variable
	if (empty($_POST['title'])) {
		$error1 = "*";
	}else{
		$error1 = "";
	}if (empty($_POST['event'])) {
		$error2 = "*";
	}else{
		$error2 = "";
	}if (empty($_POST['start'])) {
		$error3 =  "*";
	}else{
		$error3 = "";
	}if (empty($_POST['end'])) {
		$error4 =  "*";	
	}else{
		$error4 = "";
	}if (empty($_POST['status'])) {
		$error5 =  "*";	
	}else{
		$error5 = "";
	}
		$compared = mysql_query("SELECT * FROM sdmo_calendar WHERE CAL_START = '$_POST[start]' ");
		while ($row = mysql_fetch_array($compared)) {
			$string = $row['CAL_START'];
		}
		 
		$title = $_POST['title'];
		$event = $_POST['event'];
		$start = $_POST['start'];
		$end = $_POST['end'];
		$status = $_POST['status'];

		if ($string == $_POST['start']) {
			echo "<script type='text/javascript'>alert('the Date already occupied!')</script>";
		}else{
			$insert = mysql_query("UPDATE  sdmo_calendar SET CAL_TITLE ='$title',CAL_EVENT='$event',CAL_START='$start',CAL_END='$end',CAL_STATUS ='$status' WHERE CAL_NO='$_GET[a]' ");
		mysql_query($insert);
		echo "<script type='text/javascript'>alert('Successful!')</script>";
		
		$desc = "The admin Update in calendar name " . $title ;
		$act = "UPDATED";
		$audit = mysql_query("INSERT INTO sdmo_audit(AUDIT_DESC,AUDIT_ACTION,AUDIT_DATE)VALUES('$desc','$act',now())");
		}	
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>inventory</title>
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
<fieldset><legend>Update Calendar Information</legend><form action="" method="POST">
	
	Title:<span class="error"><?php echo $error1 ?></span><input type="text" name="title" </br>
	Event Category:<span class="error"><?php echo $error2 ?></span><input type="text" name="event"></br>
	Date Start:<span class="error"><?php echo $error3 ?></span><input type="date" name="start"></br>
	Date End:<span class="error"><?php echo $error4 ?></span><input type="date" name="end"></br>
	Status:<span class="error"><?php echo $error4 ?></span><input type="text" name="status"></br>
	
	
  	<input type="submit" name="submit" value="Add">
</form></fieldset>
</body>
</html>
<?php
	$display = mysql_query("SELECT * FROM sdmo_calendar WHERE CAL_NO ='$_GET[a]' ");
	echo "<table border=1>
			<td>Number</td>
			<td>Title</td>
			<td>Event</td>
			<td>Date Start</td>
			<td>Date End</td>
			<td>Status</td>";
	while ($row = mysql_fetch_array($display)) {
		echo "<tr>
			<td>" . $row['CAL_NO'] . "</td>
			<td>" . $row['CAL_TITLE'] . "</td>
			<td>" . $row['CAL_EVENT'] . "</td>
			<td>" . $row['CAL_START'] . "</td>
			<td>" . $row['CAL_END'] . "</td>
			<td>" . $row['CAL_STATUS'] . "</td>
			</tr>";
	}echo "</table>";

?>