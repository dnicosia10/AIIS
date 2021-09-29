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
    <title>Register Borrowers</title> 
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
                <li><a href="../calendar/view-tasks.php"  role='button'><span class="glyphicon glyphicon-triangle-right" ></span> Calendar</a></li>
                <li><a href="SDMO_BORROWER_REG.php"><span class="glyphicon glyphicon-triangle-right"></span> Borrowers Page</a></li>
                <li><a href="../attendance/time-in.php"><span class="glyphicon glyphicon-triangle-right"></span> Attendance Page</a></li>  
              </ul> 
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href=""><span class="glyphicon glyphicon-picture"></span> Athletes</a></li>
             <ul class="nav nav-sidebar" id="sub-nav">
                <li><a href=""><span class="glyphicon glyphicon-triangle-right"></span> Gallery</a></li>
                <li><a href=""><span class="glyphicon glyphicon-triangle-right"></span> Add Informations</a></li>
                <li><a href=""><span class="glyphicon glyphicon-triangle-right"></span> Update Informations</a></li>  
              </ul> 
          </ul>
           <ul class="nav nav-sidebar">
            <li><a href=""><span class="glyphicon glyphicon-cog"></span> Inventory</a></li>
             <ul class="nav nav-sidebar" id="sub-nav">
                <li><a href=""><span class="glyphicon glyphicon-triangle-right"></span> Equipments</a></li>
                <li><a href=""><span class="glyphicon glyphicon-triangle-right"></span> Browse Items</a></li> 
              </ul> 
          </ul> 
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main"> 
          <div class="row placeholders">  
           <div class="panel panel-default" style="background-color: #e6ffff;margin-top: -10px;">
              <div class="panel-body" >
               <div class="row"> 
                  
               </div> 
              </div>
           </div>  
          </div> 
          <div class="row"> 
            <div class="col-md-7">
             <div class="panel panel-default" id="index-panel">
               <div class="panel-heading" id="index-panel-head">
               <p id="calendar-pop"> Register Borrowers </p>   
                </div>
               <div class="panel-body" id="index-panel-body" style="padding: 2px;padding:10px;">
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
    <script src="../scripts/jquery.min.js"></script>
    <script src="../scripts/bootstrap.min.js"></script> 
    <script type="text/javascript">
       
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
       form{
        text-align: center;
       }
       .form-control{
        width: 100%; 
       }
       .btn{
        width: 200px;
        padding: 10px;
        background-color: #00cccc;
        border: none;
       }
      
       #t-heads{
          background: linear-gradient(to bottom, #99ffff, #e6ffff);
          color: #999;
          font-size: 0.9em;
        }
    </style>
  </body>
</html>
 
 