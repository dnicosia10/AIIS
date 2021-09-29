<?php
 
require_once'../configs/config.php';
//### SLECT data from the database
	$error1 = " ";
	if (isset($_POST['submit'])) 
	{ 
		if (empty($_POST['stud_no'])) {
		//restriction variable	
			$error1 = "*";
		}else{
			$error1 = "";
		}

		 
	} 
		 
?> 
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
            <li><a href="../gallery.php"><span class="glyphicon glyphicon-picture"></span> Athletes</a></li>
             <ul class="nav nav-sidebar" id="sub-nav">
                <li><a href="../gallery.php"><span class="glyphicon glyphicon-triangle-right"></span> Gallery</a></li>
                <li><a href="../gallery/athletes-add.php"><span class="glyphicon glyphicon-triangle-right"></span> Add Informations</a></li>
                <li><a href="../gallery/list.php"><span class="glyphicon glyphicon-triangle-right"></span> Update Informations</a></li>  
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
               <p id="calendar-pop">Time-In </p>   
                </div>
               <div class="panel-body" id="index-panel-body" style="padding: 2px;padding:10px;">
 
				<form method="POST">
				<div class="form-group text-center">
					<label>Student Number or ID Number</label>
					<span class="error"><?php echo $error1 ?></span>
					<input class="form-control" type="text" name="stud_no" placeholder="2017100143" style="width: 400px;margin: 0 auto;">  
				</div> 
				 <div class="container-fluid">
					<span class="">
						<input class="btn btn-success" type="submit" name="submit" value="Login" style="width:150px;"">	
					</span>	
				 	<span class="">
				 		<a class="btn btn-danger btn-sm" href="register.php" style="width:150px;">
				 		<label>Register</label></a></span>
				  </div>	
				</div> 
             <?php 
				//### start connection 
				//### SLECT data from the database
					$display = mysql_query("SELECT * FROM sdmo_logs  WHERE LOGS_STATUS = 'IN' ORDER BY LOGS_DATE_IN DESC");
					echo "<table class='table text-center'> 
							<tr id='t-heads'>
								<td class='text-center'>ID #</td>
								<td class='text-center'>Name</td>
								<td class='text-center'>Time / Date in</td>
								<td class='text-center'>Time / Date out</td>
								<td class='text-center'>Address</td>
								<td class='text-center'><span class='glyphicon glyphicon-cog'></span></td>
							</tr>";
					while ($row = mysql_fetch_array($display)) {
						echo "<tr>
								<td class='text-center'>"."<label>". $row['USER_ID'] ."</label>". "</td>
								<td>" . $row['LOGS_NAME'] . "</td>
								<td>" . $row['LOGS_DATE_IN'] ."</td>
								<td>" . $row['LOGS_DATE_OUT'] . "</td>
								<td>" . $row['LOGS_ADDR'] . "</td>
								<td>" . "<form  method='POST'>
									<input class='btn btn-primary btn-xs' style='border-radius:0px;'  type='submit' name='outbttn' value='Log-Out'>
									<input type='hidden' style='border-radius:0px;'  name='hidden' value=" . $row['LOGS_NUMBER'] . ">
								</td>
							 </tr>
						</form>"; 
						//### end form-->	
						//### ````````````````````````````````````````````````````-->
					}
					echo "</table>";
					
				?>		
            </div>
             
 
           <div class="col-xs-9 col-sm-4 placeholder"> 
             <div class="panel panel-default" style="border-radius: 0px">  
              <div class="panel-body">
              	 <?php   
					//### LOGIN
					$error1 = " ";
					if (isset($_POST['submit'])) 
					{ 
						 
						$a = '';
						if ( !empty($_POST['stud_no']) ) 
						{
							$c = $_POST['stud_no'];
							//### SLECT data from the database
							//### excute query
							$display = mysql_query("SELECT * FROM sdmo_logs_user WHERE USER_ID = '$c'  ");
							while ($row = mysql_fetch_array($display)) 
							{
								$a = $row['USER_ID'];
								$a1 = $row['USER_FNAME'];
								$a2 = $row['USER_LNAME'];
								$addr = $row['USER_ADDR'];
								$name = $a1 . " " . $a2;
							}

							if ($c == $a) 
							{
								$stud_no = $_POST['stud_no'];
								$insert = mysql_query("INSERT INTO sdmo_logs(USER_ID,LOGS_ADDR,LOGS_NAME,LOGS_DATE_IN,LOGS_STATUS)VALUES('$a','$addr','$name',now(),'IN')");
								$res = mysql_query($insert);

								echo '<div class="alert alert-success" role="alert"> 
										<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
										<label>You are Logged-In</label>
									  </div>';

								//### INSERT to log table 
								$desc =  " " .  $stud_no ." logged to system " ;
								$act = "LOGGED-IN";
								$audit = mysql_query("INSERT INTO sdmo_audit(AUDIT_DESC,AUDIT_ACTION,AUDIT_DATE)VALUES('$desc','$act',now())");	
								 echo "<script> location.replace('time-in.php'); </script>";  
							}
							else 
							{
								echo '<div class="alert alert-warning" role="alert"> 
										<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
										You are not Registered,<br>
										 Please 
										<a href="register.php">Register Here</a>
									  </div>';
								 
							}
						}
						else
						{
							echo '<div class="alert alert-danger" role="alert"> 
									<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
									Enter your Student or ID Number
									</div>';
						}
					}

					//### LOGOUT
					if (isset($_POST['outbttn'])) 
					{
						$hidden = $_POST['hidden'];
						$update2 = mysql_query("UPDATE sdmo_logs SET LOGS_DATE_OUT = now() WHERE LOGS_NUMBER = '$hidden' ");
						$update2 = mysql_query("UPDATE sdmo_logs SET LOGS_STATUS='OUT' WHERE LOGS_NUMBER = '$hidden' ");
						mysql_query($update2);
						echo '<div class="alert alert-success" role="alert"> 
								<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
								<label>You are Logged-Out</label>
								</div>'; 		
								echo "<script> location.replace('time-in.php'); </script>";  
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


















 