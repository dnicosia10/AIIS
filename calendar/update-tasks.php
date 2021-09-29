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
    <title>Update Tasks</title> 
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

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" > 
          <div class="row placeholders">  
           <div class="panel panel-default" style="background-color: #e6ffff;">
              <div class="panel-body" >
               <div class="row"> 
                    <?php 
                $error1 = $error2 = $error3 = $error4 = $error5 = $error6 = " ";
                //### start connection
                include_once'../configs/config.php';
                $string = "";    
                $expiredstart = mysql_query("UPDATE sdmo_calendar SET CAL_STATUS ='PENDING' WHERE now() < CAL_START");
                mysql_query($expiredstart);
                $expiredongoing = mysql_query("UPDATE sdmo_calendar SET CAL_STATUS ='ONGOING' WHERE now() > CAL_START AND now() < CAL_END ");
                mysql_query($expiredongoing);
                $expiredend = mysql_query("UPDATE sdmo_calendar SET CAL_STATUS ='END' WHERE now() >= CAL_END");
                if (isset($_POST['submit'])) 
                {   
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
                  }if (empty($_POST['status'])) {
                    $error6 =  "*"; 
                  }else{
                    $error6 = "";
                  }  

                  $compared = mysql_query("SELECT * FROM sdmo_calendar WHERE CAL_START = '$_POST[start]' ");
                  while ($row = mysql_fetch_array($compared)) { $string = $row['CAL_START']; }
                   
                  $title = $_POST['title'];
                  $event = $_POST['event'];
                  $start = $_POST['start'];
                  $end = $_POST['end'];
                  $status = $_POST['status'];
                  if(empty($title)||empty($event)||empty($start)||empty($end))
                  { 
                    //### If Fields are empty
                    echo '<div class="alert alert-danger" role="alert"> 
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        Fill All Fields
                        </div>';
                  }
                  else
                  { 
                     //### SET data

                    $insert = mysql_query("UPDATE  sdmo_calendar SET CAL_TITLE ='$title',CAL_EVENT='$event',CAL_START='$start',CAL_END='$end',CAL_STATUS ='$status',CAL_EVENT_LOCATION='$loc' WHERE CAL_NO='$_GET[a]' ");
                    //### execute query
                    $res = mysql_query($insert);
                    //### if successful
                    echo '<div class="alert alert-success" role="alert"> 
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        Updated Successfuly
                        </div>';

                  //###******************************************************##//  
                  //### INSERT to logs  
                  $desc = "The admin Update in calendar name " . $title ;
                  $act = "UPDATED";
                  $audit = mysql_query("INSERT INTO sdmo_audit(AUDIT_DESC,AUDIT_ACTION,AUDIT_DATE)VALUES('$desc','$act',now())");   
                  //###******************************************************##//  
                  }
             
                }
                ?>
               </div> 
              </div>
           </div>  
          </div> 
          <div class="row"> 
            <div class="col-md-7">
             <div class="panel panel-default" id="index-panel">
               <div class="panel-heading" id="index-panel-head">
               <p id="calendar-pop"> Update Meetings | Activities </p>   
                </div>
               <div class="panel-body" id="index-panel-body" style="padding: 2px;padding:10px;">
                 <form action="" method="POST">
               <table class="table">
                <tr>
                  <td><label>Title</label></td>
                  <td colspan="2"><span class="error"><?php echo $error1; ?></span></td>
                  <td><input class="form-control" type="text" name="title" placeholder=""></td> 
                </tr>
                <tr>
                  <td><label>Note(s)&Memos </label></td>
                  <td colspan="2"> <span class="error"><?php echo $error2; ?></span></td> 
                  <td><textarea class="form-control" name="event"> </textarea></td>
                </tr>
                <tr>
                  <td><label>Location </label></td>
                  <td colspan="2"> <span class="error"><?php echo $error3; ?></span></td> 
                  <td><textarea class="form-control" name="loc"> </textarea></td>
                </tr>
                <tr>
                  <td><label>Date Start</label></td>
                  <td colspan="2"><span class="error"><?php echo $error4; ?></span></td>
                  <td><input class="form-control" type="date" name="start" ></td>
                </tr>
                <tr>
                  <td><label>Date End</label></td>
                  <td colspan="2"><span class="error"><?php echo $error5; ?></span></td>
                  <td><input class="form-control" type="date" name="end"></td>
                </tr>
                <tr>
                  <td><label>Status</label></td>
                  <td colspan="2"><span class="error"><?php echo $error6; ?></span></td>
                  <td><input class="form-control" type="text" name="status" placeholder="Status"></td> 
                </tr>
               </table>
               <input style='border-radius:0px;background-color: #00cc00;width: 200px;'  class="btn btn-success" type="submit" name="submit" value="Update">
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
    .error{
      color: red;
    }
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
        .alert{
          width: 50%;
          margin:0 auto;
        }
    </style>
  </body>
</html>
