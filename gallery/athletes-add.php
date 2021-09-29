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
            <li class="active"><a href="../welcome.php"><span class="glyphicon glyphicon-stats"></span> Dashboard</a></li>
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
                  require_once'../configs/config.php';
                  $a = "";
                    $error1 = $error2 = $error3 = $error4 = $error5 = $error6 = $error7 = $error8 = $error9 = $error10 = $error11 = $error12 = $error13 = $error14 = $error15 = " ";
                        if (isset($_POST['submit'])) {
                        
                         //restriction variable
                        if (empty($_POST['stud_no'])) {
                          $error1 = "*";
                        }else{
                          $error1 = "";
                        }if (empty($_POST['fname'])) {
                          $error2 = "*";
                        }else{
                          $error2 = "";
                        }if (empty($_POST['mname'])) {
                          $error3 =   "*";
                        }else{
                          $error3 = "";
                        }if (empty($_POST['lname'])) {
                          $error4 =  "*";
                        }else{
                          $error4 = "";
                        }if (empty($_POST['age'])) {
                          $error5 =  "*";
                        }else{
                          $error5 = "";
                        }if (empty($_POST['address'])) {
                          $error6 =  "*";
                        }else{
                          $error6 = "";
                        }if (empty($_POST['bday'])) {
                          $error7 =  "*";
                        }else{
                          $error7 = "";
                        }if (empty($_POST['cnumber'])) {
                          $error8 =  "*";
                        }else{
                          $error8 = "";
                        }if (empty($_POST['department'])) {
                          $error9 =  "*";
                        }else{
                          $error9 = "";
                        }if (empty($_POST['course'])) {
                          $error10 =  "*";
                        }else{
                          $error10 = "";
                        }if (empty($_POST['yearlvl'])) {
                          $error11 =  "*";
                        }else{
                          $error11 = "";
                        }if (empty($_POST['sex'])) {
                          $error12 =  "*";
                        }else{
                          $error12 = "";
                        }if (empty($_POST['eventc'])) {
                          $error13 =  "*";
                        }else{
                          $error13 = "";
                        }if (empty($_POST['email'])) {
                          $error14 =  "*";
                        }else{
                          $error14 = "";
                        }if (empty($_POST['status'])) {
                          $error15 =  "*";
                        }else{
                          $error15 = "";
                        }
                  //restriction for fill all the field
                    $one = mysql_query("SELECT * FROM athletes_info WHERE ATHLE_ID = '$_POST[stud_no]' ");
                    while ($row = mysql_fetch_array($one)) {
                      
                    }
                    
                      if ( (!empty($_POST['stud_no'])) && (!empty($_POST['fname'])) && (!empty($_POST['lname'])) && (!empty($_POST['mname'])) && (!empty($_POST['age'])) 
                        && (!empty($_POST['sex'])) && (!empty($_POST['bday'])) && (!empty($_POST['address'])) && (!empty($_POST['course'])) && (!empty($_POST['department'])) 
                        && (!empty($_POST['cnumber'])) && (!empty($_POST['yearlvl'])) && (!empty($_POST['eventc'])) && (!empty($_POST['email'])) && (!empty($_POST['status'])) ) {

                      $target = "../images/" . basename($_FILES['image']['name']);
                      $image = $_FILES['image']['name'];
                      $stud_no = $_POST['stud_no'];
                      $fname = ucfirst(strtolower($_POST['fname']));
                      $lname = ucfirst(strtolower($_POST['lname']));
                      $mname = ucfirst(strtolower($_POST['mname']));
                      $age = $_POST['age'];
                      $sex = ucfirst(strtolower($_POST['sex']));
                      $course = ucfirst(strtolower($_POST['course']));
                      $dept = ucfirst(strtolower($_POST['department']));
                      $address = ucfirst(strtolower($_POST['address']));
                      $yearlvl = ucfirst(strtolower($_POST['yearlvl']));
                      $cnumber = $_POST['cnumber'];
                      $bday = $_POST['bday'];
                      $email = $_POST['email'];
                      $status = ucfirst(strtolower($_POST['status']));
                      $eventc = ucfirst(strtolower($_POST['eventc']));
                      //$name = $fname . $space . $mname . "." . $space . $lname;
                      if ($a != $_POST["stud_no"]) {
                      
                    
                    $sql = mysql_query("INSERT INTO athletes_info(ATHLE_ID,ATHLE_FNAME,ATHLE_MNAME,ATHLE_LNAME,ATHLE_AGE,ATHLE_SEX,ATHLE_ADDRESS,ATHLE_BDATE,ATHLE_CONTNUM,ATHLE_DEPT_NAME,ATHLE_COURSE,ATHLE_YR_LVL,ATHLE_EMAIL,ATHLE_STATUS,ATHLE_EVENT_CAT,ATHLE_IMAGE)VALUES('$stud_no','$fname','$mname','$lname','$age','$sex','$address','$bday','$cnumber','$dept','$course','$yearlvl','$email','$status','$eventc','$image')");
                    mysql_query($sql);

                      $desc = "The admin ADD in Athletes information ID " . $stud_no ;
                      $act = "ADD";
                      $audit = mysql_query("INSERT INTO sdmo_audit(AUDIT_DESC,AUDIT_ACTION,AUDIT_DATE)VALUES('$desc','$act',now())");

                  //uploading the image file
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                      echo "Successful added/image!";
                      
                    echo "<script type='text/javascript'>alert('Successful added,Add More')</script>";
                    
                  }

                  }else{
                    echo "<script type='text/javascript'>alert('Student Number already exist!')</script>";
                  }

                  }else {
                    echo "<script type='text/javascript'>alert('Fill-Up all Informations')</script>";
                  } 

                  }   
                ?>
                   <form method="POST" enctype="multipart/form-data" > <!-- Start of form-->
                    <table class="table"> 
                    <tr>  
                      <td colspan="0"  style="padding-left: 25px; "> 
                      <img src="../system-images/default-profile-image.png" id="image" class="thumbnail" style="height: 150px;width: 150px; overflow: hidden;" alt="Image">  
                      <script type="text/javascript">
                        document.getElementById("files").onchange = function(){
                          var reader = new FileReader();
                          reader.onload = function(e){
                            document.getElementById("image").src = e.target.result;
                          };
                          reader.readAsDataURL(this.files[0]); 
                        };
                      </script> 
                      </td> 
                         
                      <td colspan="5" style="padding-top: 120px;">
                        <input type="file" name="image" id="files" class="btn btn-default" style='border-radius:0px;background-color: #f3f3f3;width:200px;border: none;'> 
                      </td>   
                    </tr>   
                    <tr>       
                    </tr>
                    <tr>  
                      <td style="width: 100px;"><label>Student Number</label></td> 
                      <td colspan="2"><input class="form-control" maxlength="10" type="text" name="stud_no" placeholder="2017100143"> </td>
                      <td></td>
                    </tr>
                    <tr>  
                      <td><label>Name</label></td> 
                      <td><input class="form-control"  type="text" name="lname" placeholder="Lastname" ></td>   
                      <td><input class="form-control" type="text" name="fname" placeholder="First name" ></td>   
                      <td><input class="form-control" type="Text" name="mname" placeholder="Middle name" ></td> 
                    </tr>
                    <tr>  
                      <td><label>Age</label></td> 
                      <td><input class="form-control" type="text" name="age" placeholder="Age"> </td> 
                      <td><label>Sex</label></td> 
                      <td>
                        <select name="sex" class="form-control">
                          <option>Select sex</option>
                          <option></option>
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                        </select> 
                      </td>
                    </tr>   
                    <tr>  
                      <td><label>Address</label></td> 
                      <td><input class="form-control" type="text" name="address" placeholder="Address" > </td>  
                      <td><label>Birthday</label></td> 
                      <td><input class="form-control" type="date" name="bday"> </td>
                    </tr>
                    <tr>  
                      <td><label>Department</label></td> 
                      <td>
                        <select name="department" class="form-control">
                              <option>Select Department</option>
                            <option></option>
                            <option value="cafa">CAFA</option>
                            <option value="cass">CASS</option>
                            <option value="cba">CBA</option>
                            <option value="ccs">CCS</option>
                            <option value="coed">COED</option>
                            <option value="coet">COET</option>
                            <option value="cos">COS</option>
                        </select>
                      </td>
                      <td><label>Email </label></td> 
                      <td><input class="form-control"  type="email" name="email" placeholder="user@domain.com"> </td>   
                    </tr>
                              
                     <tr> 
                      <td><label>Course</label></td>
                      <td><input class="form-control" type="text" name="course" placeholder="Course"></td>
                      <td><label>Academic Status </label></td> 
                      <td>
                        <select name="status" class="form-control">
                          <option>Select Status</option>
                          <option></option>
                          <option value="Current Enrolled">Currently Enrolled</option>
                          <option value="Graduated">Graduated</option>
                          <option value="Under-Graduate">Under-Graduate</option> 
                        </select>
                      </td> 
                    </tr>
                    <tr>  
                      <td><label>Year Level</label></td> 
                      <td>
                        <select name="yearlvl" class="form-control">
                          <option>Select Year Level</option>
                          <option></option>
                          <option value="First Year">First Year</option>
                          <option value="Second Year">Second Year</option>
                          <option value="Third Year">Third Year</option>
                          <option value="Fourth Year">Fourth Year</option>
                          <option value="Fifth Year">Fifth Year</option>
                        </select>
                      </td>  
                      <td><label>Event Category </label></td> 
                      <td>
                        <select name="eventc" class="form-control">
                          <option>Select Event</option>
                          <option></option>
                          <option value="Archery">Archery</option>
                          <option value="Arnis">Arnis</option>
                          <option value="Athletics">Athletics</option>
                          <option value="Basketball">Basketball</option>
                          <option value="Baseball">Baseball</option>
                          <option value="Billiards">Billiards</option> 
                          <option value="Boxing">Boxing</option>
                          <option value="Chess">Chess</option>
                          <option value="Dance-Sports">Dance-Sports</option>
                          <option value="Football">Football</option>
                          <option value="Footsal">Footsal</option> 
                          <option value="Karate">Karate-Do</option>
                          <option value="Sepak-Takraw">Sepak-Takraw</option>
                          <option value="Softball">Softball</option> 
                          <option value="Swimming">Swimming</option>
                          <option value="Taekwondo">Taekwondo</option>  
                        </select> 
                      </td> 
                    </tr>  
                    <tr>  
                      <td><label>Contact Number</label></td> 
                      <td><input class="form-control" type="text" name="cnumber" placeholder="Mobile" ></td> 
                    </tr> 
                    <tr>  
                      <td colspan="5">
                        <input style='border-radius:0px;background-color: #00cc00;width:200px;' class="btn btn-success col-md-4 pull-right"  type="submit" name="submit" value="Add Now"> 
                      </td> 
                    </tr> 
                  </table>        
                            
                  </form><!-- end of form-->   
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
               