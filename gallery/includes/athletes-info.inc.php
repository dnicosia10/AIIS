<?php   
	$id = $_GET['view'];
	$sql = mysql_query("SELECT * FROM athletes_info WHERE ATHLE_ID = '$id'");
	while ($row = mysql_fetch_array($sql)) {
		$NAME = strtoupper($row['ATHLE_LNAME'])  . " , " . $row['ATHLE_FNAME']." , ".$row['ATHLE_MNAME'];
	echo"
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
				   ".strtoupper($row['ATHLE_SEX'])."<br>
				</div> 
								</div>
						<div class='container-fluid col-md-8'><br></div>		
								<div class='container-fluid col-md-8'>
				<div class='pull-left'> <label>ADDRESS:</label><br>  
				   ".strtoupper($row['ATHLE_ADDRESS'])."<br>
				</div>    
								</div>
						<div class='container-fluid col-md-8'><br></div>		
								<div class='container-fluid col-md-8'>
				<div class='pull-left'> <label>DEPARTMENT:</label><br>  
				   ".strtoupper($row['ATHLE_DEPT_NAME'])."<br>
				</div>    
								</div>
						<div class='container-fluid col-md-8'><br></div>		
								<div class='container-fluid col-md-8'>
				<div class='pull-left'> <label>COURSE:</label><br>  
				   ".strtoupper($row['ATHLE_COURSE'])."<br>
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
				   ".$row['ATHLE_BDATE'] ."<br>
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
				   ".$row['ATHLE_EMAIL'] ."<br>
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
				   ".strtoupper($row['ATHLE_EVENT_CAT'])."<br>
				</div>    
								</div>
						<div class='container-fluid col-md-8'><br></div>		
								<div class='container-fluid col-md-8'>
				<div class='pull-left'> <label>ACADEMIC STATUS :</label><br>  
				   ".strtoupper($row['ATHLE_STATUS'])."<br>
				</div>    
								</div> 
						<div class='container-fluid col-md-8'><br></div>		
								<div class='container-fluid col-md-8'>
				<div class='pull-left'> <label>EVENT :</label><br>  
				   ".strtoupper($row['ATHLE_EVENT_CAT'])."<br>
				</div>    
					</div> 		 	 
				</div> 	

				</div>		 		 
			   
		 ";
	}
?>


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