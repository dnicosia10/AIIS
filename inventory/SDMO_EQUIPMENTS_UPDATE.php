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
    <title>Dashboard</title> 
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
            <li class="active"><a href="welcome.php"><span class="glyphicon glyphicon-stats"></span> Dashboard</a></li>
              <ul class="nav nav-sidebar" id="sub-nav">
                <li><a href="../calendar/view-tasks.php" id="calendar" role='button'><span class="glyphicon glyphicon-triangle-right" ></span> Calendar</a></li>
                <li><a href="../borrower/SDMO_BORROWER_REG.php" id="borrower"><span class="glyphicon glyphicon-triangle-right"></span> Borrowers Page</a></li>
                <li><a href="../attendance/time-in.php"><span class="glyphicon glyphicon-triangle-right"></span> Attendance Page</a></li>  
              </ul> 
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="../gallery.php"><span class="glyphicon glyphicon-picture"></span> Athletes</a></li>
             <ul class="nav nav-sidebar" id="sub-nav">
                <li><a href="../gallery.php"><span class="glyphicon glyphicon-triangle-right"></span> Gallery</a></li>
                <li><a href="athletes-add.php"><span class="glyphicon glyphicon-triangle-right"></span> Add Informations</a></li>
                <li><a href="list.php"><span class="glyphicon glyphicon-triangle-right"></span> Update Informations</a></li>  
              </ul> 
          </ul>
           <ul class="nav nav-sidebar">
            <li><a href="SDMO_EQUIPMENTS_ADD.php"><span class="glyphicon glyphicon-cog"></span> Inventory</a></li>
             <ul class="nav nav-sidebar" id="sub-nav">
                <li><a href="SDMO_EQUIPMENTS_LIST.php"><span class="glyphicon glyphicon-triangle-right"></span> Equipments</a></li>
                <li><a href="SDMO_EQUIPMENTS_UPDATE.php"><span class="glyphicon glyphicon-triangle-right"></span> Browse Items</a></li> 
              </ul> 
          </ul> 
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main"> 
          <div class="row placeholders">  
           <div class="panel panel-default" style="margin-top: -10px;">
           <div class="panel-heading" id="index-panel-head">Current Inventory</div>
              <div class="panel-body" >
               
			<?php 
				$con = mysql_connect("localhost","root");
				$db = mysql_select_db("aiis_db");
				if (!$con) {
					echo "connection lost";
				}if (!$db) {
					echo "DB lost";
				}
				$sql = mysql_query("SELECT * FROM equipment_info");
				echo "<table class='table'> 
						<tr>
						<td>Id Number</td>
						<td>Name</td>
						<td>Quantity</td>
						<td>Equipment type</td>
						<td>Equipment Usable</td>
						<td>Equipment Barrowed</td>
						<td class='text-center'><span class='glyphicon glyphicon-cog'></span></td>
					 </tr>";
				while ($row = mysql_fetch_array($sql)) {
					echo "<tr>	
							<td>". $row['EQP_ID'] . "</td>
							<td>" . $row['EQP_NAME'] . "</td>
							<td>" . $row['EQP_QUANTITY'] . "</td>
							<td>" . $row['EQP_TYPE'] . "</td>
							<td>" . $row['EQP_USABLE'] . "</td>
							<td>" . $row['EQP_BARROWED'] . "</td>
							<td>
								<a href='SDMO_EQUIPMENTS_UPDATE_INFO.php?id=$row[EQP_ID]' class='btn btn-primary btn-xs'>UPDATE</a>  <a href='SDMO_EQUIPMENTS_UPDATE_INFO_ALL.php?id=$row[EQP_ID]' class='btn btn-warning btn-xs'>VIEW</a>
							</td>
						  </tr>"; 
				}echo "</table>";
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
    <script src="scripts/jquery.min.js"></script>
    <script src="scripts/bootstrap.min.js"></script> 
    <script type="text/javascript">
      $(document).ready(function(){
        $("#calendar").click(function(){
          $("div > #calendar-pop").css
            (
              'background-color'," #ff5c33",
              'width','200px'  
            ).fadeOut('200'); 
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
       td{
       	font-size: 1em;
       }
       .error{
       	color: red;
       }
    </style>
  </body>
</html>
