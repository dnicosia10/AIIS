<?php 
//### start session
session_start();  
	  
$error1 = $error2 = $error3 = $error4 = $error5 = " ";
	 
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style/style.css">
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery.min.js"></script> 
	<title>Add Avtivities</title> 
</head>
<body>
<nav class="navbar navbar-default" id="navbar-top">
 <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="welcome.php">TSU AIIS</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#">Logout</a></li> 
    </ul>
  </div>
</nav>
<nav class="navbar navbar-default" style="padding-top:11px;border-radius:0px;border: none;background: #cccccc;margin-top: -15px;"> 
<div class="container-fluid"> 
	    <div class="col-md-3"></div>
	    <ul class="nav nav-pills pull-left">
		  <li id="active"><a href="../welcome.php"><span class="glyphicon glyphicon-home"></span></a></li>
		  <li><a href="../athletes.php">Gallery</a></li>
		  <li><a href="../inventory-page.php">Inventory</a></li> 
		</ul>
	</div>	
</nav>  

<div class="container-fluid">
<div class="row"> 
	<div class="col-md-12">
		<div class="container-fluid text-center">
			<table>
				<tr>
					<a href="calendar-list.php">Back to List</a> 
				</tr>
			</table>
			<br>
		</div>
	</div>
	<div class="col-md-3">
		<div class="list-group">
		  <a href="../welcome.php" class="list-group-item"><span class="glyphicon glyphicon-cog"></span> Dashboard</a>
		  <a href="calendar-add.php" class="list-group-item"><span class="glyphicon glyphicon-calendar"></span> Calendar</a>
		  <a href="../attendance/time-in.php" class="list-group-item"><span class="glyphicon glyphicon-save-file"></span> Gym Attendance</a>
		</div> 
	</div>

	<div class="col-md-9"> 
	<div class="panel panel-primary">
	<div class="panel-heading" style="background-color: #3377ff;"><div class="panel-title">Update Activity</div></div>
	<div class="panel-body" style="height: 300px;padding: 3px;"> 
	<!--````````````````````````````````````````````````````-->
	<!--start form-->
		<form action="" method="POST">
		 <table class="table">
		 	<tr>
		 		<td><label>Title</label></td>
				<td colspan="2"><span class="error"><?php echo $error1 ?></span></td>
				<td><input class="form-control" type="text" name="title" placeholder=""></td> 
		 	</tr>
		 	<tr>
		 		<td><label>Note(s)&Memos </label></td>
				<td colspan="2"> <span class="error"><?php echo $error2 ?></span></td> 
				<td><textarea class="form-control" name="event"> </textarea></td>
		 	</tr>
		 	<tr>
		 		<td><label>Date Start</label></td>
				<td colspan="2"><span class="error"><?php echo $error3 ?></span></td>
				<td><input class="form-control" type="date" name="start" ></td>
		 	</tr>
		 	<tr>
		 		<td><label>Date End</label></td>
				<td colspan="2"><span class="error"><?php echo $error4 ?></span></td>
				<td><input class="form-control" type="date" name="end"></td>
		 	</tr>
		 	<tr>
		 		<td><label>Status</label></td>
				<td colspan="2"><span class="error"><?php echo $error4 ?></span></td>
				<td><input class="form-control" type="text" name="status" placeholder="Status"></td> 
		 	</tr>
		 </table>
			 
	</div>
	<div class="panel-footer">
	<?php 
		//### start connection
		include_once'../importants/link.php';
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
			}if (empty($_POST['start'])) {
				$error3 =  "*";
			}else{
				$error3 = "";
			}if (empty($_POST['end'])) {
				$error4 =  "*";	
			}else{
				$error4 = "";
			}if (empty($_POST['status'])) {
				$error5 =  "*";	
			}else{
				$error5 = "";
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
				$insert = mysql_query("UPDATE  sdmo_calendar SET CAL_TITLE ='$title',CAL_EVENT='$event',CAL_START='$start',CAL_END='$end',CAL_STATUS ='$status' WHERE CAL_NO='$_GET[a]' ");
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
		//### end of script	 
	?>  
	<div class="container-fluid">
			<input style='border-radius:0px;background-color: #00cc00;width: 200px;'  class="btn btn-success" type="submit" name="submit" value="Update">
		</div>  
	</form>
	<!--end form-->	
	<!--````````````````````````````````````````````````````-->
	</div>	
	</div> 
	</div> 
<!--### CSS ###-->
<style type="text/css">
	.error{
		color:red;
	} 
	#t-heads{
		background: #f3f3f3;
		border: none;
		color: #122;
		font-weight: bold; 
	}
</style>
</body>
</html>
