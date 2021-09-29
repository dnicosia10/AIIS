<?php	$con = mysql_connect("localhost","root");
	$db = mysql_select_db("aiis_db");
	if (!$con) {
		echo "connection lost";
	}if (!$db) {
		echo "DB lost";
	}
	$error1 = " ";
	if (isset($_POST['submit'])) { //restriction variable
	if (empty($_POST['stud_no'])) {
		$error1 = "*";
	}else{
		$error1 = "";
	}

	$a = '';
	if ( !empty($_POST['stud_no']) ) {
		$c = $_POST['stud_no'];
		$display = mysql_query("SELECT * FROM barrower_info WHERE BARR_ID = '$c' ");
		while ($row = mysql_fetch_array($display)) {
		$a = $row['BARR_ID'];
		
		}
		if ($c == $a) {
		$stud_no = $_POST['stud_no'];
		$insert = mysql_query("INSERT INTO barrower_date(BARR_ID,BARR_DATE,BARR_DATE_DEADL,BARR_DATE_WARNING,BARR_DATE_STATUS)VALUES($stud_no,now(),DATE_ADD(now(), INTERVAL 3 day),'OFF','TRUE')");
		mysql_query($insert);

		
		$display = mysql_query("SELECT * FROM barrower_date WHERE BARR_ID = '$c' AND BARR_DATE_STATUS = 'TRUE' ");
		while ($row = mysql_fetch_array($display)) {
		$date = $row['BARR_DATE_ID'];
		
		}

		header("location:SDMO_BARROWER_LOG_EQP.PHP?id=" . $stud_no ."&id2=" . $date ."");
		echo "<script type='text/javascript' onClick='window.location.reload(true)'>alert('Successful Date in')</script>";
		}else {echo "<script type='text/javascript' >alert('student number dont exist!')</script>";
		echo '<a href="SDMO_BARROWER_LOG.php">Register</a>';}
	}else{echo "<script type='text/javascript' >alert('fill up all!')</script>";}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		table{
			width: 100%;
			border-style: none;
			text-align: center;
		}
		.error{
			color: red;
		}
	</style>
</head>
<body>

	<fieldset><legend>Update Equipments Information</legend><form action="" method="POST">
	
	Student Number:<span class="error"><?php echo $error1 ?></span><input type="text" name="stud_no" ></br>
	</br>
  	<input type="submit" name="submit" value="Ok">

</body>
</html>

