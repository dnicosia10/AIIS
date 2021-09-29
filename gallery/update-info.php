   
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
                 <div class="col-md-12"> 
          <?php 
            //### ********************************##//  
            require_once'../configs/config.php';
            //### variable assignment 
            $id = $_GET['id'];
            if(isset($_POST['submit'])){
            $target = "../images/" . basename($_FILES['image']['name']);
              $stud_no = $_POST['stud_no'];
              $image = $_FILES['image']['name'];
              $fname = $_POST['fname'];
              $lname = $_POST['lname'];
              $mname = $_POST['mname'];
              $age = $_POST['age'];
              $sex = $_POST['sex'];
              $course = $_POST['course'];
              $dept = $_POST['department'];
              $address = $_POST['address'];
              $yearlvl = $_POST['yearlvl'];
              $cnumber = $_POST['cnumber'];
              $bday = $_POST['bday'];
              $email = $_POST['email'];
              $status = $_POST['status'];
              $eventc = $_POST['eventc']; 
              $update = mysql_query("UPDATE athletes_info SET ATHLE_ID='$stud_no' ,ATHLE_LNAME='$lname' ,ATHLE_FNAME = '$fname' ,ATHLE_MNAME = '$mname' ,ATHLE_AGE = '$age' ,ATHLE_SEX='$sex' ,ATHLE_ADDRESS = '$address' ,ATHLE_BDATE = '$bday' ,ATHLE_CONTNUM = '$cnumber' ,ATHLE_DEPT_NAME='$dept' ,ATHLE_COURSE = '$course' ,ATHLE_YR_LVL = '$yearlvl' ,ATHLE_IMAGE = '$image' ,ATHLE_EVENT_CAT = '$eventc' ,ATHLE_STATUS = '$status',ATHLE_EMAIL = '$email'   WHERE ATHLE_ID='$id'");
              mysql_query($update);
              
              $desc = "The admin add in Athlete information ID: " . $id ;
              $act = "UPDATED";
              $audit = mysql_query("INSERT INTO sdmo_audit(AUDIT_DESC,AUDIT_ACTION,AUDIT_DATE)VALUES('$desc','$act',now())");

              echo "<script type='text/javascript' >alert('Successful updated')</script>"; 
              if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) { 
                
             }
          } 
            
            $display = mysql_query("SELECT * FROM athletes_info WHERE ATHLE_ID = '$id'");
            while ($row = mysql_fetch_array($display))
             {
                  
          ?> 
            <form method="POST" enctype="multipart/form-data" >
            <div class="col-md-12">
              <div class="col-md-6">
                <div class="col-md-12">
                <div class="container-fluid"><hr></div>
                <div class="form-group">
                  <label>Student Number</label>
                  <input type="text"  class="form-control" name="stud_no" value=" <?php echo $row['ATHLE_ID']; ?>" >  
                </div> 
                </div>
                <div class="col-md-12" style="padding: 0px;">
                  <label style="padding-left:15px;">Full Name</label>
                  <div class="clearfix"></div>
                  <div class="col-md-4">
                  <div class="form-group">
                    <input type="text" style="padding: 0px;" class="form-control" name="fname" value=" <?php echo $row['ATHLE_FNAME']; ?>" >
                  </div> 
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                    <input type="text" style="padding: 0px;" class="form-control"  name="mname" value=" <?php echo $row['ATHLE_MNAME'];; ?>" >
                  </div> 
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                    <input type="text"  class="form-control" name="lname" value="<?php echo $row['ATHLE_LNAME']; ?>" >
                  </div> 
                  </div> 
                </div>
                <div class="col-md-12">
                <div class="form-group">
                  <label>Age</label><input type="text" class="form-control"  name="age" value="<?php echo $row['ATHLE_AGE']; ?>"  >
                </div> 
                 <div class="form-group">
                  <label>Sex</label><input type="text" class="form-control"  name="sex" value="<?php echo $row['ATHLE_SEX']; ?>" >
                </div> 
                </div>
                <div class="col-md-12">
                <div class="form-group">
                  <label>Address</label><input type="text"  class="form-control" name="address" value="<?php echo $row['ATHLE_ADDRESS']; ?>"  >
                </div> 
                </div>
                <div class="col-md-12">
                <div class="form-group">
                  <label>Department</label><input type="text"  class="form-control" name="department" value="<?php echo $row['ATHLE_DEPT_NAME']; ?>" >
                </div> 
                </div>
                <div class="col-md-12">
                <div class="form-group">
                  <label>Course</label><input type="text" class="form-control"  name="course" value="<?php echo $row['ATHLE_COURSE']; ?>" >
                </div> 
                </div>
                <div class="col-md-12">
                <div class="form-group">
                  <label>Year Level</label><input type="text"  class="form-control" name="yearlvl" value="<?php echo $row['ATHLE_YR_LVL']; ?>" >
                </div> 
                </div>
              </div>
              <div class="col-md-6">
              <div class="container-fluid"><hr></div>
                <div class="col-md-12">
                  <div class="col-md-6">  
                    <input type="file" name="image" id="files"><div class="container-fluid"><br></div>
                    <img src="<?php echo '../images/'. $row['ATHLE_IMAGE'];  ?>" id="image" class="thumbnail" style="height: 150px;width: 150px; overflow: hidden;" alt="Image">  
                             
                    <script type="text/javascript">
                      document.getElementById("files").onchange = function(){
                      var reader = new FileReader();
                      reader.onload = function(e){
                      document.getElementById("image").src = e.target.result;
                        };
                        reader.readAsDataURL(this.files[0]); 
                      };
                    </script>  
                  </div> 
                </div>
                <div class="col-md-12">
                <div class="form-group">
                  <label>Birthday</label> <input type="date" class="form-control"  name="bday" value="<?php echo $row['ATHLE_BDATE']; ?>"  >
                </div> 
                </div>
                <div class="col-md-12">
                <div class="form-group">
                  <label>Contact Number </label><input type="text" class="form-control"  name="cnumber" value="<?php echo $row['ATHLE_CONTNUM']; ?>" >
                </div> 
                </div>
                <div class="col-md-12">
                <div class="form-group">
                  <label>Email</label>  <input type="email"  class="form-control" name="email"  value="<?php echo $row['ATHLE_EMAIL']; ?>">
                </div>  
                </div>
                <div class="col-md-12">
                <div class="form-group">
                  <label>Athlete Status </label><input  class="form-control" type="text" name="status" value="<?php echo $row['ATHLE_STATUS']; ?>" >
                </div> 
                </div>
                <div class="col-md-12">
                <div class="form-group">
                  <label>Event Category</label> <input  class="form-control" type="text" name="eventc" value="<?php echo $row['ATHLE_EVENT_CAT']; ?>">
                </div> 
                </div>
                 
              </div>
            </div>   
          </div>
          <div class="panel-footer">
            <div class="container-fluid ">
              <input class="btn btn-success pull-right" style="border-radius: 0px;background-color: #808080;width: 100px;"  type="submit" name="submit" value="Save">
            </div>
              
            </form>
        </fieldset> 
        </div><!--row-->
        <?php
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
        font-size: 0.9em;
       }
    </style>
  </body>
</html>
