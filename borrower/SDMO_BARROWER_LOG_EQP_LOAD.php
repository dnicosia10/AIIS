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
    <title>View Tasks</title> 
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
                <li><a href="#" id="calendar" role='button'><span class="glyphicon glyphicon-triangle-right" ></span> Calendar</a></li>
                <li><a href="../borrower/SDMO_BORROWER_REG.php "><span class="glyphicon glyphicon-triangle-right"></span> Borrowers Page</a></li>
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
            <div class="col-md-12">
             <div class="panel panel-default" id="index-panel">
               <div class="panel-heading" id="index-panel-head">
               <p id="calendar-pop"> Meetings & Activities </p>   
                </div>
               <div class="panel-body" id="index-panel-body" style="padding: 2px;padding:10px;"> 
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
		$date_id = $_GET['id2'];
		echo "<form method='POST' ><input type='submit' name='backbttn' class='btn btn-warning' value=Back><br>";
	   $display2 = mysql_query("SELECT * FROM barrower_info WHERE BARR_ID = '$barr_id'");
			while ($row = mysql_fetch_array($display2)) {

				$stud_id =$row['BARR_ID'];
				$name ="<label>". $row['BARR_FNAME'] . " " . $row['BARR_LNAME']."</label>"; 
			}
				echo $name . "</br>" . $stud_id;
				$display = mysql_query("SELECT * FROM borrower_equipment_info WHERE BARR_ID = '$barr_id' AND BARR_DATE_ID = '$date_id' ");
				echo "<table class='table'>
               <tr> 
                <td colspan=7 >Borrowed list</td>
               </tr>
               <tr>
                <td>Equipment ID</td>
                <td>Equipment Name</td>
                <td>Equipment Type</td>
                <td>Quantity</td>
                <td>Description</td>
                <td>Action</td>
               </tr>";
				while ($row = mysql_fetch_array($display)) {
					$id = $row['BARR_EQP_ID'];
					echo "<tr>
          <td>" .	$row['EQP_ID'] . "</td>
          <td>" .	$row['BARR_EQP_NAME'] . "</td>
          <td>" .	$row['BARR_EQP_TYPE'] . "</td>
          <td>" .	$row['BARR_EQP_QUANTITY'] . "</td>
          <td>" . "<form method='POST'><input type='text' name='desc' value='" . $row['BARR_EQP_DESC'] ."' ></td>
          <td><input type=hidden name='hidden_delete' class='btn btn-danger' value='". $row['BARR_EQP_ID'] ."'>
					<input type='submit' name='updatebttn' value='Okay'> 
					</form>
          </td></tr>";
		
	}echo "<tr>
          <td colspan=7>
            <form method='POST'>
            <input class='btn btn-success' type='submit' name='okey_bttn' value='Ok'>
            </form>
            </td>
            </tr>
          </table>";

		if (isset($_POST['updatebttn'])) {
			
			echo $desc = $_POST['desc'];
			$id = $_POST['hidden_delete'];
			$update = mysql_query("UPDATE borrower_equipment_info SET BARR_EQP_DESC = '$desc'   WHERE BARR_EQP_ID = '$id' ");
			
      echo "<script> location.replace('SDMO_BARROWER_LOG_EQP_LOAD.PHP?id=" . $barr_id .'&id2= ' . $date_id ."'); </script>";
		}
		if (isset($_POST['backbttn'])) {
			
      echo "<script> location.replace('SDMO_BARROWER_LOG_EQP.PHP?id=" . $barr_id .'&id2= ' . $date_id ."'); </script>";
		}if (isset($_POST['okey_bttn'])) {
       echo "<script> location.replace('SDMO_BARROWER_LOG.PHP'); </script>";
		}
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
