<?php	$con = mysql_connect("localhost","root");
	$db = mysql_select_db("aiis_db");
	if (!$con) {
		echo "connection lost";
	}if (!$db) {
		echo "DB lost";
	}

	$id = $_GET['id'];
	$display = mysql_query("SELECT * FROM equipment_info WHERE EQP_ID = '$id'");
	echo "<table border=1> <tr><td>Id Number</td><td>Name</td><td>Quantity</td><td>Equipment type</td><td>Equipment Usable</td><td>Equipment Barrowed</td></tr>";
	while ($row = mysql_fetch_array($display)) {
		echo "<tr><td>". $row['EQP_ID'] . "</td><td>" . $row['EQP_NAME'] . "</td><td>" . $row['EQP_QUANTITY'] . "</td><td>" . $row['EQP_TYPE'] . 
		"</td><td>" . $row['EQP_USABLE'] . "</td><td>" . $row['EQP_BARROWED'] . "</td></tr>"; 
		$name = $row['EQP_NAME'];
		$quantity = $row['EQP_QUANTITY'];
		$type = $row['EQP_TYPE'];
		
	}echo "</table>";

	$error1 = $error2 = $error3 = $error4 = $error5 = $error6 = $error7 = " ";
	if (isset($_POST['submit'])) { //restriction variable
	if (empty($_POST['name'])) {
		$error1 = "*";
	}else{
		$error1 = "";
	}if (empty($_POST['quantity'])) {
		$error2 = "*";
	}else{
		$error2 = "";
	}if (empty($_POST['type'])) {
		$error3 =  "*";	
	}else{
		$error3 = "";
	}
	
	}
	if (isset($_POST['addbttn'])) {
	if (empty($_POST['addquantity'])) {
		$error4 = "*";
	}else{
		$error4 = "";
	}if (empty($_POST['description'])) {
		$error5 = "*";
	}else{
		$error5 = "";
	}if (empty($_POST['brand'])) {
		$error6 =  "*";	
	}else{
		$error6 = "";
	}
	if (empty($_POST['date'])) {
		$error7 =  "*";	
	}else{
		$error7 = "";
	}
	}

	if (isset($_POST['submit'])) {
		
	
	if ( (!empty($_POST['name'])) && (!empty($_POST['type'])) && (!empty($_POST['quantity'])) ) {
				
		$Quan = $_POST['quantity'];
		$eqp_name = $_POST['name'];
		$eqp_type = $_POST['type'];
		$update = mysql_query("UPDATE equipment_info SET EQP_NAME = '$eqp_name' , EQP_QUANTITY='$Quan' , EQP_USABLE = '$Quan' , EQP_TYPE = '$eqp_type' WHERE EQP_ID='$id'");
		mysql_query($UpdateQuery,$update, $con);
		echo "<script type='text/javascript' onClick='window.location.reload(true)'>alert('Successful UPDATE Equipment')</script>";
		
		$desc = "The admin update in Equipment information ID " . $id ;
		$act = "UPDATED";
		$audit = mysql_query("INSERT INTO sdmo_audit(AUDIT_DESC,AUDIT_ACTION,AUDIT_DATE)VALUES('$desc','$act',now())");

		header("location:SDMO_EQUIPMENTS_UPDATE_INFO.php?id=33");
	}else{
		echo "<script type='text/javascript' >alert('fill up all!')</script>";
	}
}
	

	$sql = mysql_query("SELECT * FROM equipment_info WHERE EQP_ID = '$id'");
	while ($row = mysql_fetch_array($sql)) {
		
		$q = $row['EQP_QUANTITY'];
	}

	if (isset($_POST['addbttn'])) {
		if ( (!empty($_POST['addquantity']))&&(!empty($_POST['description']))&&(!empty($_POST['brand']))&&(!empty($_POST['date'])) ) {
		$addquantity = $_POST['addquantity'];
		$Quans = $q + $addquantity;
		$brand = $_POST['brand'];
		$date = $_POST['date'];

		$UpdateQuery = mysql_query("UPDATE equipment_info SET EQP_QUANTITY='$Quans' , EQP_USABLE = '$Quans' WHERE EQP_ID='$id'");

		$sql2 = mysql_query("INSERT INTO equipment_item(EQP_ID,ITEM_NAME,ITEM_BRAND,ITEM_QUANTITY,ITEM_DATE)VALUES('$id','$name','$brand','$addquantity','$date')");
		$desc = "The admin update in Equipment information quantity ID " . $id ;
		$act = "UPDATED";
		$audit = mysql_query("INSERT INTO sdmo_audit(AUDIT_DESC,AUDIT_ACTION,AUDIT_DATE)VALUES('$desc','$act',now())");

		header("location:SDMO_EQUIPMENTS_UPDATE_INFO.php?id=33");
		}else{echo "<script type='text/javascript' '>alert('fill it up!')</script>";}
		
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
	
	Name:<span class="error"><?php echo $error1 ?></span><input type="text" name="name" placeholder="<?php echo $name; ?>"></br>
	Quantity:<span class="error"><?php echo $error2 ?></span><input type="number" min="1" name="quantity" placeholder="<?php echo $quantity; ?>"></br>
	Equipment Type:<span class="error"><?php echo $error3 ?></span><input type="text" name="type" placeholder="<?php echo $type; ?>"></br>
	</br></br>
	
  	<input type="submit" name="submit" value="Update">
</form></fieldset>
<fieldset><legend>Add Equipments Quantity</legend><form action="" method="POST">
ADD Quantity:<span class="error"><?php echo $error4 ?></span><input type="number" name="addquantity" ></br>
Description:<span class="error"><?php echo $error5 ?></span><input type="text" name="description" ></br>
	Brand:<span class="error"><?php echo $error6 ?></span><input type="text" name="brand" ></br>
	Date:<span class="error"><?php echo $error7 ?></span><input type="date" name="date" ></br>
	<input type="submit" name="addbttn" value="Add">
</form></fieldset>
</body>
</html>