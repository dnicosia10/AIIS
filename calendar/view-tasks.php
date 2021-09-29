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
                  $expiredstart = mysql_query("UPDATE sdmo_calendar SET CAL_STATUS ='PENDING' WHERE now() < CAL_START");
                  mysql_query($expiredstart);
                  $expiredongoing = mysql_query("UPDATE sdmo_calendar SET CAL_STATUS ='ONGOING' WHERE now() > CAL_START AND now() < CAL_END ");
                  mysql_query($expiredongoing);
                  $expiredend = mysql_query("UPDATE sdmo_calendar SET CAL_STATUS ='END' WHERE now() >= CAL_END");
  
                  $display = mysql_query("SELECT * FROM sdmo_calendar");
                  echo "<table class='table table-hover'>
                      <tr id='t-heads'> 
                        <th>Title</th>
                        <th>Event</th>
                        <th>Location</th>
                        <th>Date Start</th>
                        <th>Date End</th>
                        <th>Status</th>
                        <th width='10%' class='text-center'><span class='glyphicon glyphicon-cog'></span></td>
                      </tr>";
                  while ($row = mysql_fetch_array($display)) {
                    echo "<tr> 
                          <td>" . $row['CAL_TITLE'] . "</td>
                          <td>" . $row['CAL_EVENT'] . "</td>
                           <td>" . $row['CAL_EVENT_LOCATION'] . "</td>
                          <td>" . $row['CAL_START'] . "</td>
                          <td>" .$row['CAL_END'] . "</td>
                          <td>" . $row['CAL_STATUS'] . "</td>
                          <td> <a class='btn btn-primary btn-xs' href='update-tasks.php?a=" . $row['CAL_NO'] . "'> update</a></td></tr>";
                  }echo "</table>";
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
