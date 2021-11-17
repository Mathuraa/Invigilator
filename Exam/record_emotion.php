<?php

	require_once '../admin/conn.php';
 
		$exam_id = $_POST['exam_id'];
		$stud_id = $_POST['stud_id'];
		$emotion = $_POST['emotion'];

	


		$stmt = $conn->prepare("INSERT INTO `feedback` (stud_id, exam_id,emotion)VALUES(?,?,?)");
		$stmt->bind_param("iis",$stud_id,$exam_id,$emotion);




			
			 
			 
		    $stmt->execute();

		


?>