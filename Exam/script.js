


const video = document.getElementById('video');
let mood='neutral';

setTimeout(function() { recordEmotion(); }, 8000);

Promise.all([
  faceapi.nets.tinyFaceDetector.loadFromUri('/models'),
  faceapi.nets.faceLandmark68Net.loadFromUri('/models'),
  faceapi.nets.faceRecognitionNet.loadFromUri('/models'),
  faceapi.nets.faceExpressionNet.loadFromUri('/models')
]).then(startVideo)

function startVideo() {

  navigator.getUserMedia = ( navigator.getUserMedia ||
    navigator.webkitGetUserMedia ||
    navigator.mozGetUserMedia ||
    navigator.msGetUserMedia);

  navigator.getUserMedia(
    { video: {} },
    stream => video.srcObject = stream,
    err => console.error(err)
  )

  
}

video.addEventListener('play', () => {
  const canvas = faceapi.createCanvasFromMedia(video)
  document.body.append(canvas)
  const displaySize = { width: video.width, height: video.height }
  faceapi.matchDimensions(canvas, displaySize)
  setInterval(async () => {
    const detections = await faceapi.detectAllFaces(video, new faceapi.TinyFaceDetectorOptions()).withFaceLandmarks().withFaceExpressions()
    const resizedDetections = faceapi.resizeResults(detections, displaySize)
    canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height)
    faceapi.draw.drawDetections(canvas, resizedDetections)
    faceapi.draw.drawFaceLandmarks(canvas, resizedDetections)
    faceapi.draw.drawFaceExpressions(canvas, resizedDetections)

    

    if(detections.length>0){
      /*
      console.log("neutral "+detections[0].expressions.neutral);
      console.log("sad "+detections[0].expressions.sad);
      console.log("fearful "+detections[0].expressions.fearful);
      console.log("disgusted "+detections[0].expressions.disgusted);
      console.log("happy "+detections[0].expressions.happy);
      console.log("angry "+detections[0].expressions.angry);
      console.log("surprised "+detections[0].expressions.surprised); */
     
      let i;
      mood='neutral';
      for (const [key, value] of Object.entries(detections[0].expressions)) {
        //console.log(`${key}: ${value}`);

          let max=detections[0].expressions.neutral;
          
          if(max<value){
            mood=key;
          }

         
          
      }

       console.log(mood);


    }
   
  }, 100)
})

function recordEmotion(){
  let sid=document.querySelector("#sID").innerHTML;
  let eid=document.querySelector("#eID").innerHTML;

 
 
  document.querySelector('#vid-cont').innerHTML='';

  
$( "#vid-cont" ).append( 
  "<div class='alert alert-success' id='innerMsg' style='position: absolute; bottom:3rem;' role='alert'> </div> " );

$( "#innerMsg" ).append( 
  " Emotion Recorded Successfully,Thank you for your feedback." );

  console.log("game and mood is:"+mood );


   $.ajax({
            url:"record_emotion.php",    //the page containing php script
            type: "post",    //request type,
            dataType: 'json',
            data: {exam_id:eid,stud_id:sid,emotion:mood},
            success:function(result){
                console.log(result);


            }
        });

    setTimeout(function() { 
                      window.location.href = "/invigilator";
                       }, 2000);

  


}