<?php

session_start();

require '../admin/conn.php';


//die($_SESSION['itNo']);
//print_r($exam_ids);



?>

<!DOCTYPE html>
<html lang="en">
	<head>

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
   
  
	</head>

	<style type="text/css">
		
		.container-fluid label:hover{

			cursor: pointer;

			color: #fff !important;
		}

	 
	</style>
   
<body>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

			<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

		<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" style="background-color: #000">
			<div class="container-fluid">
				<label class="navbar-brand" style="color: #c8d6e5;">Online Invigilator</label>
			</div>
		</nav>
		<span hidden id="StudIT"><?php echo $_SESSION['itNo'];?></span>

		<div class="container ">
			<div class="jumbotron jumbotron-fluid">
			  <div class="container">
			    <h1 class="display-4">Select you exam</h1>
			    <p class="lead">Remove Books and Mobile Devices before starting the exam.</p>
			  </div>
			</div>
			

		 

			<form  action="set_time.php" >
			 
			  <div class="form-group" style="margin-bottom: 1rem">
			    <label for="exampleFormControlSelect1">Exam Select</label>
			    <select class="form-control" id="exampleFormControlSelect1" name="exam">
			    <?php 
			  	$sql ="select * from subject";

				$result = mysqli_query($conn, $sql);

				while($row=mysqli_fetch_assoc($result)){
					 
				?>
			      <option> <?php echo $row['sub_name']; ?></option>

			      <?php } ?>
			      
			   
			    </select>
			  </div>
			  <button type="submit" id='submit' class="btn btn-primary">Submit</button>
			</form>
		</div>
 
	
 
</body>

<script type="text/javascript">

	

	

$( document ).ready(function() {

	 	 $.ajax({
            url:"yolo/runPy.php",    //the page containing php script
            type: "post",    //request type,
            dataType: 'json',
            
            success:function(result){
                
            }
        });

	  
 
});

</script>
 
</html>