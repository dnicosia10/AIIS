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
            <li class="active"><a href="../welcome.php"><span class="glyphicon glyphicon-stats"></span> Dashboard</a></li>
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
           <div class="col-md-6">
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
					
				} $rows= mysql_num_rows($sql1);
					
				if ($rows != 0) {
					echo "<div class = 'div1'>..</div>The following equipment already exist try to add quantity<a href='SDMO_EQUIPMENTS_ADD_QUANTITY.php?id=$i'> click here!</a>";
					echo "<script type='text/javascript'>alert('Equipment already exist!')</script>";
				}else{
					$sql = mysql_query("INSERT INTO equipment_info(EQP_NAME,EQP_DESC,EQP_TYPE,EQP_QUANTITY,EQP_USABLE)VALUES('$name','$description','$equip_types','$quantity','$quantity')");
					
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
           </div>
			
		<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading" id="index-panel-head">Add New Equipments</div>
			<div class="panel-body">
				<fieldset>
		<legend>Fill up Equipments Information</legend>
		<form action="" method="POST">
			
			Name <span class="error"><?php echo $error1 ?></span>
				<input type="text" name="name" placeholder="ex: Ball, Shoes, Armor..." class="form-control"></br>
			Quantity <span class="error"><?php echo $error2 ?></span>
				<input type="number" min="1" max="100" name="quantity" class="form-control"></br>
			Description <span class="error"><?php echo $error4 ?></span>
				<input type="text" name="description"  class="form-control"></br>
			Equipment Type <span class="error"><?php echo $error5 ?></span>
				<input type="text" name="type" placeholder="ex: Basketball, Volleyball ..." class="form-control"></br>
			
			Brand:<span class="error"><?php echo $error3 ?></span><input type="text" name="brand" class="form-control" ></br>
			Date:<span class="error"><?php echo $error6 ?></span><input type="date" name="date"  class="form-control"></br>
 
  		<input type="submit" name="submit" value="Add" class="btn btn-success">
		</form>
		</fieldset>
		</div>
		</div>	
		</div>
		</div>
		<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading" id="index-panel-head">Inventory</div>
			<div class="panel-body">
				<?php 
					$con = mysql_connect("localhost","root");
						$db = mysql_select_db("aiis_db");
						if (!$con) {
							echo "connection lost";
						}if (!$db) {
							echo "DB lost";
						}
					$sql = mysql_query("SELECT * FROM equipment_info");
						echo "<table class='table'> 
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Quantity</th>
								<th>Equipment type</th>
								<th>Equipment Usable</th>
								<th>Equipment Barrowed</th>
							</tr>";
						while ($row = mysql_fetch_array($sql)) {
							echo "
							<tr>
								<td>". $row['EQP_ID'] . "</td>
								<td>" . $row['EQP_NAME'] . "</td>
								<td>" . $row['EQP_QUANTITY'] . "</td>
								<td>" . $row['EQP_TYPE'] . "</td>
								<td>" . $row['EQP_USABLE'] . "</td>
								<td>" . $row['EQP_BARROWED'] . "</td>
							</tr>"; 
						}echo "</table>";
					?>
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
       	font-size: 0.9em;
       }
       .error{
       	color: red;
       }
    </style>
  </body>
</html>
