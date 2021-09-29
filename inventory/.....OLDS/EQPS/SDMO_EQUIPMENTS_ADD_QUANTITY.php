<?php
	$con = mysql_connect("localhost","root");
	$db = mysql_select_db("aiis_db");
	if (!$con) {
		echo "connection lost";
	}if (!$db) {
		echo "DB lost";
	}

	$error2 = $error3 = $error4 = $error5 = " ";
	if (isset($_POST['submit'])) { //restriction variable
	if (empty($_POST['quantity'])) {
		$error2 = "*";
		}else{$error2 = "";}
	if (empty($_POST['description'])) {
		$error3 = "*";
		}else{$error3 = "";}
	if (empty($_POST['brand'])) {
		$error4 = "*";
		}else{$error4 = "";}
	if (empty($_POST['date'])) {
		$error5 = "*";
		}else{$error5 = "";}
	
}

	$var = $_GET['id'];
	$sql = mysql_query("SELECT * FROM equipment_info WHERE EQP_ID = '$var'");
	echo "<table border=1> <tr><td>Name</td><td>Equipment type</td><td>Quantity</td>";
	while ($row = mysql_fetch_array($sql)) {
		echo "<tr><td>" . $row['EQP_NAME'] . "</td><td>" . $row['EQP_TYPE'] . "</td><td>" . $row['EQP_QUANTITY'] . "</td></tr>"; 
		$q = $row['EQP_QUANTITY'];
		$name = $row['EQP_NAME'];
		$type = $row['EQP_TYPE'];
	}
	echo "</table>";

	if (isset($_POST['submit'])) {
		if ((!empty($_POST['quantity']))&&(!empty($_POST['description']))&&(!empty($_POST['brand']))&&(!empty($_POST['date'])) ) {

			$quantity = $_POST['quantity'];
			$Quan = $q + $quantity;
			$description = $_POST['description'];
			$brand = $_POST['brand'];
			$date = ucfirst(strtolower($_POST['date']));

	
		$sql2 = mysql_query("INSERT INTO equipment_item(EQP_ID,ITEM_NAME,ITEM_BRAND,ITEM_QUANTITY,ITEM_DATE)VALUES('$var','$name','$brand','$quantity','$date')");

		
		$UpdateQuery = mysql_query("UPDATE equipment_info SET EQP_QUANTITY='$Quan' , EQP_USABLE = '$Quan' WHERE EQP_ID='$var'");
		mysql_query($UpdateQuery, $con);

		$desc = "The admin update in Equipment information quantity ID " . $var ;
		$act = "UPDATED";
		$audit = mysql_query("INSERT INTO sdmo_audit(AUDIT_DESC,AUDIT_ACTION,AUDIT_DATE)VALUES('$desc','$act',now())");

		echo "<script type='text/javascript' onClick='window.location='SDMO_EQUIPMENTS_LIST.php';'>alert('Successful added Quantity')</script>";
		echo "<div class = 'div2' >..</div>";
		

		}
		else{
		echo "<script type='text/javascript'>alert('Fill all')</script>";
		echo "<div class = 'div1' >..</div>";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Quantity</title>
	<style type="text/css">
		table{
			width: 100%;
			border-style: none;
			text-align: center;
		}.error{
		color:red;
	}.div1{
		width: 100%;
		background-color: red;
		color: red;

	}.div2{
		
		width: 100%;
		background-color: green;
		color:green;
	}
	</style>
</head>
<body>
 <fieldset><legend>Add Quantity</legend><form action="" method="POST">
	
	
	Quantity:<span class="error"><?php echo $error2 ?></span><input type="number" min="1" name="quantity"></br>
	Description:<span class="error"><?php echo $error3 ?></span><input type="text" name="description" ></br>
	Brand:<span class="error"><?php echo $error4 ?></span><input type="text" name="brand" ></br>
	Date:<span class="error"><?php echo $error5 ?></span><input type="date" name="date" ></br>
	</br>
	
  	<input type="submit" name="submit" value="Add">
</form></fieldset>
</body>
</html>
