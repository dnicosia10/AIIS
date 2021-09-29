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
                      <th ><span class='glyphicon glyphicon-pencil'></span></th>
                      <th ><span class='glyphicon glyphicon-eye-open'></span></th>
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
                        <td>".$row['ATHLE_DEPT_NAME']."</td>
                        <td>".$row['ATHLE_COURSE']."</td>
                        <td>".$row['ATHLE_YR_LVL']."</td>
                        <td>".$row['ATHLE_CONTNUM']."</td>
                        <td><a class='btn btn-primary btn-xs'style='border-radius:0px;' href='gallery/update-info.php?id= $row[ATHLE_ID]'> Update</a></td>
                        <td><a href='gallery/profile.php?view=$row[ATHLE_ID]' style='border-radius:0px;' class='btn btn-success btn-xs'>view</td>
                        </tr> "; 
                  } 
                  echo "</table>";
                    echo "</div>";
                  ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css"> 
	<style type="text/css">
		#image{
			height: 80px;
        margin: 0;
		} 
    #t-heads{
     background-color: #ccf2ff;
    } 
	</style>
</head>
<body>

</body>
</html>