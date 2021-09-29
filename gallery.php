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
     <a class="navbar-brand" href="#"><img src="system-images/aiis-logo.png"></a>
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
                 <div class="col-md-12">  
                   <?php 
                   require_once'configs/config.php';

                 $sql = "SELECT * FROM athletes_info ORDER BY ATHLE_EVENT_CAT";
                  $res = mysql_query($sql);
                   
                   echo "<div class='tabler-responsive'>";
                   echo "<table class='table  table-bordered'> 
                      <tr id='t-heads'>
                      <th >Student Number</th>
                      <th ><span class='glyphicon glyphicon-picture'></span> Image</th>
                      <th >Event</th>
                      <th >Name</th>
                      <th >Age</th>
                      <th >Department</th>
                      <th >Course</th>
                      <th >Year Level</th>
                      <th >Mobile</th> 
                      <th class='text-center'><span class='glyphicon glyphicon-eye-open'></span></th>
                      </tr> 
                      ";


                  while($row=mysql_fetch_array($res))
                  { 
                    echo " 
                         <tr>
                        <td>".$row['ATHLE_ID']."</td>
                        <td><a href='gallery/profile.php?view=$row[ATHLE_ID]'><img id='image' src='images/" . $row['ATHLE_IMAGE'] . "'  alt='no image'></a></td> 
                        <td class='bg-warning'>".$row['ATHLE_EVENT_CAT']."</td>
                        <td>".$row['ATHLE_FNAME']." ".$row['ATHLE_LNAME']."</td> 
                        <td>".$row['ATHLE_AGE']."</td>
                        <td>".strtoupper($row['ATHLE_DEPT_NAME'])."</td>
                        <td>".$row['ATHLE_COURSE']."</td>
                        <td>".$row['ATHLE_YR_LVL']."</td>
                        <td>".$row['ATHLE_CONTNUM']."</td> 
                        <td><a href='gallery/profile.php?view=$row[ATHLE_ID]' style='border-radius:0px;' class='btn btn-success btn-xs'>view</td>
                        </tr> "; 
                  } 
                  echo "</table>";
                    echo "</div>";
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
       #image{
        height: 100px;
       }
    </style>
  </body>
</html>
