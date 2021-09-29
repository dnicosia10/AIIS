<?php
	$con = mysql_connect("localhost","root");
	$db = mysql_select_db("aiis_db");
	if (!$con) {
		echo "connection lost";
	}if (!$db) {
		echo "DB lost";
	}
	 
	?>
<!DOCTYPE html>
<html>
<body>
<button><a href="update-info.php?id=<?php echo $id; ?>">Update Information</a> </button>
<button><a href="achievements.php?id=<?php echo $id; ?>">Add Achievements</a> </button>
<button><a href="injurt.php?id=<?php echo $id; ?>">Add Injury History</a> </button>

</body>
</html>
	<?php
	$id = $_GET['id'];
	if (isset($_POST['submit'])) {
		$name = $_POST['name'];
		$places = $_POST['places'];
		$event = $_POST['event'];
		$date = $_POST['date'];
		
	$insert = mysql_query("INSERT INTO athletes_info_achievements(ATHLE_ID,ACHIE_NAME,ACHIE_PLACES,ACHIE_EVENT,ACHIE_DATE)VALUES('$id','$name','$places','$event','$date')");
	mysql_query($insert);
	$desc = "The admin ADD Achievements information ID " . $id ;
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

<fieldset><legend>Add Athletes Achievements</legend><form action="" method="POST" >
	Name:<input type="text" name="name" required> </br>
	Places:<input type="text" name="places" required></br>
	Event:<input type="text" name="event" required></br>
	Date:<input type="date" name="date" required></br>
  	<input type="submit" name="submit" value="Add">
</form></fieldset>
	
</body>
</html>