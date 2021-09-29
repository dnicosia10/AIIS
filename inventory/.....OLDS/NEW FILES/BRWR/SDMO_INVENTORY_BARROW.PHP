
<?php
if (!mysql_connect("localhost","root")) {
		echo "er";
}if (!mysql_select_db("aiis_db")) {
		echo "ror!";
}
$a = 2;
		$exp1 = mysql_query("UPDATE barrower_info SET BARR_WARNING ='ON' WHERE now() >= BARR_DDATE");
		mysql_query($exp1);
		$exp2 = mysql_query("UPDATE barrower_info SET BARR_WARNING ='OFF' WHERE now() >= BARR_DATE AND now() < BARR_DDATE");
		mysql_query($exp2);
$error1 = $error2 = $error3 = $error4 = $error5 = $error6 = $error7 = " ";
	if (isset($_POST['submit'])) { //restriction variable
	if (empty($_POST['fname'])) {
		$error1 = "*";
	}else{
		$error1 = "";
	}if (empty($_POST['mname'])) {
		$error2 = "*";
	}else{
		$error2 = "";
	}if (empty($_POST['lname'])) {
		$error4 =  "*";
	}else{
		$error4 = "";
	}if (empty($_POST['quantity'])) {
		$error5 =  "*";
	}else{
		$error5 = "";
	}if (empty($_POST['item_name'])) {
		$error6 =  "*";
	}else{
		$error6 = "";
	}if (empty($_POST['equip_types'])) {
		$error7 =  "*";
	}else{
		$error7 = "";
	}
}
?>
<!DOCTYPE html>
		<html>
		<head>
			<title>user</title>
			<style type="text/css">
				table{
					text-align: center;
					width: 100%;
					border-style: none;
				}
				.error{
					color: red;
				}
			</style>
		</head>
		<body><fieldset><legend>user barrowed</legend>
				<form method="POST" >
					Student Number:<span class='error'><?php echo $error5; ?></span><input type="text" name="stud_id" placeholder="2017102103"></br>
					Full name:<span class='error'><?php echo $error1; ?></span><input type="text" name="fname" placeholder="First name">  
							<span class='error'><?php echo $error2; ?></span><input type="text" name="mname" placeholder="Middle name"> 
							<span class='error'><?php echo $error4; ?></span><input type="text" name="lname" placeholder="Last Name"></br>
					Equipment name:<span class='error'><?php echo $error5; ?></span><input type="text" name="item_name">
							Quantity:<span class='error'><?php echo $error6; ?></span><input type="number" name="quantity" placeholder="Quantity"></br>
						Types<span class='error'><?php echo $error7; ?></span><select name="equip_types" value="" >
							<option value=""></option>
							<?php $sql = mysql_query("SELECT * FROM equipment_info");
							  while ($row = mysql_fetch_array($sql)) {
							  	 echo "	<option value=" . $row['EQP_TYPE'] . ">" . $row['EQP_TYPE'] ."</option>";
							  	 }	 
							?>
					   		
					  	</select></br>
						 	<input type="submit" name="submit" value="add">
				</form></fieldset>
		</body>
		</html>
<?php
if (isset($_POST['submit'])) {
	
if ( (!empty($_POST['fname'])) && (!empty($_POST['lname'])) && (!empty($_POST['mname'])) && (!empty($_POST['stud_id']))&& (!empty($_POST['item_name']))&& (!empty($_POST['quantity'])) && (!empty($_POST['equip_types'])) ) {
	
	$compare = mysql_query("SELECT * FROM equipment_info WHERE EQP_TYPE ='$_POST[equip_types]' AND EQP_NAME ='$_POST[item_name]'  ");
	while ($row = mysql_fetch_array($compare)) {
		$a = $row['EQP_NAME'];
		$b = $row['EQP_TYPE'];	
		$c = $row['EQP_QUANTITY'];
		$e = $row['EQP_USABLE'];
		$d = $row['EQP_ID'];
	}
	$id = $_POST['stud_id'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$mname = $_POST['mname'];
	$item_name = $_POST['item_name'];
	$quantity = $_POST['quantity'];
	$types = $_POST['equip_types'];

	
	if ( ($a == $item_name)&&($b == $types) ) {
		
	if ( ($e>=$quantity) && ($e != 0) ) {
		
		$usable = $e - $quantity;

		$update = mysql_query("UPDATE equipment_info SET  EQP_USABLE ='$usable' , EQP_BARROWED = EQP_BARROWED+'$quantity' WHERE EQP_ID = '$d' ");
		$insert = mysql_query("INSERT INTO barrower_info(BARR_ID,BARR_FNAME,BARR_LNAME,BARR_MNAME,BARR_DATE,BARR_ITEM_QUANTITY,BARR_ITEM_NAME,BARR_ITEM_TYPE,BARR_STATUS,EQP_ID,BARR_DDATE)
			VALUES('$id','$fname','$lname','$mname',now(),'$quantity','$item_name','$types','Pending','$d',DATE_ADD(now(), INTERVAL 3 day))");
		mysql_query($insert);
		echo "<script type='text/javascript'>alert('Successful barrowed!')</script>";
		$exp1 = mysql_query("UPDATE barrower_info SET BARR_WARNING ='ON' WHERE now() >= BARR_DDATE");
		mysql_query($exp1);
		$exp2 = mysql_query("UPDATE barrower_info SET BARR_WARNING ='OFF' WHERE now() >= BARR_DDATE");
		mysql_query($exp2);

		
}else{echo "<script type='text/javascript'>alert('not enough quantity!')</script>";}
}else{echo "<script type='text/javascript'>alert('item does not exist!')</script>";}
}else{
echo "<script type='text/javascript'>alert('Fill up all!')</script>";
}

}	

	$sql = mysql_query("SELECT * FROM equipment_info");
	echo "</br><table border=1><tr><td colspan=6>Equipment List</td></tr> <tr><td>Id Number</td><td>Name</td><td>Quantity</td><td>Equipment type</td><td>Equipment Usable</td><td>Equipment Barrowed</td></tr>";
	while ($row = mysql_fetch_array($sql)) {
		echo "<tr><td>". $row['EQP_ID'] . "</td><td>" . $row['EQP_NAME'] . "</td><td>" . $row['EQP_QUANTITY'] . "</td><td>" . $row['EQP_TYPE'] . 
		"</td><td>" . $row['EQP_USABLE'] . "</td><td>" . $row['EQP_BARROWED'] . "</td></tr>"; 
	}echo "</table>";
?>
