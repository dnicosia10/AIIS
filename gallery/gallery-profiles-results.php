<style type="text/css"> 
		#image{
		 		height:100px;
		}
		 	 
		img{
			max-width: 240px;
			max-height:180px;
		} 
		#profile{ 
			width: 150px;	
			border-radius: 0px;
			margin: 5px; 
		} 
		 	
</style>
<?php   
		require_once'configs/config.php';
			if(isset($_POST['sort']))
	{	  
		if($events  = "archery")
		{	 
			//### Get data
			//### excute query
			$sql = mysql_query("SELECT * FROM athletes_info WHERE ATHLE_EVENT_CAT = '$events'"); 
			echo "<div  class='panel panel-default'>";
			echo "<div  class='panel-heading' id='event-name'><label>ARCHERY</label></div>";
			echo "<div  class='panel-body' id='event-panel' style='background:#;'>"; 
			while($row = mysql_fetch_assoc($sql))
			{	 
				echo "<div id='profile' class='thumbnail col-md-2 col-sm-2 text-center'>";
				echo "<a href='gallery/athletes-info.php?view=$row[ATHLE_ID]'><img id='image' class='thumbnail' src='images/" . $row['ATHLE_IMAGE'] . "'  alt='no image'></a><br>";
				echo "".$row['ATHLE_ID']."<br>";
				echo "".$row['ATHLE_LNAME']." ,".$row['ATHLE_FNAME']."<br>";
				echo "".$row['ATHLE_CONTNUM']."<br>";
				echo "".$row['ATHLE_EMAIL']."<br>";
				echo "".$row['ATHLE_STATUS'].""; 
				echo "</div>";
				 	 
			} 
			echo "</div>";
			echo "</div>";	
			echo "<div><hr></div>";

		}  
	//### ********************************************************************************** ###// 	
		if($events  = "arnis")
		{
			//### Get data
			//### excute query
			$sql = mysql_query("SELECT * FROM athletes_info WHERE ATHLE_EVENT_CAT = '$events'");  
			echo "<div  class='panel panel-default'>";
			echo "<div  class='panel-heading' id='event-name'><label>ARNIS</label></div>";
			echo "<div  class='panel-body' id='event-panel' style='background:#;'>"; 
			while($row = mysql_fetch_assoc($sql))
			{	 
				echo "<div id='profile' class='thumbnail col-md-2 col-sm-2 text-center'>";
				echo "<a href='gallery/athletes-info.php?view=$row[ATHLE_ID]'><img id='image' class='thumbnail' src='images/" . $row['ATHLE_IMAGE'] . "'  alt='no image'></a><br>";
				echo "".$row['ATHLE_ID']."<br>";
				echo "".$row['ATHLE_LNAME']." ,".$row['ATHLE_FNAME']."<br>";
				echo "".$row['ATHLE_CONTNUM']."<br>";
				echo "".$row['ATHLE_EMAIL']."<br>";
				echo "".$row['ATHLE_STATUS'].""; 
				echo "</div>";
				 	 
			} 
			echo "</div>";
			echo "</div>";
			echo "<div><hr></div>";

		} 
	//### ********************************************************************************** ###// 
		if($events  = "athletics")
		{
			//### Get data
			//### excute query
			$sql = mysql_query("SELECT * FROM athletes_info WHERE ATHLE_EVENT_CAT = '$events'");  
			echo "<div  class='panel panel-default'>";
			echo "<div  class='panel-heading' id='event-name'><label>ATHLETICS</label></div>";
			echo "<div  class='panel-body' id='event-panel' style='background:#;'>"; 
			while($row = mysql_fetch_assoc($sql))
			{	 
				echo "<div id='profile' class='thumbnail col-md-2 col-sm-2 text-center'>";
				echo "<a href='gallery/athletes-info.php?view=$row[ATHLE_ID]'><img id='image' class='thumbnail' src='images/" . $row['ATHLE_IMAGE'] . "'  alt='no image'></a><br>";
				echo "".$row['ATHLE_ID']."<br>";
				echo "".$row['ATHLE_LNAME']." ,".$row['ATHLE_FNAME']."<br>";
				echo "".$row['ATHLE_CONTNUM']."<br>";
				echo "".$row['ATHLE_EMAIL']."<br>";
				echo "".$row['ATHLE_STATUS'].""; 
				echo "</div>";
				 	 
			} 
			echo "</div>";
			echo "</div>";
			echo "<div><hr></div>";

		} 
	//### ********************************************************************************** ###// 
		if($events  = "basketball")
		{
			//### Get data
			//### excute query
			$sql = mysql_query("SELECT * FROM athletes_info WHERE ATHLE_EVENT_CAT = '$events'");  
			echo "<div  class='panel panel-default'>";
			echo "<div  class='panel-heading' id='event-name'><label>BASKETBALL</label></div>";
			echo "<div  class='panel-body' id='event-panel' style='background:#;'>"; 
			while($row = mysql_fetch_assoc($sql))
			{	 
				echo "<div id='profile' class='thumbnail col-md-2 col-sm-2 text-center'>";
				echo "<a href='gallery/athletes-info.php?view=$row[ATHLE_ID]'><img id='image' class='thumbnail' src='images/" . $row['ATHLE_IMAGE'] . "'  alt='no image'></a><br>";
				echo "".$row['ATHLE_ID']."<br>";
				echo "".$row['ATHLE_LNAME']." ,".$row['ATHLE_FNAME']."<br>";
				echo "".$row['ATHLE_CONTNUM']."<br>";
				echo "".$row['ATHLE_EMAIL']."<br>";
				echo "".$row['ATHLE_STATUS'].""; 
				echo "</div>";
				 	 
			} 
			echo "</div>";
			echo "</div>";
			echo "<div><hr></div>";

		} 
	//### ********************************************************************************** ###// 
		if($events  = "baseball")
		{
			//### Get data
			//### excute query
			$sql = mysql_query("SELECT * FROM athletes_info WHERE ATHLE_EVENT_CAT = '$events'");  
			echo "<div  class='panel panel-default'>";
			echo "<div  class='panel-heading' id='event-name'><label>BASEBALL</label></div>";
			echo "<div  class='panel-body' id='event-panel' style='background:#;'>"; 
			while($row = mysql_fetch_assoc($sql))
			{	 
				echo "<div id='profile' class='thumbnail col-md-2 col-sm-2 text-center'>";
				echo "<a href='gallery/athletes-info.php?view=$row[ATHLE_ID]'><img id='image' class='thumbnail' src='images/" . $row['ATHLE_IMAGE'] . "'  alt='no image'></a><br>";
				echo "".$row['ATHLE_ID']."<br>";
				echo "".$row['ATHLE_LNAME']." ,".$row['ATHLE_FNAME']."<br>";
				echo "".$row['ATHLE_CONTNUM']."<br>";
				echo "".$row['ATHLE_EMAIL']."<br>";
				echo "".$row['ATHLE_STATUS'].""; 
				echo "</div>";
				 	 
			} 
			echo "</div>";
			echo "</div>";
			echo "<div><hr></div>";

		} 
	//### ********************************************************************************** ###// 
		if($events  = "billiards")
		{	
			//### Get data
			//### excute query
			$sql = mysql_query("SELECT * FROM athletes_info WHERE ATHLE_EVENT_CAT = '$events'");  
			echo "<div  class='panel panel-default'>";
			echo "<div  class='panel-heading' id='event-name'><label>BILLIARDS</label></div>";
			echo "<div  class='panel-body' id='event-panel' style='background:#;'>"; 
			while($row = mysql_fetch_assoc($sql))
			{	 
				echo "<div id='profile' class='thumbnail col-md-2 col-sm-2 text-center'>";
				echo "<a href='gallery/athletes-info.php?view=$row[ATHLE_ID]'><img id='image' class='thumbnail' src='images/" . $row['ATHLE_IMAGE'] . "'  alt='no image'></a><br>";
				echo "".$row['ATHLE_ID']."<br>";
				echo "".$row['ATHLE_LNAME']." ,".$row['ATHLE_FNAME']."<br>";
				echo "".$row['ATHLE_CONTNUM']."<br>";
				echo "".$row['ATHLE_EMAIL']."<br>";
				echo "".$row['ATHLE_STATUS'].""; 
				echo "</div>";
				 	 
			} 
			echo "</div>";
			echo "</div>"; 
			echo "<div><hr></div>";

		} 
	//### ********************************************************************************** ###// 
		if($events  = "boxing")
		{
			//### Get data
			//### excute query
			$sql = mysql_query("SELECT * FROM athletes_info WHERE ATHLE_EVENT_CAT = '$events'");  
			echo "<div  class='panel panel-default'>";
			echo "<div  class='panel-heading' id='event-name'><label>BOXING</label></div>";
			echo "<div  class='panel-body' id='event-panel' style='background:#;'>"; 
			while($row = mysql_fetch_assoc($sql))
			{	 
				echo "<div id='profile' class='thumbnail col-md-2 col-sm-2 text-center'>";
				echo "<a href='gallery/athletes-info.php?view=$row[ATHLE_ID]'><img id='image' class='thumbnail' src='images/" . $row['ATHLE_IMAGE'] . "'  alt='no image'></a><br>";
				echo "".$row['ATHLE_ID']."<br>";
				echo "".$row['ATHLE_LNAME']." ,".$row['ATHLE_FNAME']."<br>";
				echo "".$row['ATHLE_CONTNUM']."<br>";
				echo "".$row['ATHLE_EMAIL']."<br>";
				echo "".$row['ATHLE_STATUS'].""; 
				echo "</div>";
				 	 
			} 
			echo "</div>";
			echo "</div>";
			echo "<div><hr></div>";

		} 
	 
	//### ********************************************************************************** ###// 
		if($events  = "chess")
		{	
			//### Get data
			//### excute query
			$sql = mysql_query("SELECT * FROM athletes_info WHERE ATHLE_EVENT_CAT = '$events'");  
			echo "<div  class='panel panel-default'>";
			echo "<div  class='panel-heading' id='event-name'><label>CHESS</label></div>";
			echo "<div  class='panel-body' id='event-panel' style='background:#;'>"; 
			while($row = mysql_fetch_assoc($sql))
			{	 
				echo "<div id='profile' class='thumbnail col-md-2 col-sm-2 text-center'>";
				echo "<a href='gallery/athletes-info.php?view=$row[ATHLE_ID]'><img id='image' class='thumbnail' src='images/" . $row['ATHLE_IMAGE'] . "'  alt='no image'></a><br>";
				echo "".$row['ATHLE_ID']."<br>";
				echo "".$row['ATHLE_LNAME']." ,".$row['ATHLE_FNAME']."<br>";
				echo "".$row['ATHLE_CONTNUM']."<br>";
				echo "".$row['ATHLE_EMAIL']."<br>";
				echo "".$row['ATHLE_STATUS'].""; 
				echo "</div>";
				 	 
			} 
			echo "</div>";
			echo "</div>";
			echo "<div><hr></div>";

		} 
	//### ********************************************************************************** ###// 
		if($events  = "dance-sports")
		{
			//### Get data
			//### excute query
			$sql = mysql_query("SELECT * FROM athletes_info WHERE ATHLE_EVENT_CAT = '$events'");  
			echo "<div  class='panel panel-default'>";
			echo "<div  class='panel-heading' id='event-name'><label>DANCE SPORTS</label></div>";
			echo "<div  class='panel-body' id='event-panel' style='background:#;'>"; 
			while($row = mysql_fetch_assoc($sql))
			{	 
				echo "<div id='profile' class='thumbnail col-md-2 col-sm-2 text-center'>";
				echo "<a href='gallery/athletes-info.php?view=$row[ATHLE_ID]'><img id='image' class='thumbnail' src='images/" . $row['ATHLE_IMAGE'] . "'  alt='no image'></a><br>";
				echo "".$row['ATHLE_ID']."<br>";
				echo "".$row['ATHLE_LNAME']." ,".$row['ATHLE_FNAME']."<br>";
				echo "".$row['ATHLE_CONTNUM']."<br>";
				echo "".$row['ATHLE_EMAIL']."<br>";
				echo "".$row['ATHLE_STATUS'].""; 
				echo "</div>";
				 	 
			} 
			echo "</div>";
			echo "</div>";
			echo "<div><hr></div>";

		} 
	//### ********************************************************************************** ###// 
		if($events  = "football")
		{
			//### Get data
			//### excute query
			$sql = mysql_query("SELECT * FROM athletes_info WHERE ATHLE_EVENT_CAT = '$events'");  
			echo "<div  class='panel panel-default'>";
			echo "<div  class='panel-heading' id='event-name'><label>FOOTBALL</label></div>";
			echo "<div  class='panel-body' id='event-panel' style='background:#;'>"; 
			while($row = mysql_fetch_assoc($sql))
			{	 
				echo "<div id='profile' class='thumbnail col-md-2 col-sm-2 text-center'>";
				echo "<a href='gallery/athletes-info.php?view=$row[ATHLE_ID]'><img id='image' class='thumbnail' src='images/" . $row['ATHLE_IMAGE'] . "'  alt='no image'></a><br>";
				echo "".$row['ATHLE_ID']."<br>";
				echo "".$row['ATHLE_LNAME']." ,".$row['ATHLE_FNAME']."<br>";
				echo "".$row['ATHLE_CONTNUM']."<br>";
				echo "".$row['ATHLE_EMAIL']."<br>";
				echo "".$row['ATHLE_STATUS'].""; 
				echo "</div>";
				 	 
			} 
			echo "</div>";
			echo "</div>"; 
			echo "<div><hr></div>";

		} 
	//### ********************************************************************************** ###// 
		if($events  = "FOOTSAL")
		{
			//### Get data
			//### excute query
			$sql = mysql_query("SELECT * FROM athletes_info WHERE ATHLE_EVENT_CAT = '$events'");
			echo "<div  class='panel panel-default'>";
			echo "<div  class='panel-heading' id='event-name'><label>ARCHERY</label></div>";
			echo "<div  class='panel-body' id='event-panel' style='background:#;'>";  
			while($row = mysql_fetch_assoc($sql))
			{	 
				echo "<div id='profile' class='thumbnail col-md-2 col-sm-2 text-center'>";
				echo "<a href='gallery/athletes-info.php?view=$row[ATHLE_ID]'><img id='image' class='thumbnail' src='images/" . $row['ATHLE_IMAGE'] . "'  alt='no image'></a><br>";
				echo "".$row['ATHLE_ID']."<br>";
				echo "".$row['ATHLE_LNAME']." ,".$row['ATHLE_FNAME']."<br>";
				echo "".$row['ATHLE_CONTNUM']."<br>";
				echo "".$row['ATHLE_EMAIL']."<br>";
				echo "".$row['ATHLE_STATUS'].""; 
				echo "</div>";
				 	 
			} 
			echo "</div>";
			echo "</div>";
			echo "<div><hr></div>";

		}	 
	//### ********************************************************************************** ###// 
		if($events  = "karate")
		{
			//### Get data
			//### excute query
			$sql = mysql_query("SELECT * FROM athletes_info WHERE ATHLE_EVENT_CAT = '$events'");  
			echo "<div  class='panel panel-default'>";
			echo "<div  class='panel-heading' id='event-name'><label>KARATE-DO</label></div>";
			echo "<div  class='panel-body' id='event-panel' style='background:#;'>"; 
			while($row = mysql_fetch_assoc($sql))
			{	 
				echo "<div id='profile' class='thumbnail col-md-2 col-sm-2 text-center'>";
				echo "<a href='gallery/athletes-info.php?view=$row[ATHLE_ID]'><img id='image' class='thumbnail' src='images/" . $row['ATHLE_IMAGE'] . "'  alt='no image'></a><br>";
				echo "".$row['ATHLE_ID']."<br>";
				echo "".$row['ATHLE_LNAME']." ,".$row['ATHLE_FNAME']."<br>";
				echo "".$row['ATHLE_CONTNUM']."<br>";
				echo "".$row['ATHLE_EMAIL']."<br>";
				echo "".$row['ATHLE_STATUS'].""; 
				echo "</div>";
				 	 
			} 
			echo "</div>";
			echo "</div>";
			echo "<div><hr></div>";

		} 
	//### ********************************************************************************** ###// 
		if($events  = "sepak-takraw")
		{
			//### Get data
			//### excute query
			$sql = mysql_query("SELECT * FROM athletes_info WHERE ATHLE_EVENT_CAT = '$events'");  
			echo "<div  class='panel panel-default'>";
			echo "<div  class='panel-heading' id='event-name'><label>SEPAK-TAKRAW</label></div>";
			echo "<div  class='panel-body' id='event-panel' style='background:#;'>"; 
			while($row = mysql_fetch_assoc($sql))
			{	 
				echo "<div id='profile' class='thumbnail col-md-2 col-sm-2 text-center'>";
				echo "<a href='gallery/athletes-info.php?view=$row[ATHLE_ID]'><img id='image' class='thumbnail' src='images/" . $row['ATHLE_IMAGE'] . "'  alt='no image'></a><br>";
				echo "".$row['ATHLE_ID']."<br>";
				echo "".$row['ATHLE_LNAME']." ,".$row['ATHLE_FNAME']."<br>";
				echo "".$row['ATHLE_CONTNUM']."<br>";
				echo "".$row['ATHLE_EMAIL']."<br>";
				echo "".$row['ATHLE_STATUS'].""; 
				echo "</div>";
				 	 
			} 
			echo "</div>";
			echo "</div>";
			echo "<div><hr></div>";

		} 
	//### ********************************************************************************** ###// 
		if($events  = "softball")
		{
			//### Get data
			//### excute query
			$sql = mysql_query("SELECT * FROM athletes_info WHERE ATHLE_EVENT_CAT = '$events'");  
			echo "<div  class='panel panel-default'>";
			echo "<div  class='panel-heading' id='event-name'><label>SOFTBALL</label></div>";
			echo "<div  class='panel-body' id='event-panel' style='background:#;'>"; 
			while($row = mysql_fetch_assoc($sql))
			{	 
				echo "<div id='profile' class='thumbnail col-md-2 col-sm-2 text-center'>";
				echo "<a href='gallery/athletes-info.php?view=$row[ATHLE_ID]'><img id='image' class='thumbnail' src='images/" . $row['ATHLE_IMAGE'] . "'  alt='no image'></a><br>";
				echo "".$row['ATHLE_ID']."<br>";
				echo "".$row['ATHLE_LNAME']." ,".$row['ATHLE_FNAME']."<br>";
				echo "".$row['ATHLE_CONTNUM']."<br>";
				echo "".$row['ATHLE_EMAIL']."<br>";
				echo "".$row['ATHLE_STATUS'].""; 
				echo "</div>";
				 	 
			} 
			echo "</div>";
			echo "</div>";
			echo "<div><hr></div>";

		} 
	//### ********************************************************************************** ###// 
		if($events  = "swimming")
		{
			//### Get data
			//### excute query
			$sql = mysql_query("SELECT * FROM athletes_info WHERE ATHLE_EVENT_CAT = '$events'");  
			echo "<div  class='panel panel-default'>";
			echo "<div  class='panel-heading' id='event-name'><label>SWIMMING</label></div>";
			echo "<div  class='panel-body' id='event-panel' style='background:#;'>"; 
			while($row = mysql_fetch_assoc($sql))
			{	 
				echo "<div id='profile' class='thumbnail col-md-2 col-sm-2 text-center'>";
				echo "<a href='gallery/athletes-info.php?view=$row[ATHLE_ID]'><img id='image' class='thumbnail' src='images/" . $row['ATHLE_IMAGE'] . "'  alt='no image'></a><br>";
				echo "".$row['ATHLE_ID']."<br>";
				echo "".$row['ATHLE_LNAME']." ,".$row['ATHLE_FNAME']."<br>";
				echo "".$row['ATHLE_CONTNUM']."<br>";
				echo "".$row['ATHLE_EMAIL']."<br>";
				echo "".$row['ATHLE_STATUS'].""; 
				echo "</div>";
				 	 
			} 
			echo "</div>";
			echo "</div>"; 
			echo "<div><hr></div>";

		} 
	//### ********************************************************************************** ###// 
		if($events  = "taekwondo")
		{
			//### Get data
			//### excute query
			$sql = mysql_query("SELECT * FROM athletes_info WHERE ATHLE_EVENT_CAT = '$events'");  
			echo "<div  class='panel panel-default'>";
			echo "<div  class='panel-heading' id='event-name'><label>TAEKWONDO</label></div>";
			echo "<div  class='panel-body' id='event-panel' style='background:#;'>"; 
			while($row = mysql_fetch_assoc($sql))
			{	 
				echo "<div id='profile' class='thumbnail col-md-2 col-sm-2 text-center'>";
				echo "<a href='gallery/athletes-info.php?view=$row[ATHLE_ID]'><img id='image' class='thumbnail' src='images/" . $row['ATHLE_IMAGE'] . "'  alt='no image'></a><br>";
				echo "".$row['ATHLE_ID']."<br>";
				echo "".$row['ATHLE_LNAME']." ,".$row['ATHLE_FNAME']."<br>";
				echo "".$row['ATHLE_CONTNUM']."<br>";
				echo "".$row['ATHLE_EMAIL']."<br>";
				echo "".$row['ATHLE_STATUS'].""; 
				echo "</div>";
				 	 
			} 
			echo "</div>";
			echo "</div>";
			echo "<div><hr></div>";

		} 
	//### ********************************************************************************** ###// 
	}		
		?> 