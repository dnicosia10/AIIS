				 
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
    <title>Attendance</title> 
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
                <li><a href="../borrower/SDMO_BORROWER_REG.php "><span class="glyphicon glyphicon-triangle-right"></span> Borrowers Page</a></li>
                <li><a href="time-in.php"><span class="glyphicon glyphicon-triangle-right"></span> Attendance Page</a></li>  
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
            <div class="col-md-12">
             <div class="panel panel-default" id="index-panel">
               <div class="panel-heading" id="index-panel-head">
               <p id="calendar-pop"> Meetings & Activities </p>   
                </div>
               <div class="panel-body" id="index-panel-body" style="padding: 2px;padding:10px;">
<?php
//### start session
session_start();
require_once'../configs/config.php';
	 
$error1 = $error2 = $error3 = $error4 = $error5 = $error6 = " ";
if (isset($_POST['submit'])) 
	{ //restriction variable
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
	}

?>
 
		<form action="" method="POST">
		<div class="form-group">
			<label>Student Number / ID Number</label> 
			<div class="container-fluid">
			<span class='error'><?php echo $error1; ?></span>
			<input class="form-control" type="text" name="stud_no" placeholder="2017102103">  
			</div>
					</div>
					<div class="form-group">
						<label>Full name</label>
						<div class="col-md-12" style="padding: 0px;">
							<div class="col-md-4">
								<span class='error'><?php echo $error2; ?></span> 
								<input class="form-control " type="text" name="fname" placeholder="First name">  	
							</div>
							<div class="col-md-4">
								<span class='error'><?php echo $error5; ?></span> 
								<input class="form-control" type="text" name="mname" placeholder="Middle name"> 	
							</div>
							<div class="col-md-4">
								<span class='error'><?php echo $error4; ?></span> 
								<input class="form-control" type="text" name="lname" placeholder="Last Name"> 	
							</div>
						</div>    
					</div>
					<div class="form-group">
						<label>Address</label> 
						<div class="col-md-12">
							<span class='error'><?php echo $error6; ?></span>
							<input class="form-control" type="text" name="add" placeholder="Tarlac city ..."> 
						</div> 
					</div>	 

					<div class="container-fluid" style="padding: 15px;">

					<div class="container-fluid"><hr></div>
					  	<input style='border-radius:0px;background-color: #00cc00;width:120px;' class="btn btn-success" type="submit" name="submit" value="Register Now">
					 </div>
					</form>
				</div>
				<div class="panel-footer">
				<?php  
				require_once'../configs/config.php';

				if (isset($_POST['submit'])) 
				{   
						//condition for redunduncy restriction 
						$a = "";
						//### if variables are not empty
						if ( (!empty($_POST['stud_no'])) && (!empty($_POST['fname'])) && (!empty($_POST['lname'])) && (!empty($_POST['mname']))&& (!empty($_POST['add']))  ) 
						{	
							//### SELECT data
							//### excute query	
							$sql1 = mysql_query("SELECT * FROM sdmo_logs_user WHERE USER_ID = '$_POST[stud_no]' ");
							while ($row = mysql_fetch_array($sql1)) {	$a = $row['USER_ID']; }
							//### variable assignment
								$stud_no = $_POST['stud_no']; 
								$fname = $_POST['fname'];
								$lname = $_POST['lname'];
								$mname = $_POST['mname'];
								$add = $_POST['add'];  
							//### select student or ID number
							//### cannot be duplicated
							if ( $a == $stud_no ) 
							{   
								//### if ID number was already registered 
								echo '<div class="alert alert-danger text-center" role="alert"> 
									<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
									<label>You Cannot User This Student # or ID Number</label> 	
									</div>';
							}
							else
							{	//### INSERT data
								//### execute query
								$sql = mysql_query("INSERT INTO sdmo_logs_user(USER_ID,USER_FNAME,USER_LNAME,USER_MNAME,USER_ADDR)
									VALUES('$stud_no','$fname','$lname','$mname','$add')");
								//### Register successful
								echo '<div class="alert alert-success text-center" role="alert"> 
										<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
										<label>Register Successful! </label>
										<label><a href="time-in.php">Login Now</a></label> 
									  </div>';//### redirect to login page

								//### INSERT to log table 
								$desc = "The admin ADD in Logs information ID " . $stud_no ;
								$act = "ADD";
								$audit = mysql_query("INSERT INTO sdmo_audit(AUDIT_DESC,AUDIT_ACTION,AUDIT_DATE)
									VALUES('$desc','$act',now())");
							
							} 
						}
						else
						{	
							//### if fields are empty
							echo '<div class="alert alert-danger text-center" role="alert"> 
								<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
								<label>Fill All Fields </label> 	
								</div>';
						}  
				}
				//### end of script
				?>	
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
				 