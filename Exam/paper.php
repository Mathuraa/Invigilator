<?php
session_start();

$student_id=$_SESSION['student'];

require '../admin/conn.php';
 $exam=$_GET['exam'];
 

$q= (isset($_GET['q'])) ? $_GET['q'] : 1;

 

 
?>

<?php
date_default_timezone_set('Asia/Colombo');

 

?>


<!DOCTYPE html>
<html lang="en">
	<head>

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="css/paper.css"> 
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  
	</head>
   
<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<div class="cont">
 

	<div class="ppr-cont">
		<div class="hero">
			<span>Online Test-<?php echo $exam; ?></span>
		
		</div>
		<div class="q-cont">
			<div class="q-sub-cont">
				<div class="q-head">
					<span>Question <?php echo $q; ?></span>
					<hr>
					
				</div>
				<div class="q-head2">
				<?php
				$table_name=strtolower($exam)."_exam";
						$sql ="select * from ".$table_name." where qid=".$q;
						$result = mysqli_query($conn, $sql);
					     if ($result=='') {
					     	echo"no exam";
					     	header("location: exam_select.php");
					     }

						while($row=mysqli_fetch_assoc($result)){
					 
					    $_SESSION['exam_id']= $row['eid'];

				?>
				<span id="eID"style="display: none;"> <?php echo$_SESSION['exam_id']; ?></span>
				<span id="sID"style="display: none;"> <?php echo$_SESSION['student']; ?></span>

					<div>
						<p><?php echo $row['question']; ?></p>
					</div>
					<div>
						 <form>

						 	<?php 
						 	$answers=explode(',',$row['answers']);

						 	foreach ($answers as $answer) {
			
						 	?>
						 	<div class="form-check ch">
							  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
							  <label class="form-check-label" for="flexCheckDefault">
							  <?php echo $answer; ?>
							  </label>
							</div>

						<?php } ?>
							 
						 </form>

					</div>
					
				</div>
			</div>

		<?php } ?>

			<div class="forward">
				<button type="button" class="btn btn-outline-primary">Next Question</button>
				
			</div>
			<div class="back">
				<button type="button" class="btn btn-outline-secondary">Previous Question</button>
				
			</div>
		</div>
		
	</div>

	<div class="ppr-control">

		<div class="ppr-control-cont">
			<div class="hero hero1">
				<span>Time Left</span>
		
			</div>

			<div class="time-cont"  >
				<div>
					<span id="h">--</span>
					<span>Hours</span>
					
				</div>
				<div>
					<span id="m">--</span>
					<span>Minutes</span>
					
				</div>
				<div>
					<span id="s">--</span>
					<span>Seconds</span>
					
				</div>
		
			</div>

			<div class="q-list">
				<div class="q-hero">
					<span>Questions</span>
				</div>
				
			</div>
			<div class="q-squares-cont">
				<div class="q-sq-sub">
<?php 
$table_name=strtolower($exam)."_exam";
$result = mysqli_query($conn, "SELECT * FROM ".$table_name);

mysqli_close($conn);
$x=1;
while($row = mysqli_fetch_assoc($result)) {
	

?>
					<div class="q-square" onclick="
					location.href=window.location.protocol + '//'+  window.location.host +  
					 '/invigilator/exam/paper.php?exam=<?php echo $exam?>&q=<?php echo  $row["qid"] ?>'; 

					"><?php echo $x;?></div>
					 

				<?php $x++; } ?>
				</div>
			</div>

			<div class="submit-btn">
				<button  id="submit" type="button" class="btn btn-secondary btn-lg">SUBMIT</button>
				
			</div>	
			 

			<div class="msg">
				

			</div>
			

			 
			
		</div>	
		
	</div>

	
 
 
</div>

 

<div class="footer">
<p>&copy; Online Invigilator <?php echo date("Y", strtotime("+8 HOURS"))?></p>
</div>


 
</body>
<script type="text/javascript">
	 

	var alertList = document.querySelectorAll('.alert')
     alertList.forEach(function (alert) {
      new bootstrap.Alert(alert)
    })

function record_violation(sid,eid,item){

	// console.log("dd");
	 



	 $.ajax({
            url:"record_violation.php",    //the page containing php script
            type: "post",    //request type,
            dataType: 'json',
            data: {exam_id:eid,stud_id:sid,proh_item:item},
            success:function(result){
               
           }
        });


}

let hour=document.querySelector("#h");
let min=document.querySelector("#m");
let sec=document.querySelector("#s");

setInterval(()=>{


	 $.ajax({
            url:"timer.php",    //the page containing php script
            type: "Get",    //request type,
            dataType: 'text',
            
            success:function(result){
                let time=result.split(':');

                hour.innerHTML=time[0];
                min.innerHTML=time[1];
                sec.innerHTML=time[2];


            }
        });

},1000);

 
function createAlert(obj){

	 if(document.querySelector('.msg').innerHTML.trim()==''){

	 	   $( ".msg" ).append( "<div id='al' class='alert alert-danger alert-dismissible fade show 'role='alert'></div>" );

		     $( "#al" ).append( "<strong>Prohibited Item Detected!</strong> Please stop using the <span>"+obj+"</span>");
		     $( "#al" ).append( "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button> ");

	 }
	 else{

	 }

 
}
</script>

<!--yolo -->
<script type="text/javascript">
	

let timer;
let sid=document.querySelector("#sID").innerHTML;
let eid=document.querySelector("#eID").innerHTML;



	  

$( document ).ready(function() {

	/*
     $.ajax({
          type: "GET",
          url: "http://localhost:3000/",
          dataType: "text",
          success: function(data) {
              console.log(data)
          }
       });
 
 */
  

       timer=setInterval(function(){ GetDataAjax();  }, 1500);
});

/*
   $( "#start" ).click(function() {
          console.log("im game0");
        
         
         
   });

*/
  
   $( "#submit" ).click(function() {

   	  $.get('yolo/pid.txt', function(data) {
   		next2(data);
	}, 'text');

   	/*old  
         $.ajax({
         type: "GET",
         url: "http://localhost:3000/stop",
         dataType: "json",
         success: function(data) {
             console.log(data)
         }
      }); */

	
      clearInterval(timer); 
      location.href = 'emotion.php';
        
  });


   function next2(data){

   	

	 $.ajax({
            url:"killPython2.php",    //the page containing php script
            type: "post",    //request type,
            dataType: 'json',
            data: {pid:data},
            success:function(result){
               
            }
        });

}

   
  
  function GetDataAjax(){
    
      $.ajax({
          type: "GET",
          headers: {
             'Cache-Control': 'max-age=0'
          },
          url: "yolo/detects.json",
          dataType: "text",
          success: function(data) {HandleData(data);}
       });
  }
  
  
  
  function HandleData(data) {
      
      let newData=data.split(',');
      
      //console.log(data);

       if(newData.length==12){

          let preStr=newData[0].substr(3);
          
          let object1=preStr.split("'")[1];
          let object2=newData[6].split("'")[1];

          let detects=object1+" & "+object2;
          
         
          

        record_violation(sid.trim(),eid.trim(),detects); 
        createAlert(detects);

            

      }
      else{

        let preStr=newData[0].substr(3);
      
        let object=preStr.split("'")[1];
          
        if (typeof object == 'undefined'){
          object='no prohibited items'
        }
        else{

        	 
        	

         record_violation(sid.trim(),eid.trim(),object);  
         createAlert(object);
        }

      

        

      }

     
     
       
  }

</script>
</html>