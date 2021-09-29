<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/jquery.min.js"></script> 
	<title>Gallery</title>
</head>
<body>
<nav class="navbar navbar-default" id="nav-top">
  <div class="container-fluid">
  	  <div class="navbar-header pull-left">
      <span style="padding-left:220px;color: #fff;padding-top: 20px;"><label style="font-size: 1.2em;padding-top:15px;">GALLERY | List</label></span>
   	  </div>	
      <div class="navbar-header pull-right">
      <a class="navbar-brand" href="#">Logout</a>
   	  </div>
  </div>
</nav>

<div class="container-fluid">
<div class="row">  
	<!--SIDE NAV-->
	<div class="col-md-2" id="col-2"> 
	<section id="side-nav">
		<div class="container-fluid">
		<figure>
			<img src="../system-images/aiis-logo.png">
		</figure>
		</div>
	<div class="list-group">  
	  <a href="../dashboard.php" class="list-group-item"> <span class="glyphicon glyphicon-dashboard"></span> &nbsp Dashboard</a> 
	  <a href="../equipments.php" class="list-group-item"> <span class="glyphicon glyphicon-cog"></span> &nbsp Inventory</a>
	  <a href="../athletes.php" class="list-group-item"> <span class="glyphicon glyphicon-picture"></span> &nbsp Gallery </a>
	  <a href="#" class="list-group-item"> <span class="glyphicon glyphicon-saved"></span> &nbsp Gym Attendance</a>  
	</div>	
	</section>	 
	</div> 

	<div class="col-md-10"> 
	<div class="panel panel-default">  
		<div class="panel-body" style="padding:5px;">
			 <ul class="nav nav-pills">
			 	<li><a href="../gallery.php"> <span class="glyphicon glyphicon-home"></span></a></li> 
			 	<li><a href="add-informations.php"> <span class="glyphicon glyphicon-plus"></span></a></li> 
			 	<li><a href="athletes.php"> <span class="glyphicon glyphicon-pencil"></span></a></li> 
			 	<li><a href="#"> <span class="glyphicon glyphicon-eye-open"></span></a></li>  
			 </ul>	
		</div> 
	</div> 
	</div>
 

	<div class="col-md-10"> 
	<div class="panel panel-default"> 
		<div class="panel-heading">
			<label style="font-weight: bold;color:#999;"> ATHLETES</label>  
		</div>
		<div class="panel-body" style="height:600px;overflow-y: scroll;padding: 0px;">
			 <?php include'athletes-list.php'; ?> 
		</div>	 
	</div>	 
	</div>
 

</div>	
</div> 
</body>
</html>



<style type="text/css">
	h2,h4{
		color: #33adff;
	}
	td{
		font-size: 0.9em;
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
</style> 
 