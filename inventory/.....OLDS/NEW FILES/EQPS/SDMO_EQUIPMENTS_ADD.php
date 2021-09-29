<?php
	$server = "127.0.0.1";
	$user = "root";
	$con = mysql_connect("$server","$user");
	$db = mysql_select_db("aiis_db");
	if (!$con) {
		echo "1";
	}if (!$db) {
		echo "2";
	}
	$error1 = $error2 = $error3 = $error4 = $error5 = $error6 =" ";
	if (isset($_POST['submit'])) { //restriction variable
	if (empty($_POST['name'])) {
		$error1 = "*";
	}else{
		$error1 = "";
	}if (empty($_POST['quantity'])) {
		$error2 = "*";
	}else{
		$error2 = "";
	}if (empty($_POST['description'])) {
		$error4 =  "*";
	}else{
		$error4 = "";
	}if (empty($_POST['type'])) {
		$error5 =  "*";	
	}else{
		$error5 = "";
	}if (empty($_POST['brand'])) {
		$error3 =  "*";
	}else{
		$error3 = "";
	}if (empty($_POST['date'])) {
		$error6 =  "*";	
	}else{
		$error6 = "";
	}

//condition for redundancy restriction
	
	$i = "";
if ( (!empty($_POST['name'])) && (!empty($_POST['quantity'])) && (!empty($_POST['description'])) && (!empty($_POST['type']))&& (!empty($_POST['brand'])) && (!empty($_POST['date'])) ) {
	$name = $_POST['name'];
	$name = ucfirst(strtolower($name));
	$quantity = $_POST['quantity'];
	$equip_types = $_POST['type'];
	$description = $_POST['description'];
	$equip_types = ucfirst(strtolower($equip_types));
	$description = ucfirst(strtolower($description));
	$brand = ucfirst(strtolower($_POST['brand']));
	$date = $_POST['date'];
	$sql1 = mysql_query("SELECT * FROM equipment_info WHERE EQP_NAME = '$name' AND EQP_TYPE = '$equip_types'  ");
	while ($row = mysql_fetch_array($sql1)) {
		$a = $row['EQP_TYPE'];
		$b = $row['EQP_NAME'];
		$q = $row['EQP_QUANTITY'];
		$i = $row['EQP_ID'];
		 $rows=mysql_num_rows($sql1);
	}
		
	if ($rows != 0) {
		echo "<div class = 'div1'>..</div>The following equipment already exist try to add quantity<a href='SDMO_EQUIPMENTS_ADD_QUANTITY.php?id=$i'> click here!</a>";
		echo "<script type='text/javascript'>alert('Equipment already exist!')</script>";
	}else{
		$sql = mysql_query("INSERT INTO equipment_info(EQP_NAME,EQP_DESC,EQP_TYPE,EQP_QUANTITY,EQP_USABLE)VALUES('$name','$quantity','$equip_types','$quantity','$description')");
		
		$sql1 = mysql_query("SELECT * FROM equipment_info WHERE EQP_NAME = '$name' AND EQP_TYPE = '$equip_types'  ");
	while ($row = mysql_fetch_array($sql1)) {
		
		$i = $row['EQP_ID'];
	}
		$sql2 = mysql_query("INSERT INTO equipment_item(EQP_ID,ITEM_NAME,ITEM_BRAND,ITEM_QUANTITY,ITEM_DATE)VALUES('$i','$name','$brand','$quantity','$date')");

		$desc = "The admin ADD Equipment";
		$act = "ADD";

		$audit = mysql_query("INSERT INTO sdmo_audit(AUDIT_DESC,AUDIT_ACTION,AUDIT_DATE)VALUES('$desc','$act',now())");

		echo "<script type='text/javascript' onClick='window.location.reload(true)'>alert('Successful added Equipments')</script>";
		echo "<div class = 'div2' >..</div>";
	
	}
	
		}else
		echo "<script type='text/javascript'>alert('not added')</script>";
					//header("location:SDMO_EQUIPMENTS_ADD.php");
			
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
<fieldset><legend>Fill up Equipments Information</legend><form action="" method="POST">
	
	Name:<span class="error"><?php echo $error1 ?></span><input type="text" name="name" placeholder="ex: Ball, Shoes, Armor..."></br>
	Quantity:<span class="error"><?php echo $error2 ?></span><input type="number" min="1" max="100" name="quantity"></br>
	Description:<span class="error"><?php echo $error4 ?></span><input type="text" name="description" ></br>
	Equipment Type:<span class="error"><?php echo $error5 ?></span><input type="text" name="type" placeholder="ex: Basketball, Volleyball ..."></br>
	
	Brand:<span class="error"><?php echo $error3 ?></span><input type="text" name="brand" ></br>
	Date:<span class="error"><?php echo $error6 ?></span><input type="date" name="date" ></br>
</br>
	
  	<input type="submit" name="submit" value="Add">
</form></fieldset>
</body>
</html>