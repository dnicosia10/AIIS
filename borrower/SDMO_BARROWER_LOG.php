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
    <title>Borrowers Login</title> 
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
                <li><a href="SDMO_BORROWER_REG.php"><span class="glyphicon glyphicon-triangle-right"></span> Borrowers Page</a></li>
                <li><a href=""><span class="glyphicon glyphicon-triangle-right"></span> Attendance Page</a></li>  
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
               <p id="calendar-pop">Please Login </p>   
                </div>
               <div class="panel-body" id="index-panel-body" style="padding: 2px;padding:10px;">
<?php	$con = mysql_connect("localhost","root");
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
    <script src="../scripts/jquery.min.js"></script>
    <script src="../scripts/bootstrap.min.js"></script> 
    <script type="text/javascript">
      $(document).ready(function(){
        $("#calendar").click(function(){
          $("div > #calendar-pop").css
            (
              'background-color'," #ff5c33",
              'width','200px'  
            ); 
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
 
 