
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

           <div class="col-xs-9 col-sm-10 placeholder"> 
             <div class="panel panel-default"> 
              <div class="panel-body" style="height: 500px;padding:50px;">
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
	$error1 = $error2 = $error3 = $error4 = $error5 = $error6 = " ";
	if (isset($_POST['submit'])) { //restriction variable
	if (empty($_POST['stud_no'])) {
		$error1 = "*";
	}else{
		$error1 = "";
	}if (empty($_POST['fname'])) {
		$error2 = "*";
	}else{
		$error2 = "";
	}if (empty($_POST['lname'])) {
		$error4 =  "*";
	}else{
		$error4 = "";
	}if (empty($_POST['mname'])) {
		$error5 =  "*";	
	}else{
		$error5 = "";
	}if (empty($_POST['add'])) {
		$error6 =  "*";	
	}else{
		$error6 = "";
	}

//condition for redunduncy restriction
	
	$a = "";
if ( (!empty($_POST['stud_no'])) && (!empty($_POST['fname'])) && (!empty($_POST['lname'])) && (!empty($_POST['mname']))&& (!empty($_POST['add']))  ) {
	$sql1 = mysql_query("SELECT * FROM barrower_info WHERE BARR_ID = '$_POST[stud_no]' ");
	while ($row = mysql_fetch_array($sql1)) {
		$a = $row['BARR_ID'];
		
	}
	$stud_no = $_POST['stud_no'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$mname = $_POST['mname'];
	$add = $_POST['add'];
	
	if ( $a == $stud_no ) { 
		echo "<script type='text/javascript'>alert('Student already register!')</script>";
	}else{
		$sql = mysql_query("INSERT INTO barrower_info(BARR_ID,BARR_FNAME,BARR_LNAME,BARR_MNAME,BARR_ADDRS,BARR_REG_DATE,BARR_STATUS)
			VALUES('$stud_no','$fname','$lname','$mname','$add',now(),'NONE')");
		
		echo "<script type='text/javascript' onClick='window.location.reload(true)'>alert('Successful registered')</script>"; 
		header("Location: SDMO_BARROWER_LOG.php");
		$desc = "The admin ADD in Logs information ID " . $stud_no ;
		$act = "ADD";
		$audit = mysql_query("INSERT INTO sdmo_audit(AUDIT_DESC,AUDIT_ACTION,AUDIT_DATE)VALUES('$desc','$act',now())");
	
	}
	
		}else
		echo "<script type='text/javascript'>alert('not added')</script>";
					//header("location:SDMO_EQUIPMENTS_ADD.php");
			
}

?>
              	 <fieldset>
					<legend>Register barrower</legend>
					<form action="" method="POST">
						
						Student Number:
						<span class='error'><?php echo $error1; ?></span>
						<input type="text" name="stud_no" placeholder="2017102103" class="form-control"></br>
						Full name:
						<span class='error'><?php echo $error2; ?></span>
							<input type="text" name="fname" placeholder="First name" class="form-control">  
						<span class='error'><?php echo $error5; ?></span>
							<input type="text" name="mname" placeholder="Middle name" class="form-control"> 
						<span class='error'><?php echo $error4; ?></span>
							<input type="text" name="lname" placeholder="Last Name" class="form-control"></br>
						Address:
						<span class='error'><?php echo $error6; ?></span>
						<input type="text" name="add" placeholder="Tarlac city ..." class="form-control"></br>

									 
					  	<input type="submit" name="submit" value="Register Now" class="btn btn-success"> 
					  	<a class="pull-right" href="SDMO_BARROWER_LOG.php">Or Login</a>
					</form>
				</fieldset>
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