<?php
	$con = mysql_connect("localhost","root");
	$db = mysql_select_db("aiis_db");
	if (!$con) {
		echo "connection lost";
	}if (!$db) {
		echo "DB lost";
	}
	$id = $_GET['id'];
	?>
<!DOCTYPE html>
<html>
<body>
 

</body>
</html>
	<?php
	if (isset($_POST['submit'])) {
		$name = $_POST['name'];
		$place = $_POST['place'];
		$date = $_POST['date'];
		
	$insert = mysql_query("INSERT INTO athletes_info_injury(ATHLE_ID,INJ_NAME,INJ_PLACE,INJ_DATE)VALUES('$id','$name','$place','$date')");
	mysql_query($insert);
	$desc = "The admin ADD Injury information ID " . $id ;
	$act = "ADD";
	$audit = mysql_query("INSERT INTO sdmo_audit(AUDIT_DESC,AUDIT_ACTION,AUDIT_DATE)VALUES('$desc','$act',now())");

	echo "<script type='text/javascript'>alert('Successful!')</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<fieldset><legend>Add Athletes Injury</legend><form action="" method="POST" >
	Injury Name:<input type="text" name="name" required> </br>
	Place:<input type="text" name="place" required></br>
	Date:<input type="date" name="date" required></br>
  	<input type="submit" name="submit" value="Add">
</form></fieldset>
	
</body>
</html>