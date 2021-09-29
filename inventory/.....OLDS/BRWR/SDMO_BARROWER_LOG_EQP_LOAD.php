
<!DOCTYPE html>
<html>
<head>
	<title>Barrowing Process</title>
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
			</style>
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
          <h2 class="page-header">Borrowed List</h2> 
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
		echo "<form method='POST' ><input type='submit' name='backbttn' class='btn btn-warning' value=Back><br>";
	$display2 = mysql_query("SELECT * FROM barrower_info WHERE BARR_ID = '$barr_id'");
			while ($row = mysql_fetch_array($display2)) {

				$stud_id =$row['BARR_ID'];
				$name ="<label>". $row['BARR_FNAME'] . " " . $row['BARR_LNAME']."</label>"; 
			}
				echo $name . "</br>" . $stud_id;
				$display = mysql_query("SELECT * FROM borrower_equipment_info WHERE BARR_ID = '$barr_id' AND BARR_DATE_ID = '$date_id' ");
				echo "<table class='table'> <tr><td colspan=7 >Borrowed list</td></tr><tr><td>Equipment ID</td><td>Equipment Name</td><td>Equipment Type</td><td>Quantity</td><td>Description
				</td><td>Action</td></tr>";
				while ($row = mysql_fetch_array($display)) {
					$id = $row['BARR_EQP_ID'];
					echo "<tr><td>" .
					$row['EQP_ID'] . "</td><td>" .
				 	$row['BARR_EQP_NAME'] . "</td><td>" .
				 	$row['BARR_EQP_TYPE'] . "</td><td>" .
				 	$row['BARR_EQP_QUANTITY'] . "</td><td>" .
					 "<form method='POST'><input type='text' name='desc' value='" . $row['BARR_EQP_DESC'] ."' ></td><td>
					<input type=hidden name='hidden_delete' class='btn btn-danger' value='". $row['BARR_EQP_ID'] ."'>
					<input type='submit' name='updatebttn' value='Okay'> 
					</form></td></tr>";
		
	}echo "<tr><td colspan=7><form method='POST'><input class='btn btn-success' type='submit' name='okey_bttn' value='Ok'></form></td></tr></table>";

		if (isset($_POST['updatebttn'])) {
			
			echo $desc = $_POST['desc'];
			$id = $_POST['hidden_delete'];
			$update = mysql_query("UPDATE borrower_equipment_info SET BARR_EQP_DESC = '$desc'   WHERE BARR_EQP_ID = '$id' ");
			header("location:SDMO_BARROWER_LOG_EQP_LOAD.PHP?id=" . $barr_id .'&id2= ' . $date_id ."");
		}
		if (isset($_POST['backbttn'])) {
			header("location:SDMO_BARROWER_LOG_EQP.PHP?id=" . $barr_id .'&id2= ' . $date_id ."");
		}if (isset($_POST['okey_bttn'])) {
			header("location:SDMO_BARROWER_LOG.php");
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
    <script src="js/bootstrap.min.js"></script> 
     <script src="js/jquery.min.js"></script>            
</body>
</html>