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

		$update = mysql_query("UPDATE barrower_info SET  BARR_STATUS ='ON BORROWED' WHERE EQP_ID = '$eqp_id' ");

		$display = mysql_query("SELECT * FROM barrower_date WHERE BARR_ID = '$c' AND BARR_DATE_STATUS = 'TRUE' ");
		while ($row = mysql_fetch_array($display)) {
		$date = $row['BARR_DATE_ID'];
		
		}

		header("location:SDMO_BARROWER_LOG_EQP.PHP?id=" . $stud_no ."&id2=" . $date ."");
		echo "<script type='text/javascript' onClick='window.location.reload(true)'>alert('Successful Date in')</script>";
		}else {echo "<script type='text/javascript' >alert('student number dont exist!')</script>";
		echo '<a href="SDMO_BARROWER_REG.php">Register</a>';}
	}else{echo "<script type='text/javascript' >alert('fill up all!')</script>";}
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>Inventory</title> 
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
     <link rel="stylesheet" type="text/css" href="../css/navs_style.css"> 
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
		          <h2 class="page-header">Inventory</h2> 
		             
		          <div class="row placeholders">

		           <div class="col-xs-9 col-sm-6 placeholder"> 
		             <div class="panel panel-default"> 
		              <div class="panel-body text-center" style="height: 300px;">
			<fieldset><legend>Borrowers Login</legend><form action="" method="POST">
			
			Student Number:<span class="error"><?php echo $error1 ?></span><input type="text" name="stud_no" class="form-control" ></br>
			</br>
		  	<input type="submit" name="submit" value="Ok" class="btn btn-success" style="width: 200px;">
		  	<a href="SDMO_BORROWER_REG.php">Back to Register</a>
		 </div>		
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
</body>
</html>
