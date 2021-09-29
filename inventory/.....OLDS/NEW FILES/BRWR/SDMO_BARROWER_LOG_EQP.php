
<!DOCTYPE html>
<html lang="en">
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>Dashboard</title> 
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
     <link rel="stylesheet" type="text/css" href="../css/navs_style.css">
  </head>
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
			 <img src="../system-images/aiis-logo.png">
		  </figure>
		</div>
      	  <ul class="nav nav-sidebar">
            <li><a href="../welcome.php"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>  
            <li><a href="../gallery.php"><span class="glyphicon glyphicon-user"></span> Athletes</a></li>
           <li><a href="../inventory.php"><span class="glyphicon glyphicon-cog"></span> Inventory</a></li>
            <li><hr></li>
            <li><a href="#">Tasks</a></li>
            <li><a href="../attendance/time-in.php">Attendance</a></li>
            <li><a href="SDMO_BORROWER_REG.php">Borrow</a></li> 
          </ul> 
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="page-header">Dashboard</h2> 
          <div class="row placeholders" style="margin-bottom:0px;">
            <div class="col-xs-6 col-sm-12 placeholder">
                     	<?php
	$con = mysql_connect("localhost","root");
	$db = mysql_select_db("aiis_db");
	if (!$con) {
		echo "connection lost";
	}if (!$db) {
		echo "DB lost";
	}
	$barr_id = $_GET['id'];
	$date_id = $_GET['id2'];
	if(!$barr_id||!$date_id){
		mysql_error(die());
	}
	
	$display = mysql_query("SELECT * FROM borrower_equipment_info WHERE BARR_ID = '$barr_id' AND BARR_DATE_ID = '$date_id' ");
		echo "   <table class='table text-center'><tr><td colspan=7>Borrowed list</td></tr><tr><td>Equipment ID</td><td>Equipment Name</td><td>Equipment Type</td><td>Quantity</td><td>Action</td></tr>";
		while ($row = mysql_fetch_array($display)) {
			
		echo "<tr><td>" .
			 $row['EQP_ID'] . "</td><td>" .
			 $row['BARR_EQP_NAME'] . "</td><td>" .
			 $row['BARR_EQP_TYPE'] . "</td>
			 <td>
			 <form method='POST'><input type=hidden name='hidden_eqp_id' value='". $row['EQP_ID'] ."'>" .
			 $row['BARR_EQP_QUANTITY'] . "</td><input type=hidden name='hidden_delete_quan' value='". $row['BARR_EQP_QUANTITY'] ."'><td><input type=hidden name='hidden_delete' value='". $row['BARR_EQP_ID'] ."'> <input type='submit' name='deletebttn' class='btn btn-danger' value='delete'>
			 </form></td></tr>";
		
	}echo "<tr><td colspan=7><form method='POST' action='SDMO_BARROWER_LOG_EQP_LOAD.PHP?id=" . $barr_id .'&id2= ' . $date_id ."'><input class='btn btn-success' type='submit' name='confirm_bttn' value='Done'></form></td></tr></table>";
	
	$display1 = mysql_query("SELECT * FROM equipment_info  ");
	echo "</br></br></br><table class='table'><tr ><td colspan='7' class='text-center' style='font-weight:bold;'>List of Equipments</td></tr><tr><td>Equipment ID</td><td>Equipment Name</td><td>Equipment Quantity</td><td>Equipment Type</td><td>Stock</td><td class='td'>Quantity</td><td>Action</td></tr>";
		while ($row = mysql_fetch_array($display1)) {
			
			echo "<tr><td>" .
			 $row['EQP_ID'] . "</td><td><form method='POST'><input type=hidden name='hidden_id' value='". $row['EQP_ID'] ."'>" .
			 $row['EQP_NAME'] . "</td><td><input type=hidden name='hidden_name' value='". $row['EQP_NAME'] ."'>" .
			 $row['EQP_QUANTITY'] . "</td><td>" . "<input type=hidden name='hidden_quan' value='". $row['EQP_USABLE'] ."'>" .
		 	$row['EQP_TYPE'] . "</td><td><input  type=hidden name='hidden_type' value='". $row['EQP_TYPE'] ."'>" .
		 	$row['EQP_USABLE']. "</td><td><input class='form-control' type=number  name=quantity min=1 value=0 class='input1'></td><td>
			 <input type=hidden name='hidden' value='". $row['EQP_ID'] ."'> <input type='submit' name='addbttn' class='btn btn-success'	 value='Add'></form>" ;
			 
		}echo "</table>";
		
	if (isset($_POST['addbttn'])) {
			$eqp_id = $_POST['hidden_id'];
			$eqp_name = $_POST['hidden_name'];
			$eqp_type = $_POST['hidden_type'];
			$input_quan = $_POST['quantity'];
			$hidden_quan = $_POST['hidden_quan'];
			if ($hidden_quan >=  $input_quan) {
				$usable = $hidden_quan -  $input_quan;
		$update_one = mysql_query("UPDATE barrower_info SET  BARR_STATUS ='ON BORROWED' WHERE BARR_ID = '$barr_id' ");

		$update = mysql_query("UPDATE equipment_info SET  EQP_USABLE ='$usable' , EQP_BARROWED = EQP_BARROWED+'$input_quan' WHERE EQP_ID = '$eqp_id' ");

		$add = mysql_query("INSERT INTO borrower_equipment_info(BARR_ID,EQP_ID,BARR_DATE_ID,BARR_EQP_NAME,BARR_EQP_QUANTITY,BARR_EQP_TYPE,BARR_EQP_STATUS)VALUES('$barr_id','$eqp_id','$date_id','$eqp_name','$input_quan','$eqp_type','PENDING')");


			mysql_query($add);
			echo "<script> location.replace('SDMO_BARROWER_LOG_EQP.PHP?id=" . $barr_id .'&id2= ' . $date_id ."'); </script>";
			}else{echo "<script type='text/javascript'>alert('not enough quantity!')</script>";}
		
		}


	if (isset($_POST['deletebttn'])) {
			$delete_id = $_POST['hidden_delete'];
			$delete_id_quan = $_POST['hidden_delete_quan'];
			$eqp_id = $_POST['hidden_eqp_id'];
			$update = mysql_query("UPDATE equipment_info SET  EQP_USABLE =EQP_USABLE+'$delete_id_quan' , EQP_BARROWED = EQP_BARROWED-'$delete_id_quan' WHERE EQP_ID = '$eqp_id' ");
			$delete = mysql_query("DELETE FROM borrower_equipment_info WHERE  BARR_EQP_ID = '$delete_id' ");
				mysql_query($delete);
				
				echo "<script> location.replace('SDMO_BARROWER_LOG_EQP.PHP?id=" . $barr_id .'&id2= ' . $date_id ."'); </script>";
		}
		
			
		
	

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
    <script src="../js/bootstrap.min.js"></script> 
     <script src="../js/jquery.min.js"></script> 
  </body>
</html>
          