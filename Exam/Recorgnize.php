<?php

session_start();
 



?>

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Verifying</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="css/all.css" rel="stylesheet">
      <link rel="stylesheet" href="css/recorgnize.css"> 
     <script defer src="js/all.js"></script> 

</head>




<body style="background-color: #325288; color: white">
		<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<span hidden id="StudIT"><?php echo $_SESSION['itNo'];?></span>

	<div class="jumbotron hero" >
		  <h1 class="display-4 header">Face Verifying...</h1>
		  
		  <div class="holder"  >

		  	
		  	<div class="alert alert-warning pt-4 mt-5 " role="alert" style="width: 60%; margin-left: 20%;font-size: 2rem">
				 Please look at the camera,When camera opens up!!<span style="margin-left: 0.4rem"><i class="far fa-smile-beam"></i></span>
		    </div>

		  </div>
		  
		 

		  </p>	
	</div>

	<script type="text/javascript">

     
      let itNo=$("#StudIT").text();
      setTimeout(function() { readIT(); }, 18000);
		
		$( document ).ready(function() {

			

		 
			 $.ajax({
			            url:"FaceRec/runPy.php",    //the page containing php script
			            type: "post",    //request type,
			            dataType: 'json',
			            
			            success:function(result){


			                
			            }
			        });


	

		});

		function readIT(){

				 $.ajax({
	          type: "GET",
	          url: "FaceRec/FaceRec.txt",
	          dataType: "text",
	          success: function(data){
	            
	              Verify(data,itNo);
	          }
	       });

		}


		function Verify(currentIT,RecorgnizedIT){
			



			if(currentIT==RecorgnizedIT){
				
				 $.get('FaceRec/pid_faceVer.txt', function(data) {
					   		next2(data);
						});

				//location.href = 'exam_select.php';

					 
			}
			else{

				document.querySelector('.holder').innerHTML='';
  					document.querySelector('.header').innerHTML='Verification Failed';

			 	  
			 	    $( ".holder" ).append( " <h3 class='display-6'>Go Back to login</h3>" );

 					$.get('FaceRec/pid_faceVer.txt', function(data) {
					   		

					   		  $.ajax({
						            url:"killPython.php",    //the page containing php script
						            type: "post",    //request type,
						            dataType: 'json',
						            data: {pid:data},
						            success:function(result){
						                console.log(result.abc);

						                
						            }
						        });

					});


			 	   
			      setTimeout(function() { 
		                 	window.history.back();
		                 	 }, 3000);


			}


		}

		   function next2(pro_id){
		   	createMsg();

		   
			 $.ajax({
		            url:"killPython.php",    //the page containing php script
		            type: "post",    //request type,
		            dataType: 'json',
		            data: {pid:pro_id},
		            success:function(result){
		               

		                
		            }
		        });

			  setTimeout(function() { 
		                 	location.href = 'exam_select.php';
		                 	 }, 5000);


			}

			function createMsg(){


		   			document.querySelector('.holder').innerHTML='';
  					document.querySelector('.header').innerHTML='';

			 	   $( ".holder" ).append( " <span id='check'  >  <i class='far fa-check-circle'></i> </span>" );
			 	    $( ".holder" ).append( " <h3 class='display-6'>Verified</h3>" );
			 	   	

		  
	 
			}




	</script>
  
</body>
</html