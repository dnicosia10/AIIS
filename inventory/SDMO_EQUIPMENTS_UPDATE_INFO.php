<!DOCTYPE html>  
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">  
    <link href="../css/index_style.css" rel="stylesheet">  
    <link href="../css/style.css" rel="stylesheet"> 
    <title>Dashboard</title> 
  </head> 
  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
     <a class="navbar-brand" href="#"><img src="../system-images/aiis-logo.png"></a>
      <div class="container-fluid pull-right">
        <div class="navbar-header">
           <ul class="nav nav-pills"> 
            <li role="presentation"><a href="login/user_logout.php">Logout</a></li>
          </ul>
        </div> 
      </div>
    </nav> 

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="welcome.php"><span class="glyphicon glyphicon-stats"></span> Dashboard</a></li>
              <ul class="nav nav-sidebar" id="sub-nav">
                <li><a href="../calendar/view-tasks.php" id="calendar" role='button'><span class="glyphicon glyphicon-triangle-right" ></span> Calendar</a></li>
                <li><a href="../borrower/SDMO_BORROWER_REG.php" id="borrower"><span class="glyphicon glyphicon-triangle-right"></span> Borrowers Page</a></li>
                <li><a href="../attendance/time-in.php"><span class="glyphicon glyphicon-triangle-right"></span> Attendance Page</a></li>  
              </ul> 
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="../gallery.php"><span class="glyphicon glyphicon-picture"></span> Athletes</a></li>
             <ul class="nav nav-sidebar" id="sub-nav">
                <li><a href="../gallery.php"><span class="glyphicon glyphicon-triangle-right"></span> Gallery</a></li>
                <li><a href="athletes-add.php"><span class="glyphicon glyphicon-triangle-right"></span> Add Informations</a></li>
                <li><a href="list.php"><span class="glyphicon glyphicon-triangle-right"></span> Update Informations</a></li>  
              </ul> 
          </ul>
           <ul class="nav nav-sidebar">
            <li><a href="SDMO_EQUIPMENTS_ADD.php"><span class="glyphicon glyphicon-cog"></span> Inventory</a></li>
             <ul class="nav nav-sidebar" id="sub-nav">
                <li><a href="SDMO_EQUIPMENTS_LIST.php"><span class="glyphicon glyphicon-triangle-right"></span> Equipments</a></li>
                <li><a href="SDMO_EQUIPMENTS_UPDATE.php"><span class="glyphicon glyphicon-triangle-right"></span> Browse Items</a></li> 
              </ul> 
          </ul> 
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main"> 
          <div class="row placeholders">  
           <div class="panel panel-default" style="margin-top: -10px;">
           <div class="panel-heading" id="index-panel-head">Current Inventory</div>
              <div class="panel-body" >
 <?php	
 	$con = mysql_connect("localhost","root");
	$db = mysql_select_db("aiis_db");
	if (!$con) {
		echo "connection lost";
	}if (!$db) {
		echo "DB lost";
	}

	$id = $_GET['id'];
	$display = mysql_query("SELECT * FROM equipment_info WHERE EQP_ID = '$id'");
	echo "<table class='table'> 
			<tr>
				<td>Id Number</td>
				<td>Name</td>
				<td>Quantity</td>
				<td>Equipment type</td>
				<td>Equipment Usable</td>
				<td>Equipment Barrowed</td>
			</tr>";
	while ($row = mysql_fetch_array($display)) {
		echo "<tr>
				<td>". $row['EQP_ID'] . "</td>
				<td>" . $row['EQP_NAME'] . "</td>
				<td>" . $row['EQP_QUANTITY'] . "</td>
				<td>" . $row['EQP_TYPE'] . "</td>
				<td>" . $row['EQP_USABLE'] . "</td>
				<td>" . $row['EQP_BARROWED'] . "</td>
			 </tr>"; 
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
	<div class="col-md-5">
		<fieldset>
	<legend>Update Equipments Information</legend>
	<form action="" method="POST">
	
	Name:<span class="error"><?php echo $error1 ?></span>
		<input type="text" name="name" placeholder="<?php echo $name; ?>" class="form-control"></br>
	Quantity:<span class="error"><?php echo $error2 ?></span>
		<input type="number" min="1" name="quantity" placeholder="<?php echo $quantity; ?>" class="form-control"></br>
	Equipment Type:<span class="error"><?php echo $error3 ?></span>
		<input type="text" name="type" placeholder="<?php echo $type; ?>" class="form-control"></br>
	</br></br>
	
  	<input type="submit" name="submit" value="Update" class="btn btn-primary">
</form></fieldset>
	</div>

<fieldset><legend>Add Equipments Quantity</legend><form action="" method="POST">
ADD Quantity:<span class="error"><?php echo $error4 ?></span><input type="number" name="addquantity" class="form-control" ></br>
Description:<span class="error"><?php echo $error5 ?></span><input type="text" name="description"  class="form-control"></br>
	Brand:<span class="error"><?php echo $error6 ?></span><input type="text" name="brand"  class="form-control"></br>
	Date:<span class="error"><?php echo $error7 ?></span><input type="date" name="date"  class="form-control"></br>
	<input type="submit" name="addbttn" value="Add" class="btn btn-success">
</form></fieldset>
 </div>
           </div>  
          </div>  
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="scripts/jquery.min.js"></script>
    <script src="scripts/bootstrap.min.js"></script> 
    <script type="text/javascript">
      $(document).ready(function(){
        $("#calendar").click(function(){
          $("div > #calendar-pop").css
            (
              'background-color'," #ff5c33",
              'width','200px'  
            ).fadeOut('200'); 
        });  
      });

    </script>
    <style type="text/css">
      ul#cal-tabs > li > a{
        color: #333;
        width: 150px;
        margin-left: 30px;
        transition: 0.3s; 
        background-color: #00e6e6;
        border-radius: 5px;
      }
       ul#cal-tabs > li > a:hover{
          color: #fff;
       }
       td{
       	font-size: 1em;
       }
       .error{
       	color: red;
       }
    </style>
  </body>
</html>
