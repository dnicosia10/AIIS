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
    <title>Add Task</title> 
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
                <li><a href="" id="calendar" role='button'><span class="glyphicon glyphicon-triangle-right" ></span> Calendar</a></li>
                <li><a href="../borrower/SDMO_BORROWER_REG.php"><span class="glyphicon glyphicon-triangle-right"></span> Borrowers Page</a></li>
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
              <div class="panel-body">
               <div class="row"> 

               </div> 
              </div>
           </div>  
          </div> 
          <div class="row"> 
            <div class="col-md-7">
             <div class="panel panel-default" id="index-panel">
               <div class="panel-heading" id="index-panel-head">
               <p id="calendar-pop"> Add Meetings | Activities </p>   
                </div>
               <div class="panel-body" id="index-panel-body" style="padding: 2px;padding: 50px;">
               <?php
                $con = mysql_connect("localhost","root");
                $db = mysql_select_db("aiis_db");
                if (!$con) {
                  echo "connection lost";
                }if (!$db) {
                  echo "DB lost";
                }
                $string = "";

                $expiredstart = mysql_query("UPDATE sdmo_calendar SET CAL_STATUS ='PENDING' WHERE now() < CAL_START");
                mysql_query($expiredstart);
                $expiredongoing = mysql_query("UPDATE sdmo_calendar SET CAL_STATUS ='ONGOING' WHERE now() > CAL_START AND now() < CAL_END ");
                mysql_query($expiredongoing);
                $expiredend = mysql_query("UPDATE sdmo_calendar SET CAL_STATUS ='END' WHERE now() >= CAL_END");

                $error1 = $error2 = $error3 = $error4 = $error5 = " ";
                if (isset($_POST['submit'])) { //restriction variable
                if (empty($_POST['title'])) {
                  $error1 = "*";
                }else{
                  $error1 = "";
                }if (empty($_POST['event'])) {
                  $error2 = "*";
                }else{
                  $error2 = "";
                }if (empty($_POST['loc'])) {
                  $error3 =  "*";
                }else{
                  $error3 = "";
                }if (empty($_POST['start'])) {
                  $error4 =  "*"; 
                }else{
                  $error4 = "";
                }if (empty($_POST['end'])) {
                  $error5 =  "*"; 
                }else{
                  $error5 = "";
                }
                  $compared = mysql_query("SELECT * FROM sdmo_calendar WHERE CAL_START = '$_POST[start]' ");
                  while ($row = mysql_fetch_array($compared)) {
                    $string = $row['CAL_START'];
                  }
                   
                  $title = $_POST['title'];
                  $event = $_POST['event'];
                  $loc = $_POST['loc'];
                  $start = $_POST['start'];
                  $end = $_POST['end']; 

                  if ($string == $_POST['start']) {
                    echo "<script type='text/javascript'>alert('the Date already occupied!')</script>"; 
                    echo "Add to Onother date";
                  }else{
                    $insert = mysql_query("INSERT INTO sdmo_calendar(CAL_TITLE,CAL_EVENT,CAL_EVENT_LOCATION,CAL_START,CAL_END,CAL_WARNING)VALUES('$title','$event','$loc','$start','$end','OFF')");
                  mysql_query($insert);
                  echo "<script type='text/javascript'>alert('Successful!')</script>";
                  
                  $desc = "The admin add in calendar name " . $title ;
                  $act = "ADD";
                  $audit = mysql_query("INSERT INTO sdmo_audit(AUDIT_DESC,AUDIT_ACTION,AUDIT_DATE)VALUES('$desc','$act',now())");
                  } 
                }
              ?>  
                <form action="" method="POST"> 
                  <label>Title</label> 
                    <span class="error"><?php echo $error1 ?></span></br>
                     <input type="text" class="form-control " name="title"></br> 
                  <label>Note | Memo's</label> 
                    <span class="error"><?php echo $error2 ?></span>
                     <input type="text" class="form-control " name="event"></br>
                      <label> Event Location </label>
                    <span class="error"><?php echo $error5 ?></span>
                    <input type="text" class="form-control " name="loc"></br>
                  <label> Date Start </label>
                    <span class="error"><?php echo $error3 ?></span>
                    <input type="date" class="form-control " name="start"></br>
                  <label>Date End</label> 
                    <span class="error"><?php echo $error4 ?></span>
                     <input type="date" class="form-control " name="end"></br> 
                    <input type="submit" name="submit" value="Add" class="btn btn-success btn-sm">
                </form>
               </div>
             </div>
            </div> 
             <div class="col-md-5">
             <div class="panel panel-default"> 
               <div class="panel-body  text-center" id="index-panel-body" style="background-color: #f3f3f3;">
                <ul class="nav nav-pills" id="cal-tabs">
                  <li role="presentation"><a href="add-task.php"><p>Add Tasks</p></a></li>
                  <li role="presentation"><a href="view-tasks.php"><p>View All Tasks</p></a></li> 
                </ul> 
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
       .error{
        color: red;
       }
    </style>
  </body>
</html>
