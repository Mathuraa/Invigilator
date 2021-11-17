<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>EmotionFaceRecognition</title>
  <script defer src="face-api.min.js"></script>
  <script defer src="script.js"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel = "stylesheet" type="text/css" href="feedback.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <style>

     canvas {
      position: absolute;
      top:3rem;
      left: 38%;
    }
    
    
  </style>
</head>
<body>
   <div id='alert-cont'>
    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Well done!</h4>
      <hr>
      <p class="mb-0" >Please face the camera to track your feedback on the exam.</p>
        <span id="eID" style="display: none;"> <?php echo$_SESSION['exam_id']; ?></span>
        <span id="sID" style="display: none;"> <?php echo$_SESSION['student']; ?></span>
    </div>
    
  </div>
  
  <div id='vid-cont'>
      
   
    <video id="video"  width="360" height="700" autoplay muted ></video>


    
  </div>
  
</body>
</html>

