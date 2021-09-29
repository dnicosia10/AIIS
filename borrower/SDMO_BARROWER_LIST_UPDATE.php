
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>Barrowing Process</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css"> 
	<style type="text/css">
				.input1{
					text-align: center;
					width: 60%;
				}
				.td{
					width: 5%;
				}
				table{
					text-align: center;
					width: 100%;
					border-style: none;
				}
				.error{
					color: red;
				}
				#borrower{
					height: 100px;
					border: 1px solid;
					width: 30%;
					margin: 0 auto;
				}
			</style>
</head>
<body>
  <body>
  	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid"> 
        <div id="navbar" class="navbar-collapse collapse">
          
        </div>
      </div>
    </nav>
   <div class="container-fluid">
      <div class="row">
      	<div class="col-sm-2 col-ms-2 sidebar">
      	 <div class="container-fluid">
          <figure>
           <img src="../system-images/aiis-logo.png" style="height:73px;">
          </figure>
        </div> 
      	  <ul class="nav nav-sidebar">
            <li><a href="welcome.php"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>  
            <li><a href="gallery.php"><span class="glyphicon glyphicon-user"></span> Athletes</a></li>
            <li><a href="inventory.php"><span class="glyphicon glyphicon-cog"></span> Inventory</a></li>
            <li><hr></li>
            <li><a href="#">Tasks</a></li>
            <li><a href="attendance/time-in.php">Attendance</a></li>
            <li><a href="inventory/SDMO_BORROWER_REG.php">Borrow</a></li>
          </ul> 
        </div> 

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="page-header">Inventory</h2> 
             
          <div class="row placeholders">
          	<?php
				$con = mysql_connect("localhost","root");
					$db = mysql_select_db("aiis_db");
					if (!$con) {
						echo "connection lost";
					}if (!$db) {
						echo "DB lost";
					}
						$exp1 = mysql_query("UPDATE barrower_date SET BARR_DATE_WARNING ='ON' WHERE now() >= BARR_DATE_DEADL");
						mysql_query($exp1);
						$exp2 = mysql_query("UPDATE barrower_date SET BARR_DATE_WARNING ='OFF' WHERE now() >= BARR_DATE_RES AND now() < BARR_DATE_DEADL");
						mysql_query($exp2);
						$barr_id = $_GET['id'];
						$status="";
						echo "<form method='POST' ><input type='submit' name='backbttn' value='Back' class='btn btn-warning'></form>";
						$display2 = mysql_query("SELECT * FROM barrower_info WHERE BARR_ID = '$barr_id'");
							
							while ($row = mysql_fetch_array($display2)) { 
								$stud_id =$row['BARR_ID'];
								$name = "<label>".$row['BARR_FNAME'] . " " . $row['BARR_LNAME']."</label>"; 
							}	
							 
								echo $name . "</br>" . $stud_id;
								$display = mysql_query("SELECT * FROM borrower_equipment_info WHERE BARR_ID = '$stud_id' AND BARR_EQP_STATUS='PENDING' ");
								echo "<table class='table'> <tr><td colspan=7 >Borrowed list</td></tr><tr><td>Equipment ID</td><td>Equipment Name</td><td>Equipment Type</td><td>Quantity</td>
								<td>Date</td><td>Description
								</td><td>Recieved</td><td>Action</td></tr>";
								while ($row = mysql_fetch_array($display)) {
									$id = $row['BARR_EQP_ID'];
									$status = $row['BARR_EQP_STATUS'];
									$barr_date_id = $row['BARR_DATE_ID'];
									echo "<tr><td>" .
									$row['EQP_ID'] . "</td><td><form method='POST'><input type='hidden' name='eqp_id' value='". $row['EQP_ID'] ."'>
									<input type='hidden' name='barr_eqp_id' value='". $row['BARR_EQP_ID'] ."'>" .
								 	$row['BARR_EQP_NAME'] . "</td><td>" .
								 	$row['BARR_EQP_TYPE'] . "</td><td>" .
								 	$row['BARR_EQP_QUANTITY'] . "</td><td><input type='hidden' name='quan' value='". $row['BARR_EQP_QUANTITY'] ."'>
								 	</td><
								 	"; 
								 	$date = $row['BARR_DATE_ID'];
								 	$display3 = mysql_query("SELECT * FROM barrower_date WHERE BARR_DATE_ID ='$date' ");
								 	while ($row2 = mysql_fetch_array($display3)) {
								 		echo $row2['BARR_DATE'];
								 	}
									 echo "</td><td>" . $row['BARR_EQP_DESC'] ."</td><td><input type='text' name='recieved' required placeholder='Whos recieved? '></td><td>
									<input type=hidden name='hidden_delete' value='". $row['BARR_EQP_ID'] ."'>
									<input type='submit' name='updatebttn' value='Restored'> 
									</form></td></tr>";
						
					}echo "<tr><td colspan=7><form method='POST'><input type='submit' name='okey_bttn' value='Ok'></form></td></tr></table>";
					
						if (isset($_POST['updatebttn'])) {
							if (!empty($_POST['recieved'])) {
							$recieved = $_POST['recieved'];
							 $quan = $_POST['quan'];
							 $eqp_id = $_POST['eqp_id'];
							 $barr_eqp_id = $_POST['barr_eqp_id'];
							$update = mysql_query("UPDATE equipment_info SET  EQP_USABLE =EQP_USABLE+'$quan',EQP_BARROWED=EQP_BARROWED-'$quan' WHERE EQP_ID ='$eqp_id' ");

							$update_one = mysql_query("UPDATE borrower_equipment_info SET BARR_EQP_STATUS = 'RESTORED',BARR_EQP_RECIEVED='$recieved'    WHERE BARR_EQP_ID = '$barr_eqp_id' ");
								echo "<script> location.replace('SDMO_BARROWER_LIST_UPDATE.PHP?id=" . $barr_id ."'); </script>";

								  $desc = "The admin restored in Borrower ID " . $barr_id ;
				                  $act = "RESTORED";
				                  $audit = mysql_query("INSERT INTO sdmo_audit(AUDIT_DESC,AUDIT_ACTION,AUDIT_DATE)VALUES('$desc','$act',now())");
							
						}
							
						}
						if (isset($_POST['backbttn'])) {
							 echo "<script> location.replace('welcome.php'); </script>";
						}

						if ($status=='PENDING') { 
						}else{ 
							$display = mysql_query("SELECT * FROM borrower_equipment_info WHERE BARR_ID = '$barr_id'");
								while ($row = mysql_fetch_array($display)) {
									$barr_date_id = $row['BARR_DATE_ID'];

								}
							$date_update = mysql_query("UPDATE barrower_date SET BARR_DATE_STATUS = 'FALSE'   WHERE BARR_DATE_ID = '$barr_date_id' ");
							$date_update = mysql_query("UPDATE barrower_info SET BARR_STATUS = 'NONE'   WHERE BARR_ID = '$barr_id' ");
					}
				?>

          </div>
          </div>


      </div>
    </div>
</body>
</html>