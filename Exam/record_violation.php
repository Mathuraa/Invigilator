<?php

	require_once '../admin/conn.php';
 
		$exam_id = $_POST['exam_id'];
		$stud_id = $_POST['stud_id'];
		$proh_item = $_POST['proh_item'];
		 
		date_default_timezone_set('Asia/Colombo');

		 

		 $sql ="select * from violation where exam_id=".$exam_id." and stud_id=".$stud_id;
		 $result = mysqli_query($conn, $sql);

		 if($result->num_rows>0){

		 	while($row=mysqli_fetch_assoc($result)){

		       $date=date ('Y-m-d H:i:s', $phptime);
		 	

		        $stmt = $conn->prepare("update violation set count=count+1,proh_item=?,violated_time=? where vid=?");

		 		$stmt->bind_param("ssi",$proh_item,$date,$row['vid']);

			// set parameters and execute
			 
			   $stmt->execute();

			   break;

		 	} 		 

		 }
		 else{

		 	 $count = 1;

		 	 $stmt = $conn->prepare("INSERT INTO `violation` (exam_id, stud_id, count,proh_item)VALUES(?,?,?,?)");
			$stmt->bind_param("iiis", $exam_id, $stud_id,$count,$proh_item);

			// set parameters and execute
			 
			$stmt->execute();

			

		 }
		
		


?>