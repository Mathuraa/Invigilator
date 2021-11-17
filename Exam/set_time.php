<?php
session_start();

date_default_timezone_set("Asia/Colombo");

require '../admin/conn.php';

$sql ="select * from subject where sub_name='".$_GET['exam']."'";
$result = mysqli_query($conn, $sql);
$sub_id='';
while($row=mysqli_fetch_assoc($result)){

      $sub_id=$row['sub_id'];
}

$sql ="select * from exam where sub_id=".$sub_id;
$result = mysqli_query($conn, $sql);
$duration='';
while($row=mysqli_fetch_assoc($result)){

      $duration=$row['duration'];
}

 
$_SESSION['duration']=$duration;
$_SESSION['start_time']=date('H:i:s');


$endTime=date('H:i:s',strtotime($_SESSION['start_time'].'+'.$duration.' minutes'));

$_SESSION['end_time']=$endTime;

//echo  $duration;
header("location: paper.php?exam=".$_GET['exam']);

?>

 