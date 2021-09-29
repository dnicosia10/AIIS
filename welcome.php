<?php
session_start();
  if(!isset($_SESSION["uName"])) {
    header("Location: index.php");
  }
   
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">  
    <link href="css/index_style.css" rel="stylesheet">  
    <link href="css/style.css" rel="stylesheet"> 
    <title>Dashboard</title> 
  </head> 
  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
     <a class="navbar-brand" href="welcome.php"><img src="system-images/aiis-logo.png" style="height: 50px;"></a>
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
                <li><a href="" id="calendar" role='button'><span class="glyphicon glyphicon-triangle-right" ></span> Calendar</a></li>
                <li><a href="borrower/SDMO_BORROWER_REG.php" id="borrower"><span class="glyphicon glyphicon-triangle-right"></span> Borrowers Page</a></li>
                <li><a href="attendance/time-in.php"><span class="glyphicon glyphicon-triangle-right"></span> Attendance Page</a></li>  
              </ul> 
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="gallery.php"><span class="glyphicon glyphicon-picture"></span> Athletes</a></li>
             <ul class="nav nav-sidebar" id="sub-nav">
                <li><a href="gallery.php"><span class="glyphicon glyphicon-triangle-right"></span> Gallery</a></li>
                <li><a href="gallery/athletes-add.php"><span class="glyphicon glyphicon-triangle-right"></span> Add Informations</a></li>
                <li><a href="gallery/list.php"><span class="glyphicon glyphicon-triangle-right"></span> Update Informations</a></li>  
              </ul> 
          </ul>
           <ul class="nav nav-sidebar">
            <li><a href="inventory/SDMO_EQUIPMENTS_LIST.php"><span class="glyphicon glyphicon-cog"></span> Inventory</a></li>
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
                 <div class="col-md-12 te">  
                  <div class="col-md-3">
                    <div class="well">
                      <h2><?php include'count-contents/count-athletes.php'; ?></h2>
                      <p> <span class="glyphicon glyphicon-user"></span> Athletes</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="well">
                       <h2><?php include'count-contents/count-equipments.php'; ?></h2>
                      <p> <span class="glyphicon glyphicon-cog"></span> Equipments</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="well">
                      <h2><?php include'count-contents/count-borrowed.php'; ?> </h2>
                      <p> <span class="glyphicon glyphicon-open"></span> Borrowed Items </p>
                    </div>
                  </div> 
                 </div> 
               </div> 
              </div>
           </div>  
          </div> 
          <div class="row">
            <div class="col-md-7">
             <div class="panel panel-default" id="index-panel">
               <div class="panel-heading" id="index-panel-head">
<!-- POPS-->    <p id="calendar-pop"> Meetings | Activities </p>  
                  <div class="container-fluid">
                   <div class="input-group pull-right" style=" margin-top: -25px;margin-right: -15px;"> 
                    <form method="post"> 
                     <div class="input-group"> 
                        <span class="input-group-btn"> <button type="submit" name="submit" class="btn btn-default" >Select Date</button></span>
                         <input type="date" name="date" class="form-control" style="width: 200px;" placeholder="Search for..."> 
                       </div> 
                      </form> 
                    </div> 
                  </div>
                </div>
               <div class="panel-body" id="index-panel-body" style="padding: 2px;height: 300px;">  
                <?php include'calendar/count/select-date.php'; ?>  
               </div>
             </div>
            </div>

            <div class="col-md-5" style="margin-top: 100px;">
             <div class="panel panel-default"> 
               <div class="panel-body  text-center" id="index-panel-body" style="background-color: #f3f3f3;">
                <ul class="nav nav-pills" id="cal-tabs">
                  <li role="presentation"><a href="calendar/add-task.php"><p>Add Tasks</p></a></li>
                  <li role="presentation"><a href="calendar/view-tasks.php"><p>View All Tasks</p></a></li> 
                </ul> 
               </div>
             </div>
            </div> 

            <div class="col-md-12">
             <div class="panel panel-default"> 
             <div class="panel-heading"  id="index-panel-head">Borrowers</div>
               <div class="panel-body text-center" id="index-panel-body" style="background-color: #f3f3f3;">
                 <?php include'borrower/SDMO_INVENTORY_BARROW_LIST.PHP'; ?>
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
    </style>
  </body>
</html>
