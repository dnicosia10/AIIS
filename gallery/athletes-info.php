<?php
  session_start();
  if(!isset($_SESSION["uName"])) {
     header("Location: index.php");
  }  
?>
<head>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/slidetoggle.js"></script>
	<title>Gallery</title>
</head>
<body>
<nav class="navbar navbar-default" id="nav-top">
  <div class="container-fluid">
    <div class="navbar-header pull-right">
      <a class="navbar-brand" href="#">
       Logout
      </a>
    </div>
  </div>
</nav>

<div class="container-fluid">
<div class="row"> 
	<!--column 1--> <!--SIDE-NAV-->
	<div class="col-md-2" id="col-2">
	<section id="side-nav">
	<div class="list-group">  
	  <a href="../dashboard.php" class="list-group-item"> <span class="glyphicon glyphicon-dashboard"></span> &nbsp Dashboard</a> 
	  <a href="../inventory.php" class="list-group-item"> <span class="glyphicon glyphicon-cog"></span> &nbsp Inventory</a>
	  <a href="#" class="list-group-item"> <span class="glyphicon glyphicon-open"></span> &nbsp Borrow Equipments</a>
	  <a href="#" class="list-group-item"> <span class="glyphicon glyphicon-saved"></span> &nbsp Gym Attendance</a> 
	  <a href="#" class="list-group-item" id="athlete-tab"> <span class="glyphicon glyphicon-user"></span> &nbsp Athletes</a> 
		   <div id="hidden">
			  <div class="list-group">  
				  <a href="../gallery.php" class="list-group-item"> <span class="glyphicon glyphicon-picture"></span> &nbsp Gallery</a>
				  <a href="add.php" class="list-group-item"> <span class="glyphicon glyphicon-plus"></span> &nbsp Add Athletes Information </a> 
				  <a href="list.php" class="list-group-item"> <span class="glyphicon glyphicon-th-list"></span> &nbsp List</a> 
		  	</div> 
	 	 </div>  
	</div>  
	<form role="search">
	 <div class="form-group">
			<script type="text/javascript">
				function getData(value){
					$.post("../search.php",{name:value},function(data){
							$("#search-results").html(data);
						});
					}
					$(document).ready(function(){
						$("#search-bar").click(function(){
						$("#search-results").show('200');
					}); 
				}); 
			</script>
			<div class="container-fluid">
				<label> Search </label>
				<input id="search-bar" type="text" name="name" onkeyup="getData(this.value);" class="form-control" placeholder="Search Name" style="border: none;">

		</div>  
	</form>   
		<div id="search-results" style="padding: 5px;padding-left: 20px;height: 200px;" >
			
		</div> 
	<div class="container-fluid" style="margin-top:50%;">
		<div class="well dash-box text-center">
				<h2><span class="glyphicon glyphicon-user" aria-hidden="true"> </span>
				 <?php include'../count-contents/count-athletes.php'; ?></h2>
				<h4>Athletes</h4>
			</div>	
	</div>   
	</section>
	</div>

	<!--column 2-->
	<div class="col-md-10">
		<label style="padding: 5px;" >GALLERY</label>
	</div>
	<!--column 3-->
	<div class="col-md-10">
	<section id="contents">
	<div class="panel panel-default">  
	<div class="panel-body" style="padding:5px;">
		 <ul class="nav nav-pills">
		 	<li><a href="../gallery.php"> <span class="glyphicon glyphicon-home"></span> <strong></strong> </a></li> 
		 	<li><a href="add.php"> <span class="glyphicon glyphicon-plus"></span> <strong></strong> </a></li> 
		 	<li><a href="list.php"> <span class="glyphicon glyphicon-th-list"></span> <strong></strong> </a></li> 
		 </ul>
	</div>	
	</div>
	</section>	
	</div>
		<div class="col-md-8">
		<div class="panel panel-default">
		<div class="panel-heading text-center" style="background-color: #3377ff;"> Personal Information </div>
		<div class="panel-body" style="height:650px;" >
				<?php  
				require_once'../configs/config.php';
					$id = $_GET['view'];
					$sql = mysql_query("SELECT * FROM athletes_info WHERE ATHLE_ID = '$id'");
					while ($row = mysql_fetch_array($sql)) {
						$NAME = strtoupper($row['ATHLE_LNAME'])  . " , " . $row['ATHLE_FNAME']." , ".$row['ATHLE_MNAME'];
					echo"<div class='row'> 
							<div class='col-md-12'>  
								<div class='col-md-6'>

 						 <div class='container-fluid'><hr></div>

								<div class='container-fluid col-md-8'>	
									 <label>STUDENT NUMBER</label> <br> 
									   <stu_id>".$row['ATHLE_ID']."</stu_id><br>
									<br>
									<label>FULL NAME :</label><br>  
									   <names>".$NAME."</names><br>  
 
									</div>

							<div class='container-fluid col-md-8'><br></div>
									<div class='container-fluid col-md-6'>
										<div class='pull-left'> <label>AGE:</label><br>  
										   ".$row['ATHLE_AGE']."<br>
										</div>   
										<div class='pull-right'> <label>SEX:</label><br>  
										   ".$row['ATHLE_SEX']."<br>
										</div> 
									</div>
							<div class='container-fluid col-md-8'><br></div>		
									<div class='container-fluid col-md-8'>
										<div class='pull-left'> <label>ADDRESS:</label><br>  
										   ".$row['ATHLE_ADDRESS']."<br>
										</div>    
									</div>
							<div class='container-fluid col-md-8'><br></div>		
									<div class='container-fluid col-md-8'>
										<div class='pull-left'> <label>DEPARTMENT:</label><br>  
										   ".$row['ATHLE_DEPT_NAME']."<br>
										</div>    
									</div>
							<div class='container-fluid col-md-8'><br></div>		
									<div class='container-fluid col-md-8'>
										<div class='pull-left'> <label>COURSE:</label><br>  
										   ".$row['ATHLE_COURSE']."<br>
										</div>    
									</div>
							<div class='container-fluid col-md-8'><br></div>		
									<div class='container-fluid col-md-8'>
										<div class='pull-left'> <label>YEAR LEVEL:</label><br>  
										   ".$row['ATHLE_YR_LVL']."<br>
										</div>    
									</div>
							<div class='container-fluid col-md-8'><br></div>
									<div class='container-fluid col-md-8'>
										<div class='pull-left'> <label>BIRTHDATE:</label><br>  
										   ".$row['ATHLE_BDATE']."<br>
										</div>    
									</div>		
						</div>
						<br>
								<div class='col-md-6'>
									<div class='container-fluid col-md-8'>
										<div class='pull-left'> <label>IMAGE:</label>   
										    <img class='thumbnail' id='image' src='../images/" . $row['ATHLE_IMAGE'] . "'/ >
										</div>    
									</div>
							
							<div class='container-fluid col-md-8'><br></div>		
									<div class='container-fluid col-md-8'>
										<div class='pull-left'> <label>EMAIL ADDRESS:</label><br>  
										   ".$row['ATHLE_EMAIL']."<br>
										</div>    
									</div>
							<div class='container-fluid col-md-8'><br></div>		
									<div class='container-fluid col-md-8'>
										<div class='pull-left'> <label>MOBILE # :</label><br>  
										   ".$row['ATHLE_CONTNUM']."<br>
										</div>    
									</div>
							<div class='container-fluid col-md-8'><br></div>		
									<div class='container-fluid col-md-8'>
										<div class='pull-left'> <label>EVENT:</label><br>  
										   ".$row['ATHLE_EVENT_CAT']."<br>
										</div>    
									</div>
							<div class='container-fluid col-md-8'><br></div>		
									<div class='container-fluid col-md-8'>
										<div class='pull-left'> <label>ACADEMIC STATUS :</label><br>  
										   ".$row['ATHLE_STATUS']."<br>
										</div>    
									</div> 
							<div class='container-fluid col-md-8'><br></div>		
									<div class='container-fluid col-md-8'>
										<div class='pull-left'> <label>EVENT :</label><br>  
										   ".$row['ATHLE_EVENT_CAT']."<br>
										</div>    
									</div> 		 	 
								</div> 			 		 
							  </div>  	 
						 ";
					}
				?>					
		</div> 
		</div>
		<div class="panel-footer">
			
		</div> 
		</div>
		 
		</div><!--./row-->
	</div> <!--./container-fluid--> 

<style type="text/css">
	label{
		color: #888; 
		font-size: 1em;
		font-weight: lighter; 
	}	  
	.col-md-8{
		margin-bottom:5px; 
	}
	stu_id{
		font-weight: bolder; 
		font-size: 1.22em; 
	}
	names{
		font-weight: bolder; 
		font-size: 1em;  
		font-style: bold;
	}
	#image{
		width: 150px;
		height: 150px;
	}
	</style>

 
<style type="text/css">
	h2,h4{
		color: #33adff;
	}
	#t-heads{
		color: #999;

	}
	td{
		font-size: 0.8em;border: 1px solid #ccc;
	}
	#hidden{
		display: none;
	}
	#hidden .list-group-item{
		 padding-left: 30px;
		 background: linear-gradient(-45deg, bottom right, #888, #222);
	}
	#hidden .list-group-item:hover{
		background: #333;
	}
	.form-control{
		border-radius: 0px;
	}
</style> 
</body>
</html>
 