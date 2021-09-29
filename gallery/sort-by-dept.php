<!DOCTYPE html>
<html lang="en">
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>Gallery</title> 
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/navs_style.css">
  </head>
  <body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
           
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <div class="container-fluid">
            <figure>
             <img src="../system-images/aiis-logo.png">
            </figure>
          </div>
          <ul class="nav nav-sidebar">
          <li><a href="../welcome.php"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>  
            <li><a href="../gallery.php"><span class="glyphicon glyphicon-user"></span> Athletes</a></li>
             <li><a href="../inventory.php"><span class="glyphicon glyphicon-cog"></span> Inventory</a></li>
            <li><hr></li>
            <li><a href="#">Tasks</a></li>
            <li><a href="#">Attendance</a></li>
            <li><a href="#">Borrow</a></li> 
          </ul> 
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Gallery</h1>
 
                 <div class="col-xs-6 col-sm-12 placeholder">
                <nav class="navbar" style="padding: 5px;padding-bottom:1px;">
                  <ul class="nav nav-pills pull-left">
                  <li role="presentation"><a href="../gallery.php">Sort by Event  <span class="caret"></span></a></li>
                  <li role="presentation" class="active"><a href="sort-by-dept.php">Sort by Department <span class="caret"></span></a></li> 
                  </ul>
                  <ul class="nav nav-pills pull-right">
                  <li role="presentation"><a href="athletes-add.php"  class="btn btn-default"><span class="glyphicon glyphicon-plus"></span>  </a></li> 
                  </ul>
                   </nav>
                 </div>
               <div class="table">
                  <?php  
                   include'includes/sort-by-dept.inc.php';
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
    <script src="../js/bootstrap.min.js"></script> 
     <script src="../js/jquery.min.js"></script> 
    <style type="text/css">
    .table{

    }
    </style>
  </body>
</html>
          