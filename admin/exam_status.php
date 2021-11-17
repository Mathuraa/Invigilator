<?php

require '../admin/conn.php';

//print_r($exam_ids);






?>




<!DOCTYPE html>
<html lang = "en">
	<head>
		<title>Online Invigilator</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/style.css" />
	 

		  
<style type="text/css">
	

.my-custom-scrollbar {
	position: relative;
	height: 35vh;
	overflow: auto;
	}
.my-custom-scrollbar1 {
		position: relative;
		height: 55vh;
		overflow: auto;
}
.my-custom-scrollbar2 {
	position: relative;
	height: 85vh;
	overflow: auto;
}

.table-wrapper-scroll-y {
	display: block;}

</style>
 

 

	</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
		<div class="container-fluid">
			<label class="navbar-brand">Exam status</label>
		</div>
	</nav>

	<div    style="margin: 7rem; 0;position: relative;">
		<div style="text-align: center;" >
			 

			<h1>Recent exam violators</h1>
			

		</div>

		 <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar1" style="margin-top: 4rem;">
			<table class="table table-hover table-dark">
			  <thead>
			    <tr>
			      <th scope="col">Student ITNum</th>
			      <th scope="col">Student Name</th>
			      <th scope="col">Subject</th>
			      <th scope="col">Violated Object</th>
			      <th scope="col">Violated Duration Total</th>
			       <th scope="col">Date&Time</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	$sql ="select * from violation order by violated_time DESC";

				$result = mysqli_query($conn, $sql);

		 

				while($row=mysqli_fetch_assoc($result)){
					    $stud_no="";
					    $stud_name="";
					  	$sub_id="";

					  	$sub_name="";
				        $stud_id=$row['stud_id'];

				         $sql ="select * from student where stud_id=".$stud_id;
				         $result1 = mysqli_query($conn, $sql);
				         while($row1=mysqli_fetch_assoc($result1)){
				                $stud_no=$row1['stud_no'];
				                $stud_name=$row1['firstname']." ".$row1['lastname'];
				          }

				         $sql ="select * from exam where eid=".$row['exam_id'];
				         $result2 = mysqli_query($conn, $sql);
				         while($row2=mysqli_fetch_assoc($result2)){
				                $sub_id=$row2['sub_id'];
				                 
				         }
				         $sql ="select * from subject where sub_id=".$sub_id;
				         $result3 = mysqli_query($conn, $sql);
				         while($row3=mysqli_fetch_assoc($result3)){
				                $sub_name=$row3['sub_name'];
				                 
				         }
			 

			
			  	?>
			    <tr>
			      <th scope="row">IT<?php echo $stud_no; ?></th>
			      <td><?php echo $stud_name; ?></td>
			      <td><?php echo $sub_name; ?></td>
			      <td ><span class="badge"><?php echo $row['proh_item'] ?></span></td>
			       <td><?php echo $row['count'].' seconds' ?> </td>
			       <td><?php echo $row['violated_time'] ?> </td>
			    </tr>

			<?php } ?>
			     
			  
			  </tbody>
			</table>
		</div>

		<div style="position: absolute; top:0; left: 2">
			<button type="button" class="btn btn-dark" onclick="window.history.back();">Back</button>
		</div>
		
	</div>
 
</body>
</html>